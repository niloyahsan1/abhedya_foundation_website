@extends('layouts.app')

@section('title', 'About Us | Abhedya Foundation')
@section('meta_description', 'Discover the history, founding vision, leadership values, and humanitarian pillars that guide Abhedya Foundation across Bangladesh.')

@section('content')

    <!-- Header Banner -->
    <section class="bg-gradient-to-b from-slate-900 to-slate-800 text-white py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-3xl space-y-4">
                <span class="text-xs font-bold text-emerald-400 uppercase tracking-widest">Who We Are</span>
                <h1 class="text-4xl sm:text-5xl font-extrabold tracking-tight text-white">
                    About Abhedya Foundation
                </h1>
                <p class="text-lg text-slate-300 leading-relaxed">
                    A grassroots non-profit dedicated to uplifting marginalized communities, expanding educational opportunity, and providing rapid humanitarian aid.
                </p>
            </div>
        </div>
    </section>

    <!-- Background & Story -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
                <div class="lg:col-span-7 space-y-6">
                    <span class="text-xs font-bold text-emerald-700 uppercase tracking-widest">Our Foundation Story</span>
                    <h2 class="text-3xl font-extrabold text-slate-900 leading-tight">
                        Built from Compassion, Sustained by Dedicated Action
                    </h2>
                    <p class="text-base text-slate-600 leading-relaxed">
                        Abhedya Foundation began with a small group of committed volunteers responding to severe seasonal flooding in remote riverine communities. Seeing first-hand how isolation trapped families in repeated cycles of hardship, we recognized that relief was merely the first step: lasting change requires durable educational infrastructure, preventative healthcare, and self-sustaining livelihood support.
                    </p>
                    <p class="text-base text-slate-600 leading-relaxed">
                        Today, our initiatives span 14 districts across Bangladesh, touching over 35,000 lives through dedicated grassroots networks, volunteer coordinators, and community partnerships.
                    </p>
                </div>
                <div class="lg:col-span-5 bg-gradient-to-br from-emerald-50 to-teal-50 border border-emerald-100 p-8 rounded-2xl space-y-6">
                    <h3 class="text-xl font-bold text-slate-900">Key Milestones at a Glance</h3>
                    <ul class="space-y-4 text-sm text-slate-700">
                        <li class="flex items-start gap-3">
                            <div class="w-6 h-6 rounded-full bg-emerald-600 text-white flex items-center justify-center text-xs font-bold shrink-0 mt-0.5">✓</div>
                            <span><strong>48 Completed & Active Projects</strong> targeting rural education, water safety, and maternal health.</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <div class="w-6 h-6 rounded-full bg-emerald-600 text-white flex items-center justify-center text-xs font-bold shrink-0 mt-0.5">✓</div>
                            <span><strong>35,000+ Verified Beneficiaries</strong> directly supported through transparent aid channels.</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <div class="w-6 h-6 rounded-full bg-emerald-600 text-white flex items-center justify-center text-xs font-bold shrink-0 mt-0.5">✓</div>
                            <span><strong>100% Accountable Record-keeping</strong> with verified receipts and field audit logs.</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Mission, Vision & Core Values -->
    <section class="py-20 bg-slate-50 border-t border-slate-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-2xl mx-auto mb-16 space-y-3">
                <span class="text-xs font-bold text-emerald-700 uppercase tracking-widest">Guiding Principles</span>
                <h2 class="text-3xl font-extrabold text-slate-900">Mission, Vision & Core Values</h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Mission -->
                <div class="interactive-card bg-white p-8 rounded-2xl border border-slate-100 shadow-sm flex flex-col justify-between cursor-default">
                    <div class="space-y-4">
                        <div class="w-12 h-12 rounded-xl bg-emerald-100 text-emerald-700 flex items-center justify-center transition-transform duration-300 group-hover:scale-110">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                        </div>
                        <h3 class="text-xl font-bold text-slate-900">Our Mission</h3>
                        <p class="text-sm text-slate-600 leading-relaxed">
                            To uplift marginalized communities by delivering high-impact educational initiatives, essential healthcare access, emergency relief, and sustainable livelihood opportunities.
                        </p>
                    </div>
                </div>

                <!-- Vision -->
                <div class="interactive-card bg-white p-8 rounded-2xl border border-slate-100 shadow-sm flex flex-col justify-between cursor-default">
                    <div class="space-y-4">
                        <div class="w-12 h-12 rounded-xl bg-teal-100 text-teal-700 flex items-center justify-center transition-transform duration-300 group-hover:scale-110">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                        </div>
                        <h3 class="text-xl font-bold text-slate-900">Our Vision</h3>
                        <p class="text-sm text-slate-600 leading-relaxed">
                            A just, compassionate society where every individual has equal opportunities to thrive with self-reliance, security, and human dignity.
                        </p>
                    </div>
                </div>

                <!-- Values -->
                <div class="interactive-card bg-white p-8 rounded-2xl border border-slate-100 shadow-sm flex flex-col justify-between cursor-default">
                    <div class="space-y-4">
                        <div class="w-12 h-12 rounded-xl bg-amber-100 text-amber-700 flex items-center justify-center transition-transform duration-300 group-hover:scale-110">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                        </div>
                        <h3 class="text-xl font-bold text-slate-900">Core Values</h3>
                        <p class="text-sm text-slate-600 leading-relaxed">
                            Integrity, rigorous transparency, respect for human dignity, gender inclusion, and unwavering community ownership in every project we undertake.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Organizational Pillars / Strategic Focus -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-2xl mx-auto mb-16 space-y-3">
                <span class="text-xs font-bold text-emerald-700 uppercase tracking-widest">Our Strategic Focus</span>
                <h2 class="text-3xl font-extrabold text-slate-900">Key Pillars of Action</h2>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="interactive-card p-6 rounded-2xl bg-gradient-to-b from-white to-slate-50 border border-slate-100 space-y-3 shadow-sm cursor-default">
                    <span class="text-3xl block transition-transform group-hover:scale-125">📚</span>
                    <h3 class="font-bold text-slate-900">Education & Digital Literacy</h3>
                    <p class="text-xs text-slate-600 leading-relaxed">Modernizing rural classrooms, solar power integration, and merit-based secondary scholarships.</p>
                </div>
                <div class="interactive-card p-6 rounded-2xl bg-gradient-to-b from-white to-slate-50 border border-slate-100 space-y-3 shadow-sm cursor-default">
                    <span class="text-3xl block transition-transform group-hover:scale-125">🩺</span>
                    <h3 class="font-bold text-slate-900">Healthcare & Hygiene</h3>
                    <p class="text-xs text-slate-600 leading-relaxed">Mobile diagnostic camps, free doctor visits, maternal healthcare counseling, and clean drinking water tubewells.</p>
                </div>
                <div class="interactive-card p-6 rounded-2xl bg-gradient-to-b from-white to-slate-50 border border-slate-100 space-y-3 shadow-sm cursor-default">
                    <span class="text-3xl block transition-transform group-hover:scale-125">🌊</span>
                    <h3 class="font-bold text-slate-900">Disaster & Winter Relief</h3>
                    <p class="text-xs text-slate-600 leading-relaxed">Rapid emergency distribution of dry rations, water purifiers, shelter kits, and winter thermal clothing.</p>
                </div>
                <div class="interactive-card p-6 rounded-2xl bg-gradient-to-b from-white to-slate-50 border border-slate-100 space-y-3 shadow-sm cursor-default">
                    <span class="text-3xl block transition-transform group-hover:scale-125">🧵</span>
                    <h3 class="font-bold text-slate-900">Livelihood & Skills</h3>
                    <p class="text-xs text-slate-600 leading-relaxed">Tailoring and vocational trade boot camps equipping widows and low-income families with tools to earn independently.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action Banner -->
    <section class="py-16 bg-slate-900 text-white">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-6">
            <h2 class="text-3xl font-extrabold text-white">Partner with Abhedya Foundation</h2>
            <p class="text-slate-300 max-w-2xl mx-auto text-base">
                Whether you want to sponsor an educational project, volunteer your professional skills, or support emergency relief, your involvement creates lasting change.
            </p>
            <div class="pt-2 flex justify-center gap-4">
                <a href="{{ route('donate') }}" class="px-7 py-3 rounded-xl font-bold bg-emerald-600 hover:bg-emerald-500 text-white transition">
                    Support Our Programs
                </a>
                <a href="{{ route('contact') }}" class="px-7 py-3 rounded-xl font-semibold bg-slate-800 hover:bg-slate-700 text-slate-200 border border-slate-700 transition">
                    Contact Us
                </a>
            </div>
        </div>
    </section>

@endsection
