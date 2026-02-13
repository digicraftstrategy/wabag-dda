@extends('layouts.public')

@section('title', 'Infrastructure Development Profile | Wabag DDA')

@section('content')
<section class="py-12 bg-white">
    <div class="container mx-auto px-4 lg:px-6 max-w-7xl">
        <div class="flex flex-col lg:flex-row gap-8">

            <!-- ================= MAIN CONTENT ================= -->
            <div class="lg:w-2/3">

                <!-- Breadcrumbs -->
                <nav class="flex mb-6" aria-label="Breadcrumb">
                    <ol class="inline-flex items-center space-x-1 md:space-x-2">
                        <li class="inline-flex items-center">
                            <a href="/" class="inline-flex items-center text-sm font-medium text-wabag-green hover:text-green-800 transition">
                                Home
                            </a>
                        </li>
                        <li class="flex items-center">
                            <span class="mx-2 text-gray-300">›</span>
                            <span class="text-sm font-medium text-gray-500">Sectoral Profiles</span>
                        </li>
                        <li class="flex items-center">
                            <span class="mx-2 text-gray-300">›</span>
                            <span class="text-sm font-medium text-gray-500">Infrastructure Development Profile</span>
                        </li>
                    </ol>
                </nav>

                <!-- Profile Card -->
                <article class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">

                    <!-- Header -->
                    <header class="px-6 pt-6 pb-4">
                        <span class="inline-block bg-orange-100 text-orange-700 text-xs font-semibold px-3 py-1 rounded-full mb-4 uppercase tracking-wider">
                            Infrastructure Sector
                        </span>
                        <h1 class="text-3xl lg:text-4xl font-serif font-bold text-wabag-black mb-3 leading-tight">
                            Infrastructure Development Profile
                        </h1>
                    </header>

                    <div class="px-6 pb-8 formatted-content text-gray-700">

                        <!-- Overview -->
                        <div class="font-bold text-2xl mt-6 mb-4 text-wabag-green">
                            SECTORAL DEVELOPMENT PROFILE
                        </div>

                        <div class="font-bold text-xl mt-5 mb-3 text-wabag-green">
                            Infrastructure Overview
                        </div>
                        <p class="mb-4 leading-relaxed">
                            Infrastructure development is a critical pillar of Wabag District’s socio-economic growth.
                            Investments focus on road connectivity, bridges, public buildings, utilities, and market
                            infrastructure to improve service delivery, mobility, and economic participation.
                        </p>

                        <!-- Roads & Transport -->
                        <div class="font-bold text-lg mt-6 mb-3 text-wabag-green border-b pb-2">
                            Roads and Transport Infrastructure
                        </div>
                        <p class="mb-4 leading-relaxed">
                            Most rural roads in Wabag District remain unsealed, with accessibility heavily affected
                            during wet seasons. Priority road links connect Wabag town to LLGs, markets, schools,
                            and health facilities. DSIP-funded sealing and maintenance programs are ongoing.
                        </p>

                        <!-- Stats Grid -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                            <div class="bg-orange-50 p-4 rounded-lg border border-orange-200">
                                <div class="text-sm font-semibold text-orange-700 mb-1">Road Network (km)</div>
                                <div class="text-2xl font-bold">350+</div>
                            </div>
                            <div class="bg-orange-50 p-4 rounded-lg border border-orange-200">
                                <div class="text-sm font-semibold text-orange-700 mb-1">Sealed Roads</div>
                                <div class="text-2xl font-bold">15%</div>
                            </div>
                            <div class="bg-orange-50 p-4 rounded-lg border border-orange-200">
                                <div class="text-sm font-semibold text-orange-700 mb-1">Major Bridges</div>
                                <div class="text-2xl font-bold">22</div>
                            </div>
                            <div class="bg-orange-50 p-4 rounded-lg border border-orange-200">
                                <div class="text-sm font-semibold text-orange-700 mb-1">Rural Access Coverage</div>
                                <div class="text-2xl font-bold">Moderate</div>
                            </div>
                        </div>

                        <!-- Public Buildings -->
                        <div class="font-bold text-lg mt-6 mb-3 text-wabag-green border-b pb-2">
                            Public Buildings and Facilities
                        </div>
                        <p class="mb-4 leading-relaxed">
                            Public infrastructure includes schools, health centers, district offices,
                            police facilities, markets, and staff housing. Many facilities require
                            rehabilitation due to age, weather exposure, and population growth.
                        </p>

                        <!-- Utilities -->
                        <div class="font-bold text-lg mt-6 mb-3 text-wabag-green border-b pb-2">
                            Utilities and Services
                        </div>
                        <p class="mb-4 leading-relaxed">
                            Electricity supply remains limited outside Wabag town. Water and sanitation
                            infrastructure varies widely, with rural communities relying on natural sources.
                            Urban growth is increasing pressure on existing utility systems.
                        </p>

                        <!-- Table -->
                        <div class="font-semibold text-lg mt-6 mb-2 text-gray-700">
                            Table: Key Infrastructure Assets
                        </div>
                        <div class="overflow-x-auto mb-6">
                            <table class="min-w-full">
                                <thead>
                                    <tr class="bg-gray-50">
                                        <th class="py-3 px-4 text-left text-sm font-semibold border-b">Asset Type</th>
                                        <th class="py-3 px-4 text-sm font-semibold border-b">Quantity</th>
                                        <th class="py-3 px-4 text-sm font-semibold border-b">Condition</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y">
                                    <tr>
                                        <td class="py-3 px-4">District Roads</td>
                                        <td class="py-3 px-4">350 km</td>
                                        <td class="py-3 px-4">Fair</td>
                                    </tr>
                                    <tr>
                                        <td class="py-3 px-4">Bridges</td>
                                        <td class="py-3 px-4">22</td>
                                        <td class="py-3 px-4">Mixed</td>
                                    </tr>
                                    <tr>
                                        <td class="py-3 px-4">Markets</td>
                                        <td class="py-3 px-4">6</td>
                                        <td class="py-3 px-4">Needs upgrade</td>
                                    </tr>
                                    <tr>
                                        <td class="py-3 px-4">Government Buildings</td>
                                        <td class="py-3 px-4">18</td>
                                        <td class="py-3 px-4">Fair</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <!-- Challenges -->
                        <div class="bg-orange-50 border-l-4 border-orange-400 p-4 mb-6">
                            <p class="text-sm text-orange-800">
                                <strong>Key Challenges:</strong> difficult terrain, high construction costs,
                                limited maintenance funding, climate impact, and contractor capacity constraints.
                            </p>
                        </div>

                    </div>
                </article>
            </div>

            <!-- ================= SIDEBAR ================= -->
            <div class="lg:w-1/3">
                <div class="space-y-6 sticky top-6">

                    <!-- Sector Links -->
                    {{-- @include('partials.sectoral-links', ['active' => 'infrastructure']) --}}
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

                    <!-- Quick Stats -->
                    <div class="bg-wabag-green/5 p-6 rounded-xl border border-wabag-green/20">
                        <h3 class="text-xl font-serif font-bold text-wabag-green mb-4">Key Infrastructure Stats</h3>
                        <div class="space-y-3 text-sm">
                            <div class="flex justify-between"><span>Road Network</span><span class="font-semibold">350 km</span></div>
                            <div class="flex justify-between"><span>Sealed Roads</span><span class="font-semibold">15%</span></div>
                            <div class="flex justify-between"><span>Bridges</span><span class="font-semibold">22</span></div>
                            <div class="flex justify-between"><span>Markets</span><span class="font-semibold">6</span></div>
                        </div>
                    </div>

                    <!-- Contact -->
                    {{-- <div class="bg-gray-50 p-6 rounded-xl border border-gray-200">
                        <h3 class="text-xl font-serif font-bold text-wabag-green mb-4">Contact Works Division</h3>
                        <p class="text-sm">Wabag District Works Office<br>Enga Province</p>
                    </div> --}}
                    <!-- Contact -->
                    <div class="bg-gray-50 p-6 rounded-xl border border-gray-200">
                        <h3 class="text-xl font-serif font-bold text-wabag-green mb-4">Contact Infrastructure Division</h3>
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
                                <span>education@wabagdda.gov.pg</span>
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

                    <!-- Resources -->
                    <div class="bg-gray-50 p-6 rounded-xl border border-gray-200">
                        <h3 class="text-xl font-serif font-bold text-wabag-green mb-4">Resources</h3>
                        <ul class="text-sm space-y-2">
                            <li>District Infrastructure Plan</li>
                            <li>DSIP Works Program</li>
                            <li>Road Maintenance Reports</li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
@endsection
