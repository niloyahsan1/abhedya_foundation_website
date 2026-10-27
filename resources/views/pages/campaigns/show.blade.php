@extends('layouts.app')

@section('title', $campaign->display_title . ' | ' . __('Abhedya Foundation'))
@section('meta_description', Str::limit(strip_tags($campaign->display_short_description ?: $campaign->display_description), 160))

@section('content')

    <!-- Header Section -->
    <section class="bg-gradient-to-b from-[#1771bf] via-[#1565a8] to-[#0c243c] text-white py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-4xl space-y-4">
                <div class="flex items-center gap-2 text-xs font-semibold text-sky-300">
                    <a href="{{ route('campaigns.index') }}" class="hover:underline">{{ __('Campaigns') }}</a>
                    <span>/</span>
                    <span class="text-blue-200">{{ $campaign->status === 'active' ? __('Active') : __('Completed') }}</span>
                </div>
                <h1 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-white leading-tight">
                    {{ $campaign->display_title }}
                </h1>
                <div class="flex flex-wrap items-center gap-4 text-xs text-slate-300 pt-2">
                    @if($campaign->start_date)
                        <span>{{ __('Launched:') }} {{ bn_date($campaign->start_date, 'M d, Y') }}</span>
                    @endif
                    <span class="px-2.5 py-0.5 rounded font-bold uppercase {{ $campaign->status === 'active' ? 'bg-sky-400/20 text-sky-200 border border-sky-400/30' : 'bg-slate-700 text-slate-300' }}">
                        {{ $campaign->status === 'active' ? __('Active') : __('Completed') }}
                    </span>
                </div>
            </div>
        </div>
    </section>

    <!-- Main Detail Section -->
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">
                <!-- Left: Content & Updates -->
                <div class="lg:col-span-8 space-y-10">
                    @if($campaign->featured_image)
                        <div class="rounded-2xl overflow-hidden shadow-sm border border-slate-100">
                            <img src="{{ $campaign->featured_image }}" alt="{{ $campaign->display_title }}" class="w-full max-h-[440px] object-cover">
                        </div>
                    @endif

                    @if($campaign->short_description)
                        <div class="p-6 rounded-2xl bg-[#f0f7fd] border border-blue-100 text-slate-800 font-medium text-lg leading-relaxed">
                            {{ $campaign->display_short_description }}
                        </div>
                    @endif

                    <!-- Detailed Content -->
                    <div class="prose prose-slate max-w-none text-slate-700 leading-relaxed text-base sm:text-lg">
                        {!! $campaign->display_description !!}
                    </div>

                    <!-- Published Updates -->
                    @if($campaign->updates->isNotEmpty())
                        <div class="pt-8 border-t border-slate-200 space-y-6">
                            <h2 class="text-2xl font-bold text-slate-900">{{ __('Campaign Field Updates') }}</h2>
                            <div class="space-y-6">
                                @foreach($campaign->updates as $update)
                                    <div class="p-6 rounded-2xl bg-[#f0f7fd]/40 border border-slate-200/80 space-y-3">
                                        <div class="flex items-center justify-between text-xs text-slate-500 font-semibold">
                                            <span class="text-[#2375b8] font-bold uppercase tracking-wider">{{ __('Field Report') }}</span>
                                            <span>{{ $update->published_at ? bn_date($update->published_at, 'M d, Y') : bn_date($update->created_at, 'M d, Y') }}</span>
                                        </div>
                                        <h3 class="text-lg font-bold text-slate-900">{{ __($update->title) }}</h3>
                                        <div class="text-sm text-slate-700 leading-relaxed">
                                            {!! bn_content($update->content) !!}
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>

                <!-- Right Sidebar: Progress & Donation CTA -->
                <div class="lg:col-span-4 space-y-8">
                    <div class="bg-[#f0f7fd]/50 border border-slate-200 rounded-2xl p-6 sm:p-8 space-y-6 sticky top-28 shadow-sm">
                        <h2 class="text-xl font-bold text-slate-900 border-b border-slate-200 pb-3">{{ __('Fundraising Progress') }}</h2>

                        <div class="space-y-3">
                            <div class="flex justify-between text-sm font-semibold">
                                <span class="text-[#2375b8] font-bold">৳{{ bn_num(number_format($campaign->raised_amount)) }}</span>
                                <span class="text-slate-500">{{ __('Goal:') }} ৳{{ bn_num(number_format($campaign->target_amount)) }}</span>
                            </div>
                            <div class="w-full h-3 bg-slate-200 rounded-full overflow-hidden">
                                <div class="bg-gradient-to-r from-[#2375b8] to-cyan-500 h-full rounded-full transition-all duration-500" style="width: {{ min(100, $campaign->progress_percentage) }}%"></div>
                            </div>
                            <div class="flex justify-between text-xs text-slate-500 font-medium">
                                <span>{{ bn_num($campaign->progress_percentage) }}% {{ __('verified funded') }}</span>
                                <span>{{ bn_num($campaign->verifiedDonations->count()) }} {{ __('contributions') }}</span>
                            </div>
                        </div>

                        <div class="p-4 rounded-xl bg-blue-50 border border-blue-200 text-xs text-blue-900 leading-relaxed space-y-1">
                            <span class="font-bold block">{{ __('100% Verified Transparency:') }}</span>
                            <span>{{ __('Only administrator-verified transactions contribute to the confirmed total. Pending records are checked against account statements before confirmation.') }}</span>
                        </div>

                        @if($campaign->status === 'active')
                            <a href="{{ route('donate') }}?campaign={{ $campaign->slug }}" class="w-full block text-center py-3.5 rounded-xl font-extrabold text-base bg-orange-500 hover:bg-orange-600 text-white shadow-lg shadow-orange-500/25 transition">
                                {{ __('Donate to this Campaign') }}
                            </a>
                        @else
                            <div class="text-center text-xs font-semibold text-slate-500 py-2 bg-slate-200 rounded-lg">
                                {{ __('This campaign has successfully concluded.') }}
                            </div>
                        @endif

                        <!-- Recent Verified Donors -->
                        @if($recentDonations->isNotEmpty())
                            <div class="pt-4 border-t border-slate-200 space-y-3">
                                <h3 class="text-xs font-bold uppercase tracking-wider text-slate-600">{{ __('Recent Verified Donors') }}</h3>
                                <div class="space-y-2 text-xs">
                                    @foreach($recentDonations as $d)
                                        <div class="flex justify-between items-center py-1 border-b border-slate-100 last:border-0">
                                            <span class="font-medium text-slate-800">{{ __($d->donor_name) }}</span>
                                            <span class="font-bold text-[#2375b8]">৳{{ bn_num(number_format($d->amount)) }}</span>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
