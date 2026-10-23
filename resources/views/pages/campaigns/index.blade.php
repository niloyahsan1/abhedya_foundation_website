@extends('layouts.app')

@section('title', 'Fundraising Campaigns | Abhedya Foundation')
@section('meta_description', 'Support verified emergency relief, medical camps, and educational campaigns initiated by Abhedya Foundation.')

@section('content')

    <!-- Header Banner -->
    <section class="bg-gradient-to-b from-slate-900 to-slate-800 text-white py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-3xl space-y-4">
                <span class="text-xs font-bold text-emerald-400 uppercase tracking-widest">{{ __('Transparent Humanitarian Giving') }}</span>
                <h1 class="text-4xl sm:text-5xl font-extrabold tracking-tight text-white">
                    {{ __('Fundraising Campaigns') }}
                </h1>
                <p class="text-base sm:text-lg text-slate-300 leading-relaxed">
                    {{ __('100% verified donation accounting. Track real-time verified fundraising progress directly tied to field operations and emergency responses.') }}
                </p>
            </div>
        </div>
    </section>

    <!-- Campaigns Catalog -->
    <section class="py-16 bg-slate-50 min-h-[60vh]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Filter Tabs -->
            <div class="flex items-center gap-2 mb-10">
                <a href="{{ route('campaigns.index', ['status' => 'active']) }}" class="px-5 py-2 rounded-full text-xs font-bold transition {{ $status === 'active' ? 'bg-emerald-700 text-white shadow-sm' : 'bg-white text-slate-600 hover:bg-slate-100 border border-slate-200' }}">
                    {{ __('Active Campaigns') }}
                </a>
                <a href="{{ route('campaigns.index', ['status' => 'completed']) }}" class="px-5 py-2 rounded-full text-xs font-bold transition {{ $status === 'completed' ? 'bg-emerald-700 text-white shadow-sm' : 'bg-white text-slate-600 hover:bg-slate-100 border border-slate-200' }}">
                    {{ __('Completed Campaigns') }}
                </a>
            </div>

            @if($campaigns->isNotEmpty())
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($campaigns as $campaign)
                        <div class="group interactive-card bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden flex flex-col">
                            <div class="h-48 bg-slate-200 relative overflow-hidden">
                                @if($campaign->featured_image)
                                    <img src="{{ $campaign->featured_image }}" alt="{{ __($campaign->title) }}" class="w-full h-full object-cover card-img-zoom">
                                @else
                                    <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-emerald-600 to-teal-700 text-white font-bold text-base px-6 text-center">
                                        {{ __($campaign->title) }}
                                    </div>
                                @endif
                                <div class="absolute top-3 right-3">
                                    <span class="px-2.5 py-1 rounded-full text-xs font-bold uppercase tracking-wider {{ $campaign->status === 'active' ? 'bg-emerald-100 text-emerald-800' : 'bg-slate-100 text-slate-700' }}">
                                        {{ $campaign->status === 'active' ? __('Active') : __('Completed') }}
                                    </span>
                                </div>
                            </div>
                            <div class="p-6 flex-1 flex flex-col justify-between">
                                <div class="space-y-3">
                                    <h2 class="text-xl font-bold text-slate-900 leading-snug">
                                        <a href="{{ route('campaigns.show', $campaign->slug) }}" class="group-hover:text-emerald-700 transition">
                                            {{ __($campaign->title) }}
                                        </a>
                                    </h2>
                                    <p class="text-sm text-slate-600 line-clamp-3">
                                        {{ __($campaign->short_description) }}
                                    </p>
                                </div>

                                <div class="pt-6 space-y-4">
                                    <div class="space-y-1.5">
                                        <div class="flex justify-between text-xs font-semibold text-slate-700">
                                            <span class="text-emerald-700">{{ __('Raised:') }} ৳{{ bn_num(number_format($campaign->raised_amount)) }}</span>
                                            <span class="text-slate-500">{{ __('Target:') }} ৳{{ bn_num(number_format($campaign->target_amount)) }}</span>
                                        </div>
                                        <div class="w-full h-2.5 bg-slate-100 rounded-full overflow-hidden">
                                            <div class="bg-gradient-to-r from-emerald-600 to-teal-500 h-full rounded-full transition-all duration-500" style="width: {{ min(100, $campaign->progress_percentage) }}%"></div>
                                        </div>
                                        <div class="flex justify-between text-xs text-slate-500">
                                            <span>{{ bn_num($campaign->progress_percentage) }}% {{ __('funded') }}</span>
                                            <span>{{ bn_num($campaign->verifiedDonations->count()) }} {{ __('verified donors') }}</span>
                                        </div>
                                    </div>

                                    <div class="flex gap-2">
                                        @if($campaign->status === 'active')
                                            <a href="{{ route('donate') }}?campaign={{ $campaign->slug }}" class="flex-1 text-center py-2.5 rounded-xl font-bold text-sm bg-emerald-600 hover:bg-emerald-500 text-white transition shadow-sm hover:shadow-md">
                                                {{ __('Donate') }}
                                            </a>
                                        @endif
                                        <a href="{{ route('campaigns.show', $campaign->slug) }}" class="px-4 py-2.5 rounded-xl font-semibold text-sm border border-slate-200 hover:bg-slate-50 text-slate-700 transition {{ $campaign->status !== 'active' ? 'w-full text-center' : '' }}">
                                            {{ __('View Details') }}
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="mt-12">
                    {{ $campaigns->links() }}
                </div>
            @else
                <div class="bg-white rounded-2xl border border-slate-200 p-12 text-center max-w-md mx-auto">
                    <p class="text-slate-500 mb-4">{{ __('No campaigns found for this filter.') }}</p>
                    <a href="{{ route('campaigns.index') }}" class="font-bold text-sm text-emerald-700">{{ __('View active campaigns') }}</a>
                </div>
            @endif
        </div>
    </section>

@endsection
