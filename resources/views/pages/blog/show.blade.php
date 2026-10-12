@extends('layouts.app')

@section('title', $post->title . ' | Abhedya Foundation')
@section('meta_description', Str::limit(strip_tags($post->summary ?? $post->content), 160))

@section('content')

    <!-- Header Section -->
    <section class="bg-gradient-to-b from-slate-900 to-slate-800 text-white py-16">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 space-y-4">
            <div class="flex items-center gap-2 text-xs font-semibold text-emerald-400">
                <a href="{{ route('blog.index') }}" class="hover:underline">Blog & News</a>
                <span>/</span>
                @if($post->category)
                    <a href="{{ route('blog.index', ['category' => $post->category->slug]) }}" class="hover:underline text-slate-300">{{ $post->category->name }}</a>
                @endif
            </div>
            <h1 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-white leading-tight">
                {{ $post->title }}
            </h1>
            <div class="flex flex-wrap items-center gap-4 text-xs text-slate-300 pt-2">
                <span>Published: {{ $post->published_at ? $post->published_at->format('F d, Y') : $post->created_at->format('F d, Y') }}</span>
                <span>•</span>
                <span>Author: {{ $post->user?->name ?? 'Abhedya Team' }}</span>
            </div>
        </div>
    </section>

    <!-- Main Article Body -->
    <section class="py-16 bg-white">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            @if($post->featured_image)
                <div class="rounded-2xl overflow-hidden mb-10 shadow-sm border border-slate-100">
                    <img src="{{ $post->featured_image }}" alt="{{ $post->title }}" class="w-full max-h-[480px] object-cover">
                </div>
            @endif

            @if($post->summary)
                <div class="p-6 rounded-2xl bg-emerald-50 border border-emerald-100 mb-10 text-emerald-950 font-medium text-lg leading-relaxed">
                    {{ $post->summary }}
                </div>
            @endif

            <div class="prose prose-slate max-w-none text-slate-700 leading-relaxed space-y-6 text-base sm:text-lg">
                {!! nl2br(e($post->content)) !!}
            </div>

            <!-- Tags -->
            @if($post->tags->isNotEmpty())
                <div class="pt-8 border-t border-slate-100 mt-12 flex flex-wrap items-center gap-2">
                    <span class="text-xs font-bold text-slate-500 uppercase tracking-wider mr-2">Tags:</span>
                    @foreach($post->tags as $tag)
                        <a href="{{ route('blog.index', ['tag' => $tag->slug]) }}" class="text-xs px-3 py-1 rounded-lg bg-slate-100 hover:bg-emerald-50 hover:text-emerald-700 text-slate-600 transition">
                            #{{ $tag->name }}
                        </a>
                    @endforeach
                </div>
            @endif

            <!-- Navigation Back -->
            <div class="mt-12 pt-8 border-t border-slate-100 flex items-center justify-between">
                <a href="{{ route('blog.index') }}" class="font-bold text-sm text-slate-600 hover:text-slate-900 flex items-center gap-1">
                    &larr; Back to all stories
                </a>
                <a href="{{ route('donate') }}" class="font-bold text-sm text-emerald-700 hover:text-emerald-800">
                    Support Our Programs &rarr;
                </a>
            </div>
        </div>
    </section>

    <!-- Related Articles -->
    @if($relatedPosts->isNotEmpty())
        <section class="py-16 bg-slate-50 border-t border-slate-100">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <h2 class="text-2xl font-bold text-slate-900 mb-8">Related Stories</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    @foreach($relatedPosts as $rel)
                        <div class="bg-white rounded-xl border border-slate-100 p-6 shadow-sm hover:shadow-md transition flex flex-col justify-between">
                            <div class="space-y-2">
                                <span class="text-xs text-slate-400">{{ $rel->published_at ? $rel->published_at->format('M d, Y') : '' }}</span>
                                <h3 class="text-lg font-bold text-slate-900 leading-snug">
                                    <a href="{{ route('blog.show', $rel->slug) }}" class="hover:text-emerald-700">
                                        {{ $rel->title }}
                                    </a>
                                </h3>
                                <p class="text-xs text-slate-600 line-clamp-2">{{ $rel->summary }}</p>
                            </div>
                            <div class="pt-4 border-t border-slate-50 mt-4">
                                <a href="{{ route('blog.show', $rel->slug) }}" class="text-xs font-bold text-emerald-700">Read &rarr;</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

@endsection
