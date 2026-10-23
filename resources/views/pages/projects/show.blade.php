@extends('layouts.app')

@section('title', __($project->title) . ' | ' . __('Abhedya Foundation'))
@section('meta_description', Str::limit(strip_tags(__($project->summary ?? $project->description)), 160))

@section('content')

    <!-- Header Section -->
    <section class="bg-gradient-to-b from-[#1771bf] via-[#1565a8] to-[#0c243c] text-white py-16">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 space-y-4">
            <div class="flex items-center gap-2 text-xs font-semibold text-sky-300">
                <a href="{{ route('projects.index') }}" class="hover:underline">{{ __('Projects') }}</a>
                <span>/</span>
                <span class="text-blue-200">{{ $project->status === 'completed' ? __('Completed') : ($project->status === 'ongoing' ? __('Ongoing') : __('Planned')) }}</span>
            </div>
            <h1 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-white leading-tight">
                {{ __($project->title) }}
            </h1>
            <div class="flex flex-wrap items-center gap-4 text-xs text-slate-300 pt-2">
                @if($project->location)
                    <div class="flex items-center gap-1">
                        <svg class="w-4 h-4 text-sky-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/></svg>
                        <span>{{ __($project->location) }}</span>
                    </div>
                @endif
                @if($project->start_date)
                    <div class="flex items-center gap-1">
                        <svg class="w-4 h-4 text-sky-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                        <span>{{ bn_date($project->start_date, 'F Y') }} @if($project->end_date) - {{ bn_date($project->end_date, 'F Y') }} @else ({{ __('Ongoing') }}) @endif</span>
                    </div>
                @endif
                <span class="px-2.5 py-0.5 rounded font-bold uppercase {{ $project->status === 'completed' ? 'bg-sky-400/20 text-sky-200 border border-sky-400/30' : 'bg-blue-500/20 text-blue-200 border border-blue-400/30' }}">
                    {{ $project->status === 'completed' ? __('Completed') : ($project->status === 'ongoing' ? __('Ongoing') : __('Planned')) }}
                </span>
            </div>
        </div>
    </section>

    <!-- Main Detail Section -->
    <section class="py-16 bg-white">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            @if($project->featured_image)
                <div class="rounded-2xl overflow-hidden mb-10 shadow-sm border border-slate-100">
                    <img src="{{ $project->featured_image }}" alt="{{ __($project->title) }}" class="w-full max-h-[480px] object-cover">
                </div>
            @endif

            @if($project->summary)
                <div class="p-6 rounded-2xl bg-[#f0f7fd] border border-blue-100 mb-10 text-slate-800 font-medium text-base sm:text-lg leading-relaxed">
                    {{ __($project->summary) }}
                </div>
            @endif

            <!-- Formatted Content -->
            <div class="prose prose-slate max-w-none text-slate-700 leading-relaxed space-y-6 text-base sm:text-lg">
                {!! nl2br(e(__($project->description))) !!}
            </div>

            <!-- Share & CTA -->
            <div class="mt-14 pt-8 border-t border-slate-100 flex flex-col sm:flex-row items-center justify-between gap-4">
                <a href="{{ route('projects.index') }}" class="font-bold text-sm text-slate-600 hover:text-[#2375b8] flex items-center gap-1 transition">
                    &larr; {{ __('Back to all projects') }}
                </a>
                <a href="{{ route('donate') }}" class="px-6 py-3 rounded-xl font-bold text-sm text-white bg-orange-500 hover:bg-orange-600 shadow-md shadow-orange-500/20 transition">
                    {{ __('Support Community Projects') }}
                </a>
            </div>
        </div>
    </section>

    <!-- Related Projects -->
    @if($relatedProjects->isNotEmpty())
        <section class="py-16 bg-[#f0f7fd]/40 border-t border-slate-200/80">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <h2 class="text-2xl font-bold text-slate-900 mb-8">{{ __('Other Projects') }}</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    @foreach($relatedProjects as $rel)
                        <div class="bg-white rounded-xl border border-slate-200/80 p-6 shadow-sm hover:shadow-md transition">
                            <span class="text-xs font-bold text-[#2375b8] uppercase">{{ $rel->status === 'completed' ? __('Completed') : ($rel->status === 'ongoing' ? __('Ongoing') : __('Planned')) }}</span>
                            <h3 class="text-lg font-bold text-slate-900 mt-2 mb-2">
                                <a href="{{ route('projects.show', $rel->slug) }}" class="hover:text-[#2375b8] transition">
                                    {{ __($rel->title) }}
                                </a>
                            </h3>
                            <p class="text-xs text-slate-600 line-clamp-2">{{ __($rel->summary) }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

@endsection
