@extends('layouts.app')

@section('title', __($campaign->title) . ' | ' . __('Abhedya Foundation'))
@section('meta_description', Str::limit(strip_tags(__($campaign->short_description ?? $campaign->description)), 160))

@section('content')

    <!-- Header Section -->
    <section class="bg-gradient-to-b from-slate-900 to-slate-800 text-white py-16">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 space-y-4">
            <div class="flex items-center gap-2 text-xs font-semibold text-emerald-400">
                <a href="{{ route('campaigns.index') }}" class="hover:underline">{{ __('Campaigns') }}</a>
                <span>/</span>
                <span class="text-slate-400">{{ $campaign->status === 'active' ? __('Active') : __('Completed') }}</span>
            </div>
            <h1 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-white leading-tight">
                {{ __($campaign->title) }}
            </h1>
            <div class="flex flex-wrap items-center gap-4 text-xs text-slate-300 pt-2">
                @if($campaign->start_date)
                    <span>{{ __('Launched:') }} {{ bn_date($campaign->start_date, 'M d, Y') }}</span>
                @endif
                <span class="px-2.5 py-0.5 rounded font-bold uppercase {{ $campaign->status === 'active' ? 'bg-emerald-500/20 text-emerald-300' : 'bg-slate-700 text-slate-300' }}">
                    {{ $campaign->status === 'active' ? __('Active') : __('Completed') }}
                </span>
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
                            <img src="{{ $campaign->featured_image }}" alt="{{ __($campaign->title) }}" class="w-full max-h-[440px] object-cover">
                        </div>
                    @endif

                    @if($campaign->short_description)
                        <div class="p-6 rounded-2xl bg-emerald-50 border border-emerald-100 text-emerald-950 font-medium text-lg leading-relaxed">
                            {{ __($campaign->short_description) }}
                        </div>
                    @endif

                    <!-- Detailed Content -->
                    <div class="prose prose-slate max-w-none text-slate-700 leading-relaxed text-base sm:text-lg space-y-6">
                        {!! nl2br(e(__($campaign->description))) !!}
                    </div>

                    <!-- Published Updates -->
                    @if($campaign->updates->isNotEmpty())
                        <div class="pt-8 border-t border-slate-200 space-y-6">
                            <h2 class="text-2xl font-bold text-slate-900">{{ __('Campaign Field Updates') }}</h2>
                            <div class="space-y-6">
                                @foreach($campaign->updates as $update)
                                    <div class="p-6 rounded-2xl bg-slate-50 border border-slate-100 space-y-3">
                                        <div class="flex items-center justify-between text-xs text-slate-500 font-semibold">
                                            <span class="text-emerald-700 font-bold uppercase tracking-wider">{{ __('Field Report') }}</span>
                                            <span>{{ $update->published_at ? bn_date($update->published_at, 'M d, Y') : bn_date($update->created_at, 'M d, Y') }}</span>
                                        </div>
                                        <h3 class="text-lg font-bold text-slate-900">{{ __($update->title) }}</h3>
                                        <div class="text-sm text-slate-700 leading-relaxed">
                                            {!! nl2br(e(__($update->content))) !!}
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>

                <!-- Right Sidebar: Progress & Donation CTA -->
                <div class="lg:col-span-4 space-y-8">
                    <div class="bg-slate-50 border border-slate-200 rounded-2xl p-6 sm:p-8 space-y-6 sticky top-28">
                        <h2 class="text-xl font-bold text-slate-900 border-b border-slate-200 pb-3">{{ __('Fundraising Progress') }}</h2>

                        <div class="space-y-3">
                            <div class="flex justify-between text-sm font-semibold">
                                <span class="text-emerald-700 font-bold">৳{{ bn_num(number_format($campaign->raised_amount)) }}</span>
                                <span class="text-slate-500">{{ __('Goal:') }} ৳{{ bn_num(number_format($campaign->target_amount)) }}</span>
                            </div>
                            <div class="w-full h-3 bg-slate-200 rounded-full overflow-hidden">
                                <div class="bg-emerald-600 h-full rounded-full transition-all duration-500" style="width: {{ min(100, $campaign->progress_percentage) }}%"></div>
                            </div>
                            <div class="flex justify-between text-xs text-slate-500 font-medium">
                                <span>{{ bn_num($campaign->progress_percentage) }}% {{ __('verified funded') }}</span>
                                <span>{{ bn_num($campaign->verifiedDonations->count()) }} {{ __('contributions') }}</span>
                            </div>
                        </div>

                        <div class="p-4 rounded-xl bg-amber-50 border border-amber-200 text-xs text-amber-900 leading-relaxed space-y-1">
                            <span class="font-bold block">{{ __('100% Verified Transparency:') }}</span>
                            <span>{{ __('Only administrator-verified transactions contribute to the confirmed total. Pending records are checked against account statements before confirmation.') }}</span>
                        </div>

                        @if($campaign->status === 'active')
                            <a href="{{ route('donate') }}?campaign={{ $campaign->slug }}" class="w-full block text-center py-3.5 rounded-xl font-extrabold text-base bg-emerald-600 hover:bg-emerald-700 text-white shadow-md shadow-emerald-600/20 transition">
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
                                            <span class="font-bold text-emerald-700">৳{{ bn_num(number_format($d->amount)) }}</span>
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
