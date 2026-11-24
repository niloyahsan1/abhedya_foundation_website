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

        $heroDescription = SiteSetting::get('hero_description', 'Abhedya Foundation builds long-term community resilience through digital classrooms for remote schools, mobile medical camps, emergency flood response, and women-led vocational empowerment.');

        return view('pages.home', compact(
            'featuredProjects',
            'activeCampaigns',
            'latestPosts',
            'galleryPreview',
            'heroDescription'
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

        $mission = SiteSetting::get('mission', 'To uplift marginalized communities by delivering high-impact educational initiatives, essential healthcare access, emergency relief, and sustainable livelihood opportunities.');
        $vision = SiteSetting::get('vision', 'A just, compassionate society where every individual has equal opportunities to thrive with self-reliance, security, and human dignity.');

        return view('pages.about', compact('stats', 'mission', 'vision'));
    }
}
