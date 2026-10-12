<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Abhedya Foundation | Empowering Communities, Transforming Lives')</title>
    <meta name="description" content="@yield('meta_description', 'Abhedya Foundation is a dedicated non-profit organisation committed to education, healthcare, disaster relief, and sustainable community empowerment in Bangladesh.')">
    <link rel="canonical" href="{{ url()->current() }}">

    <!-- Open Graph / Meta -->
    <meta property="og:type" content="website">
    <meta property="og:title" content="@yield('title', 'Abhedya Foundation | Empowering Communities')">
    <meta property="og:description" content="@yield('meta_description', 'Dedicated to education, healthcare, disaster relief, and community development.')">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:site_name" content="Abhedya Foundation">
    @hasSection('og_image')
        <meta property="og:image" content="@yield('og_image')">
    @endif

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Plus Jakarta Sans', system-ui, sans-serif;
        }
    </style>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-50 text-slate-800 antialiased min-h-screen flex flex-col" x-data="{ mobileMenuOpen: false }">

    <!-- Top Announcement Bar -->
    <div class="bg-emerald-900 text-emerald-100 text-xs py-2 px-4">
        <div class="max-w-7xl mx-auto flex flex-col sm:flex-row items-center justify-between gap-2">
            <div class="flex items-center gap-2">
                <span class="inline-flex items-center px-2 py-0.5 rounded text-[10px] font-semibold bg-emerald-700 text-white">Notice</span>
                <span>Join our mission to bring sustainable hope to vulnerable families.</span>
            </div>
            <div class="flex items-center gap-4 text-emerald-200">
                <a href="mailto:info@abhedyafoundation.org" class="hover:text-white transition flex items-center gap-1">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                    info@abhedyafoundation.org
                </a>
                <span class="hidden md:inline">•</span>
                <a href="{{ route('donate') }}" class="font-medium text-amber-300 hover:text-amber-200 underline">Donate Now</a>
            </div>
        </div>
    </div>

    <!-- Main Navigation Header -->
    <header class="bg-white/95 backdrop-blur-md border-b border-slate-100 sticky top-0 z-50 transition-all">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-20">
                <!-- Brand Logo -->
                <a href="{{ route('home') }}" class="flex items-center gap-3 group">
                    <div class="w-11 h-11 rounded-xl bg-gradient-to-br from-emerald-600 to-teal-700 flex items-center justify-center text-white font-black text-xl shadow-md shadow-emerald-600/20 group-hover:scale-105 transition">
                        A
                    </div>
                    <div>
                        <span class="text-xl font-extrabold text-slate-900 tracking-tight block leading-tight">ABHEDYA</span>
                        <span class="text-[10px] font-bold text-emerald-600 tracking-widest uppercase block">Foundation</span>
                    </div>
                </a>

                <!-- Desktop Navigation Links -->
                <nav class="hidden lg:flex items-center gap-8">
                    <a href="{{ route('home') }}" class="text-sm font-semibold transition {{ request()->routeIs('home') ? 'text-emerald-600' : 'text-slate-600 hover:text-emerald-600' }}">Home</a>
                    <a href="{{ route('about') }}" class="text-sm font-semibold transition {{ request()->routeIs('about') ? 'text-emerald-600' : 'text-slate-600 hover:text-emerald-600' }}">About Us</a>
                    <a href="{{ route('projects.index') }}" class="text-sm font-semibold transition {{ request()->routeIs('projects.*') ? 'text-emerald-600' : 'text-slate-600 hover:text-emerald-600' }}">Projects</a>
                    <a href="{{ route('campaigns.index') }}" class="text-sm font-semibold transition {{ request()->routeIs('campaigns.*') ? 'text-emerald-600' : 'text-slate-600 hover:text-emerald-600' }}">Campaigns</a>
                    <a href="{{ route('blog.index') }}" class="text-sm font-semibold transition {{ request()->routeIs('blog.*') ? 'text-emerald-600' : 'text-slate-600 hover:text-emerald-600' }}">News & Blog</a>
                    <a href="{{ route('gallery.index') }}" class="text-sm font-semibold transition {{ request()->routeIs('gallery.index') ? 'text-emerald-600' : 'text-slate-600 hover:text-emerald-600' }}">Gallery</a>
                    <a href="{{ route('contact') }}" class="text-sm font-semibold transition {{ request()->routeIs('contact') ? 'text-emerald-600' : 'text-slate-600 hover:text-emerald-600' }}">Contact</a>
                </nav>

                <!-- Header Actions -->
                <div class="hidden lg:flex items-center gap-3">
                    <a href="{{ route('donate') }}" class="inline-flex items-center justify-center gap-2 px-5 py-2.5 rounded-full text-sm font-bold text-white bg-gradient-to-r from-emerald-600 to-teal-600 hover:from-emerald-700 hover:to-teal-700 shadow-md shadow-emerald-600/25 transition active:scale-95">
                        <svg class="w-4 h-4 text-emerald-200" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd"/></svg>
                        Donate Now
                    </a>

                    @auth
                        <!-- Authenticated User Menu -->
                        <div class="relative" x-data="{ open: false }" @click.outside="open = false">
                            <button @click="open = !open" type="button" class="inline-flex items-center gap-2 px-3 py-2 rounded-xl text-xs font-semibold text-slate-700 bg-slate-100 hover:bg-slate-200 border border-slate-200 transition">
                                <span class="w-6 h-6 rounded-full bg-emerald-600 text-white flex items-center justify-center font-bold text-[11px]">
                                    {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                                </span>
                                <span class="max-w-[100px] truncate">{{ auth()->user()->name }}</span>
                                <svg class="w-3.5 h-3.5 text-slate-500 transition-transform" :class="{ 'rotate-180': open }" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                            </button>

                            <div x-show="open" x-cloak class="absolute right-0 mt-2 w-48 bg-white rounded-2xl shadow-xl border border-slate-100 py-2 z-50 animate-in fade-in slide-in-from-top-2">
                                <div class="px-4 py-2 border-b border-slate-100">
                                    <p class="text-xs font-bold text-slate-900 truncate">{{ auth()->user()->name }}</p>
                                    <p class="text-[11px] text-slate-500 truncate">{{ auth()->user()->email }}</p>
                                </div>
                                <a href="/dashboard" class="flex items-center gap-2 px-4 py-2.5 text-xs font-semibold text-slate-700 hover:bg-emerald-50 hover:text-emerald-700 transition">
                                    <svg class="w-4 h-4 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/></svg>
                                    Dashboard
                                </a>
                                <a href="/dashboard/profile" class="flex items-center gap-2 px-4 py-2.5 text-xs font-semibold text-slate-700 hover:bg-emerald-50 hover:text-emerald-700 transition">
                                    <svg class="w-4 h-4 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                                    My Profile
                                </a>
                                <div class="border-t border-slate-100 my-1"></div>
                                <form method="POST" action="/logout">
                                    @csrf
                                    <button type="submit" class="w-full text-left flex items-center gap-2 px-4 py-2 text-xs font-semibold text-rose-600 hover:bg-rose-50 transition">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                                        Log Out
                                    </button>
                                </form>
                            </div>
                        </div>
                    @else
                        <!-- Guest Portal Link -->
                        <a href="/login" class="text-xs font-semibold text-slate-600 hover:text-emerald-600 px-3 py-2 rounded-xl hover:bg-slate-100 transition flex items-center gap-1.5" title="Sign In to Staff Portal">
                            <svg class="w-3.5 h-3.5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"/></svg>
                            Portal
                        </a>
                    @endauth
                </div>

                <!-- Mobile Hamburger Button -->
                <div class="flex items-center lg:hidden">
                    <button type="button" @click="mobileMenuOpen = !mobileMenuOpen" class="text-slate-700 hover:text-emerald-600 p-2 rounded-lg focus:outline-none" aria-label="Toggle navigation">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path x-show="!mobileMenuOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                            <path x-show="mobileMenuOpen" x-cloak stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Navigation Menu -->
        <div x-show="mobileMenuOpen" x-cloak class="lg:hidden border-b border-slate-200 bg-white px-4 pt-2 pb-6 space-y-3">
            <a href="{{ route('home') }}" class="block px-3 py-2 rounded-lg text-base font-semibold {{ request()->routeIs('home') ? 'bg-emerald-50 text-emerald-600' : 'text-slate-700 hover:bg-slate-50' }}">Home</a>
            <a href="{{ route('about') }}" class="block px-3 py-2 rounded-lg text-base font-semibold {{ request()->routeIs('about') ? 'bg-emerald-50 text-emerald-600' : 'text-slate-700 hover:bg-slate-50' }}">About Us</a>
            <a href="{{ route('projects.index') }}" class="block px-3 py-2 rounded-lg text-base font-semibold {{ request()->routeIs('projects.*') ? 'bg-emerald-50 text-emerald-600' : 'text-slate-700 hover:bg-slate-50' }}">Projects & Activities</a>
            <a href="{{ route('campaigns.index') }}" class="block px-3 py-2 rounded-lg text-base font-semibold {{ request()->routeIs('campaigns.*') ? 'bg-emerald-50 text-emerald-600' : 'text-slate-700 hover:bg-slate-50' }}">Fundraising Campaigns</a>
            <a href="{{ route('blog.index') }}" class="block px-3 py-2 rounded-lg text-base font-semibold {{ request()->routeIs('blog.*') ? 'bg-emerald-50 text-emerald-600' : 'text-slate-700 hover:bg-slate-50' }}">News & Blog</a>
            <a href="{{ route('gallery.index') }}" class="block px-3 py-2 rounded-lg text-base font-semibold {{ request()->routeIs('gallery.index') ? 'bg-emerald-50 text-emerald-600' : 'text-slate-700 hover:bg-slate-50' }}">Photo Gallery</a>
            <a href="{{ route('contact') }}" class="block px-3 py-2 rounded-lg text-base font-semibold {{ request()->routeIs('contact') ? 'bg-emerald-50 text-emerald-600' : 'text-slate-700 hover:bg-slate-50' }}">Contact Us</a>

            @auth
                <div class="pt-3 border-t border-slate-100 space-y-2">
                    <div class="px-3 py-1">
                        <p class="text-xs font-bold text-slate-900">{{ auth()->user()->name }}</p>
                        <p class="text-[11px] text-slate-500">{{ auth()->user()->email }}</p>
                    </div>
                    <a href="/dashboard" class="block px-3 py-2 rounded-lg text-sm font-semibold text-emerald-700 bg-emerald-50">
                        Access Dashboard
                    </a>
                    <a href="/dashboard/profile" class="block px-3 py-2 rounded-lg text-sm font-semibold text-slate-700 hover:bg-slate-50">
                        My Profile
                    </a>
                    <form method="POST" action="/logout">
                        @csrf
                        <button type="submit" class="w-full text-left px-3 py-2 rounded-lg text-sm font-semibold text-rose-600 hover:bg-rose-50">
                            Log Out
                        </button>
                    </form>
                </div>
            @else
                <div class="pt-2 border-t border-slate-100">
                    <a href="/login" class="block px-3 py-2 rounded-lg text-sm font-semibold text-slate-600 hover:bg-slate-50">
                        Staff Portal (Sign In)
                    </a>
                </div>
            @endauth

            <div class="pt-2">
                <a href="{{ route('donate') }}" class="w-full text-center block px-5 py-3 rounded-xl text-base font-bold text-white bg-emerald-600 hover:bg-emerald-700 shadow">
                    Donate Now
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
                        <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-emerald-500 to-teal-600 flex items-center justify-center text-white font-black text-lg">
                            A
                        </div>
                        <span class="text-xl font-bold text-white tracking-tight">ABHEDYA FOUNDATION</span>
                    </div>
                    <p class="text-sm text-slate-400 leading-relaxed max-w-sm">
                        A non-profit foundation dedicated to education, healthcare, disaster response, and community resilience in Bangladesh. Building long-term human dignity through sustainable action.
                    </p>
                    <div class="flex items-center gap-3 pt-2">
                        <a href="https://facebook.com/abhedyafoundation" target="_blank" rel="noopener" class="w-9 h-9 rounded-lg bg-slate-800 flex items-center justify-center text-slate-300 hover:bg-emerald-600 hover:text-white transition" aria-label="Facebook">
                            <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M22 12c0-5.52-4.48-10-10-10S2 6.48 2 12c0 4.84 3.44 8.87 8 9.8V15H8v-3h2V9.5C10 7.57 11.57 6 13.5 6H16v3h-2c-.55 0-1 .45-1 1v2h3v3h-3v6.95c5.05-.5 9-4.76 9-9.95z"/></svg>
                        </a>
                        <a href="https://twitter.com/abhedya_bd" target="_blank" rel="noopener" class="w-9 h-9 rounded-lg bg-slate-800 flex items-center justify-center text-slate-300 hover:bg-emerald-600 hover:text-white transition" aria-label="Twitter">
                            <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
                        </a>
                        <a href="https://linkedin.com/company/abhedyafoundation" target="_blank" rel="noopener" class="w-9 h-9 rounded-lg bg-slate-800 flex items-center justify-center text-slate-300 hover:bg-emerald-600 hover:text-white transition" aria-label="LinkedIn">
                            <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M19 3a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h14m-.5 15.5v-5.3a3.26 3.26 0 0 0-3.26-3.26c-.85 0-1.84.52-2.28 1.3v-1.11h-2.79v8.37h2.79v-4.93c0-.77.62-1.4 1.39-1.4a1.4 1.4 0 0 1 1.4 1.4v4.93h2.75M6.46 10.9v8.37H9.2V10.9H6.46M7.83 6.45a1.59 1.59 0 1 0 0 3.18 1.59 1.59 0 0 0 0-3.18z"/></svg>
                        </a>
                    </div>
                </div>

                <!-- Col 2: Quick Links -->
                <div>
                    <h3 class="text-sm font-semibold uppercase tracking-wider text-white mb-4">Foundation</h3>
                    <ul class="space-y-2 text-sm text-slate-400">
                        <li><a href="{{ route('about') }}" class="hover:text-emerald-400 transition">About Us</a></li>
                        <li><a href="{{ route('projects.index') }}" class="hover:text-emerald-400 transition">Our Projects</a></li>
                        <li><a href="{{ route('campaigns.index') }}" class="hover:text-emerald-400 transition">Active Campaigns</a></li>
                        <li><a href="{{ route('blog.index') }}" class="hover:text-emerald-400 transition">Stories & News</a></li>
                        <li><a href="{{ route('gallery.index') }}" class="hover:text-emerald-400 transition">Photo Gallery</a></li>
                    </ul>
                </div>

                <!-- Col 3: Support -->
                <div>
                    <h3 class="text-sm font-semibold uppercase tracking-wider text-white mb-4">Support & Trust</h3>
                    <ul class="space-y-2 text-sm text-slate-400">
                        <li><a href="{{ route('donate') }}" class="hover:text-emerald-400 transition">Donation Guide</a></li>
                        <li><a href="{{ route('donate') }}#payment-methods" class="hover:text-emerald-400 transition">Payment Instructions</a></li>
                        <li><a href="{{ route('contact') }}" class="hover:text-emerald-400 transition">Contact Us</a></li>
                        @auth
                            <li><a href="/dashboard" class="hover:text-emerald-400 transition">Management Dashboard</a></li>
                        @else
                            <li><a href="/login" class="hover:text-emerald-400 transition">Staff Portal</a></li>
                        @endauth
                        <li><a href="{{ route('sitemap') }}" class="hover:text-emerald-400 transition">XML Sitemap</a></li>
                    </ul>
                </div>

                <!-- Col 4: Contact Details -->
                <div>
                    <h3 class="text-sm font-semibold uppercase tracking-wider text-white mb-4">Official Contact</h3>
                    <ul class="space-y-3 text-sm text-slate-400">
                        <li class="flex items-start gap-2">
                            <svg class="w-4 h-4 text-emerald-400 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/></svg>
                            <span>House 12, Road 4, Sector 7, Uttara, Dhaka-1230</span>
                        </li>
                        <li class="flex items-center gap-2">
                            <svg class="w-4 h-4 text-emerald-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                            <span>info@abhedyafoundation.org</span>
                        </li>
                        <li class="flex items-center gap-2">
                            <svg class="w-4 h-4 text-emerald-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                            <span>+880 1700-123456</span>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Bottom Sub-footer -->
            <div class="pt-8 border-t border-slate-800 flex flex-col sm:flex-row items-center justify-between gap-4 text-xs text-slate-500">
                <p>&copy; {{ date('Y') }} Abhedya Foundation. All rights reserved.</p>
                <p class="text-slate-400">Website: <a href="https://abhedyafoundation.org" class="underline hover:text-white">abhedyafoundation.org</a></p>
            </div>
        </div>
    </footer>

</body>
</html>
