<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class CampaignController extends Controller
{
    public function index(Request $request): View
    {
        $status = $request->query('status', 'active');

        $query = Campaign::query()->published()->with('verifiedDonations');

        if ($status && in_array($status, ['active', 'completed'])) {
            $query->where('status', $status);
        }

        $campaigns = $query->latest()->paginate(9)->withQueryString();

        return view('pages.campaigns.index', compact('campaigns', 'status'));
    }

    public function show(string $slug): View
    {
        $campaign = Campaign::query()
            ->published()
            ->with(['updates', 'verifiedDonations'])
            ->where('slug', $slug)
            ->firstOrFail();

        $recentDonations = $campaign->verifiedDonations()
            ->latest('verified_at')
            ->take(5)
            ->get();

        return view('pages.campaigns.show', compact('campaign', 'recentDonations'));
    }
}
