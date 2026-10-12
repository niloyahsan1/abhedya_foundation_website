@extends('layouts.app')

@section('title', 'Projects & Activities | Abhedya Foundation')
@section('meta_description', 'Explore active and completed initiatives by Abhedya Foundation in education, rural healthcare, disaster response, and water sanitation.')

@section('content')

    <!-- Header Banner -->
    <section class="bg-gradient-to-b from-slate-900 to-slate-800 text-white py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-3xl space-y-4">
                <span class="text-xs font-bold text-emerald-400 uppercase tracking-widest">Our Direct Impact</span>
                <h1 class="text-4xl sm:text-5xl font-extrabold tracking-tight text-white">
                    Projects & Community Activities
                </h1>
                <p class="text-base sm:text-lg text-slate-300 leading-relaxed">
                    Explore our ground initiatives designed to create sustainable, long-term impact across vulnerable and remote rural areas.
                </p>
            </div>
        </div>
    </section>

    <!-- Filters and Projects List -->
    <section class="py-16 bg-slate-50 min-h-[60vh]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Filter Tabs -->
            <div class="flex items-center gap-2 mb-10 overflow-x-auto pb-2">
                <a href="{{ route('projects.index') }}" class="px-5 py-2 rounded-full text-xs font-bold transition {{ !$status ? 'bg-emerald-700 text-white shadow-sm' : 'bg-white text-slate-600 hover:bg-slate-100 border border-slate-200' }}">
                    All Projects
                </a>
                <a href="{{ route('projects.index', ['status' => 'ongoing']) }}" class="px-5 py-2 rounded-full text-xs font-bold transition {{ $status === 'ongoing' ? 'bg-emerald-700 text-white shadow-sm' : 'bg-white text-slate-600 hover:bg-slate-100 border border-slate-200' }}">
                    Ongoing
                </a>
                <a href="{{ route('projects.index', ['status' => 'completed']) }}" class="px-5 py-2 rounded-full text-xs font-bold transition {{ $status === 'completed' ? 'bg-emerald-700 text-white shadow-sm' : 'bg-white text-slate-600 hover:bg-slate-100 border border-slate-200' }}">
                    Completed
                </a>
                <a href="{{ route('projects.index', ['status' => 'planning']) }}" class="px-5 py-2 rounded-full text-xs font-bold transition {{ $status === 'planning' ? 'bg-emerald-700 text-white shadow-sm' : 'bg-white text-slate-600 hover:bg-slate-100 border border-slate-200' }}">
                    In Planning
                </a>
            </div>

            <!-- Projects Grid -->
            @if($projects->isNotEmpty())
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($projects as $project)
                        <div class="group bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden flex flex-col hover:-translate-y-1.5 hover:shadow-xl hover:border-emerald-200 transition-all duration-300">
                            <div class="h-48 bg-slate-100 relative overflow-hidden">
                                @if($project->featured_image)
                                    <img src="{{ $project->featured_image }}" alt="{{ $project->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                                @else
                                    <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-emerald-50 to-teal-100 text-emerald-800 font-bold text-sm px-6 text-center">
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
                                    <h2 class="text-xl font-bold text-slate-900 leading-snug">
                                        <a href="{{ route('projects.show', $project->slug) }}" class="group-hover:text-emerald-700 transition">
                                            {{ $project->title }}
                                        </a>
                                    </h2>
                                    <p class="text-sm text-slate-600 line-clamp-3">
                                        {{ $project->summary }}
                                    </p>
                                </div>
                                <div class="pt-6 border-t border-slate-50 mt-6 flex items-center justify-between">
                                    <span class="text-xs text-slate-400">
                                        {{ $project->start_date ? $project->start_date->format('M Y') : 'Ongoing' }}
                                    </span>
                                    <a href="{{ route('projects.show', $project->slug) }}" class="text-sm font-bold text-emerald-700 group-hover:text-emerald-800 flex items-center gap-1">
                                        View Details &rarr;
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
                    <p class="text-slate-500 mb-4">No projects found in this category.</p>
                    <a href="{{ route('projects.index') }}" class="font-bold text-sm text-emerald-700">View all projects</a>
                </div>
            @endif
        </div>
    </section>

@endsection
