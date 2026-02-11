@extends('layouts.public')

@section('title', 'Economic Development | Wabag DDA')

@section('content')
<section class="py-12 bg-white">
    <div class="container mx-auto px-4 lg:px-6 max-w-7xl">
        <div class="flex flex-col lg:flex-row gap-8">

            <!-- ===================== MAIN CONTENT ===================== -->
            <div class="lg:w-2/3">

                <!-- 1. Breadcrumbs -->
                <nav class="flex mb-6" aria-label="Breadcrumb">
                    <ol class="inline-flex items-center space-x-1 md:space-x-2">
                        <li class="inline-flex items-center">
                            <a href="/" class="inline-flex items-center text-sm font-medium text-wabag-green hover:text-green-800 transition">
                                <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"/>
                                </svg>
                                Home
                            </a>
                        </li>
                        <li class="flex items-center">
                            <svg class="w-5 h-5 text-gray-300" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"/>
                            </svg>
                            <span class="ml-2 text-sm font-medium text-gray-500">
                                Economic Development Profile
                            </span>
                        </li>
                    </ol>
                </nav>

                <!-- Article -->
                <article class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">

                    <!-- 2. Sector badge + title -->
                    <header class="px-6 pt-6 pb-4">
                        <span class="inline-block bg-purple-100 text-purple-800 text-xs font-semibold px-3 py-1 rounded-full mb-4 uppercase tracking-wider">
                            Economic Development
                        </span>
                        <h1 class="text-3xl lg:text-4xl font-serif font-bold text-wabag-black leading-tight">
                            Economic Development Profile
                        </h1>
                    </header>

                    <div class="px-6 pb-8 formatted-content text-gray-700">

                        <!-- 3. Sector Overview -->
                        <div class="font-bold text-2xl text-wabag-green mt-6 mb-4">
                            SECTORAL DEVELOPMENT PROFILE
                        </div>

                        <div class="font-bold text-xl text-wabag-green mb-3">
                            Economic Overview
                        </div>
                        <p class="mb-4 leading-relaxed">
                            Wabag District’s economy is largely subsistence-based, supported by
                            agriculture, informal trading, and public sector employment.
                            Economic development initiatives focus on improving livelihoods,
                            expanding small and medium enterprises (SMEs), increasing employment
                            opportunities, and strengthening market access.
                        </p>

                        <!-- 4. Sub-sections -->
                        <div class="font-bold text-lg text-wabag-green border-b pb-2 mt-6 mb-3">
                            Key Economic Sectors
                        </div>

                        <!-- 5. Stats Grid -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                            <div class="bg-purple-100 p-4 rounded-lg border border-purple-200">
                                <div class="text-sm text-purple-800 font-semibold">Agriculture</div>
                                <div class="text-gray-700 text-sm mt-1">
                                    Sweet potato, coffee, vegetables, pigs, poultry
                                </div>
                            </div>
                            <div class="bg-purple-100 p-4 rounded-lg border border-purple-200">
                                <div class="text-sm text-purple-800 font-semibold">SMEs</div>
                                <div class="text-gray-700 text-sm mt-1">
                                    Trade stores, market vendors, service providers
                                </div>
                            </div>
                            <div class="bg-purple-100 p-4 rounded-lg border border-purple-200">
                                <div class="text-sm text-purple-800 font-semibold">Employment</div>
                                <div class="text-gray-700 text-sm mt-1">
                                    Public service, construction, informal sector
                                </div>
                            </div>
                            <div class="bg-purple-100 p-4 rounded-lg border border-purple-200">
                                <div class="text-sm text-purple-800 font-semibold">Markets</div>
                                <div class="text-gray-700 text-sm mt-1">
                                    District & roadside markets
                                </div>
                            </div>
                        </div>

                        <!-- 6. Economic Development Table -->
                        <div class="font-semibold text-lg mb-2 text-gray-700">
                            Table: Economic Development Focus Areas
                        </div>
                        <div class="overflow-x-auto mb-6">
                            <table class="min-w-full">
                                <thead>
                                    <tr class="bg-gray-50">
                                        <th class="py-3 px-4 text-left text-sm font-semibold">Area</th>
                                        <th class="py-3 px-4 text-left text-sm font-semibold">Current Status</th>
                                        <th class="py-3 px-4 text-left text-sm font-semibold">Planned Intervention</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200">
                                    <tr>
                                        <td class="py-3 px-4">Agriculture</td>
                                        <td class="py-3 px-4">Low productivity</td>
                                        <td class="py-3 px-4">Extension services & tools</td>
                                    </tr>
                                    <tr>
                                        <td class="py-3 px-4">SMEs</td>
                                        <td class="py-3 px-4">Limited capital</td>
                                        <td class="py-3 px-4">Micro-finance & training</td>
                                    </tr>
                                    <tr>
                                        <td class="py-3 px-4">Youth Employment</td>
                                        <td class="py-3 px-4">High unemployment</td>
                                        <td class="py-3 px-4">Skills & vocational programs</td>
                                    </tr>
                                    <tr>
                                        <td class="py-3 px-4">Markets</td>
                                        <td class="py-3 px-4">Poor facilities</td>
                                        <td class="py-3 px-4">Market upgrades</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <!-- 7. Challenges / Notes -->
                        <div class="bg-yellow-50 border-l-4 border-yellow-400 p-4 mb-6">
                            <p class="text-sm text-yellow-800">
                                <strong>Key Challenges:</strong> Limited access to finance, poor
                                infrastructure, low skills training, and market accessibility
                                constraints continue to affect economic growth in Wabag District.
                            </p>
                        </div>

                        <!-- Development Strategy -->
                        <div class="font-bold text-lg text-wabag-green border-b pb-2 mb-3">
                            Development Strategy
                        </div>
                        <ul class="list-disc pl-5 space-y-2 mb-6">
                            <li>Promote agriculture value chains</li>
                            <li>Support SMEs and informal businesses</li>
                            <li>Develop youth employment pathways</li>
                            <li>Improve market infrastructure</li>
                        </ul>

                    </div>
                </article>
            </div>

            <!-- ===================== SIDEBAR ===================== -->
            <div class="lg:w-1/3">
                <div class="space-y-6 sticky top-6">

                    <!-- 8. Sector Links -->
                    {{-- @include('public.sectoral-profile.partials.sidebar') --}}
                    <!-- Sectoral Profiles -->
                    <div class="bg-wabag-green/5 p-6 rounded-xl border border-wabag-green/20">
                        <h3 class="text-xl font-serif font-bold text-wabag-green mb-4">Sectoral Profile Links</h3>
                        <div class="space-y-3">
                            <a href="{{ route('sectoral-profile.health') }}" class="flex items-center {{ request()->routeIs('sectoral-profile.health') ? 'bg-yellow-50 border-yellow-200' : 'bg-white border-gray-200' }} p-3 rounded-lg border hover:border-yellow-400 transition group sector-link">
                                <div class="w-10 h-10 rounded-full bg-yellow-100 flex items-center justify-center mr-3 group-hover:bg-green-200 transition">
                                    <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="font-medium text-gray-800 group-hover:text-green-700 transition">Health Sector</h4>
                                    <p class="text-xs text-gray-500 mt-1">Healthcare infrastructure and services</p>
                                </div>
                            </a>
                            <a href="{{ route('sectoral-profile.education') }}" class="flex items-center {{ request()->routeIs('sectoral-profile.education') ? 'bg-green-50 border-wabag-green' : 'bg-white border-gray-200' }} p-3 rounded-lg border hover:border-wabag-green transition group sector-link">
                                <div class="w-10 h-10 rounded-full {{ request()->routeIs('sectoral-profile.education') ? 'bg-green-200' : 'bg-green-100' }} flex items-center justify-center mr-3 group-hover:bg-green-200 transition">
                                    <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0v6"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="font-medium {{ request()->routeIs('sectoral-profile.education') ? 'text-wabag-green' : 'text-gray-800' }} group-hover:text-wabag-green transition">Education Sector</h4>
                                    <p class="text-xs text-gray-500 mt-1">Schools and learning facilities</p>
                                </div>
                            </a>
                            <a href="{{ route('sectoral-profile.community-development') }}" class="flex items-center {{ request()->routeIs('sectoral-profile.community-development') ? 'bg-blue-50 border-blue-200' : 'bg-white border-gray-200' }} p-3 rounded-lg border hover:border-wabag-green transition group sector-link">
                                <div class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center mr-3 group-hover:bg-blue-200 transition">
                                    <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="font-medium text-gray-800 group-hover:text-wabag-green transition">Community Development</h4>
                                    <p class="text-xs text-gray-500 mt-1">Social programs and community initiatives</p>
                                </div>
                            </a>
                            <a href="{{ route('sectoral-profile.infrastructure') }}" class="flex items-center {{ request()->routeIs('sectoral-profile.infrastructure') ? 'bg-orange-50 border-orange-200' : 'bg-white border-gray-200' }} p-3 rounded-lg border hover:border-wabag-green transition group sector-link">
                                <div class="w-10 h-10 rounded-full bg-orange-100 flex items-center justify-center mr-3 group-hover:bg-orange-200 transition">
                                    <svg class="w-5 h-5 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="font-medium text-gray-800 group-hover:text-wabag-green transition">Infrastructure</h4>
                                    <p class="text-xs text-gray-500 mt-1">Roads, bridges and public facilities</p>
                                </div>
                            </a>
                            <a href="{{ route('sectoral-profile.economic-development') }}" class="flex items-center {{ request()->routeIs('sectoral-profile.economic-development') ? 'bg-purple-50 border-purple-200' : 'bg-white border-gray-200' }} p-3 rounded-lg border hover:border-wabag-green transition group sector-link">
                                <div class="w-10 h-10 rounded-full bg-purple-100 flex items-center justify-center mr-3 group-hover:bg-purple-200 transition">
                                    <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="font-medium text-gray-800 group-hover:text-wabag-green transition">Economic Development</h4>
                                    <p class="text-xs text-gray-500 mt-1">Business growth and employment</p>
                                </div>
                            </a>
                            {{-- Law & Justice --}}
                            <a href="{{ route('sectoral-profile.law-justice') }}"
                            class="flex items-center {{ request()->routeIs('sectoral-profile.law-justice') ? 'bg-red-50 border-red-200' : 'bg-white border-gray-200' }}
                                    p-3 rounded-lg border hover:border-red-400 transition group sector-link">
                                <div class="w-10 h-10 rounded-full bg-red-100 flex items-center justify-center mr-3 group-hover:bg-red-200 transition">
                                    <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 3l7 4v5c0 5-3.5 9-7 9s-7-4-7-9V7l7-4z"/>
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="font-medium text-gray-800 group-hover:text-red-700 transition">
                                        Law & Justice
                                    </h4>
                                    <p class="text-xs text-gray-500 mt-1">Peace, security and justice systems</p>
                                </div>
                            </a>

                            {{-- Environment & Climate --}}
                            <a href="{{ route('sectoral-profile.environment') }}"
                            class="flex items-center {{ request()->routeIs('sectoral-profile.environment') ? 'bg-teal-50 border-teal-200' : 'bg-white border-gray-200' }}
                                    p-3 rounded-lg border hover:border-teal-400 transition group sector-link">
                                <div class="w-10 h-10 rounded-full bg-teal-100 flex items-center justify-center mr-3 group-hover:bg-teal-200 transition">
                                    <svg class="w-5 h-5 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 3v18M4 12h16"/>
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="font-medium text-gray-800 group-hover:text-teal-700 transition">
                                        Environment & Climate
                                    </h4>
                                    <p class="text-xs text-gray-500 mt-1">Climate risk and disaster management</p>
                                </div>
                            </a>
                        </div>
                    </div>

                    <!-- 9. Quick Stats -->
                    <div class="bg-purple-50 p-6 rounded-xl border border-purple-200">
                        <h3 class="text-xl font-serif font-bold text-purple-800 mb-4">
                            Key Economic Stats
                        </h3>
                        <div class="space-y-3">
                            <div class="flex justify-between border-b pb-2">
                                <span>Agriculture Households</span>
                                <span class="font-semibold">70%+</span>
                            </div>
                            <div class="flex justify-between border-b pb-2">
                                <span>SMEs</span>
                                <span class="font-semibold">300+</span>
                            </div>
                            <div class="flex justify-between border-b pb-2">
                                <span>Youth Unemployment</span>
                                <span class="font-semibold">High</span>
                            </div>
                            <div class="flex justify-between">
                                <span>Markets</span>
                                <span class="font-semibold">10+</span>
                            </div>
                        </div>
                    </div>

                    <!-- 10. Contact -->
                    <div class="bg-gray-50 p-6 rounded-xl border border-gray-200">
                        <h3 class="text-xl font-serif font-bold text-wabag-green mb-4">Contact Economic Division</h3>
                        <div class="space-y-2 text-sm">
                            <div class="flex items-start">
                                <svg class="w-5 h-5 text-wabag-green mr-2 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                </svg>
                                <span>+675 123 4567</span>
                            </div>
                            <div class="flex items-start">
                                <svg class="w-5 h-5 text-wabag-green mr-2 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                </svg>
                                <span>economic@wabagdda.gov.pg</span>
                            </div>
                            <div class="flex items-start">
                                <svg class="w-5 h-5 text-wabag-green mr-2 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                                <span>Wabag District Headquarters, Enga Province</span>
                            </div>
                        </div>
                    </div>

                    <!-- 11. Resources -->
                    <div class="bg-gray-50 p-6 rounded-xl border border-gray-200">
                        <h3 class="text-xl font-serif font-bold text-wabag-green mb-4">
                            Resources
                        </h3>
                        <div class="space-y-3 text-sm">
                            <a href="#" class="text-wabag-green hover:underline">District Economic Plan</a>
                            <a href="#" class="text-wabag-green hover:underline">SME Support Guide</a>
                            <a href="#" class="text-wabag-green hover:underline">Market Development Policy</a>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</section>
@endsection
