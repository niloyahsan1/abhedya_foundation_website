<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use App\Models\SiteSetting;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(): View
    {
        $contactInfo = [
            'email' => SiteSetting::get('contact_email', 'info@abhedyafoundation.org'),
            'phone' => SiteSetting::get('contact_phone', '+880 1700-000000 [Placeholder]'),
            'address' => SiteSetting::get('contact_address', 'House 12, Road 4, Sector 7, Uttara, Dhaka-1230, Bangladesh [Placeholder]'),
            'facebook' => SiteSetting::get('social_facebook', 'https://facebook.com/abhedyafoundation'),
            'twitter' => SiteSetting::get('social_twitter', 'https://twitter.com/abhedya_bd'),
            'linkedin' => SiteSetting::get('social_linkedin', 'https://linkedin.com/company/abhedyafoundation'),
            'youtube' => SiteSetting::get('social_youtube', 'https://youtube.com/@abhedyafoundation'),
        ];

        return view('pages.contact', compact('contactInfo'));
    }

    public function store(Request $request): RedirectResponse
    {
        // Honeypot spam check
        if ($request->filled('company_url')) {
            return redirect()->route('contact')->with('success', 'Thank you! Your message has been received.');
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:50',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|min:10|max:5000',
        ]);

        ContactMessage::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'] ?? null,
            'subject' => $validated['subject'],
            'message' => $validated['message'],
            'ip_address' => $request->ip(),
            'is_read' => false,
        ]);

        return redirect()->route('contact')
            ->with('contact_success', 'Thank you for reaching out to Abhedya Foundation. Your message has been safely received, and our administrative team will get back to you shortly.');
    }
}
