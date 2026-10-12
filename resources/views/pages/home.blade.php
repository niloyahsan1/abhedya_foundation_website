@extends('layouts.app')

@section('title', 'Abhedya Foundation — Humanitarian Impact, Education & Relief')

@section('content')

    <!-- 1. Hero Section -->
    <section class="relative bg-gradient-to-b from-slate-900 via-slate-800 to-slate-900 text-white overflow-hidden py-24 sm:py-32">
        <div class="absolute inset-0 opacity-15 bg-[radial-gradient(#10b981_1px,transparent_1px)] [background-size:20px_20px]"></div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
                <div class="lg:col-span-7 space-y-6">
                    <div class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-emerald-500/10 border border-emerald-500/30 text-emerald-300 text-xs font-semibold tracking-wide uppercase">
                        <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
                        Empowering Underserved Communities
                    </div>
                    <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold tracking-tight leading-tight text-white">
                        Transforming Lives with <span class="text-transparent bg-clip-text bg-gradient-to-r from-emerald-400 to-teal-300">Dignity, Care & Hope</span>
                    </h1>
                    <p class="text-lg text-slate-300 leading-relaxed max-w-2xl">
                        Abhedya Foundation builds long-term community resilience through digital classrooms for remote schools, mobile medical camps, emergency flood response, and women-led vocational empowerment.
                    </p>
                    <div class="flex flex-wrap items-center gap-4 pt-4">
                        <a href="{{ route('donate') }}" class="px-7 py-3.5 rounded-xl font-bold text-white bg-gradient-to-r from-emerald-500 to-teal-600 hover:from-emerald-600 hover:to-teal-700 shadow-lg shadow-emerald-500/30 transition transform hover:-translate-y-0.5">
                            Donate with Confidence
                        </a>
                        <a href="{{ route('projects.index') }}" class="px-7 py-3.5 rounded-xl font-semibold text-slate-200 bg-slate-800/80 hover:bg-slate-700 border border-slate-700 transition">
                            Explore Our Projects
                        </a>
                    </div>
                </div>

                <!-- Hero Impact Card / Highlights -->
                <div class="lg:col-span-5">
                    <div class="bg-gradient-to-br from-slate-800/90 to-slate-900/90 rounded-2xl border border-slate-700/60 p-6 sm:p-8 shadow-2xl backdrop-blur-md">
                        <div class="flex items-center justify-between border-b border-slate-700 pb-4 mb-6">
                            <h2 class="text-lg font-bold text-white">Active Emergency Priority</h2>
                            <span class="px-2.5 py-1 rounded text-xs font-bold bg-amber-500/20 text-amber-300 border border-amber-500/30">Urgent Aid</span>
                        </div>

                        @if($activeCampaigns->isNotEmpty())
                            @php $featuredCampaign = $activeCampaigns->first(); @endphp
                            <div class="space-y-4">
                                <h3 class="text-xl font-bold text-white leading-snug">
                                    <a href="{{ route('campaigns.show', $featuredCampaign->slug) }}" class="hover:text-emerald-300 transition">
                                        {{ $featuredCampaign->title }}
                                    </a>
                                </h3>
                                <p class="text-sm text-slate-300 line-clamp-2">
                                    {{ $featuredCampaign->short_description }}
                                </p>

                                <!-- Progress Bar -->
                                <div class="space-y-2 pt-2">
                                    <div class="flex justify-between text-xs font-semibold">
                                        <span class="text-emerald-400">Raised: ৳{{ number_format($featuredCampaign->raised_amount) }}</span>
                                        <span class="text-slate-400">Target: ৳{{ number_format($featuredCampaign->target_amount) }}</span>
                                    </div>
                                    <div class="w-full h-3 bg-slate-700 rounded-full overflow-hidden">
                                        <div class="bg-gradient-to-r from-emerald-500 to-teal-400 h-full rounded-full transition-all duration-500" style="width: {{ min(100, $featuredCampaign->progress_percentage) }}%"></div>
                                    </div>
                                    <div class="text-right text-xs font-medium text-slate-400">
                                        {{ $featuredCampaign->progress_percentage }}% funded by verified donors
                                    </div>
                                </div>

                                <div class="pt-2">
                                    <a href="{{ route('campaigns.show', $featuredCampaign->slug) }}" class="w-full block text-center py-3 rounded-xl font-bold text-sm bg-emerald-600 hover:bg-emerald-500 text-white transition">
                                        Contribute to this Campaign
                                    </a>
                                </div>
                            </div>
                        @else
                            <div class="text-center py-8 text-slate-400">
                                No active campaigns at this moment. You may donate to our general fund.
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 2. Impact Statistics Bar -->
    <section class="bg-white border-b border-slate-100 py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-6 lg:gap-8 text-center">
                <div class="p-6 rounded-2xl bg-slate-50 border border-slate-100">
                    <span class="text-3xl sm:text-4xl font-extrabold text-emerald-700 block mb-1">48</span>
                    <span class="text-xs sm:text-sm font-semibold uppercase tracking-wider text-slate-600">Projects Completed</span>
                </div>
                <div class="p-6 rounded-2xl bg-slate-50 border border-slate-100">
                    <span class="text-3xl sm:text-4xl font-extrabold text-emerald-700 block mb-1">35,000+</span>
                    <span class="text-xs sm:text-sm font-semibold uppercase tracking-wider text-slate-600">Lives Impacted</span>
                </div>
                <div class="p-6 rounded-2xl bg-slate-50 border border-slate-100">
                    <span class="text-3xl sm:text-4xl font-extrabold text-emerald-700 block mb-1">450+</span>
                    <span class="text-xs sm:text-sm font-semibold uppercase tracking-wider text-slate-600">Active Volunteers</span>
                </div>
                <div class="p-6 rounded-2xl bg-slate-50 border border-slate-100">
                    <span class="text-3xl sm:text-4xl font-extrabold text-emerald-700 block mb-1">14</span>
                    <span class="text-xs sm:text-sm font-semibold uppercase tracking-wider text-slate-600">Districts Reached</span>
                </div>
            </div>
        </div>
    </section>

    <!-- 3. Foundation Introduction & Mission/Vision -->
    <section class="py-20 bg-slate-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div class="space-y-6">
                    <span class="text-xs font-bold text-emerald-700 uppercase tracking-widest">About Our Foundation</span>
                    <h2 class="text-3xl sm:text-4xl font-extrabold text-slate-900 leading-tight">
                        Rooted in Community, Driven by Unwavering Purpose
                    </h2>
                    <p class="text-base text-slate-600 leading-relaxed">
                        Abhedya Foundation was established with the conviction that no community should remain isolated from basic human necessities, educational resources, and emergency assistance.
                    </p>
                    <p class="text-base text-slate-600 leading-relaxed">
                        Through close grassroots collaboration with community elders and teachers, we implement sustainable, measurable initiatives that empower beneficiaries to take charge of their own future.
                    </p>
                    <div class="pt-2">
                        <a href="{{ route('about') }}" class="inline-flex items-center gap-2 font-bold text-emerald-700 hover:text-emerald-800">
                            Learn more about our background & team
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                        </a>
                    </div>
                </div>

                <!-- Mission & Vision Cards -->
                <div class="space-y-6">
                    <div class="bg-white p-7 rounded-2xl border border-slate-100 shadow-sm flex items-start gap-5">
                        <div class="w-12 h-12 rounded-xl bg-emerald-100 text-emerald-700 flex items-center justify-center shrink-0">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-bold text-slate-900 mb-1">Our Mission</h3>
                            <p class="text-sm text-slate-600 leading-relaxed">
                                To uplift marginalized communities by delivering high-impact educational initiatives, essential healthcare access, emergency relief, and sustainable livelihood opportunities.
                            </p>
                        </div>
                    </div>

                    <div class="bg-white p-7 rounded-2xl border border-slate-100 shadow-sm flex items-start gap-5">
                        <div class="w-12 h-12 rounded-xl bg-teal-100 text-teal-700 flex items-center justify-center shrink-0">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-bold text-slate-900 mb-1">Our Vision</h3>
                            <p class="text-sm text-slate-600 leading-relaxed">
                                A just, compassionate society where every individual has equal opportunities to thrive with self-reliance, security, and human dignity.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 4. Featured Projects -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row md:items-end justify-between mb-12 gap-4">
                <div>
                    <span class="text-xs font-bold text-emerald-700 uppercase tracking-widest">Our Work</span>
                    <h2 class="text-3xl font-extrabold text-slate-900 mt-1">Featured Projects & Activities</h2>
                </div>
                <a href="{{ route('projects.index') }}" class="font-bold text-sm text-emerald-700 hover:text-emerald-800 flex items-center gap-1">
                    View All Projects
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($featuredProjects as $project)
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden flex flex-col hover:shadow-md transition">
                        <div class="h-48 bg-slate-100 relative overflow-hidden">
                            @if($project->featured_image)
                                <img src="{{ $project->featured_image }}" alt="{{ $project->title }}" class="w-full h-full object-cover">
                            @else
                                <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-emerald-50 to-teal-100 text-emerald-700 font-bold text-sm px-6 text-center">
                                    {{ $project->title }}
                                </div>
                            @endif
                            <div class="absolute top-3 right-3">
                                <span class="px-2.5 py-1 rounded-full text-xs font-bold uppercase tracking-wider {{ $project->status === 'completed' ? 'bg-emerald-100 text-emerald-800' : 'bg-blue-100 text-blue-800' }}">
                                    {{ ucfirst($project->status) }}
                                </span>
                            </div>
                        </div>
                        <div class="p-6 flex-1 flex flex-col justify-between">
                            <div class="space-y-3">
                                @if($project->location)
                                    <div class="flex items-center gap-1 text-xs text-slate-500 font-medium">
                                        <svg class="w-3.5 h-3.5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/></svg>
                                        {{ $project->location }}
                                    </div>
                                @endif
                                <h3 class="text-xl font-bold text-slate-900 leading-snug">
                                    <a href="{{ route('projects.show', $project->slug) }}" class="hover:text-emerald-700 transition">
                                        {{ $project->title }}
                                    </a>
                                </h3>
                                <p class="text-sm text-slate-600 line-clamp-3">
                                    {{ $project->summary }}
                                </p>
                            </div>
                            <div class="pt-6 border-t border-slate-50 mt-6 flex items-center justify-between">
                                <span class="text-xs text-slate-400">
                                    {{ $project->start_date ? $project->start_date->format('M Y') : 'Ongoing' }}
                                </span>
                                <a href="{{ route('projects.show', $project->slug) }}" class="text-sm font-bold text-emerald-700 hover:text-emerald-800">
                                    Read Details &rarr;
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- 5. Active Fundraising Campaigns -->
    <section class="py-20 bg-slate-50 border-t border-slate-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row md:items-end justify-between mb-12 gap-4">
                <div>
                    <span class="text-xs font-bold text-emerald-700 uppercase tracking-widest">Make an Immediate Difference</span>
                    <h2 class="text-3xl font-extrabold text-slate-900 mt-1">Active Humanitarian Campaigns</h2>
                </div>
                <a href="{{ route('campaigns.index') }}" class="font-bold text-sm text-emerald-700 hover:text-emerald-800 flex items-center gap-1">
                    All Campaigns
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($activeCampaigns as $campaign)
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden flex flex-col hover:shadow-md transition">
                        <div class="h-48 bg-slate-200 relative overflow-hidden">
                            @if($campaign->featured_image)
                                <img src="{{ $campaign->featured_image }}" alt="{{ $campaign->title }}" class="w-full h-full object-cover">
                            @else
                                <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-emerald-600 to-teal-700 text-white font-bold text-base px-6 text-center">
                                    {{ $campaign->title }}
                                </div>
                            @endif
                        </div>
                        <div class="p-6 flex-1 flex flex-col justify-between">
                            <div class="space-y-3">
                                <h3 class="text-xl font-bold text-slate-900 leading-snug">
                                    <a href="{{ route('campaigns.show', $campaign->slug) }}" class="hover:text-emerald-700 transition">
                                        {{ $campaign->title }}
                                    </a>
                                </h3>
                                <p class="text-sm text-slate-600 line-clamp-3">
                                    {{ $campaign->short_description }}
                                </p>
                            </div>

                            <div class="pt-6 space-y-4">
                                <div class="space-y-1.5">
                                    <div class="flex justify-between text-xs font-semibold text-slate-700">
                                        <span class="text-emerald-700">Raised: ৳{{ number_format($campaign->raised_amount) }}</span>
                                        <span class="text-slate-500">Target: ৳{{ number_format($campaign->target_amount) }}</span>
                                    </div>
                                    <div class="w-full h-2.5 bg-slate-100 rounded-full overflow-hidden">
                                        <div class="bg-emerald-600 h-full rounded-full transition-all duration-500" style="width: {{ min(100, $campaign->progress_percentage) }}%"></div>
                                    </div>
                                    <div class="text-right text-xs text-slate-500">
                                        {{ $campaign->progress_percentage }}% verified
                                    </div>
                                </div>

                                <div class="flex gap-2">
                                    <a href="{{ route('donate') }}?campaign={{ $campaign->slug }}" class="flex-1 text-center py-2.5 rounded-xl font-bold text-sm bg-emerald-600 hover:bg-emerald-700 text-white transition">
                                        Donate
                                    </a>
                                    <a href="{{ route('campaigns.show', $campaign->slug) }}" class="px-4 py-2.5 rounded-xl font-semibold text-sm border border-slate-200 hover:bg-slate-50 text-slate-700 transition">
                                        Details
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- 6. News & Stories Preview -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row md:items-end justify-between mb-12 gap-4">
                <div>
                    <span class="text-xs font-bold text-emerald-700 uppercase tracking-widest">Field Reports & Insights</span>
                    <h2 class="text-3xl font-extrabold text-slate-900 mt-1">Latest News & Articles</h2>
                </div>
                <a href="{{ route('blog.index') }}" class="font-bold text-sm text-emerald-700 hover:text-emerald-800 flex items-center gap-1">
                    All Stories
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($latestPosts as $post)
                    <article class="bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden flex flex-col hover:shadow-md transition">
                        <div class="p-6 flex-1 flex flex-col justify-between">
                            <div class="space-y-3">
                                <div class="flex items-center gap-2">
                                    @if($post->category)
                                        <span class="px-2.5 py-0.5 rounded text-xs font-semibold bg-emerald-50 text-emerald-700">
                                            {{ $post->category->name }}
                                        </span>
                                    @endif
                                    <span class="text-xs text-slate-400">
                                        {{ $post->published_at ? $post->published_at->format('M d, Y') : '' }}
                                    </span>
                                </div>
                                <h3 class="text-xl font-bold text-slate-900 leading-snug">
                                    <a href="{{ route('blog.show', $post->slug) }}" class="hover:text-emerald-700 transition">
                                        {{ $post->title }}
                                    </a>
                                </h3>
                                <p class="text-sm text-slate-600 line-clamp-3">
                                    {{ $post->summary }}
                                </p>
                            </div>
                            <div class="pt-6 border-t border-slate-50 mt-6">
                                <a href="{{ route('blog.show', $post->slug) }}" class="text-sm font-bold text-emerald-700 hover:text-emerald-800 flex items-center gap-1">
                                    Read Article &rarr;
                                </a>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    <!-- 7. Photo Gallery Preview -->
    <section class="py-20 bg-slate-900 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row md:items-end justify-between mb-12 gap-4">
                <div>
                    <span class="text-xs font-bold text-emerald-400 uppercase tracking-widest">Photo Moments</span>
                    <h2 class="text-3xl font-extrabold text-white mt-1">Impact in Pictures</h2>
                </div>
                <a href="{{ route('gallery.index') }}" class="font-bold text-sm text-emerald-400 hover:text-emerald-300 flex items-center gap-1">
                    Visit Photo Gallery &rarr;
                </a>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4">
                @foreach($galleryPreview as $img)
                    <div class="group relative aspect-square rounded-xl overflow-hidden bg-slate-800">
                        <img src="{{ $img->image }}" alt="{{ $img->title }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                        <div class="absolute inset-0 bg-slate-900/60 opacity-0 group-hover:opacity-100 transition p-3 flex items-end">
                            <span class="text-xs text-white line-clamp-2 leading-tight">{{ $img->title }}</span>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- 8. Donation CTA Section -->
    <section class="py-20 bg-gradient-to-br from-emerald-700 to-teal-800 text-white relative overflow-hidden">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-6 relative z-10">
            <h2 class="text-3xl sm:text-4xl font-extrabold text-white tracking-tight">
                Your Generosity Reaches Where It Matters Most
            </h2>
            <p class="text-lg text-emerald-100 max-w-2xl mx-auto leading-relaxed">
                Whether supporting clean drinking water, funding a student's scholarship, or rushing emergency flood rations, every contribution transforms real lives.
            </p>
            <div class="pt-4 flex flex-wrap justify-center gap-4">
                <a href="{{ route('donate') }}" class="px-8 py-4 rounded-xl font-extrabold text-emerald-950 bg-amber-400 hover:bg-amber-300 shadow-xl transition transform hover:-translate-y-0.5">
                    View Donation Details (bKash, Nagad, Rocket, Bank)
                </a>
                <a href="{{ route('contact') }}" class="px-8 py-4 rounded-xl font-bold text-white bg-emerald-800/60 hover:bg-emerald-800 border border-emerald-400/30 transition">
                    Get in Touch with Us
                </a>
            </div>
        </div>
    </section>

@endsection
