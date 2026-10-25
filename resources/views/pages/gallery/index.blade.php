@extends('layouts.app')

@section('title', 'Photo Gallery | Abhedya Foundation')
@section('meta_description', 'View photography and field images documenting Abhedya Foundation relief campaigns, classrooms, and medical camps.')

@section('content')

    <!-- Header Banner -->
    <section class="bg-gradient-to-b from-[#1771bf] via-[#1565a8] to-[#0c243c] text-white py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-3xl space-y-4">
                <span class="text-sm font-semibold text-sky-300 uppercase tracking-wider block">{{ __('Visual Field Reports') }}</span>
                <h1 class="text-3xl sm:text-4xl font-bold tracking-tight text-white">
                    {{ __('Photo Gallery') }}
                </h1>
                <p class="text-base sm:text-lg text-blue-100 leading-relaxed font-normal">
                    {{ __('Witness authentic moments of courage, education, and humanitarian relief across Bangladesh.') }}
                </p>
            </div>
        </div>
    </section>

    <!-- Gallery Section with Alpine.js Lightbox -->
    <section class="py-16 bg-[#f0f7fd]/30 min-h-[60vh]" x-data="{ selectedImage: null, selectedCaption: '', selectedTitle: '' }">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Album Filter Pills -->
            <div class="flex items-center gap-2 mb-10 overflow-x-auto pb-2">
                <a href="{{ route('gallery.index') }}" class="px-5 py-2 rounded-full text-xs font-bold transition {{ !$albumSlug ? 'bg-[#2375b8] text-white shadow-sm' : 'bg-white text-slate-600 hover:bg-slate-100 border border-slate-200' }}">
                    {{ __('All Photos') }}
                </a>
                @foreach($albums as $album)
                    <a href="{{ route('gallery.index', ['album' => $album->slug]) }}" class="px-5 py-2 rounded-full text-xs font-bold transition whitespace-nowrap {{ $albumSlug === $album->slug ? 'bg-[#2375b8] text-white shadow-sm' : 'bg-white text-slate-600 hover:bg-slate-100 border border-slate-200' }}">
                        {{ $album->display_title }} ({{ bn_num($album->images_count) }})
                    </a>
                @endforeach
            </div>

            <!-- Image Grid -->
            @if($images->isNotEmpty())
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                    @foreach($images as $img)
                        <div class="group bg-white rounded-2xl border border-slate-200/80 shadow-sm cursor-pointer hover:shadow-md hover:border-[#2375b8] transition"
                             @click="selectedImage = '{{ $img->image }}'; selectedTitle = '{{ addslashes($img->display_title ?: __('Field Documentation')) }}'; selectedCaption = '{{ addslashes($img->display_caption ?: '') }}'">
                            <div class="aspect-[4/3] bg-slate-100 overflow-hidden relative">
                                <img src="{{ $img->image }}" alt="{{ $img->display_title ?: __('Field Documentation') }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                                <div class="absolute inset-0 bg-[#0c243c]/50 opacity-0 group-hover:opacity-100 transition flex items-center justify-center">
                                    <div class="w-10 h-10 rounded-full bg-white/95 text-[#2375b8] flex items-center justify-center shadow">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7"/></svg>
                                    </div>
                                </div>
                            </div>
                            <div class="p-4">
                                <h3 class="font-bold text-sm text-slate-900 group-hover:text-[#2375b8] transition line-clamp-1">{{ $img->display_title ?: __('Field Documentation') }}</h3>
                                @if($img->caption)
                                    <p class="text-xs text-slate-500 mt-1 line-clamp-2">{{ $img->display_caption }}</p>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="mt-12">
                    {{ $images->links() }}
                </div>
            @else
                <div class="bg-white rounded-2xl border border-slate-200 p-12 text-center max-w-md mx-auto">
                    <p class="text-slate-500 mb-4">{{ __('No images in this album yet.') }}</p>
                    <a href="{{ route('gallery.index') }}" class="font-bold text-sm text-[#2375b8] hover:underline">{{ __('View all photos') }}</a>
                </div>
            @endif

            <!-- Alpine.js Lightbox Modal -->
            <div x-show="selectedImage" x-cloak
                 class="fixed inset-0 z-50 bg-slate-950/90 backdrop-blur-sm flex items-center justify-center p-4"
                 @keydown.escape.window="selectedImage = null">
                <div class="relative max-w-4xl w-full bg-slate-900 rounded-2xl overflow-hidden border border-slate-800 shadow-2xl" @click.away="selectedImage = null">
                    <button type="button" @click="selectedImage = null" class="absolute top-4 right-4 z-10 w-9 h-9 rounded-full bg-slate-800/80 text-white flex items-center justify-center hover:bg-slate-700 transition" aria-label="Close modal">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                    </button>
                    <div class="max-h-[75vh] bg-black flex items-center justify-center">
                        <img :src="selectedImage" :alt="selectedTitle" class="max-h-[75vh] w-auto object-contain">
                    </div>
                    <div class="p-6 text-white space-y-1">
                        <h3 class="font-bold text-lg" x-text="selectedTitle"></h3>
                        <p class="text-sm text-slate-400" x-text="selectedCaption"></p>
                    </div>
                </div>
            </div>

        </div>
    </section>

@endsection
