@extends('layouts.app')

@section('title', 'Abhedya Foundation | Humanitarian Impact, Education & Relief')

@section('content')

    <!-- 1. Hero Section -->
    <section class="relative bg-gradient-to-b from-slate-950 via-[#0c243c] to-slate-950 text-white overflow-hidden py-20 sm:py-28">
        <div class="absolute inset-0 opacity-15 bg-[radial-gradient(#2375b8_1px,transparent_1px)] [background-size:20px_20px]"></div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
                <div class="lg:col-span-7 space-y-6">
                    <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold tracking-tight leading-tight text-white">
                        {{ __('Transforming Lives with') }} <span class="text-transparent bg-clip-text bg-gradient-to-r from-sky-300 to-cyan-200">{{ __('Dignity, Care & Hope') }}</span>
                    </h1>
                    <p class="text-lg text-slate-300 leading-relaxed max-w-2xl">
                        {{ __('Abhedya Foundation builds long-term community resilience through digital classrooms for remote schools, mobile medical camps, emergency flood response, and women-led vocational empowerment.') }}
                    </p>
                    <div class="flex flex-wrap items-center gap-4 pt-4">
                        <a href="{{ route('donate') }}" class="px-7 py-3.5 rounded-xl font-bold text-white bg-orange-500 hover:bg-orange-600 shadow-lg shadow-orange-500/30 transition transform hover:-translate-y-0.5">
                            {{ __('Donate with Confidence') }}
                        </a>
                        <a href="{{ route('projects.index') }}" class="px-7 py-3.5 rounded-xl font-semibold text-slate-200 bg-slate-800/80 hover:bg-slate-700 border border-slate-700 transition">
                            {{ __('Explore Our Projects') }}
                        </a>
                    </div>
                </div>

                <!-- Hero Impact Card / Highlights -->
                <div class="lg:col-span-5">
                    <div class="interactive-card-glow bg-gradient-to-br from-slate-900/95 to-[#0f2d4a]/90 rounded-2xl border border-slate-700/60 p-6 sm:p-8 shadow-2xl backdrop-blur-md cursor-pointer">
                        <div class="flex items-center justify-between border-b border-slate-700 pb-4 mb-6">
                            <h2 class="text-lg font-bold text-white flex items-center gap-2">
                                <span class="w-2.5 h-2.5 rounded-full bg-cyan-400 animate-ping"></span>
                                {{ __('Active Emergency Priority') }}
                            </h2>
                            <span class="px-2.5 py-1 rounded-full text-xs font-bold bg-amber-500/20 text-amber-300 border border-amber-500/30">{{ __('Urgent Aid') }}</span>
                        </div>

                        @if($activeCampaigns->isNotEmpty())
                            @php $featuredCampaign = $activeCampaigns->first(); @endphp
                            <div class="space-y-4">
                                <h3 class="text-xl font-bold text-white leading-snug">
                                    <a href="{{ route('campaigns.show', $featuredCampaign->slug) }}" class="hover:text-sky-300 transition">
                                        {{ $featuredCampaign->display_title }}
                                    </a>
                                </h3>
                                <p class="text-sm text-slate-300 line-clamp-2">
                                    {{ $featuredCampaign->display_short_description }}
                                </p>

                                <!-- Progress Bar -->
                                <div class="space-y-2 pt-2">
                                    <div class="flex justify-between text-xs font-semibold">
                                        <span class="text-sky-400">{{ __('Raised:') }} ৳{{ bn_num(number_format($featuredCampaign->raised_amount)) }}</span>
                                        <span class="text-slate-400">{{ __('Target:') }} ৳{{ bn_num(number_format($featuredCampaign->target_amount)) }}</span>
                                    </div>
                                    <div class="w-full h-3 bg-slate-700 rounded-full overflow-hidden">
                                        <div class="bg-gradient-to-r from-[#2375b8] to-cyan-400 h-full rounded-full transition-all duration-500" style="width: {{ min(100, $featuredCampaign->progress_percentage) }}%"></div>
                                    </div>
                                    <div class="text-right text-xs font-medium text-slate-400">
                                        {{ bn_num($featuredCampaign->progress_percentage) }}% {{ __('funded by verified donors') }}
                                    </div>
                                </div>

                                <div class="pt-2">
                                    <a href="{{ route('campaigns.show', $featuredCampaign->slug) }}" class="w-full block text-center py-3 rounded-xl font-bold text-sm bg-[#2375b8] hover:bg-[#1788bf] text-white transition shadow-lg shadow-blue-950/40">
                                        {{ __('Contribute to this Campaign') }}
                                    </a>
                                </div>
                            </div>
                        @else
                            <div class="text-center py-8 text-slate-400">
                                {{ __('No active campaigns at this moment. You may donate to our general fund.') }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 2. Featured Projects (Our Work) -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row md:items-end justify-between mb-12 gap-4">
                <div>
                    <span class="text-xs font-bold text-[#2375b8] uppercase tracking-widest block">{{ __('Our Work') }}</span>
                    <h2 class="text-3xl font-extrabold text-slate-900 mt-1">{{ __('Featured Projects & Activities') }}</h2>
                </div>
                <a href="{{ route('projects.index') }}" class="font-bold text-sm text-[#2375b8] hover:text-[#1788bf] flex items-center gap-1 group">
                    {{ __('View All Projects') }}
                    <svg class="w-4 h-4 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($featuredProjects as $project)
                    <div class="group interactive-card bg-white rounded-2xl border border-slate-200/80 shadow-sm overflow-hidden flex flex-col">
                        <div class="h-48 bg-slate-100 relative overflow-hidden">
                            @if($project->featured_image)
                                <img src="{{ $project->featured_image }}" alt="{{ $project->display_title }}" class="w-full h-full object-cover card-img-zoom">
                            @else
                                <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-[#f0f7fd] to-blue-100 text-[#2375b8] font-bold text-sm px-6 text-center">
                                    {{ $project->display_title }}
                                </div>
                            @endif
                            <div class="absolute top-3 right-3">
                                <span class="px-2.5 py-1 rounded-full text-xs font-bold uppercase tracking-wider {{ $project->status === 'completed' ? 'bg-blue-100 text-[#2375b8]' : 'bg-orange-100 text-orange-800' }}">
                                    {{ __($project->status === 'completed' ? 'Completed' : ($project->status === 'ongoing' ? 'Ongoing' : 'Planned')) }}
                                </span>
                            </div>
                        </div>
                        <div class="p-6 flex-1 flex flex-col justify-between">
                            <div class="space-y-3">
                                @if($project->location)
                                    <div class="flex items-center gap-1 text-xs text-slate-500 font-medium">
                                        <svg class="w-3.5 h-3.5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/></svg>
                                        {{ $project->display_location }}
                                    </div>
                                @endif
                                <h3 class="text-xl font-bold text-slate-900 leading-snug">
                                    <a href="{{ route('projects.show', $project->slug) }}" class="group-hover:text-[#2375b8] transition">
                                        {{ $project->display_title }}
                                    </a>
                                </h3>
                                <p class="text-sm text-slate-600 line-clamp-3">
                                    {{ $project->display_summary }}
                                </p>
                            </div>
                            <div class="pt-6 border-t border-slate-100 mt-6 flex items-center justify-between">
                                <span class="text-xs text-slate-400">
                                    {{ $project->start_date ? bn_date($project->start_date, 'M Y') : __('Ongoing') }}
                                </span>
                                <a href="{{ route('projects.show', $project->slug) }}" class="text-sm font-bold text-[#2375b8] group-hover:text-[#1788bf] flex items-center gap-1">
                                    {{ __('Read Details') }}
                                    <svg class="w-4 h-4 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- 3. News & Stories Preview (Field Reports & Insights) -->
    <section class="py-20 bg-slate-50 border-t border-slate-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row md:items-end justify-between mb-12 gap-4">
                <div>
                    <span class="text-xs font-bold text-[#2375b8] uppercase tracking-widest block">{{ __('Field Reports & Insights') }}</span>
                    <h2 class="text-3xl font-extrabold text-slate-900 mt-1">{{ __('Latest News & Articles') }}</h2>
                </div>
                <a href="{{ route('blog.index') }}" class="font-bold text-sm text-[#2375b8] hover:text-[#1788bf] flex items-center gap-1 group">
                    {{ __('All Stories') }}
                    <svg class="w-4 h-4 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($latestPosts as $post)
                    <article class="group interactive-card bg-white rounded-2xl border border-slate-200/80 shadow-sm overflow-hidden flex flex-col">
                        <div class="p-6 flex-1 flex flex-col justify-between">
                            <div class="space-y-3">
                                <div class="flex items-center gap-2">
                                    @if($post->category)
                                        <span class="px-2.5 py-0.5 rounded text-xs font-semibold bg-[#f0f7fd] text-[#2375b8] border border-blue-200/50">
                                            {{ __($post->category->name) }}
                                        </span>
                                    @endif
                                    <span class="text-xs text-slate-400">
                                        {{ $post->published_at ? bn_date($post->published_at, 'M d, Y') : '' }}
                                    </span>
                                </div>
                                <h3 class="text-xl font-bold text-slate-900 leading-snug">
                                    <a href="{{ route('blog.show', $post->slug) }}" class="group-hover:text-[#2375b8] transition">
                                        {{ $post->display_title }}
                                    </a>
                                </h3>
                                <p class="text-sm text-slate-600 line-clamp-3">
                                    {{ $post->display_summary }}
                                </p>
                            </div>
                            <div class="pt-6 border-t border-slate-100 mt-6">
                                <a href="{{ route('blog.show', $post->slug) }}" class="text-sm font-bold text-[#2375b8] group-hover:text-[#1788bf] flex items-center gap-1">
                                    {{ __('Read Article') }}
                                    <svg class="w-4 h-4 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                                </a>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    <!-- 4. Photo Gallery Preview (Photo Moments) -->
    <section class="py-20 bg-slate-950 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row md:items-end justify-between mb-12 gap-4">
                <div>
                    <span class="text-xs font-bold text-sky-400 uppercase tracking-widest block">{{ __('Photo Moments') }}</span>
                    <h2 class="text-3xl font-extrabold text-white mt-1">{{ __('Impact in Pictures') }}</h2>
                </div>
                <a href="{{ route('gallery.index') }}" class="font-bold text-sm text-sky-400 hover:text-sky-300 flex items-center gap-1">
                    {{ __('Visit Photo Gallery') }} &rarr;
                </a>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4">
                @foreach($galleryPreview as $img)
                    <div class="group relative aspect-square rounded-xl overflow-hidden bg-slate-800">
                        <img src="{{ $img->image }}" alt="{{ $img->display_title }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                        <div class="absolute inset-0 bg-slate-900/60 opacity-0 group-hover:opacity-100 transition p-3 flex items-end">
                            <span class="text-xs text-white line-clamp-2 leading-tight">{{ $img->display_title }}</span>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- 5. Active Fundraising Campaigns (Make an Immediate Difference) -->
    <section class="py-20 bg-slate-50 border-t border-slate-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row md:items-end justify-between mb-12 gap-4">
                <div>
                    <span class="text-xs font-bold text-[#2375b8] uppercase tracking-widest block">{{ __('Make an Immediate Difference') }}</span>
                    <h2 class="text-3xl font-extrabold text-slate-900 mt-1">{{ __('Active Humanitarian Campaigns') }}</h2>
                </div>
                <a href="{{ route('campaigns.index') }}" class="font-bold text-sm text-[#2375b8] hover:text-[#1788bf] flex items-center gap-1 group">
                    {{ __('All Campaigns') }}
                    <svg class="w-4 h-4 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($activeCampaigns as $campaign)
                    <div class="group interactive-card bg-white rounded-2xl border border-slate-200/80 shadow-sm overflow-hidden flex flex-col">
                        <div class="h-48 bg-slate-200 relative overflow-hidden">
                            @if($campaign->featured_image)
                                <img src="{{ $campaign->featured_image }}" alt="{{ $campaign->display_title }}" class="w-full h-full object-cover card-img-zoom">
                            @else
                                <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-[#2375b8] to-[#0ea5e9] text-white font-bold text-base px-6 text-center">
                                    {{ $campaign->display_title }}
                                </div>
                            @endif
                        </div>
                        <div class="p-6 flex-1 flex flex-col justify-between">
                            <div class="space-y-3">
                                <h3 class="text-xl font-bold text-slate-900 leading-snug">
                                    <a href="{{ route('campaigns.show', $campaign->slug) }}" class="group-hover:text-[#2375b8] transition">
                                        {{ $campaign->display_title }}
                                    </a>
                                </h3>
                                <p class="text-sm text-slate-600 line-clamp-3">
                                    {{ $campaign->display_short_description }}
                                </p>
                            </div>

                            <div class="pt-6 space-y-4">
                                <div class="space-y-1.5">
                                    <div class="flex justify-between text-xs font-semibold text-slate-700">
                                        <span class="text-[#2375b8] font-bold">{{ __('Raised:') }} ৳{{ bn_num(number_format($campaign->raised_amount)) }}</span>
                                        <span class="text-slate-500">{{ __('Target:') }} ৳{{ bn_num(number_format($campaign->target_amount)) }}</span>
                                    </div>
                                    <div class="w-full h-2.5 bg-slate-100 rounded-full overflow-hidden">
                                        <div class="bg-gradient-to-r from-[#2375b8] to-cyan-500 h-full rounded-full transition-all duration-500" style="width: {{ min(100, $campaign->progress_percentage) }}%"></div>
                                    </div>
                                    <div class="text-right text-xs text-slate-500">
                                        {{ bn_num($campaign->progress_percentage) }}% {{ __('verified') }}
                                    </div>
                                </div>

                                <div class="flex gap-2">
                                    <a href="{{ route('donate') }}?campaign={{ $campaign->slug }}" class="flex-1 text-center py-2.5 rounded-lg font-bold text-sm bg-[#2375b8] hover:bg-[#1788bf] text-white transition shadow-sm hover:shadow-md">
                                        {{ __('Donate') }}
                                    </a>
                                    <a href="{{ route('campaigns.show', $campaign->slug) }}" class="px-4 py-2.5 rounded-lg font-semibold text-sm border border-slate-200 hover:bg-[#f0f7fd] text-slate-700 transition">
                                        {{ __('Details') }}
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>



@endsection
