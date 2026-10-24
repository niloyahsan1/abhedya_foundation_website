@extends('layouts.app')

@section('title', 'Contact Us | Abhedya Foundation')
@section('meta_description', 'Connect with the leadership and program team at Abhedya Foundation. Reach us via email, phone, or our secure contact form.')

@section('content')

    <!-- Header Banner -->
    <section class="bg-gradient-to-b from-[#1771bf] via-[#1565a8] to-[#0c243c] text-white py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-3xl space-y-4">
                <span class="text-xs font-bold text-sky-300 uppercase tracking-widest">{{ __('Get In Touch') }}</span>
                <h1 class="text-4xl sm:text-5xl font-extrabold tracking-tight text-white">
                    {{ __('Contact Abhedya Foundation') }}
                </h1>
                <p class="text-base sm:text-lg text-blue-100 leading-relaxed">
                    {{ __('Have questions regarding our ongoing campaigns, volunteer partnerships, or organizational donations? Our team is ready to assist you.') }}
                </p>
            </div>
        </div>
    </section>

    <!-- Main Contact Section -->
    <section class="py-16 bg-[#f0f7fd]/30">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            @if(session('contact_success'))
                <div class="mb-10 p-6 rounded-2xl bg-[#f0f7fd] border border-blue-200 text-blue-900 flex items-center gap-4">
                    <div class="w-10 h-10 rounded-full bg-[#2375b8] text-white flex items-center justify-center font-bold text-lg shrink-0">
                        ✓
                    </div>
                    <p class="text-sm font-medium">{{ __(session('contact_success')) }}</p>
                </div>
            @endif

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-start">
                <!-- Left: Contact Details & Office -->
                <div class="lg:col-span-5 space-y-8">
                    <div class="interactive-card bg-white rounded-2xl border border-slate-200/80 p-8 shadow-sm space-y-6">
                        <h2 class="text-xl font-bold text-slate-900 border-b border-slate-100 pb-3">{{ __('Foundation Office') }}</h2>

                        <div class="space-y-4 text-sm text-slate-600">
                            <div class="flex items-start gap-3">
                                <div class="w-9 h-9 rounded-xl bg-[#f0f7fd] text-[#2375b8] border border-blue-100 flex items-center justify-center shrink-0 mt-0.5">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/></svg>
                                </div>
                                <div>
                                    <span class="font-bold text-slate-900 block text-xs uppercase tracking-wider text-slate-400">{{ __('Head Office') }}</span>
                                    <span>{{ __($contactInfo['address']) }}</span>
                                </div>
                            </div>

                            <div class="flex items-start gap-3">
                                <div class="w-9 h-9 rounded-xl bg-[#f0f7fd] text-[#2375b8] border border-blue-100 flex items-center justify-center shrink-0 mt-0.5">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                                </div>
                                <div>
                                    <span class="font-bold text-slate-900 block text-xs uppercase tracking-wider text-slate-400">{{ __('Official Email') }}</span>
                                    <a href="mailto:{{ $contactInfo['email'] }}" class="text-[#2375b8] hover:underline">{{ $contactInfo['email'] }}</a>
                                </div>
                            </div>

                            <div class="flex items-start gap-3">
                                <div class="w-9 h-9 rounded-xl bg-[#f0f7fd] text-[#2375b8] border border-blue-100 flex items-center justify-center shrink-0 mt-0.5">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                                </div>
                                <div>
                                    <span class="font-bold text-slate-900 block text-xs uppercase tracking-wider text-slate-400">{{ __('Telephone') }}</span>
                                    <span>{{ bn_num($contactInfo['phone']) }}</span>
                                </div>
                            </div>
                        </div>

                        <div class="pt-4 border-t border-slate-100">
                            <span class="text-xs font-bold uppercase tracking-wider text-slate-400 block mb-3">{{ __('Connect on Social Media') }}</span>
                            <div class="flex items-center gap-3">
                                <a href="{{ $contactInfo['facebook'] }}" target="_blank" rel="noopener" class="w-10 h-10 rounded-full bg-slate-100 hover:bg-[#3B5998] hover:text-white flex items-center justify-center text-slate-700 transition" aria-label="Facebook">
                                    <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24"><path d="M22 12c0-5.52-4.48-10-10-10S2 6.48 2 12c0 4.84 3.44 8.87 8 9.8V15H8v-3h2V9.5C10 7.57 11.57 6 13.5 6H16v3h-2c-.55 0-1 .45-1 1v2h3v3h-3v6.95c5.05-.5 9-4.76 9-9.95z"/></svg>
                                </a>
                                <a href="{{ $contactInfo['twitter'] }}" target="_blank" rel="noopener" class="w-10 h-10 rounded-full bg-slate-100 hover:bg-[#55ACEE] hover:text-white flex items-center justify-center text-slate-700 transition" aria-label="Twitter">
                                    <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
                                </a>
                                <a href="{{ $contactInfo['linkedin'] }}" target="_blank" rel="noopener" class="w-10 h-10 rounded-full bg-slate-100 hover:bg-[#007bb5] hover:text-white flex items-center justify-center text-slate-700 transition" aria-label="LinkedIn">
                                    <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24"><path d="M19 3a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h14m-.5 15.5v-5.3a3.26 3.26 0 0 0-3.26-3.26c-.85 0-1.84.52-2.28 1.3v-1.11h-2.79v8.37h2.79v-4.93c0-.77.62-1.4 1.39-1.4a1.4 1.4 0 0 1 1.4 1.4v4.93h2.75M6.46 10.9v8.37H9.2V10.9H6.46M7.83 6.45a1.59 1.59 0 1 0 0 3.18 1.59 1.59 0 0 0 0-3.18z"/></svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right: Contact Form -->
                <div class="lg:col-span-7 bg-white rounded-2xl border border-slate-200/80 p-8 shadow-sm">
                    <h2 class="text-xl font-bold text-slate-900 mb-2">{{ __('Send Us a Direct Message') }}</h2>
                    <p class="text-xs text-slate-500 mb-6 leading-relaxed">
                        {{ __('Fill out the inquiry form below and our volunteer coordinators will get back to you promptly.') }}
                    </p>

                    @if ($errors->any())
                        <div class="p-4 mb-6 rounded-xl bg-red-50 border border-red-200 text-red-700 text-xs space-y-1">
                            <span class="font-bold block">{{ __('Please correct the following:') }}</span>
                            <ul class="list-disc pl-4 space-y-0.5">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('contact.store') }}" method="POST" class="space-y-4">
                        @csrf

                        <!-- Honeypot spam defense -->
                        <div class="hidden">
                            <input type="text" name="company_url" tabindex="-1" autocomplete="off">
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label for="name" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1">
                                    {{ __('Your Full Name') }} <span class="text-red-500">*</span>
                                </label>
                                <input type="text" name="name" id="name" required value="{{ old('name') }}" placeholder="{{ __('Mohammad...') }}" class="w-full text-sm rounded-xl border-slate-200 p-2.5 bg-slate-50 border focus:bg-white focus:ring-2 focus:ring-[#2375b8] focus:outline-none">
                            </div>
                            <div>
                                <label for="email" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1">
                                    {{ __('Email Address') }} <span class="text-red-500">*</span>
                                </label>
                                <input type="email" name="email" id="email" required value="{{ old('email') }}" placeholder="your@email.com" class="w-full text-sm rounded-xl border-slate-200 p-2.5 bg-slate-50 border focus:bg-white focus:ring-2 focus:ring-[#2375b8] focus:outline-none">
                            </div>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label for="phone" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1">
                                    {{ __('Phone Number (Optional)') }}
                                </label>
                                <input type="text" name="phone" id="phone" value="{{ old('phone') }}" placeholder="{{ bn_num('+880 1...') }}" class="w-full text-sm rounded-xl border-slate-200 p-2.5 bg-slate-50 border focus:bg-white focus:ring-2 focus:ring-[#2375b8] focus:outline-none">
                            </div>
                            <div>
                                <label for="subject" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1">
                                    {{ __('Subject') }} <span class="text-red-500">*</span>
                                </label>
                                <input type="text" name="subject" id="subject" required value="{{ old('subject') }}" placeholder="{{ __('Inquiry about...') }}" class="w-full text-sm rounded-xl border-slate-200 p-2.5 bg-slate-50 border focus:bg-white focus:ring-2 focus:ring-[#2375b8] focus:outline-none">
                            </div>
                        </div>

                        <div>
                            <label for="message" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1">
                                {{ __('Message') }} <span class="text-red-500">*</span>
                            </label>
                            <textarea name="message" id="message" rows="5" required placeholder="{{ __('Write your message or inquiry here...') }}" class="w-full text-sm rounded-xl border-slate-200 p-2.5 bg-slate-50 border focus:bg-white focus:ring-2 focus:ring-[#2375b8] focus:outline-none">{{ old('message') }}</textarea>
                        </div>

                        <div class="pt-2">
                            <button type="submit" class="w-full py-3.5 rounded-xl font-bold text-sm text-white bg-[#1771bf] hover:bg-[#1565a8] shadow-md shadow-blue-700/20 transition">
                                {{ __('Send Message') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

@endsection
