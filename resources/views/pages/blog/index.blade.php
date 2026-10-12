@extends('layouts.app')

@section('title', 'News & Stories | Abhedya Foundation')
@section('meta_description', 'Read the latest updates, volunteer field stories, and articles from Abhedya Foundation.')

@section('content')

    <!-- Header Banner -->
    <section class="bg-gradient-to-b from-slate-900 to-slate-800 text-white py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-3xl space-y-4">
                <span class="text-xs font-bold text-emerald-400 uppercase tracking-widest">Stories & Reports</span>
                <h1 class="text-4xl sm:text-5xl font-extrabold tracking-tight text-white">
                    News & Foundation Updates
                </h1>
                <p class="text-base sm:text-lg text-slate-300 leading-relaxed">
                    Insights from the ground: how your support creates lasting educational and humanitarian impact across Bangladesh.
                </p>
            </div>
        </div>
    </section>

    <!-- Main Content Grid -->
    <section class="py-16 bg-slate-50 min-h-[60vh]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">
                <!-- Left: Post Feed -->
                <div class="lg:col-span-8 space-y-8">
                    @if($search || $categorySlug || $tagSlug)
                        <div class="flex items-center justify-between p-4 bg-emerald-50 rounded-xl border border-emerald-100 text-xs text-emerald-900">
                            <span>Filtering by: <strong>{{ $search ? "Search: '{$search}'" : ($categorySlug ? "Category: {$categorySlug}" : "Tag: {$tagSlug}") }}</strong></span>
                            <a href="{{ route('blog.index') }}" class="font-bold underline text-emerald-700">Clear filter</a>
                        </div>
                    @endif

                    @if($posts->isNotEmpty())
                        <div class="space-y-8">
                            @foreach($posts as $post)
                                <article class="group bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden flex flex-col md:flex-row hover:-translate-y-1.5 hover:shadow-xl hover:border-emerald-200 transition-all duration-300">
                                    @if($post->featured_image)
                                        <div class="md:w-1/3 h-52 md:h-auto bg-slate-100 relative shrink-0 overflow-hidden">
                                            <img src="{{ $post->featured_image }}" alt="{{ $post->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                                        </div>
                                    @endif
                                    <div class="p-6 md:p-8 flex-1 flex flex-col justify-between">
                                        <div class="space-y-3">
                                            <div class="flex items-center gap-3 text-xs text-slate-400">
                                                @if($post->category)
                                                    <span class="px-2.5 py-0.5 rounded font-semibold bg-emerald-50 text-emerald-700">
                                                        {{ $post->category->name }}
                                                    </span>
                                                @endif
                                                <span>{{ $post->published_at ? $post->published_at->format('M d, Y') : '' }}</span>
                                            </div>
                                            <h2 class="text-xl md:text-2xl font-bold text-slate-900 leading-snug">
                                                <a href="{{ route('blog.show', $post->slug) }}" class="group-hover:text-emerald-700 transition">
                                                    {{ $post->title }}
                                                </a>
                                            </h2>
                                            <p class="text-sm text-slate-600 line-clamp-3">
                                                {{ $post->summary }}
                                            </p>
                                        </div>
                                        <div class="pt-6 border-t border-slate-50 mt-6 flex items-center justify-between">
                                            <span class="text-xs text-slate-400">By {{ $post->user?->name ?? 'Abhedya Team' }}</span>
                                            <a href="{{ route('blog.show', $post->slug) }}" class="text-sm font-bold text-emerald-700 group-hover:text-emerald-800 flex items-center gap-1">
                                                Read Story &rarr;
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
                            <p class="text-slate-500 mb-4">No stories found matching your criteria.</p>
                            <a href="{{ route('blog.index') }}" class="font-bold text-sm text-emerald-700">View all articles</a>
                        </div>
                    @endif
                </div>

                <!-- Right: Search & Categories Sidebar -->
                <div class="lg:col-span-4 space-y-8">
                    <!-- Search Widget -->
                    <div class="bg-white rounded-2xl border border-slate-100 p-6 shadow-sm">
                        <h3 class="text-sm font-bold uppercase tracking-wider text-slate-800 mb-4">Search Stories</h3>
                        <form action="{{ route('blog.index') }}" method="GET">
                            <div class="relative">
                                <input type="text" name="q" value="{{ request('q') }}" placeholder="Search articles..." class="w-full pl-4 pr-10 py-2.5 rounded-xl border border-slate-200 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent">
                                <button type="submit" class="absolute right-3 top-3 text-slate-400 hover:text-emerald-600" aria-label="Search">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                                </button>
                            </div>
                        </form>
                    </div>

                    <!-- Categories Widget -->
                    <div class="bg-white rounded-2xl border border-slate-100 p-6 shadow-sm">
                        <h3 class="text-sm font-bold uppercase tracking-wider text-slate-800 mb-4">Categories</h3>
                        <ul class="space-y-2 text-sm">
                            @foreach($categories as $category)
                                <li>
                                    <a href="{{ route('blog.index', ['category' => $category->slug]) }}" class="flex items-center justify-between py-1.5 text-slate-600 hover:text-emerald-700 transition">
                                        <span>{{ $category->name }}</span>
                                        <span class="text-xs px-2 py-0.5 rounded-full bg-slate-100 text-slate-500">{{ $category->posts_count }}</span>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    <!-- Tags Widget -->
                    @if($tags->isNotEmpty())
                        <div class="bg-white rounded-2xl border border-slate-100 p-6 shadow-sm">
                            <h3 class="text-sm font-bold uppercase tracking-wider text-slate-800 mb-4">Topic Tags</h3>
                            <div class="flex flex-wrap gap-2">
                                @foreach($tags as $tag)
                                    <a href="{{ route('blog.index', ['tag' => $tag->slug]) }}" class="text-xs px-3 py-1 rounded-lg bg-slate-50 hover:bg-emerald-50 text-slate-600 hover:text-emerald-700 border border-slate-100 transition">
                                        #{{ $tag->name }}
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
