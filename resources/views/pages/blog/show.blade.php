@extends('layouts.app')

@section('title', $post->display_title . ' | ' . __('Abhedya Foundation'))
@section('meta_description', Str::limit(strip_tags($post->display_summary ?: $post->display_content), 160))

@section('content')

    <!-- Header Section -->
    <section class="bg-gradient-to-b from-[#1771bf] via-[#1565a8] to-[#0c243c] text-white py-16">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 space-y-4">
            <div class="flex items-center gap-2 text-xs font-semibold text-sky-300">
                <a href="{{ route('blog.index') }}" class="hover:underline">{{ __('News & Blog') }}</a>
                <span>/</span>
                @if($post->category)
                    <a href="{{ route('blog.index', ['category' => $post->category->slug]) }}" class="hover:underline text-blue-200">{{ __($post->category->name) }}</a>
                @endif
            </div>
            <h1 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-white leading-tight">
                {{ $post->display_title }}
            </h1>
            <div class="flex flex-wrap items-center gap-4 text-xs text-slate-300 pt-2">
                <span>{{ __('Published:') }} {{ $post->published_at ? bn_date($post->published_at, 'F d, Y') : bn_date($post->created_at, 'F d, Y') }}</span>
                <span>•</span>
                <span>{{ __('Author:') }} {{ __($post->user?->name ?? 'Abhedya Team') }}</span>
            </div>
        </div>
    </section>

    <!-- Main Article Body -->
    <section class="py-16 bg-white">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            @if($post->featured_image)
                <div class="rounded-2xl overflow-hidden mb-10 shadow-sm border border-slate-100">
                    <img src="{{ $post->featured_image }}" alt="{{ $post->display_title }}" class="w-full max-h-[480px] object-cover">
                </div>
            @endif

            @if($post->summary)
                <div class="p-6 rounded-2xl bg-[#f0f7fd] border border-blue-100 mb-10 text-slate-800 font-medium text-lg leading-relaxed">
                    {{ $post->display_summary }}
                </div>
            @endif

            <div class="prose prose-slate max-w-none text-slate-700 leading-relaxed text-base sm:text-lg">
                {!! $post->display_content !!}
            </div>

            <!-- Tags -->
            @if($post->tags->isNotEmpty())
                <div class="pt-8 border-t border-slate-100 mt-12 flex flex-wrap items-center gap-2">
                    <span class="text-xs font-bold text-slate-500 uppercase tracking-wider mr-2">{{ __('Tags:') }}</span>
                    @foreach($post->tags as $tag)
                        <a href="{{ route('blog.index', ['tag' => $tag->slug]) }}" class="text-xs px-3 py-1 rounded-lg bg-slate-100 hover:bg-[#f0f7fd] hover:text-[#2375b8] text-slate-600 transition">
                            #{{ __($tag->name) }}
                        </a>
                    @endforeach
                </div>
            @endif

            <!-- Navigation Back -->
            <div class="mt-12 pt-8 border-t border-slate-100 flex items-center justify-between">
                <a href="{{ route('blog.index') }}" class="font-bold text-sm text-slate-600 hover:text-[#2375b8] flex items-center gap-1 transition">
                    &larr; {{ __('Back to all stories') }}
                </a>
                <a href="{{ route('donate') }}" class="font-bold text-sm text-orange-600 hover:text-orange-700 transition">
                    {{ __('Support Our Programs') }} &rarr;
                </a>
            </div>
        </div>
    </section>

    <!-- Related Articles -->
    @if($relatedPosts->isNotEmpty())
        <section class="py-16 bg-[#f0f7fd]/40 border-t border-slate-200/80">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <h2 class="text-2xl font-bold text-slate-900 mb-8">{{ __('Related Stories') }}</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    @foreach($relatedPosts as $rel)
                        <div class="bg-white rounded-xl border border-slate-200/80 p-6 shadow-sm hover:shadow-md transition flex flex-col justify-between">
                            <div class="space-y-2">
                                <span class="text-xs text-slate-400">{{ $rel->published_at ? bn_date($rel->published_at, 'M d, Y') : '' }}</span>
                                <h3 class="text-lg font-bold text-slate-900 leading-snug">
                                    <a href="{{ route('blog.show', $rel->slug) }}" class="hover:text-[#2375b8] transition">
                                        {{ __($rel->title) }}
                                    </a>
                                </h3>
                                <p class="text-xs text-slate-600 line-clamp-2">{{ __($rel->summary) }}</p>
                            </div>
                            <div class="pt-4 border-t border-slate-50 mt-4">
                                <a href="{{ route('blog.show', $rel->slug) }}" class="text-xs font-bold text-[#2375b8] hover:text-[#1788bf]">{{ __('Read More') }} &rarr;</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

@endsection
