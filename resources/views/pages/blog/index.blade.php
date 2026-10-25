@extends('layouts.app')

@section('title', 'News & Stories | Abhedya Foundation')
@section('meta_description', 'Read the latest updates, volunteer field stories, and articles from Abhedya Foundation.')

@section('content')

    <!-- Header Banner -->
    <section class="bg-gradient-to-b from-[#1771bf] via-[#1565a8] to-[#0c243c] text-white py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-3xl space-y-4">
                <span class="text-sm font-semibold text-sky-300 uppercase tracking-wider block">{{ __('Stories & Reports') }}</span>
                <h1 class="text-3xl sm:text-4xl font-bold tracking-tight text-white">
                    {{ __('News & Foundation Updates') }}
                </h1>
                <p class="text-base sm:text-lg text-blue-100 leading-relaxed font-normal">
                    {{ __('Insights from the ground: how your support creates lasting educational and humanitarian impact across Bangladesh.') }}
                </p>
            </div>
        </div>
    </section>

    <!-- Main Content Grid -->
    <section class="py-16 bg-[#f0f7fd]/30 min-h-[60vh]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">
                <!-- Left: Post Feed -->
                <div class="lg:col-span-8 space-y-8">
                    @if($search || $categorySlug || $tagSlug)
                        <div class="flex items-center justify-between p-4 bg-[#f0f7fd] rounded-xl border border-blue-200 text-xs text-blue-900">
                            <span>{{ __('Filtering by:') }} <strong>{{ $search ? "Search: '{$search}'" : ($categorySlug ? "Category: {$categorySlug}" : "Tag: {$tagSlug}") }}</strong></span>
                            <a href="{{ route('blog.index') }}" class="font-bold underline text-[#2375b8]">{{ __('Clear filter') }}</a>
                        </div>
                    @endif

                    @if($posts->isNotEmpty())
                        <div class="space-y-8">
                            @foreach($posts as $post)
                                <article class="group interactive-card bg-white rounded-2xl border border-slate-200/80 shadow-sm overflow-hidden flex flex-col md:flex-row">
                                    @if($post->featured_image)
                                        <div class="md:w-1/3 h-52 md:h-auto bg-slate-100 relative shrink-0 overflow-hidden">
                                            <img src="{{ $post->featured_image }}" alt="{{ $post->display_title }}" class="w-full h-full object-cover card-img-zoom">
                                        </div>
                                    @endif
                                    <div class="p-6 md:p-8 flex-1 flex flex-col justify-between">
                                        <div class="space-y-3">
                                            <div class="flex items-center gap-3 text-xs text-slate-400">
                                                @if($post->category)
                                                    <span class="px-2.5 py-0.5 rounded font-semibold bg-[#f0f7fd] text-[#2375b8] border border-blue-100">
                                                        {{ __($post->category->name) }}
                                                    </span>
                                                @endif
                                                <span>{{ $post->published_at ? bn_date($post->published_at, 'M d, Y') : '' }}</span>
                                            </div>
                                            <h2 class="text-xl md:text-2xl font-bold text-slate-900 leading-snug">
                                                <a href="{{ route('blog.show', $post->slug) }}" class="group-hover:text-[#2375b8] transition">
                                                    {{ $post->display_title }}
                                                </a>
                                            </h2>
                                            <p class="text-sm text-slate-600 line-clamp-3">
                                                {{ $post->display_summary }}
                                            </p>
                                        </div>
                                        <div class="pt-6 border-t border-slate-100 mt-6 flex items-center justify-between">
                                            <span class="text-xs text-slate-400">{{ __('By') }} {{ __($post->user?->name ?? 'Abhedya Team') }}</span>
                                            <a href="{{ route('blog.show', $post->slug) }}" class="text-sm font-bold text-[#2375b8] group-hover:text-[#1788bf] flex items-center gap-1 transition">
                                                {{ __('Read Story') }}
                                                <svg class="w-4 h-4 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                                            </a>
                                        </div>
                                    </div>
                                </article>
                            @endforeach
                        </div>

                        <div class="mt-8">
                            {{ $posts->links() }}
                        </div>
                    @else
                        <div class="bg-white rounded-2xl border border-slate-200 p-12 text-center">
                            <p class="text-slate-500 mb-4">{{ __('No stories found matching your criteria.') }}</p>
                            <a href="{{ route('blog.index') }}" class="font-bold text-sm text-[#2375b8] hover:underline">{{ __('View all articles') }}</a>
                        </div>
                    @endif
                </div>

                <!-- Right: Search & Categories Sidebar -->
                <div class="lg:col-span-4 space-y-8">
                    <!-- Search Widget -->
                    <div class="bg-white rounded-2xl border border-slate-200/80 p-6 shadow-sm">
                        <h3 class="text-sm font-bold uppercase tracking-wider text-slate-800 mb-4">{{ __('Search Stories') }}</h3>
                        <form action="{{ route('blog.index') }}" method="GET">
                            <div class="relative">
                                <input type="text" name="q" value="{{ request('q') }}" placeholder="{{ __('Search articles...') }}" class="w-full pl-4 pr-10 py-2.5 rounded-xl border border-slate-200 text-sm focus:outline-none focus:ring-2 focus:ring-[#2375b8] focus:border-transparent">
                                <button type="submit" class="absolute right-3 top-3 text-slate-400 hover:text-[#2375b8]" aria-label="Search">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                                </button>
                            </div>
                        </form>
                    </div>

                    <!-- Categories Widget -->
                    <div class="bg-white rounded-2xl border border-slate-200/80 p-6 shadow-sm">
                        <h3 class="text-sm font-bold uppercase tracking-wider text-slate-800 mb-4">{{ __('Categories') }}</h3>
                        <ul class="space-y-2 text-sm">
                            @foreach($categories as $category)
                                <li>
                                    <a href="{{ route('blog.index', ['category' => $category->slug]) }}" class="flex items-center justify-between py-1.5 text-slate-600 hover:text-[#2375b8] transition">
                                        <span>{{ __($category->name) }}</span>
                                        <span class="text-xs px-2 py-0.5 rounded-full bg-slate-100 text-slate-500">{{ bn_num($category->posts_count) }}</span>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    <!-- Tags Widget -->
                    @if($tags->isNotEmpty())
                        <div class="bg-white rounded-2xl border border-slate-200/80 p-6 shadow-sm">
                            <h3 class="text-sm font-bold uppercase tracking-wider text-slate-800 mb-4">{{ __('Topic Tags') }}</h3>
                            <div class="flex flex-wrap gap-2">
                                @foreach($tags as $tag)
                                    <a href="{{ route('blog.index', ['tag' => $tag->slug]) }}" class="text-xs px-3 py-1 rounded-lg bg-slate-50 hover:bg-[#f0f7fd] text-slate-600 hover:text-[#2375b8] border border-slate-100 hover:border-blue-200 transition">
                                        #{{ __($tag->name) }}
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>

@endsection
