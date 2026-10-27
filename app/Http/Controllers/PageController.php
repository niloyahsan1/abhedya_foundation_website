<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use App\Models\GalleryImage;
use App\Models\Post;
use App\Models\Project;
use App\Models\SiteSetting;
use Illuminate\Contracts\View\View;

class PageController extends Controller
{
    public function home(): View
    {
        $featuredProjects = Project::query()
            ->published()
            ->latest()
            ->take(3)
            ->get();

        $activeCampaigns = Campaign::query()
            ->published()
            ->active()
            ->with('verifiedDonations')
            ->latest()
            ->take(3)
            ->get();

        $latestPosts = Post::query()
            ->published()
            ->with(['category', 'user'])
            ->latest('published_at')
            ->latest('id')
            ->take(3)
            ->get();

        $galleryPreview = GalleryImage::query()
            ->published()
            ->latest()
            ->take(6)
            ->get();

        return view('pages.home', compact(
            'featuredProjects',
            'activeCampaigns',
            'latestPosts',
            'galleryPreview'
        ));
    }

    public function about(): View
    {
        $stats = [
            'projects' => SiteSetting::get('stat_projects', '48'),
            'beneficiaries' => SiteSetting::get('stat_beneficiaries', '35,000+'),
            'volunteers' => SiteSetting::get('stat_volunteers', '450+'),
            'districts' => SiteSetting::get('stat_districts', '14'),
        ];

        return view('pages.about', compact('stats'));
    }
}
