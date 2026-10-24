<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use App\Models\Donation;
use App\Models\SiteSetting;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class DonationController extends Controller
{
    public function index(Request $request): View
    {
        $campaignSlug = $request->query('campaign');
        $selectedCampaign = null;

        if ($campaignSlug) {
            $selectedCampaign = Campaign::query()
                ->published()
                ->where('slug', $campaignSlug)
                ->first();
        }

        $activeCampaigns = Campaign::query()
            ->published()
            ->active()
            ->orderBy('title')
            ->get();

        $donationInfo = [
            'bkash' => SiteSetting::get('donation_bkash_number', '01710698540 [Placeholder]'),
            'nagad' => SiteSetting::get('donation_nagad_number', '01710698540 [Placeholder]'),
            'rocket' => SiteSetting::get('donation_rocket_number', '01710698540 [Placeholder]'),
            'bank' => SiteSetting::get('donation_bank_details', "Bank Name: Dutch-Bangla Bank PLC\nAccount: ABHEDYA FOUNDATION (Placeholder)\nAccount No: 115.120.0000000 [Placeholder]\nBranch: Uttara Branch, Dhaka"),
            'guidelines' => SiteSetting::get('donation_guidelines', 'Please note down your transaction ID after transferring your contribution and fill out the form below.'),
        ];

        return view('pages.donate', compact('activeCampaigns', 'selectedCampaign', 'donationInfo'));
    }

    public function store(Request $request): RedirectResponse
    {
        // Honeypot spam prevention
        if ($request->filled('website')) {
            return redirect()->route('donate')->with('success', 'Thank you! Your donation report has been submitted.');
        }

        $validated = $request->validate([
            'donor_name' => 'required|string|max:255',
            'donor_email' => 'nullable|email|max:255',
            'donor_phone' => 'nullable|string|max:50',
            'amount' => 'required|numeric|min:10|max:10000000',
            'payment_method' => 'required|string|in:bkash,nagad,rocket,bank_transfer',
            'transaction_id' => 'required|string|max:100',
            'campaign_id' => 'nullable|exists:campaigns,id',
            'reference' => 'nullable|string|max:255',
            'notes' => 'nullable|string|max:1000',
        ]);

        // Security check: Never collect PINs, passwords or OTPs
        $lowerNotes = strtolower($validated['notes'] ?? '');
        if (str_contains($lowerNotes, 'pin') || str_contains($lowerNotes, 'otp') || str_contains($lowerNotes, 'password')) {
            return back()->withInput()->withErrors([
                'notes' => 'Please do not include any PIN, OTP, or sensitive payment password in your submission.',
            ]);
        }

        // Always save with status 'pending' (never auto-verify user form submissions)
        $donation = new Donation;
        $donation->donor_name = $validated['donor_name'];
        $donation->donor_email = $validated['donor_email'] ?? null;
        $donation->donor_phone = $validated['donor_phone'] ?? null;
        $donation->amount = $validated['amount'];
        $donation->payment_method = $validated['payment_method'];
        $donation->transaction_id = $validated['transaction_id'];
        $donation->campaign_id = $validated['campaign_id'] ?? null;
        $donation->reference = $validated['reference'] ?? null;
        $donation->notes = $validated['notes'] ?? null;
        $donation->status = 'pending';
        $donation->save();

        return redirect()->route('donate')
            ->with('donation_submitted', true)
            ->with('tracking_id', $donation->id)
            ->with('donor_name', $donation->donor_name)
            ->with('amount', $donation->amount);
    }
}
