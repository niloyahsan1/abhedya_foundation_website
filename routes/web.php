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
