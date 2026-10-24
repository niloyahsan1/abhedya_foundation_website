<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Abhedya Foundation | Humanitarian Relief & Community Development')</title>
    <link rel="canonical" href="{{ url()->current() }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/favicon-16x16.png') }}">
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('images/apple-touch-icon.png') }}">

    <!-- Open Graph / Meta -->
    <meta property="og:type" content="website">
    <meta property="og:title" content="@yield('title', 'Abhedya Foundation | Non-Profit Organisation')">
    <meta property="og:description" content="@yield('meta_description', 'Dedicated to education, healthcare, disaster relief, and community development.')">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:site_name" content="Abhedya Foundation">
    @hasSection('og_image')
        <meta property="og:image" content="@yield('og_image')">
    @endif

    <!-- Fonts (Exact Mastul.net Fonts: UbuntuSans & Bornomala) -->
    <link rel="preload" href="/fonts/Bornomala-Regular.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="/fonts/Bornomala-Bold.woff2" as="font" type="font/woff2" crossorigin>

    <style>
        @if(app()->getLocale() === 'bn')
        body, html, button, input, select, textarea {
            font-family: 'Bornomala', 'UbuntuSans', sans-serif !important;
        }
        @else
        body, html, button, input, select, textarea {
            font-family: 'UbuntuSans', 'Bornomala', sans-serif !important;
        }
        @endif
    </style>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-50 text-slate-800 antialiased min-h-screen flex flex-col" x-data="{ mobileMenuOpen: false, scrolled: false }" x-init="scrolled = (window.pageYOffset > 15)" @scroll.window="scrolled = (window.pageYOffset > 15)" @keydown.escape.window="mobileMenuOpen = false">

    <!-- Main Navigation Header (Attached Full Width) -->
    <header 
        class="sticky top-0 z-50 w-full transition-all duration-300"
        :class="scrolled 
            ? 'bg-white/95 backdrop-blur-md border-b border-slate-200/90 shadow-md shadow-slate-900/5' 
            : 'bg-white/95 backdrop-blur-md border-b border-slate-100 shadow-xs'"
    >
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-18 sm:h-20">
                <!-- Brand Logo -->
                <a href="{{ route('home') }}" class="flex items-center gap-2.5 sm:gap-3 group shrink-0">
                    <img src="{{ asset('images/website_logo.png') }}" alt="Abhedya Foundation Logo" class="h-9 sm:h-11 w-auto object-contain group-hover:scale-105 transition" />
                    <div>
                        <span class="text-base sm:text-xl font-extrabold text-slate-900 tracking-tight block leading-tight">{{ __('ABHEDYA') }}</span>
                        <span class="text-[9px] sm:text-[10px] font-bold text-[#2375b8] tracking-widest uppercase block">{{ __('Foundation') }}</span>
                    </div>
                </a>

                <!-- Desktop Navigation Links -->
                <nav class="hidden lg:flex items-center gap-1 xl:gap-2">
                    <a href="{{ route('home') }}" class="px-3 xl:px-3.5 py-2 rounded-xl text-xs xl:text-sm font-semibold transition {{ request()->routeIs('home') ? 'text-[#2375b8] bg-[#f0f7fd] font-bold border-b-2 border-[#2375b8]' : 'text-slate-700 hover:text-[#2375b8] hover:bg-[#f0f7fd]/60' }}">{{ __('Home') }}</a>
                    <a href="{{ route('about') }}" class="px-3 xl:px-3.5 py-2 rounded-xl text-xs xl:text-sm font-semibold transition {{ request()->routeIs('about') ? 'text-[#2375b8] bg-[#f0f7fd] font-bold border-b-2 border-[#2375b8]' : 'text-slate-700 hover:text-[#2375b8] hover:bg-[#f0f7fd]/60' }}">{{ __('About Us') }}</a>
                    <a href="{{ route('projects.index') }}" class="px-3 xl:px-3.5 py-2 rounded-xl text-xs xl:text-sm font-semibold transition {{ request()->routeIs('projects.*') ? 'text-[#2375b8] bg-[#f0f7fd] font-bold border-b-2 border-[#2375b8]' : 'text-slate-700 hover:text-[#2375b8] hover:bg-[#f0f7fd]/60' }}">{{ __('Projects') }}</a>
                    <a href="{{ route('campaigns.index') }}" class="px-3 xl:px-3.5 py-2 rounded-xl text-xs xl:text-sm font-semibold transition {{ request()->routeIs('campaigns.*') ? 'text-[#2375b8] bg-[#f0f7fd] font-bold border-b-2 border-[#2375b8]' : 'text-slate-700 hover:text-[#2375b8] hover:bg-[#f0f7fd]/60' }}">{{ __('Campaigns') }}</a>
                    <a href="{{ route('blog.index') }}" class="px-3 xl:px-3.5 py-2 rounded-xl text-xs xl:text-sm font-semibold transition {{ request()->routeIs('blog.*') ? 'text-[#2375b8] bg-[#f0f7fd] font-bold border-b-2 border-[#2375b8]' : 'text-slate-700 hover:text-[#2375b8] hover:bg-[#f0f7fd]/60' }}">{{ __('News & Blog') }}</a>
                    <a href="{{ route('gallery.index') }}" class="px-3 xl:px-3.5 py-2 rounded-xl text-xs xl:text-sm font-semibold transition {{ request()->routeIs('gallery.index') ? 'text-[#2375b8] bg-[#f0f7fd] font-bold border-b-2 border-[#2375b8]' : 'text-slate-700 hover:text-[#2375b8] hover:bg-[#f0f7fd]/60' }}">{{ __('Gallery') }}</a>
                    <a href="{{ route('contact') }}" class="px-3 xl:px-3.5 py-2 rounded-xl text-xs xl:text-sm font-semibold transition {{ request()->routeIs('contact') ? 'text-[#2375b8] bg-[#f0f7fd] font-bold border-b-2 border-[#2375b8]' : 'text-slate-700 hover:text-[#2375b8] hover:bg-[#f0f7fd]/60' }}">{{ __('Contact') }}</a>
                </nav>

                <!-- Header Actions -->
                <div class="hidden lg:flex items-center gap-2.5 xl:gap-3 shrink-0">
                    <!-- Language Switcher (Segmented Capsule) -->
                    <div class="inline-flex items-center p-0.5 rounded-full bg-slate-100 border border-slate-200/90 text-xs font-bold shrink-0">
                        <a href="{{ route('locale.switch', 'bn') }}" 
                           class="px-2.5 py-1 rounded-full transition-all duration-200 {{ app()->getLocale() === 'bn' ? 'bg-[#2375b8] text-white shadow-xs font-bold' : 'text-slate-600 hover:text-[#2375b8]' }}"
                           title="বাংলা ভাষায় পরিবর্তন করুন">
                            বাংলা
                        </a>
                        <a href="{{ route('locale.switch', 'en') }}" 
                           class="px-2.5 py-1 rounded-full transition-all duration-200 {{ app()->getLocale() === 'en' ? 'bg-[#2375b8] text-white shadow-xs font-bold' : 'text-slate-600 hover:text-[#2375b8]' }}"
                           title="Switch to English">
                            EN
                        </a>
                    </div>

                    <a href="{{ route('donate') }}" class="inline-flex items-center justify-center gap-1.5 px-5 py-2.5 rounded-lg text-xs xl:text-sm font-bold text-white bg-[#1771bf] hover:bg-[#1565a8] shadow-md shadow-blue-600/20 transition active:scale-95">
                        <svg class="w-3.5 h-3.5 xl:w-4 xl:h-4 text-white" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd"/></svg>
                        <span>{{ __('Donate Now') }}</span>
                    </a>

                    @auth
                        <!-- Authenticated User Menu -->
                        <div class="relative" x-data="{ open: false }" @click.outside="open = false">
                            <button @click="open = !open" type="button" class="inline-flex items-center gap-2 px-3 py-1.5 xl:py-2 rounded-full text-xs font-semibold text-slate-700 bg-slate-100 hover:bg-slate-200 border border-slate-200/80 transition">
                                <span class="w-6 h-6 rounded-full bg-[#2375b8] text-white flex items-center justify-center font-bold text-[11px]">
                                    {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                                </span>
                                <span class="max-w-[80px] xl:max-w-[110px] truncate">{{ auth()->user()->name }}</span>
                                <svg class="w-3.5 h-3.5 text-slate-500 transition-transform duration-200" :class="{ 'rotate-180': open }" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                            </button>

                            <div 
                                x-show="open" 
                                x-cloak 
                                x-transition:enter="transition ease-out duration-150"
                                x-transition:enter-start="opacity-0 scale-95 -translate-y-1"
                                x-transition:enter-end="opacity-100 scale-100 translate-y-0"
                                x-transition:leave="transition ease-in duration-100"
                                x-transition:leave-start="opacity-100 scale-100 translate-y-0"
                                x-transition:leave-end="opacity-0 scale-95 -translate-y-1"
                                class="absolute right-0 mt-2 w-52 bg-white rounded-2xl shadow-xl border border-slate-100 py-2 z-50"
                            >
                                <div class="px-4 py-2 border-b border-slate-100">
                                    <p class="text-xs font-bold text-slate-900 truncate">{{ auth()->user()->name }}</p>
                                    <p class="text-[11px] text-slate-500 truncate">{{ auth()->user()->email }}</p>
                                </div>
                                <a href="/dashboard" class="flex items-center gap-2 px-4 py-2.5 text-xs font-semibold text-slate-700 hover:bg-[#f0f7fd] hover:text-[#2375b8] transition">
                                    <svg class="w-4 h-4 text-[#2375b8]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/></svg>
                                    {{ __('Dashboard') }}
                                </a>
                                <a href="/dashboard/profile" class="flex items-center gap-2 px-4 py-2.5 text-xs font-semibold text-slate-700 hover:bg-[#f0f7fd] hover:text-[#2375b8] transition">
                                    <svg class="w-4 h-4 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                                    {{ __('My Profile') }}
                                </a>
                                <div class="border-t border-slate-100 my-1"></div>
                                <form method="POST" action="/logout">
                                    @csrf
                                    <button type="submit" class="w-full text-left flex items-center gap-2 px-4 py-2 text-xs font-semibold text-rose-600 hover:bg-rose-50 transition">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                                        {{ __('Log Out') }}
                                    </button>
                                </form>
                            </div>
                        </div>
                    @else
                        <!-- Guest Portal Link -->
                        <a href="/login" class="text-xs font-semibold text-slate-600 hover:text-[#2375b8] px-3 py-2 rounded-xl hover:bg-slate-100 transition flex items-center gap-1.5" title="Sign In to Staff Portal">
                            <svg class="w-3.5 h-3.5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"/></svg>
                            <span>{{ __('Portal') }}</span>
                        </a>
                    @endauth
                </div>

                <!-- Mobile Hamburger Button & Language Indicator -->
                <div class="flex items-center gap-2 lg:hidden">
                    <a href="{{ route('locale.switch', app()->getLocale() === 'bn' ? 'en' : 'bn') }}" 
                       class="px-2.5 py-1 rounded-full text-xs font-bold border border-[#2375b8]/30 bg-[#f0f7fd] text-[#2375b8]">
                        {{ app()->getLocale() === 'bn' ? 'EN' : 'বাংলা' }}
                    </a>
                    <button 
                        type="button" 
                        @click="mobileMenuOpen = !mobileMenuOpen" 
                        class="p-2.5 rounded-xl text-slate-700 hover:text-[#2375b8] hover:bg-slate-100 transition focus:outline-none" 
                        :aria-expanded="mobileMenuOpen"
                        aria-label="Toggle navigation"
                    >
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path x-show="!mobileMenuOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                            <path x-show="mobileMenuOpen" x-cloak stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Navigation Menu (Attached Full-Width Dropdown) -->
        <div 
            x-show="mobileMenuOpen" 
            x-cloak 
            @click.outside="mobileMenuOpen = false"
            x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0 -translate-y-2"
            x-transition:enter-end="opacity-100 translate-y-0"
            x-transition:leave="transition ease-in duration-150"
            x-transition:leave-start="opacity-100 translate-y-0"
            x-transition:leave-end="opacity-0 -translate-y-2"
            class="lg:hidden border-t border-slate-200/80 bg-white/98 backdrop-blur-xl px-4 sm:px-6 pt-3 pb-6 space-y-1.5 shadow-xl max-h-[calc(100vh-80px)] overflow-y-auto no-scrollbar"
        >
            <!-- Mobile Language Switcher Row -->
            <div class="flex items-center justify-between px-3.5 py-2.5 bg-slate-50 rounded-xl border border-slate-200/80 mb-2">
                <span class="text-xs font-bold text-slate-700">{{ __('Language:') }}</span>
                <div class="inline-flex items-center p-0.5 rounded-full bg-white border border-slate-200 text-xs font-bold">
                    <a href="{{ route('locale.switch', 'bn') }}" 
                       class="px-3 py-1 rounded-full transition {{ app()->getLocale() === 'bn' ? 'bg-[#2375b8] text-white shadow-xs font-bold' : 'text-slate-600 hover:text-[#2375b8]' }}">
                        বাংলা
                    </a>
                    <a href="{{ route('locale.switch', 'en') }}" 
                       class="px-3 py-1 rounded-full transition {{ app()->getLocale() === 'en' ? 'bg-[#2375b8] text-white shadow-xs font-bold' : 'text-slate-600 hover:text-[#2375b8]' }}">
                        EN
                    </a>
                </div>
            </div>

            <a href="{{ route('home') }}" class="block px-3.5 py-2.5 rounded-xl text-sm font-bold transition {{ request()->routeIs('home') ? 'bg-[#f0f7fd] text-[#2375b8]' : 'text-slate-700 hover:bg-[#f0f7fd]/60' }}">{{ __('Home') }}</a>
            <a href="{{ route('about') }}" class="block px-3.5 py-2.5 rounded-xl text-sm font-bold transition {{ request()->routeIs('about') ? 'bg-[#f0f7fd] text-[#2375b8]' : 'text-slate-700 hover:bg-[#f0f7fd]/60' }}">{{ __('About Us') }}</a>
            <a href="{{ route('projects.index') }}" class="block px-3.5 py-2.5 rounded-xl text-sm font-bold transition {{ request()->routeIs('projects.*') ? 'bg-[#f0f7fd] text-[#2375b8]' : 'text-slate-700 hover:bg-[#f0f7fd]/60' }}">{{ __('Projects & Activities') }}</a>
            <a href="{{ route('campaigns.index') }}" class="block px-3.5 py-2.5 rounded-xl text-sm font-bold transition {{ request()->routeIs('campaigns.*') ? 'bg-[#f0f7fd] text-[#2375b8]' : 'text-slate-700 hover:bg-[#f0f7fd]/60' }}">{{ __('Fundraising Campaigns') }}</a>
            <a href="{{ route('blog.index') }}" class="block px-3.5 py-2.5 rounded-xl text-sm font-bold transition {{ request()->routeIs('blog.*') ? 'bg-[#f0f7fd] text-[#2375b8]' : 'text-slate-700 hover:bg-[#f0f7fd]/60' }}">{{ __('News & Blog') }}</a>
            <a href="{{ route('gallery.index') }}" class="block px-3.5 py-2.5 rounded-xl text-sm font-bold transition {{ request()->routeIs('gallery.index') ? 'bg-[#f0f7fd] text-[#2375b8]' : 'text-slate-700 hover:bg-[#f0f7fd]/60' }}">{{ __('Photo Gallery') }}</a>
            <a href="{{ route('contact') }}" class="block px-3.5 py-2.5 rounded-xl text-sm font-bold transition {{ request()->routeIs('contact') ? 'bg-[#f0f7fd] text-[#2375b8]' : 'text-slate-700 hover:bg-[#f0f7fd]/60' }}">{{ __('Contact Us') }}</a>

            @auth
                <div class="pt-2 border-t border-slate-100 space-y-1.5">
                    <div class="px-3.5 py-1">
                        <p class="text-xs font-bold text-slate-900">{{ auth()->user()->name }}</p>
                        <p class="text-[11px] text-slate-500">{{ auth()->user()->email }}</p>
                    </div>
                    <a href="/dashboard" class="block px-3.5 py-2 rounded-xl text-sm font-semibold text-[#2375b8] bg-[#f0f7fd]">
                        {{ __('Access Dashboard') }}
                    </a>
                    <a href="/dashboard/profile" class="block px-3.5 py-2 rounded-xl text-sm font-semibold text-slate-700 hover:bg-slate-50">
                        {{ __('My Profile') }}
                    </a>
                    <form method="POST" action="/logout">
                        @csrf
                        <button type="submit" class="w-full text-left px-3.5 py-2 rounded-xl text-sm font-semibold text-rose-600 hover:bg-rose-50">
                            {{ __('Log Out') }}
                        </button>
                    </form>
                </div>
            @else
                <div class="pt-2 border-t border-slate-100">
                    <a href="/login" class="block px-3.5 py-2 rounded-xl text-sm font-semibold text-slate-600 hover:bg-slate-50">
                        {{ __('Staff Portal (Sign In)') }}
                    </a>
                </div>
            @endauth

            <div class="pt-2">
                <a href="{{ route('donate') }}" class="w-full text-center flex items-center justify-center gap-2 px-5 py-3 rounded-lg text-sm font-bold text-white bg-[#1771bf] hover:bg-[#1565a8] shadow-md shadow-blue-600/20">
                    <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd"/></svg>
                    <span>{{ __('Donate Now') }}</span>
                </a>
            </div>
        </div>
    </header>

    <!-- Main Content Body -->
    <main class="flex-grow">
        @yield('content')
    </main>

    <!-- Global Footer -->
    <footer class="bg-slate-900 text-slate-300 pt-16 pb-12 border-t border-slate-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-10 mb-12">
                <!-- Col 1: About & Identity -->
                <div class="lg:col-span-2 space-y-4">
                    <div class="flex items-center gap-3">
                        <img src="{{ asset('images/footer.png') }}" alt="Abhedya Foundation Logo" class="h-16 w-auto object-contain" />
                        <span class="text-xl font-bold text-white tracking-tight">{{ __('ABHEDYA FOUNDATION') }}</span>
                    </div>
                    <p class="text-sm text-slate-400 leading-relaxed max-w-sm">
                        {{ __('A non-profit foundation dedicated to education, healthcare, disaster response, and community resilience in Bangladesh. Building long-term human dignity through sustainable action.') }}
                    </p>
                    <div class="flex items-center gap-3 pt-2">
                        <a href="https://facebook.com/abhedyafoundation" target="_blank" rel="noopener" class="w-9 h-9 rounded-lg bg-slate-800 flex items-center justify-center text-slate-300 hover:bg-[#2375b8] hover:text-white transition" aria-label="Facebook">
                            <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M22 12c0-5.52-4.48-10-10-10S2 6.48 2 12c0 4.84 3.44 8.87 8 9.8V15H8v-3h2V9.5C10 7.57 11.57 6 13.5 6H16v3h-2c-.55 0-1 .45-1 1v2h3v3h-3v6.95c5.05-.5 9-4.76 9-9.95z"/></svg>
                        </a>
                        <a href="https://twitter.com/abhedya_bd" target="_blank" rel="noopener" class="w-9 h-9 rounded-lg bg-slate-800 flex items-center justify-center text-slate-300 hover:bg-[#2375b8] hover:text-white transition" aria-label="Twitter">
                            <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
                        </a>
                        <a href="https://linkedin.com/company/abhedyafoundation" target="_blank" rel="noopener" class="w-9 h-9 rounded-lg bg-slate-800 flex items-center justify-center text-slate-300 hover:bg-[#2375b8] hover:text-white transition" aria-label="LinkedIn">
                            <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M19 3a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h14m-.5 15.5v-5.3a3.26 3.26 0 0 0-3.26-3.26c-.85 0-1.84.52-2.28 1.3v-1.11h-2.79v8.37h2.79v-4.93c0-.77.62-1.4 1.39-1.4a1.4 1.4 0 0 1 1.4 1.4v4.93h2.75M6.46 10.9v8.37H9.2V10.9H6.46M7.83 6.45a1.59 1.59 0 1 0 0 3.18 1.59 1.59 0 0 0 0-3.18z"/></svg>
                        </a>
                    </div>
                </div>

                <!-- Col 2: Quick Links -->
                <div>
                    <h3 class="text-sm font-semibold uppercase tracking-wider text-white mb-4">{{ __('Quick Links') }}</h3>
                    <ul class="space-y-2 text-sm text-slate-400">
                        <li><a href="{{ route('about') }}" class="hover:text-[#2375b8] transition">{{ __('About Us') }}</a></li>
                        <li><a href="{{ route('projects.index') }}" class="hover:text-[#2375b8] transition">{{ __('Our Projects') }}</a></li>
                        <li><a href="{{ route('campaigns.index') }}" class="hover:text-[#2375b8] transition">{{ __('Active Campaigns') }}</a></li>
                        <li><a href="{{ route('blog.index') }}" class="hover:text-[#2375b8] transition">{{ __('Stories & News') }}</a></li>
                        <li><a href="{{ route('gallery.index') }}" class="hover:text-[#2375b8] transition">{{ __('Photo Gallery') }}</a></li>
                    </ul>
                </div>

                <!-- Col 3: Support -->
                <div>
                    <h3 class="text-sm font-semibold uppercase tracking-wider text-white mb-4">{{ __('Support & Trust') }}</h3>
                    <ul class="space-y-2 text-sm text-slate-400">
                        <li><a href="{{ route('donate') }}" class="hover:text-[#2375b8] transition">{{ __('Donation Guide') }}</a></li>
                        <li><a href="{{ route('donate') }}#payment-methods" class="hover:text-[#2375b8] transition">{{ __('Payment Instructions') }}</a></li>
                        <li><a href="{{ route('contact') }}" class="hover:text-[#2375b8] transition">{{ __('Contact Us') }}</a></li>
                        @auth
                            <li><a href="/dashboard" class="hover:text-[#2375b8] transition">{{ __('Management Dashboard') }}</a></li>
                        @else
                            <li><a href="/login" class="hover:text-[#2375b8] transition">{{ __('Staff Portal') }}</a></li>
                        @endauth
                        <li><a href="{{ route('sitemap') }}" class="hover:text-[#2375b8] transition">{{ __('XML Sitemap') }}</a></li>
                    </ul>
                </div>

                <!-- Col 4: Contact Details -->
                <div>
                    <h3 class="text-sm font-semibold uppercase tracking-wider text-white mb-4">{{ __('Official Contact') }}</h3>
                    <ul class="space-y-3 text-sm text-slate-400">
                        <li class="flex items-start gap-2">
                            <svg class="w-4 h-4 text-[#2375b8] shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/></svg>
                            <span>{{ __(\App\Models\SiteSetting::get('contact_address', 'House 1, Road 3, Block C, Section 10, Mirpur, Dhaka-1216, Bangladesh')) }}</span>
                        </li>
                        <li class="flex items-center gap-2">
                            <svg class="w-4 h-4 text-[#2375b8] shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                            <span>{{ \App\Models\SiteSetting::get('contact_email', 'info@abhedyafoundation.org') }}</span>
                        </li>
                        <li class="flex items-center gap-2">
                            <svg class="w-4 h-4 text-[#2375b8] shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                            <span>{{ bn_num(\App\Models\SiteSetting::get('contact_phone', '+880 1518-913960')) }}</span>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Bottom Sub-footer -->
            <div class="pt-8 border-t border-slate-800 flex flex-col sm:flex-row items-center justify-between gap-4 text-xs text-slate-500">
                <p>&copy; {{ bn_num(date('Y')) }} {{ __('Abhedya Foundation') }}. {{ __('All rights reserved.') }}</p>
                <p class="text-slate-400">{{ __('Website:') }} <a href="https://abhedyafoundation.org" class="underline hover:text-white">abhedyafoundation.org</a></p>
            </div>
        </div>
    </footer>

</body>
</html>
