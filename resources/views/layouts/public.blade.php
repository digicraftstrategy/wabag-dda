<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') | Wabag District Development Authority</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" href="{{ asset('images/logo/wabag-flag-icon.png') }}" type="image/png">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        html {
            scroll-behavior: smooth;
        }

        .main-header {
            background-color: #042127;
            color: #ffffff;
            position: sticky;
            top: 0;
            z-index: 50;
            transition: all 0.3s ease-in-out;
            box-shadow: 0 4px 20px rgba(0,0,0,0.15);
        }

        .main-header.scrolled {
            box-shadow: 0 6px 24px rgba(0,0,0,0.18);
        }

        .active-menu-item {
            color: #FFD700;
            font-weight: 600;
            position: relative;
        }

        .active-menu-item:after {
            content: '';
            position: absolute;
            bottom: -8px;
            left: 0;
            width: 100%;
            height: 2px;
            background: #FFD700;
        }

        .flag-logo {
            background: linear-gradient(to right,
                #000000 0% 25%,
                #FFD700 25% 50%,
                #042127 50% 75%,
                #FFFFFF 75% 100%);
        }

        .btn-primary {
            background: linear-gradient(to right, #1A4314, #000000);
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(255,215,0,0.2);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(255,215,0,0.3);
        }

        .dropdown-menu {
            backdrop-filter: blur(10px);
            background: rgba(2, 71, 39, 0.95);
            border-left: 3px solid #FFD700;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
        }

        @keyframes progress {
            0% { transform: translateX(-100%) rotate(0deg); }
            100% { transform: translateX(100%) rotate(360deg); }
        }

        .animate-progress {
            animation: progress 1.5s cubic-bezier(0.65, 0.05, 0.36, 1) infinite;
        }

        .footer-bands {
            height: 8px;
            background: linear-gradient(to right,
                #000000 0% 25%,
                #FFD700 25% 50%,
                #000000 50% 75%,
                #FFFFFF 75% 100%);
        }

        .mobile-dropdown {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease;
        }

        .mobile-dropdown.active {
            max-height: 500px;
            padding: 0.5rem 0;
        }

        /* Premium Loader */
        #orchid-loader {
            background:
                radial-gradient(circle at 20% 20%, rgba(250, 204, 21, 0.10), transparent 28%),
                radial-gradient(circle at 80% 30%, rgba(4, 120, 87, 0.16), transparent 30%),
                radial-gradient(circle at 50% 80%, rgba(255, 255, 255, 0.06), transparent 26%),
                linear-gradient(135deg, #020617 0%, #03140f 45%, #042127 100%);
            backdrop-filter: blur(10px);
            opacity: 1;
            visibility: visible;
            transition: opacity 0.8s ease, visibility 0.8s ease;
        }

        #orchid-loader.loader-hide {
            opacity: 0;
            visibility: hidden;
        }

        .loader-noise,
        .loader-grid,
        .loader-glow,
        .loader-orb,
        .loader-ring,
        .loader-core,
        .loader-mark,
        .loader-title,
        .loader-subtitle,
        .loader-progress {
            pointer-events: none;
        }

        .loader-grid {
            position: absolute;
            inset: 0;
            background-image:
                linear-gradient(rgba(255,255,255,0.035) 1px, transparent 1px),
                linear-gradient(90deg, rgba(255,255,255,0.035) 1px, transparent 1px);
            background-size: 48px 48px;
            mask-image: radial-gradient(circle at center, black 30%, transparent 85%);
            opacity: 0.32;
        }

        .loader-noise {
            position: absolute;
            inset: 0;
            background:
                radial-gradient(circle at 50% 50%, rgba(255,255,255,0.025), transparent 60%);
            mix-blend-mode: soft-light;
            opacity: 0.8;
        }

        .loader-glow {
            position: absolute;
            width: 34rem;
            height: 34rem;
            border-radius: 9999px;
            background:
                radial-gradient(circle, rgba(250, 204, 21, 0.12) 0%, rgba(4, 120, 87, 0.08) 38%, transparent 72%);
            filter: blur(24px);
            animation: loaderGlowPulse 4.5s ease-in-out infinite;
        }

        .loader-orb {
            position: absolute;
            border-radius: 9999px;
            filter: blur(8px);
            opacity: 0.55;
        }

        .loader-orb--gold {
            width: 9rem;
            height: 9rem;
            top: 18%;
            left: 22%;
            background: radial-gradient(circle, rgba(250,204,21,0.85), rgba(250,204,21,0.05) 68%, transparent 72%);
            animation: floatOrbA 7s ease-in-out infinite;
        }

        .loader-orb--green {
            width: 11rem;
            height: 11rem;
            right: 18%;
            bottom: 18%;
            background: radial-gradient(circle, rgba(4,120,87,0.85), rgba(4,120,87,0.04) 68%, transparent 72%);
            animation: floatOrbB 9s ease-in-out infinite;
        }

        .loader-shell {
            position: relative;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .loader-emblem {
            position: relative;
            width: 9rem;
            height: 9rem;
            display: grid;
            place-items: center;
        }

        .loader-ring {
            position: absolute;
            inset: 0;
            border-radius: 9999px;
            background:
                conic-gradient(
                    from 0deg,
                    rgba(250,204,21,0.08) 0deg,
                    rgba(250,204,21,0.95) 70deg,
                    rgba(255,255,255,0.65) 125deg,
                    rgba(4,120,87,0.9) 210deg,
                    rgba(255,255,255,0.08) 300deg,
                    rgba(250,204,21,0.08) 360deg
                );
            padding: 3px;
            animation: spinRing 2.4s linear infinite;
            box-shadow:
                0 0 40px rgba(250, 204, 21, 0.10),
                0 0 70px rgba(4, 120, 87, 0.12);
        }

        .loader-ring::before {
            content: '';
            position: absolute;
            inset: 10px;
            border-radius: 9999px;
            border: 1px solid rgba(255,255,255,0.10);
        }

        .loader-ring::after {
            content: '';
            position: absolute;
            inset: -8px;
            border-radius: inherit;
            border: 1px solid rgba(255,255,255,0.08);
            opacity: 0.65;
        }

        .loader-core {
            position: absolute;
            inset: 14px;
            border-radius: 9999px;
            background:
                linear-gradient(145deg, rgba(255,255,255,0.12), rgba(255,255,255,0.03)),
                linear-gradient(135deg, rgba(4,120,87,0.35), rgba(2,6,23,0.92));
            border: 1px solid rgba(255,255,255,0.14);
            box-shadow:
                inset 0 1px 0 rgba(255,255,255,0.14),
                inset 0 -12px 24px rgba(0,0,0,0.35),
                0 18px 35px rgba(0,0,0,0.35);
            backdrop-filter: blur(12px);
            animation: coreBreath 3.2s ease-in-out infinite;
        }

        .loader-mark {
            position: relative;
            z-index: 2;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 3.9rem;
            height: 3.9rem;
        }

        .loader-mark img {
            width: 100%;
            height: 100%;
            object-fit: contain;
            display: block;
            filter:
                drop-shadow(0 0 10px rgba(250,204,21,0.20))
                drop-shadow(0 0 22px rgba(255,255,255,0.06));
            animation: markPulse 2.8s ease-in-out infinite;
        }

        .loader-text {
            margin-top: 1.75rem;
            text-align: center;
        }

        .loader-title {
            font-family: 'Poppins', sans-serif;
            font-size: 0.82rem;
            font-weight: 600;
            letter-spacing: 0.34em;
            text-transform: uppercase;
            color: rgba(255,255,255,0.92);
            animation: fadeLift 1.1s ease both 0.15s;
        }

        .loader-subtitle {
            margin-top: 0.65rem;
            font-family: 'Roboto', sans-serif;
            font-size: 0.8rem;
            letter-spacing: 0.18em;
            text-transform: uppercase;
            color: rgba(255,255,255,0.52);
            animation: softBlink 1.8s ease-in-out infinite;
        }

        .loader-progress-wrap {
            position: relative;
            width: 12rem;
            height: 4px;
            margin: 1.2rem auto 0;
            overflow: hidden;
            border-radius: 9999px;
            background: rgba(255,255,255,0.10);
        }

        .loader-progress {
            position: absolute;
            inset: 0;
            border-radius: inherit;
            background: linear-gradient(90deg, #facc15 0%, #ffffff 45%, #047857 100%);
            transform-origin: left center;
            animation: loaderProgress 2.4s cubic-bezier(0.65, 0.05, 0.36, 1) infinite;
            box-shadow: 0 0 20px rgba(250, 204, 21, 0.35);
        }

        @keyframes spinRing {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }

        @keyframes coreBreath {
            0%, 100% {
                transform: scale(1);
                box-shadow:
                    inset 0 1px 0 rgba(255,255,255,0.14),
                    inset 0 -12px 24px rgba(0,0,0,0.35),
                    0 18px 35px rgba(0,0,0,0.35);
            }
            50% {
                transform: scale(1.03);
                box-shadow:
                    inset 0 1px 0 rgba(255,255,255,0.16),
                    inset 0 -12px 24px rgba(0,0,0,0.35),
                    0 22px 42px rgba(0,0,0,0.42);
            }
        }

        @keyframes markPulse {
            0%, 100% { transform: scale(1); opacity: 0.92; }
            50% { transform: scale(1.08); opacity: 1; }
        }

        @keyframes loaderGlowPulse {
            0%, 100% { transform: scale(0.96); opacity: 0.75; }
            50% { transform: scale(1.04); opacity: 1; }
        }

        @keyframes floatOrbA {
            0%, 100% { transform: translate3d(0, 0, 0); }
            50% { transform: translate3d(18px, -20px, 0); }
        }

        @keyframes floatOrbB {
            0%, 100% { transform: translate3d(0, 0, 0); }
            50% { transform: translate3d(-24px, 18px, 0); }
        }

        @keyframes loaderProgress {
            0% {
                transform: translateX(-100%) scaleX(0.35);
            }
            50% {
                transform: translateX(10%) scaleX(0.75);
            }
            100% {
                transform: translateX(100%) scaleX(0.35);
            }
        }

        @keyframes fadeLift {
            from {
                opacity: 0;
                transform: translateY(8px);
                letter-spacing: 0.24em;
            }
            to {
                opacity: 1;
                transform: translateY(0);
                letter-spacing: 0.34em;
            }
        }

        @keyframes softBlink {
            0%, 100% { opacity: 0.45; }
            50% { opacity: 0.9; }
        }

        @media (prefers-reduced-motion: reduce) {
            #orchid-loader,
            .loader-ring,
            .loader-core,
            .loader-mark img,
            .loader-glow,
            .loader-orb,
            .loader-progress,
            .loader-title,
            .loader-subtitle {
                animation: none !important;
                transition: none !important;
            }
        }
    </style>
</head>

<body class="bg-wabag-light font-sans text-wabag-black public-site">

    <div
        id="orchid-loader"
        class="fixed inset-0 z-[9999] flex items-center justify-center"
        aria-live="polite"
        aria-label="Loading page"
    >
        <div class="loader-grid"></div>
        <div class="loader-noise"></div>
        <div class="loader-glow"></div>
        <div class="loader-orb loader-orb--gold"></div>
        <div class="loader-orb loader-orb--green"></div>

        <div class="loader-shell relative z-10 px-6">
            <div class="loader-emblem">
                <div class="loader-ring"></div>
                <div class="loader-core"></div>

                <div class="loader-mark">
                    <img
                        src="{{ asset('images/loader/enga_orchid.svg') }}"
                        alt="Enga orchid"
                        aria-hidden="true"
                    >
                </div>
            </div>

            <div class="loader-text">
                <p class="loader-title">Wabag District Development Authority</p>
                <p class="loader-subtitle">Loading experience</p>

                <div class="loader-progress-wrap" aria-hidden="true">
                    <div class="loader-progress"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Top Address and Contacts Bar -->
    <div class="bg-wabag-black text-wabag-white text-sm public-topbar">
        <div class="container mx-auto px-4">
            <div class="flex flex-col md:flex-row justify-between items-center py-6">
                <div class="flex items-center space-x-4 mb-2 md:mb-0">
                    <div class="flex items-center">
                        <svg class="h-4 w-4 mr-2 text-wabag-yellow" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                        <span>Wabag Town, Enga Province, Papua New Guinea</span>
                    </div>
                </div>
                <div class="flex flex-col md:flex-row md:space-x-6 space-y-1 md:space-y-0 text-center md:text-left">
                    <div class="flex items-center justify-center">
                        <svg class="h-4 w-4 mr-2 text-wabag-yellow" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                        </svg>
                        <span>+675 123 4567</span>
                    </div>
                    <div class="flex items-center justify-center">
                        <svg class="h-4 w-4 mr-2 text-wabag-yellow" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                        <span>info@wabagdda.gov.pg</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <header id="main-header" class="main-header">
        <div class="container mx-auto px-4">
            <div class="flex items-center justify-between py-4">
                <div class="flex items-center space-x-4">
                    <div class="flag-logo h-12 w-12 rounded-md"></div>
                    <div>
                        <h1 class="text-2xl font-bold">WABAG DDA</h1>
                        <p class="text-wabag-yellow text-xs uppercase tracking-wider">Enga Province</p>
                    </div>
                </div>

                <nav class="hidden lg:block">
                    <ul class="flex space-x-8">
                        <li>
                            <a href="/" class="hover:text-wabag-yellow transition font-medium @if(request()->is('/')) active-menu-item @endif">
                                Home
                            </a>
                        </li>
                        <li class="dropdown relative group">
                            <a href="{{ route('about') }}" class="hover:text-wabag-yellow transition font-medium flex items-center @if(request()->is('about*')) active-menu-item @endif">
                                About
                                <svg class="w-4 h-4 ml-1 transition-transform group-hover:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </a>
                            <div class="dropdown-menu absolute left-0 mt-4 rounded-md py-2 w-48 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200">
                                <a href="{{ route('mps-message') }}" class="block px-4 py-2 hover:bg-wabag-yellow hover:text-wabag-black @if(request()->is('about/mp-message')) active-menu-item @endif">MP's Message</a>
                            </div>
                        </li>

                        <li class="relative group">
                            <a href="#"
                            class="hover:text-wabag-yellow transition font-medium flex items-center
                            @if(request()->is('sectoral-profile*')) active-menu-item @endif">
                                Sectoral Profile
                                <svg class="w-4 h-4 ml-1 transition-transform group-hover:rotate-180"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </a>

                            <div class="absolute left-0 mt-4 rounded-xl py-2 w-60
                                        bg-wabag-green text-white shadow-xl
                                        opacity-0 invisible group-hover:opacity-100 group-hover:visible
                                        transition-all duration-200 z-50">
                                @foreach($navSectorPages as $page)
                                    <a href="{{ route('public.sector.profile', $page->slug) }}"
                                    class="block px-4 py-2 text-sm
                                            hover:bg-white/10
                                            hover:text-wabag-yellow
                                            transition
                                            @if(request()->is('sectoral-profile/'.$page->slug))
                                                bg-white/20 text-wabag-yellow
                                            @endif">

                                        {{ $page->sector->name ?? $page->title }}

                                    </a>
                                @endforeach
                            </div>
                        </li>

                        <li>
                            <a href="{{ route('projects.index') }}" class="hover:text-wabag-yellow transition font-medium @if(request()->is('projects*')) active-menu-item @endif">
                                Projects
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('public.news-updates') }}" class="hover:text-wabag-yellow transition font-medium @if(request()->is('news*')) active-menu-item @endif">
                                News
                            </a>
                        </li>
                        <li>
                            <a href="/contact" class="hover:text-wabag-yellow transition font-medium @if(request()->is('contact*')) active-menu-item @endif">
                                Contact
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.login') }}" class="btn-primary px-6 py-2 rounded-full font-semibold text-sm uppercase tracking-wider">
                                Portal
                            </a>
                        </li>
                    </ul>
                </nav>

                <button class="lg:hidden bg-wabag-green text-wabag-white focus:outline-none" id="mobile-menu-button">
                    <svg class="h-8 w-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
        </div>

        <div class="mobile-menu lg:hidden overflow-hidden max-h-0 transition-all duration-300" id="mobile-menu">
            <div class="container mx-auto px-4 py-2">
                <ul class="space-y-2">
                    <li>
                        <a href="/" class="block py-2 px-3 rounded hover:bg-wabag-yellow hover:text-wabag-black @if(request()->is('/')) bg-wabag-yellow text-wabag-black font-semibold @endif">
                            Home
                        </a>
                    </li>

                    <li>
                        <div class="relative">
                            <button class="mobile-dropdown-toggle w-full flex justify-between items-center py-2 px-3 rounded hover:bg-wabag-yellow hover:text-wabag-black @if(request()->is('about*')) bg-wabag-yellow text-wabag-black font-semibold @endif">
                                <span>About</span>
                                <svg class="w-4 h-4 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </button>
                            <ul class="mobile-dropdown pl-4 @if(request()->is('about*')) active @endif">
                                <li>
                                    <a href="{{ route('about') }}" class="block py-2 px-3 rounded hover:bg-wabag-yellow hover:text-wabag-black @if(request()->is('about/mp-message')) bg-wabag-yellow text-wabag-black font-semibold @endif">
                                        About Wabag DDA
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('mps-message') }}" class="block py-2 px-3 rounded hover:bg-wabag-yellow hover:text-wabag-black @if(request()->is('about/mp-message')) bg-wabag-yellow text-wabag-black font-semibold @endif">
                                        MP's Message
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li>
                        <div class="relative">
                            <button class="mobile-dropdown-toggle w-full flex justify-between items-center py-2 px-3 rounded hover:bg-wabag-yellow hover:text-wabag-black @if(request()->is('sectoral-profile*')) bg-wabag-yellow text-wabag-black font-semibold @endif">
                                <span>Sectoral Profile</span>
                                <svg class="w-4 h-4 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </button>
                            <ul class="mobile-dropdown pl-4 @if(request()->is('sectoral-profile*')) active @endif">
                                @foreach($navSectorPages as $page)
                                    <li>
                                        <a href="{{ route('public.sector.profile', $page->slug) }}"
                                           class="block py-2 px-3 rounded hover:bg-wabag-yellow hover:text-wabag-black @if(request()->is('sectoral-profile/'.$page->slug)) bg-wabag-yellow text-wabag-black font-semibold @endif">
                                            {{ $page->sector->name ?? $page->title }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </li>
                    <li>
                        <a href="/projects" class="block py-2 px-3 rounded hover:bg-wabag-yellow hover:text-wabag-black @if(request()->is('projects*')) bg-wabag-yellow text-wabag-black font-semibold @endif">
                            Projects
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('public.news-updates') }}" class="block py-2 px-3 rounded hover:bg-wabag-yellow hover:text-wabag-black @if(request()->is('news*')) bg-wabag-yellow text-wabag-black font-semibold @endif">
                            News
                        </a>
                    </li>
                    <li>
                        <a href="/contact" class="block py-2 px-3 rounded hover:bg-wabag-yellow hover:text-wabag-black @if(request()->is('contact*')) bg-wabag-yellow text-wabag-black font-semibold @endif">
                            Contact
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.login') }}" class="btn-primary inline-block px-6 py-2 rounded-full mt-2 font-semibold text-sm">
                            Portal Login
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </header>

    <main class="min-h-screen public-content">
        @yield('content')
    </main>

    <footer class="bg-wabag-green text-wabag-white pt-16 pb-6 public-footer">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-2 md:grid-cols-5 gap-8">
                <div>
                    <h3 class="text-lg font-bold mb-4 text-wabag-yellow">Wabag DDA</h3>
                    <p class="mb-4 text-sm">Empowering the people of Wabag District through sustainable development and transparent governance.</p>
                    <div class="flex space-x-3">
                        <a href="#" class="h-8 w-8 rounded-full bg-black flex items-center justify-center hover:bg-wabag-yellow transition">
                            <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                        </a>
                        <a href="#" class="h-8 w-8 rounded-full bg-black flex items-center justify-center hover:bg-wabag-yellow transition">
                            <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z"/></svg>
                        </a>
                    </div>
                </div>

                <div class="hidden md:block">
                    <h3 class="text-lg font-bold mb-4 text-wabag-yellow">Quick Links</h3>
                    <ul class="space-y-2 text-sm">
                        <li><a href="/" class="hover:text-wabag-yellow transition">Home</a></li>
                        <li><a href="/about" class="hover:text-wabag-yellow transition">About Us</a></li>
                        <li><a href="/projects" class="hover:text-wabag-yellow transition">Our Projects</a></li>
                        <li><a href="/news" class="hover:text-wabag-yellow transition">News & Updates</a></li>
                        <li><a href="/contact" class="hover:text-wabag-yellow transition">Contact Us</a></li>
                    </ul>
                </div>

                <div>
                    <h3 class="text-lg font-bold mb-4 text-wabag-yellow">Government Links</h3>
                    <ul class="space-y-2 text-sm">
                        <li><a href="https://enga.gov.pg/" target="_blank" class="hover:text-wabag-yellow transition">Enga Provincial Government</a></li>
                        <li><a href="https://pmnec.gov.pg/" target="_blank" class="hover:text-wabag-yellow transition">PM & NEC</a></li>
                        <li><a href="https://planning.gov.pg/" target="_blank" class="hover:text-wabag-yellow transition">National Planning</a></li>
                        <li><a href="https://www.treasury.gov.pg/" target="_blank" class="hover:text-wabag-yellow transition">Department of Treasury</a></li>
                    </ul>
                </div>

                <div>
                    <h3 class="text-lg font-bold mb-4 text-wabag-yellow">Resources</h3>
                    <ul class="space-y-2 text-sm">
                        <li><a href="/resources/annual-reports" class="hover:text-wabag-yellow transition">Annual Reports</a></li>
                        <li><a href="/resources/budget" class="hover:text-wabag-yellow transition">Budget Documents</a></li>
                        <li><a href="/resources/development-plans" class="hover:text-wabag-yellow transition">Development Plans</a></li>
                        <li><a href="/resources/tenders" class="hover:text-wabag-yellow transition">Tenders</a></li>
                    </ul>
                </div>

                <div>
                    <h3 class="text-lg font-bold mb-4 text-wabag-yellow">Contact Us</h3>
                    <address class="not-italic text-sm">
                        <div class="flex items-start mb-3">
                            <svg class="h-4 w-4 mr-2 text-wabag-yellow mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                            <span>Wabag Town, Enga Province</span>
                        </div>
                        <div class="flex items-center mb-3">
                            <svg class="h-4 w-4 mr-2 text-wabag-yellow" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                            </svg>
                            <span>+675 123 4567</span>
                        </div>
                        <div class="flex items-center">
                            <svg class="h-4 w-4 mr-2 text-wabag-yellow" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                            <span>info@wabagdda.gov.pg</span>
                        </div>
                    </address>
                </div>
            </div>

            <div class="flex flex-wrap justify-center gap-4 md:gap-8 mt-12 text-sm opacity-60">
                <a href="/information/terms" class="hover:text-wabag-yellow transition">Terms</a>
                <a href="/information/privacy" class="hover:text-wabag-yellow transition">Privacy Policy</a>
                <a href="/sitemap" class="hover:text-wabag-yellow transition">Sitemap</a>
                <a href="/information/accessibility" class="hover:text-wabag-yellow transition">Accessibility</a>
                <a href="{{ route('admin.login') }}" class="hover:text-wabag-yellow transition">Admin Login</a>
            </div>

            <div class="footer-bands mt-6"></div>

            <div class="text-center pt-6 text-sm opacity-60">
                <p>&copy; {{ date('Y') }} Wabag District Development Authority. All rights reserved.</p>
                <p class="text-sm">Designed by <a href="https://github.com/eugene-pande" class="text-blue-500">DigiCraft Strategy Ltd</a></p>
            </div>
        </div>
    </footer>

    <div id="loading-bar" class="fixed top-0 left-0 right-0 h-1 bg-wabag-yellow z-50 hidden overflow-hidden">
        <div class="h-full bg-wabag-green animate-progress origin-left"></div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const mobileMenuButton = document.getElementById('mobile-menu-button');
            const mobileMenu = document.getElementById('mobile-menu');
            const loadingBar = document.getElementById('loading-bar');
            const loader = document.getElementById('orchid-loader');
            const header = document.getElementById('main-header');

            let isLinkNavigation = false;
            let isHistoryNavigation = false;

            if (mobileMenuButton && mobileMenu) {
                mobileMenuButton.addEventListener('click', function () {
                    mobileMenu.classList.toggle('max-h-0');
                    mobileMenu.classList.toggle('py-2');
                    mobileMenu.classList.toggle('max-h-screen');
                });
            }

            document.querySelectorAll('.mobile-dropdown-toggle').forEach(button => {
                button.addEventListener('click', function () {
                    const dropdown = this.nextElementSibling;
                    const icon = this.querySelector('svg');

                    if (dropdown) dropdown.classList.toggle('active');
                    if (icon) icon.classList.toggle('rotate-180');
                });
            });

            window.addEventListener('scroll', function () {
                if (!header) return;
                header.classList.toggle('scrolled', window.scrollY > 50);
            });

            const shouldHandleLink = (link) => {
                if (!link || !link.href) return false;
                if (link.target === '_blank') return false;
                if (link.hasAttribute('download')) return false;
                if (link.hasAttribute('data-no-loader')) return false;

                const href = link.getAttribute('href');
                if (!href || href.startsWith('#')) return false;

                if (link.href.includes('#') && link.pathname === window.location.pathname) return false;
                if (!link.href.startsWith(window.location.origin)) return false;

                return true;
            };

            const showLoader = () => {
                if (loader) {
                    loader.style.display = 'flex';
                    loader.classList.remove('loader-hide');
                    loader.setAttribute('aria-hidden', 'false');
                }

                if (loadingBar) {
                    loadingBar.classList.remove('hidden');
                }
            };

            const hideLoader = (immediate = false) => {
                if (loadingBar) {
                    loadingBar.classList.add('hidden');
                }

                if (!loader) return;

                if (immediate) {
                    loader.classList.add('loader-hide');
                    loader.style.display = 'none';
                    loader.setAttribute('aria-hidden', 'true');
                    return;
                }

                loader.classList.add('loader-hide');
                loader.setAttribute('aria-hidden', 'true');

                setTimeout(() => {
                    loader.style.display = 'none';
                }, 800);
            };

            const playFullLoader = (duration = 800) => {
                showLoader();

                setTimeout(() => {
                    hideLoader(false);
                }, duration);
            };

            document.addEventListener('click', function (e) {
                const link = e.target.closest('a');

                if (!shouldHandleLink(link)) return;
                if (e.metaKey || e.ctrlKey || e.shiftKey || e.altKey) return;
                if (e.defaultPrevented) return;

                e.preventDefault();

                isLinkNavigation = true;
                showLoader();

                setTimeout(() => {
                    window.location.href = link.href;
                }, 650);
            });

            if (loader) {
                const minimumDisplayTime = 800;
                const startTime = performance.now();

                const finishInitialLoader = () => {
                    const elapsed = performance.now() - startTime;
                    const remaining = Math.max(minimumDisplayTime - elapsed, 0);

                    setTimeout(() => {
                        hideLoader(false);
                    }, remaining);
                };

                if (document.readyState === 'complete') {
                    finishInitialLoader();
                } else {
                    window.addEventListener('load', finishInitialLoader, { once: true });
                }
            }

            window.addEventListener('popstate', function () {
                isHistoryNavigation = true;
                showLoader();
            });

            window.addEventListener('beforeunload', function () {
                if (isLinkNavigation || isHistoryNavigation) {
                    showLoader();
                }
            });

            window.addEventListener('pagehide', function () {
                if (isLinkNavigation || isHistoryNavigation) {
                    showLoader();
                }
            });

            window.addEventListener('pageshow', function (event) {
                const navEntries = performance.getEntriesByType('navigation');
                const navType = navEntries.length ? navEntries[0].type : '';

                const cameFromHistory = event.persisted || navType === 'back_forward';

                if (cameFromHistory) {
                    playFullLoader(800);
                } else {
                    hideLoader(true);
                }

                isLinkNavigation = false;
                isHistoryNavigation = false;
            });
        });
    </script>

    @stack('scripts')
    <script src="//unpkg.com/alpinejs" defer></script>
</body>
</html>