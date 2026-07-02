@extends($activeTemplate . 'layouts.master')

@php
    $siteName = gs('site_name');

    // Each module links to its real route. Route::has() guards against any
    // renamed route so the public homepage can never 500 on a bad name;
    // logged-out visitors are funnelled to register/login by the auth middleware.
    $modules = [
        [
            'name'  => 'Games',
            'desc'  => 'Aviator, Plinko, Fortune Maya and more instant-win games.',
            'route' => 'user.games.index',
            'icon'  => 'ri-gamepad-line',
            'image' => 'https://images.unsplash.com/photo-1511512578047-dfb367046420?auto=format&fit=crop&w=800&q=70',
            'from'  => 'from-pink-500',
            'to'    => 'to-fuchsia-600',
        ],
        [
            'name'  => 'Investment Plans',
            'desc'  => 'Fixed and flexible plans with scheduled returns.',
            'route' => 'user.pool.index',
            'icon'  => 'ri-funds-line',
            'image' => 'https://images.unsplash.com/photo-1579621970563-ebec7560ff3e?auto=format&fit=crop&w=800&q=70',
            'from'  => 'from-emerald-500',
            'to'    => 'to-green-600',
        ],
        [
            'name'  => 'Stock Trading',
            'desc'  => 'Trade global equities with real-time price action.',
            'route' => 'user.stock.trading',
            'icon'  => 'ri-stock-line',
            'image' => 'https://images.unsplash.com/photo-1590283603385-17ffb3a7f29f?auto=format&fit=crop&w=800&q=70',
            'from'  => 'from-sky-500',
            'to'    => 'to-blue-600',
        ],
        [
            'name'  => 'Forex',
            'desc'  => 'Buy and sell major currency pairs around the clock.',
            'route' => 'user.forex',
            'icon'  => 'ri-exchange-dollar-line',
            'image' => 'https://images.unsplash.com/photo-1526304640581-d334cdbbf45e?auto=format&fit=crop&w=800&q=70',
            'from'  => 'from-amber-500',
            'to'    => 'to-orange-600',
        ],
        [
            'name'  => 'Crypto Trading',
            'desc'  => 'Trade Bitcoin, Ethereum and top altcoins in seconds.',
            'route' => 'user.trading',
            'icon'  => 'ri-btc-line',
            'image' => 'https://images.unsplash.com/photo-1516245834210-c4c142787335?auto=format&fit=crop&w=800&q=70',
            'from'  => 'from-yellow-400',
            'to'    => 'to-amber-600',
        ],
        [
            'name'  => 'Cloud Mining',
            'desc'  => 'Rent hash power and earn without any hardware.',
            'route' => 'user.miners',
            'icon'  => 'ri-cpu-line',
            'image' => 'https://images.unsplash.com/photo-1640826514546-7d2eab70a4e5?auto=format&fit=crop&w=800&q=70',
            'from'  => 'from-indigo-500',
            'to'    => 'to-blue-700',
        ],
        [
            'name'  => 'AI Trading Bots',
            'desc'  => 'Automated strategies that trade the markets for you.',
            'route' => 'user.ai.bots',
            'icon'  => 'ri-robot-line',
            'image' => 'https://images.unsplash.com/photo-1677442136019-21780ecad995?auto=format&fit=crop&w=800&q=70',
            'from'  => 'from-violet-500',
            'to'    => 'to-purple-700',
        ],
        [
            'name'  => 'VIP Membership',
            'desc'  => 'Unlock premium tiers with boosted daily rewards.',
            'route' => 'user.vip.index',
            'icon'  => 'ri-vip-crown-line',
            'image' => 'https://images.unsplash.com/photo-1563986768609-322da13575f3?auto=format&fit=crop&w=800&q=70',
            'from'  => 'from-yellow-500',
            'to'    => 'to-amber-700',
        ],
    ];

    $stats = [
        ['value' => '120K+', 'label' => 'Active Investors', 'icon' => 'ri-group-line'],
        ['value' => '$45M+', 'label' => 'Paid to Members', 'icon' => 'ri-money-dollar-circle-line'],
        ['value' => '150+',  'label' => 'Countries Served', 'icon' => 'ri-earth-line'],
        ['value' => '99.9%', 'label' => 'Platform Uptime', 'icon' => 'ri-shield-check-line'],
    ];

    $steps = [
        ['icon' => 'ri-user-add-line', 'title' => 'Create Account', 'desc' => 'Sign up in under a minute with just your email.'],
        ['icon' => 'ri-bank-card-line', 'title' => 'Fund Wallet', 'desc' => 'Deposit securely using your preferred method.'],
        ['icon' => 'ri-rocket-2-line', 'title' => 'Start Earning', 'desc' => 'Invest, trade or play and grow your balance.'],
    ];

    $benefits = [
        ['icon' => 'ri-shield-keyhole-line', 'title' => 'Bank-grade Security', 'desc' => 'Your funds and data are protected end to end.'],
        ['icon' => 'ri-flashlight-line', 'title' => 'Instant Withdrawals', 'desc' => 'Cash out your profits quickly, any time.'],
        ['icon' => 'ri-customer-service-2-line', 'title' => '24/7 Support', 'desc' => 'Our team is always here to help you.'],
        ['icon' => 'ri-hand-coin-line', 'title' => 'Referral Rewards', 'desc' => 'Earn commissions when you invite friends.'],
    ];
@endphp

@section('content')
    {{-- Admin-managed banner slider --}}
    @include($activeTemplate . 'home.banner')

    <div class="pt-8 space-y-16 md:space-y-24">

        {{-- ============ HERO ============ --}}
        <section class="grid items-center gap-8 md:grid-cols-2 md:gap-12">
            <div class="text-center md:text-left">
                <span class="inline-flex items-center gap-2 rounded-full border border-blue-400/40 bg-blue-500/10 px-4 py-1.5 text-xs font-semibold uppercase tracking-widest text-blue-200">
                    <span class="h-2 w-2 animate-pulse rounded-full bg-blue-400"></span>
                    @lang('Trusted Wealth Platform')
                </span>
                <h1 class="mt-5 font-[Orbitron] text-4xl font-black leading-tight tracking-tight text-white md:text-5xl xl:text-6xl">
                    @lang('Invest, Trade &amp; Win with')
                    <span class="bg-gradient-to-r from-blue-400 via-cyan-300 to-purple-400 bg-clip-text text-transparent">{{ $siteName }}</span>
                </h1>
                <p class="mx-auto mt-5 max-w-xl text-base leading-relaxed text-gray-300 md:mx-0 md:text-lg">
                    @lang('One account for games, investment plans, stocks, forex and crypto trading. Grow your money on') {{ $siteName }} @lang('with tools built for every kind of earner.')
                </p>
                <div class="mt-8 flex flex-col items-stretch justify-center gap-3 sm:flex-row md:justify-start">
                    @guest
                        <a href="{{ route('user.register') }}"
                            class="group relative overflow-hidden rounded-2xl bg-gradient-to-r from-cyan-500 via-teal-500 to-emerald-600 px-8 py-4 text-center font-black text-white shadow-2xl shadow-emerald-500/30 transition-all duration-300 hover:scale-[1.03]">
                            <span class="relative z-10 flex items-center justify-center gap-2"><i class="ri-rocket-2-line text-xl"></i> @lang('Get Started Free')</span>
                        </a>
                        <a href="{{ route('user.login') }}"
                            class="rounded-2xl border-2 border-white/20 bg-white/5 px-8 py-4 text-center font-black text-white backdrop-blur-sm transition-all duration-300 hover:scale-[1.03] hover:border-blue-400/60 hover:bg-white/10">
                            <span class="flex items-center justify-center gap-2"><i class="ri-login-box-line text-xl"></i> @lang('Login')</span>
                        </a>
                    @else
                        <a href="{{ route('user.home') }}"
                            class="group relative overflow-hidden rounded-2xl bg-gradient-to-r from-blue-500 via-blue-600 to-purple-600 px-8 py-4 text-center font-black text-white shadow-2xl shadow-blue-500/30 transition-all duration-300 hover:scale-[1.03]">
                            <span class="relative z-10 flex items-center justify-center gap-2"><i class="ri-dashboard-line text-xl"></i> @lang('Go to Dashboard')</span>
                        </a>
                        <a href="{{ route('user.deposit.index') }}"
                            class="rounded-2xl border-2 border-white/20 bg-white/5 px-8 py-4 text-center font-black text-white backdrop-blur-sm transition-all duration-300 hover:scale-[1.03] hover:border-blue-400/60 hover:bg-white/10">
                            <span class="flex items-center justify-center gap-2"><i class="ri-wallet-3-line text-xl"></i> @lang('Deposit')</span>
                        </a>
                    @endguest
                </div>
                <div class="mt-8 flex items-center justify-center gap-6 text-sm text-gray-400 md:justify-start">
                    <span class="flex items-center gap-2"><i class="ri-shield-check-line text-green-400"></i> @lang('Secure')</span>
                    <span class="flex items-center gap-2"><i class="ri-flashlight-line text-yellow-400"></i> @lang('Instant Payouts')</span>
                    <span class="flex items-center gap-2"><i class="ri-24-hours-line text-blue-400"></i> @lang('24/7 Support')</span>
                </div>
            </div>

            <div class="relative">
                <div class="absolute -inset-4 rounded-[2.5rem] bg-gradient-to-tr from-blue-600/30 via-purple-600/20 to-cyan-500/30 blur-2xl"></div>
                <div class="relative overflow-hidden rounded-[2rem] border-4 border-blue-400/30 shadow-2xl shadow-blue-500/40">
                    <img src="https://images.unsplash.com/photo-1642790106117-e829e14a795f?auto=format&fit=crop&w=1000&q=75"
                        onerror="this.style.opacity=0"
                        class="h-72 w-full object-cover md:h-[26rem]" alt="{{ $siteName }} trading dashboard">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/10 to-transparent"></div>
                    <div class="absolute bottom-5 left-5 right-5 flex items-center justify-between rounded-2xl border border-white/10 bg-black/40 p-4 backdrop-blur-md">
                        <div>
                            <p class="text-xs text-gray-300">@lang('Portfolio Value')</p>
                            <p class="font-[Orbitron] text-2xl font-black text-white">$18,420.65</p>
                        </div>
                        <span class="flex items-center gap-1 rounded-full bg-green-500/20 px-3 py-1 text-sm font-bold text-green-300"><i class="ri-arrow-up-line"></i> +24.7%</span>
                    </div>
                </div>
            </div>
        </section>

        {{-- ============ STATS ============ --}}
        <section class="grid grid-cols-2 gap-4 lg:grid-cols-4">
            @foreach($stats as $stat)
                <div class="rounded-3xl border border-white/10 bg-white/5 p-6 text-center backdrop-blur-xl transition-all duration-300 hover:border-blue-400/40 hover:bg-white/10">
                    <i class="{{ $stat['icon'] }} mb-2 block text-3xl text-blue-300"></i>
                    <p class="font-[Orbitron] text-2xl font-black text-white md:text-3xl">{{ $stat['value'] }}</p>
                    <p class="mt-1 text-xs text-gray-400 md:text-sm">@lang($stat['label'])</p>
                </div>
            @endforeach
        </section>

        {{-- ============ MODULES ============ --}}
        <section>
            <div class="mx-auto mb-10 max-w-2xl text-center">
                <h2 class="font-[Orbitron] text-3xl font-black text-white md:text-4xl">@lang('Everything in One Platform')</h2>
                <p class="mt-3 text-gray-400">@lang('From high-octane games to serious market trading —') {{ $siteName }} @lang('brings every way to earn under one roof.')</p>
            </div>

            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-4">
                @foreach($modules as $module)
                    @php $url = \Route::has($module['route']) ? route($module['route']) : route('user.register'); @endphp
                    <a href="{{ $url }}"
                        class="group relative flex flex-col overflow-hidden rounded-3xl border border-white/10 bg-white/5 shadow-xl backdrop-blur-xl transition-all duration-300 hover:-translate-y-1 hover:border-blue-400/50 hover:shadow-blue-500/30">
                        <div class="relative h-40 overflow-hidden bg-gradient-to-br {{ $module['from'] }} {{ $module['to'] }}">
                            <img src="{{ $module['image'] }}" loading="lazy"
                                onerror="this.style.opacity=0"
                                class="h-full w-full object-cover opacity-80 transition-transform duration-500 group-hover:scale-110" alt="{{ $module['name'] }}">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent"></div>
                            <div class="absolute left-4 top-4 flex h-12 w-12 items-center justify-center rounded-2xl border border-white/20 bg-black/40 backdrop-blur-md">
                                <i class="{{ $module['icon'] }} text-2xl text-white"></i>
                            </div>
                        </div>
                        <div class="flex flex-1 flex-col p-5">
                            <h3 class="font-[Orbitron] text-lg font-black text-white">@lang($module['name'])</h3>
                            <p class="mt-2 flex-1 text-sm leading-relaxed text-gray-400">@lang($module['desc'])</p>
                            <span class="mt-4 inline-flex items-center gap-1 text-sm font-bold text-blue-300 transition-all group-hover:gap-2">
                                @lang('Explore') <i class="ri-arrow-right-line"></i>
                            </span>
                        </div>
                    </a>
                @endforeach
            </div>
        </section>

        {{-- ============ HOW IT WORKS ============ --}}
        <section>
            <div class="mx-auto mb-10 max-w-2xl text-center">
                <h2 class="font-[Orbitron] text-3xl font-black text-white md:text-4xl">@lang('Start in 3 Simple Steps')</h2>
                <p class="mt-3 text-gray-400">@lang('Joining') {{ $siteName }} @lang('takes less than five minutes.')</p>
            </div>
            <div class="grid gap-6 md:grid-cols-3">
                @foreach($steps as $i => $step)
                    <div class="relative rounded-3xl border border-white/10 bg-gradient-to-br from-blue-600/10 to-purple-600/10 p-8 text-center backdrop-blur-xl">
                        <span class="absolute right-6 top-4 font-[Orbitron] text-5xl font-black text-white/10">0{{ $i + 1 }}</span>
                        <div class="mx-auto mb-5 flex h-16 w-16 items-center justify-center rounded-2xl bg-gradient-to-br from-blue-500 to-purple-600 shadow-lg shadow-blue-500/40">
                            <i class="{{ $step['icon'] }} text-3xl text-white"></i>
                        </div>
                        <h3 class="font-[Orbitron] text-xl font-black text-white">@lang($step['title'])</h3>
                        <p class="mt-2 text-sm text-gray-400">@lang($step['desc'])</p>
                    </div>
                @endforeach
            </div>
        </section>

        {{-- ============ WHY US ============ --}}
        <section class="grid items-center gap-10 lg:grid-cols-2">
            <div class="relative order-2 lg:order-1">
                <div class="absolute -inset-4 rounded-[2.5rem] bg-gradient-to-tr from-purple-600/30 to-blue-500/20 blur-2xl"></div>
                <img src="https://images.unsplash.com/photo-1600880292203-757bb62b4baf?auto=format&fit=crop&w=1000&q=75"
                    onerror="this.style.opacity=0"
                    class="relative h-80 w-full rounded-[2rem] border-4 border-purple-400/30 object-cover shadow-2xl shadow-purple-500/30" alt="Why choose {{ $siteName }}">
            </div>
            <div class="order-1 lg:order-2">
                <h2 class="font-[Orbitron] text-3xl font-black text-white md:text-4xl">@lang('Why Choose') {{ $siteName }}?</h2>
                <p class="mt-3 text-gray-400">@lang('Built for reliability, speed and trust — so you can focus on growing your wealth.')</p>
                <div class="mt-8 grid gap-5 sm:grid-cols-2">
                    @foreach($benefits as $benefit)
                        <div class="flex items-start gap-4 rounded-2xl border border-white/10 bg-white/5 p-4 backdrop-blur-xl">
                            <div class="flex h-11 w-11 flex-shrink-0 items-center justify-center rounded-xl bg-gradient-to-br from-blue-500 to-cyan-500 shadow-lg">
                                <i class="{{ $benefit['icon'] }} text-xl text-white"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-white">@lang($benefit['title'])</h4>
                                <p class="mt-1 text-sm text-gray-400">@lang($benefit['desc'])</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        {{-- ============ ADMIN-MANAGED SECTIONS ============ --}}
        @include($activeTemplate . 'home.tutorial')
        @include($activeTemplate . 'home.fbr')
        @include($activeTemplate . 'home.plans')

        {{-- ============ FINAL CTA ============ --}}
        <section class="relative overflow-hidden rounded-[2.5rem] border border-blue-400/30 bg-gradient-to-br from-blue-600/30 via-purple-600/20 to-indigo-800/30 p-10 text-center backdrop-blur-xl md:p-16">
            <div class="absolute -top-20 -right-20 h-60 w-60 rounded-full bg-blue-500/30 blur-3xl"></div>
            <div class="absolute -bottom-20 -left-20 h-60 w-60 rounded-full bg-purple-500/30 blur-3xl"></div>
            <div class="relative">
                <h2 class="font-[Orbitron] text-3xl font-black text-white md:text-5xl">@lang('Ready to Grow with') {{ $siteName }}?</h2>
                <p class="mx-auto mt-4 max-w-xl text-gray-300">@lang('Join thousands of members already earning across games, investments and the markets. Your journey starts today.')</p>
                <div class="mt-8 flex flex-col items-center justify-center gap-3 sm:flex-row">
                    @guest
                        <a href="{{ route('user.register') }}"
                            class="group relative overflow-hidden rounded-2xl bg-gradient-to-r from-cyan-500 via-teal-500 to-emerald-600 px-10 py-4 font-black text-white shadow-2xl shadow-emerald-500/30 transition-all duration-300 hover:scale-[1.03]">
                            <span class="relative z-10 flex items-center gap-2"><i class="ri-user-add-line text-xl"></i> @lang('Create Free Account')</span>
                        </a>
                        <a href="{{ route('user.login') }}"
                            class="rounded-2xl border-2 border-white/20 bg-white/5 px-10 py-4 font-black text-white backdrop-blur-sm transition-all duration-300 hover:scale-[1.03] hover:border-blue-400/60">
                            @lang('I already have an account')
                        </a>
                    @else
                        <a href="{{ route('user.home') }}"
                            class="group relative overflow-hidden rounded-2xl bg-gradient-to-r from-blue-500 via-blue-600 to-purple-600 px-10 py-4 font-black text-white shadow-2xl shadow-blue-500/30 transition-all duration-300 hover:scale-[1.03]">
                            <span class="relative z-10 flex items-center gap-2"><i class="ri-dashboard-line text-xl"></i> @lang('Go to Dashboard')</span>
                        </a>
                    @endguest
                </div>
            </div>
        </section>

    </div>

    <!-- Bottom Glow Effect -->
    <div class="pointer-events-none absolute bottom-0 left-0 right-0 h-32 bg-gradient-to-t from-purple-900/50 via-blue-900/30 to-transparent"></div>
@endsection

@push('script')
    <script>
        new Swiper('.swiper-banner', {
            loop: true,
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            autoplay: {
                delay: 2500,
                disableOnInteraction: false,
            },
        });
    </script>
@endpush
