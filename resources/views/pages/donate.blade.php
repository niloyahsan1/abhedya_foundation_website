@extends('layouts.app')

@section('title', 'Make a Donation | Abhedya Foundation')
@section('meta_description', 'Instructions and secure verification submission for contributing via bKash, Nagad, Rocket, or direct Bank Transfer to Abhedya Foundation.')

@section('content')

    <!-- Header Banner -->
    <section class="bg-gradient-to-b from-slate-900 to-slate-800 text-white py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-3xl space-y-4">
                <span class="text-xs font-bold text-amber-400 uppercase tracking-widest">Support Our Mission</span>
                <h1 class="text-4xl sm:text-5xl font-extrabold tracking-tight text-white">
                    Donate to Abhedya Foundation
                </h1>
                <p class="text-base sm:text-lg text-slate-300 leading-relaxed">
                    Transparent, accountable humanitarian aid. Every contribution empowers rural education, delivers life-saving flood relief, and sustains emergency healthcare.
                </p>
            </div>
        </div>
    </section>

    <!-- Main Donation Guide & Reporting Form -->
    <section class="py-16 bg-slate-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Submission Confirmation Banner -->
            @if(session('donation_submitted'))
                <div class="mb-12 p-8 rounded-2xl bg-amber-50 border-2 border-amber-300 text-amber-950 shadow-sm space-y-4">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-full bg-amber-500 text-white flex items-center justify-center font-bold text-lg">
                            ✓
                        </div>
                        <div>
                            <h2 class="text-xl font-extrabold">Transaction Report Submitted (Pending Verification)</h2>
                            <p class="text-xs text-amber-800">Tracking Reference ID: #{{ session('tracking_id') }} • Donor: {{ session('donor_name') }} • Amount: ৳{{ number_format(session('amount')) }}</p>
                        </div>
                    </div>
                    <div class="text-sm leading-relaxed space-y-2 border-t border-amber-200 pt-4">
                        <p>
                            <strong>Important Verification Policy:</strong> Your submission has been entered into our financial queue with status <em>"Pending Verification"</em>.
                        </p>
                        <p class="text-xs text-amber-800">
                            In accordance with strict non-profit financial governance, donations are confirmed and reflected in campaign fundraising totals only after our finance team cross-verifies the bank or mobile financial service (MFS) transaction statement. Thank you for your partnership!
                        </p>
                    </div>
                </div>
            @endif

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-start">

                <!-- Left Column: Step-by-Step Payment Instructions -->
                <div class="lg:col-span-7 space-y-8" id="payment-methods">

                    <!-- Important Disclaimer Alert Box -->
                    <div class="p-6 rounded-2xl bg-slate-900 text-white space-y-2">
                        <div class="flex items-center gap-2 text-xs font-bold text-amber-400 uppercase tracking-wider">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/></svg>
                            Payment Governance Notice
                        </div>
                        <p class="text-xs text-slate-300 leading-relaxed">
                            Numbers and account details below are verified official foundation accounts. Never disclose your personal bKash/Nagad PIN, OTP, or passwords to anyone.
                        </p>
                    </div>

                    <!-- MFS Options (bKash, Nagad, Rocket) -->
                    <div class="space-y-6">
                        <!-- bKash -->
                        <div class="interactive-card bg-white rounded-2xl border border-slate-100 p-6 sm:p-8 shadow-sm space-y-4 hover:border-pink-300">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 rounded-xl bg-pink-100 text-pink-700 font-extrabold flex items-center justify-center text-sm shadow-sm">
                                        bK
                                    </div>
                                    <div>
                                        <h3 class="text-lg font-bold text-slate-900">bKash Payment</h3>
                                        <span class="text-xs text-slate-500">Send Money / Merchant Payment</span>
                                    </div>
                                </div>
                                <span class="px-3 py-1 rounded-full text-xs font-bold bg-pink-50 text-pink-700 border border-pink-200">MFS</span>
                            </div>

                            <div class="p-4 rounded-xl bg-slate-50 border border-slate-100 font-mono text-sm text-slate-800 flex items-center justify-between">
                                <span>{{ $donationInfo['bkash'] }}</span>
                            </div>

                            <ol class="text-xs text-slate-600 space-y-1.5 list-decimal pl-4 leading-relaxed">
                                <li>Open your bKash App or dial *247#.</li>
                                <li>Select <strong>Send Money</strong> or <strong>Make Payment</strong>.</li>
                                <li>Enter the foundation number above and your contribution amount.</li>
                                <li>Use your name or campaign name as the <strong>Reference</strong>.</li>
                                <li>Save the <strong>Transaction ID (TrxID)</strong> from the confirmation SMS to complete the report form below.</li>
                            </ol>
                        </div>

                        <!-- Nagad -->
                        <div class="interactive-card bg-white rounded-2xl border border-slate-100 p-6 sm:p-8 shadow-sm space-y-4 hover:border-orange-300">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 rounded-xl bg-orange-100 text-orange-700 font-extrabold flex items-center justify-center text-sm shadow-sm">
                                        Ng
                                    </div>
                                    <div>
                                        <h3 class="text-lg font-bold text-slate-900">Nagad Payment</h3>
                                        <span class="text-xs text-slate-500">Send Money / Merchant Payment</span>
                                    </div>
                                </div>
                                <span class="px-3 py-1 rounded-full text-xs font-bold bg-orange-50 text-orange-700 border border-orange-200">MFS</span>
                            </div>

                            <div class="p-4 rounded-xl bg-slate-50 border border-slate-100 font-mono text-sm text-slate-800 flex items-center justify-between">
                                <span>{{ $donationInfo['nagad'] }}</span>
                            </div>

                            <ol class="text-xs text-slate-600 space-y-1.5 list-decimal pl-4 leading-relaxed">
                                <li>Open your Nagad App or dial *167#.</li>
                                <li>Select <strong>Send Money</strong>.</li>
                                <li>Enter the number above and your amount.</li>
                                <li>Save the generated <strong>Transaction ID</strong> for the verification form.</li>
                            </ol>
                        </div>

                        <!-- Rocket -->
                        <div class="interactive-card bg-white rounded-2xl border border-slate-100 p-6 sm:p-8 shadow-sm space-y-4 hover:border-purple-300">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 rounded-xl bg-purple-100 text-purple-700 font-extrabold flex items-center justify-center text-sm shadow-sm">
                                        Rk
                                    </div>
                                    <div>
                                        <h3 class="text-lg font-bold text-slate-900">Rocket (DBBL)</h3>
                                        <span class="text-xs text-slate-500">Dutch-Bangla Mobile Banking</span>
                                    </div>
                                </div>
                                <span class="px-3 py-1 rounded-full text-xs font-bold bg-purple-50 text-purple-700 border border-purple-200">MFS</span>
                            </div>

                            <div class="p-4 rounded-xl bg-slate-50 border border-slate-100 font-mono text-sm text-slate-800">
                                <span>{{ $donationInfo['rocket'] }}</span>
                            </div>
                        </div>

                        <!-- Bank Transfer -->
                        <div class="interactive-card bg-white rounded-2xl border border-slate-100 p-6 sm:p-8 shadow-sm space-y-4 hover:border-emerald-300">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 rounded-xl bg-emerald-100 text-emerald-800 font-extrabold flex items-center justify-center text-sm shadow-sm">
                                        BK
                                    </div>
                                    <div>
                                        <h3 class="text-lg font-bold text-slate-900">Direct Bank Transfer (NPSB / BEFTN)</h3>
                                        <span class="text-xs text-slate-500">Corporate & Institutional Donations</span>
                                    </div>
                                </div>
                                <span class="px-3 py-1 rounded-full text-xs font-bold bg-emerald-50 text-emerald-700 border border-emerald-200">Bank</span>
                            </div>

                            <div class="p-4 rounded-xl bg-slate-50 border border-slate-100 font-mono text-xs text-slate-800 whitespace-pre-line leading-relaxed">
{{ $donationInfo['bank'] }}
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Column: Donation Verification Reporting Form -->
                <div class="lg:col-span-5 bg-white rounded-2xl border border-slate-200 p-6 sm:p-8 shadow-sm sticky top-28">
                    <h2 class="text-xl font-bold text-slate-900 mb-2">Submit Donation Details</h2>
                    <p class="text-xs text-slate-500 mb-6 leading-relaxed">
                        After transferring your donation via bKash, Nagad, Rocket, or Bank, please record your transaction information below for verification.
                    </p>

                    @if ($errors->any())
                        <div class="p-4 mb-6 rounded-xl bg-red-50 border border-red-200 text-red-700 text-xs space-y-1">
                            <span class="font-bold block">Please fix the following issues:</span>
                            <ul class="list-disc pl-4 space-y-0.5">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('donate.store') }}" method="POST" class="space-y-4">
                        @csrf

                        <!-- Honeypot anti-spam field -->
                        <div class="hidden">
                            <input type="text" name="website" tabindex="-1" autocomplete="off">
                        </div>

                        <!-- Target Campaign -->
                        <div>
                            <label for="campaign_id" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1">
                                Designated Purpose
                            </label>
                            <select name="campaign_id" id="campaign_id" class="w-full text-sm rounded-xl border-slate-200 p-2.5 bg-slate-50 border focus:bg-white focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                                <option value="">General Foundation Fund (Where Needed Most)</option>
                                @foreach($activeCampaigns as $c)
                                    <option value="{{ $c->id }}" {{ (old('campaign_id') == $c->id || (isset($selectedCampaign) && $selectedCampaign->id == $c->id)) ? 'selected' : '' }}>
                                        {{ $c->title }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Donor Name -->
                        <div>
                            <label for="donor_name" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1">
                                Donor Full Name <span class="text-red-500">*</span>
                            </label>
                            <input type="text" name="donor_name" id="donor_name" required value="{{ old('donor_name') }}" placeholder="e.g. Mohammad Rahman / Anonymous" class="w-full text-sm rounded-xl border-slate-200 p-2.5 bg-slate-50 border focus:bg-white focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                        </div>

                        <!-- Email & Phone -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                            <div>
                                <label for="donor_email" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1">Email</label>
                                <input type="email" name="donor_email" id="donor_email" value="{{ old('donor_email') }}" placeholder="donor@example.com" class="w-full text-sm rounded-xl border-slate-200 p-2.5 bg-slate-50 border focus:bg-white focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                            </div>
                            <div>
                                <label for="donor_phone" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1">Phone</label>
                                <input type="text" name="donor_phone" id="donor_phone" value="{{ old('donor_phone') }}" placeholder="017XXXXXXXX" class="w-full text-sm rounded-xl border-slate-200 p-2.5 bg-slate-50 border focus:bg-white focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                            </div>
                        </div>

                        <!-- Amount & Payment Method -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                            <div>
                                <label for="amount" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1">
                                    Amount (BDT) <span class="text-red-500">*</span>
                                </label>
                                <input type="number" step="0.01" min="10" name="amount" id="amount" required value="{{ old('amount') }}" placeholder="e.g. 5000" class="w-full text-sm rounded-xl border-slate-200 p-2.5 bg-slate-50 border focus:bg-white focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                            </div>
                            <div>
                                <label for="payment_method" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1">
                                    Method <span class="text-red-500">*</span>
                                </label>
                                <select name="payment_method" id="payment_method" required class="w-full text-sm rounded-xl border-slate-200 p-2.5 bg-slate-50 border focus:bg-white focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                                    <option value="bkash" {{ old('payment_method') === 'bkash' ? 'selected' : '' }}>bKash</option>
                                    <option value="nagad" {{ old('payment_method') === 'nagad' ? 'selected' : '' }}>Nagad</option>
                                    <option value="rocket" {{ old('payment_method') === 'rocket' ? 'selected' : '' }}>Rocket</option>
                                    <option value="bank_transfer" {{ old('payment_method') === 'bank_transfer' ? 'selected' : '' }}>Bank Transfer</option>
                                </select>
                            </div>
                        </div>

                        <!-- Transaction ID -->
                        <div>
                            <label for="transaction_id" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1">
                                Transaction ID (TrxID) <span class="text-red-500">*</span>
                            </label>
                            <input type="text" name="transaction_id" id="transaction_id" required value="{{ old('transaction_id') }}" placeholder="e.g. BKS982341ABC or Bank Slip No." class="w-full text-sm rounded-xl border-slate-200 p-2.5 bg-slate-50 border focus:bg-white focus:ring-2 focus:ring-emerald-500 focus:outline-none font-mono">
                        </div>

                        <!-- Notes -->
                        <div>
                            <label for="notes" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1">
                                Message or Reference (Optional)
                            </label>
                            <textarea name="notes" id="notes" rows="2" placeholder="Any dedication or note for the foundation..." class="w-full text-sm rounded-xl border-slate-200 p-2.5 bg-slate-50 border focus:bg-white focus:ring-2 focus:ring-emerald-500 focus:outline-none">{{ old('notes') }}</textarea>
                            <span class="text-[10px] text-slate-400 block mt-1">Never write PINs or passwords in notes.</span>
                        </div>

                        <div class="pt-2">
                            <button type="submit" class="w-full py-3.5 rounded-xl font-extrabold text-sm text-white bg-gradient-to-r from-emerald-600 to-teal-700 hover:from-emerald-700 hover:to-teal-800 shadow-md shadow-emerald-600/25 transition">
                                Submit Record for Verification
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

@endsection
