@extends('layouts.app')

@section('title', 'Projects & Activities | Abhedya Foundation')
@section('meta_description', 'Explore active and completed initiatives by Abhedya Foundation in education, rural healthcare, disaster response, and water sanitation.')

@section('content')

    <!-- Header Banner -->
    <section class="bg-gradient-to-b from-[#1771bf] via-[#1565a8] to-[#0c243c] text-white py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-3xl space-y-4">
                <span class="text-sm font-semibold text-sky-300 uppercase tracking-wider block">{{ __('Our Direct Impact') }}</span>
                <h1 class="text-3xl sm:text-4xl font-bold tracking-tight text-white">
                    {{ __('Projects & Activities') }}
                </h1>
                <p class="text-base sm:text-lg text-blue-100 leading-relaxed font-normal">
                    {{ __('Explore our ground initiatives designed to create sustainable, long-term impact across vulnerable and remote rural areas.') }}
                </p>
            </div>
        </div>
    </section>

    <!-- Filters and Projects List -->
    <section class="py-16 bg-[#f0f7fd]/40 min-h-[60vh]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Filter Tabs -->
            <div class="flex items-center gap-2 mb-10 overflow-x-auto pb-2">
                <a href="{{ route('projects.index') }}" class="px-5 py-2 rounded-full text-xs font-bold transition {{ !$status ? 'bg-[#2375b8] text-white shadow-sm' : 'bg-white text-slate-600 hover:bg-slate-100 border border-slate-200' }}">
                    {{ __('All Projects') }}
                </a>
                <a href="{{ route('projects.index', ['status' => 'ongoing']) }}" class="px-5 py-2 rounded-full text-xs font-bold transition {{ $status === 'ongoing' ? 'bg-[#2375b8] text-white shadow-sm' : 'bg-white text-slate-600 hover:bg-slate-100 border border-slate-200' }}">
                    {{ __('Ongoing') }}
                </a>
                <a href="{{ route('projects.index', ['status' => 'completed']) }}" class="px-5 py-2 rounded-full text-xs font-bold transition {{ $status === 'completed' ? 'bg-[#2375b8] text-white shadow-sm' : 'bg-white text-slate-600 hover:bg-slate-100 border border-slate-200' }}">
                    {{ __('Completed') }}
                </a>
                <a href="{{ route('projects.index', ['status' => 'planning']) }}" class="px-5 py-2 rounded-full text-xs font-bold transition {{ $status === 'planning' ? 'bg-[#2375b8] text-white shadow-sm' : 'bg-white text-slate-600 hover:bg-slate-100 border border-slate-200' }}">
                    {{ __('In Planning') }}
                </a>
            </div>

            <!-- Projects Grid -->
            @if($projects->isNotEmpty())
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($projects as $project)
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
                                    <h2 class="text-xl font-bold text-slate-900 leading-snug">
                                        <a href="{{ route('projects.show', $project->slug) }}" class="group-hover:text-[#2375b8] transition">
                                            {{ $project->display_title }}
                                        </a>
                                    </h2>
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

                <!-- Pagination -->
                <div class="mt-12">
                    {{ $projects->links() }}
                </div>
            @else
                <div class="bg-white rounded-2xl border border-slate-200 p-12 text-center max-w-md mx-auto">
                    <p class="text-slate-500 mb-4">{{ __('No projects found matching the criteria.') }}</p>
                    <a href="{{ route('projects.index') }}" class="font-bold text-sm text-[#2375b8]">{{ __('View All Projects') }}</a>
                </div>
            @endif
        </div>
    </section>

@endsection
