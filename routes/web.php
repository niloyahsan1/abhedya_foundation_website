<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CampaignController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProjectController;
use App\Models\Campaign;
use App\Models\Post;
use App\Models\Project;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Abhedya Foundation Public Routes
|--------------------------------------------------------------------------
*/

// Language Switch Route
Route::get('/locale/{lang}', function (string $lang, \Illuminate\Http\Request $request) {
    if (in_array($lang, ['bn', 'en'], true)) {
        session(['locale' => $lang]);
    }

    $referer = $request->header('referer');
    if ($referer && !str_contains($referer, '/locale/')) {
        return redirect()->to($referer);
    }

    return redirect()->route('home');
})->name('locale.switch');

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');

Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');
Route::get('/projects/{slug}', [ProjectController::class, 'show'])->name('projects.show');

Route::get('/campaigns', [CampaignController::class, 'index'])->name('campaigns.index');
Route::get('/campaigns/{slug}', [CampaignController::class, 'show'])->name('campaigns.show');

Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blog.show');

Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery.index');

Route::get('/donate', [DonationController::class, 'index'])->name('donate');
Route::post('/donate', [DonationController::class, 'store'])->middleware('throttle:10,1')->name('donate.store');

Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->middleware('throttle:10,1')->name('contact.store');

// SEO: Dynamic XML Sitemap
Route::get('/sitemap.xml', function () {
    $projects = Project::published()->latest()->get(['slug', 'updated_at']);
    $campaigns = Campaign::published()->latest()->get(['slug', 'updated_at']);
    $posts = Post::published()->latest()->get(['slug', 'updated_at']);

    $xml = '<?xml version="1.0" encoding="UTF-8"?>';
    $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';

    $staticRoutes = [
        route('home'),
        route('about'),
        route('projects.index'),
        route('campaigns.index'),
        route('blog.index'),
        route('gallery.index'),
        route('donate'),
        route('contact'),
    ];

    foreach ($staticRoutes as $url) {
        $xml .= '<url>';
        $xml .= '<loc>'.htmlspecialchars($url).'</loc>';
        $xml .= '<changefreq>weekly</changefreq>';
        $xml .= '<priority>0.8</priority>';
        $xml .= '</url>';
    }

    foreach ($projects as $project) {
        $xml .= '<url>';
        $xml .= '<loc>'.htmlspecialchars(route('projects.show', $project->slug)).'</loc>';
        $xml .= '<lastmod>'.$project->updated_at->toAtomString().'</lastmod>';
        $xml .= '<priority>0.7</priority>';
        $xml .= '</url>';
    }

    foreach ($campaigns as $campaign) {
        $xml .= '<url>';
        $xml .= '<loc>'.htmlspecialchars(route('campaigns.show', $campaign->slug)).'</loc>';
        $xml .= '<lastmod>'.$campaign->updated_at->toAtomString().'</lastmod>';
        $xml .= '<priority>0.9</priority>';
        $xml .= '</url>';
    }

    foreach ($posts as $post) {
        $xml .= '<url>';
        $xml .= '<loc>'.htmlspecialchars(route('blog.show', $post->slug)).'</loc>';
        $xml .= '<lastmod>'.$post->updated_at->toAtomString().'</lastmod>';
        $xml .= '<priority>0.7</priority>';
        $xml .= '</url>';
    }

    $xml .= '</urlset>';

    return Response::make($xml, 200, ['Content-Type' => 'application/xml']);
})->name('sitemap');

// SEO: robots.txt
Route::get('/robots.txt', function () {
    $content = "User-agent: *\n";
    $content .= "Disallow: /dashboard/\n";
    $content .= "Disallow: /login\n";
    $content .= "Disallow: /register\n";
    $content .= "Disallow: /two-factor/\n";
    $content .= "Disallow: /otp/\n";
    $content .= "Allow: /\n\n";
    $content .= 'Sitemap: '.route('sitemap')."\n";

    return Response::make($content, 200, ['Content-Type' => 'text/plain']);
})->name('robots');

// Direct Fallback Route for Uploaded Media (ensures images always work even if cPanel symlinks fail)
Route::get('/storage/{path}', function (string $path) {
    $filePath = storage_path('app/public/' . $path);
    if (!file_exists($filePath)) {
        abort(404);
    }
    return response()->file($filePath);
})->where('path', '.*')->name('public.storage.fallback');

// One-time Setup Route for cPanel shared hosting without terminal access
Route::get('/cpanel-setup-run', function (\Illuminate\Http\Request $request) {
    if ($request->query('key') !== 'abhedya2026') {
        abort(403, 'Unauthorized setup access key.');
    }

    $log = [];

    // 1. Storage Symlink Auto-Repair
    $publicStorage = public_path('storage');
    $storageAppPublic = storage_path('app/public');

    if (is_link($publicStorage)) {
        @unlink($publicStorage);
    } elseif (is_dir($publicStorage)) {
        $items = @scandir($publicStorage);
        if ($items && count($items) <= 2) {
            @rmdir($publicStorage);
        }
    }

    try {
        \Illuminate\Support\Facades\Artisan::call('storage:link', ['--force' => true]);
        $output = trim(\Illuminate\Support\Facades\Artisan::output());
        $log[] = 'Storage Link: ' . ($output ?: 'Symlink created successfully.');
    } catch (\Throwable $e) {
        $log[] = 'Storage Link Notice: ' . $e->getMessage();
    }

    // Direct native PHP symlink fallback if needed
    if (!file_exists($publicStorage) && file_exists($storageAppPublic)) {
        @symlink($storageAppPublic, $publicStorage);
    }

    // 2. Clear old cached configs
    try {
        \Illuminate\Support\Facades\Artisan::call('optimize:clear');
        $log[] = 'Cache Clear: ' . trim(\Illuminate\Support\Facades\Artisan::output());
    } catch (\Throwable $e) {
        $log[] = 'Cache Clear Notice: ' . $e->getMessage();
    }

    return '<div style="font-family: system-ui, -apple-system, sans-serif; max-width: 620px; margin: 40px auto; padding: 24px; border-radius: 16px; background: #f0fdf4; border: 1px solid #bbf7d0; color: #166534;">'
        . '<h2 style="margin-top: 0; color: #15803d; font-size: 20px;">✓ cPanel Setup Executed Successfully!</h2>'
        . '<p style="font-size: 14px; line-height: 1.6; color: #166534;">Storage symlink has been repaired and application caches are refreshed.</p>'
        . '<pre style="background: #ffffff; padding: 14px; border-radius: 8px; border: 1px solid #dcfce7; font-size: 12px; color: #334155; overflow-x: auto;">' . implode("\n", array_map('htmlspecialchars', $log)) . '</pre>'
        . '<div style="margin-top: 20px;"><a href="/" style="display: inline-block; padding: 10px 20px; background: #2375b8; color: #ffffff; text-decoration: none; border-radius: 8px; font-weight: bold; font-size: 14px;">Go to Live Website &rarr;</a></div>'
        . '</div>';
});

// Admin / Staff Portal Login (Direct access and local development testing)
Route::get('/admin/login', [\App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])
    ->middleware('web')
    ->name('admin.login');

Route::post('/admin/login', [\App\Http\Controllers\Auth\LoginController::class, 'login'])
    ->middleware('web')
    ->name('admin.login.submit');

