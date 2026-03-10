@extends('layouts.public')

@section('title', 'Environment & Climate | Wabag DDA')

@section('content')
<section class="py-12 bg-white sector-page">
    <div class="container mx-auto px-4 lg:px-6 max-w-7xl">
        <div class="flex flex-col lg:flex-row gap-8">

            <!-- MAIN CONTENT -->
            <div class="lg:w-2/3">

                <!-- 1. Breadcrumbs -->
                <nav class="flex mb-6 public-breadcrumb">
                    <ol class="inline-flex items-center space-x-2 text-sm">
                        <li><a href="/" class="text-wabag-green hover:underline">Home</a></li>
                        <li class="text-gray-400">/</li>
                        <li class="text-gray-500">Sectoral Profiles</li>
                        <li class="text-gray-400">/</li>
                        <li class="text-gray-600 font-medium">Environment & Climate</li>
                    </ol>
                </nav>

                <article class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">

                    <!-- 2. Sector badge + title -->
                    <header class="px-6 pt-6 pb-4">
                        <span class="inline-block bg-green-100 text-green-700 text-xs font-semibold px-3 py-1 rounded-full mb-4 uppercase tracking-wider">
                            Environment & Climate Sector
                        </span>
                        <h1 class="text-3xl lg:text-4xl font-serif font-bold text-wabag-black">
                            Environment, Climate & Disaster Risk Profile
                        </h1>
                    </header>

                    <div class="px-6 pb-8 text-gray-700">

                        <!-- 3. Sector overview -->
                        <div class="font-bold text-2xl mb-4 text-wabag-green">
                            SECTORAL DEVELOPMENT PROFILE
                        </div>
                        <p class="mb-6 leading-relaxed">
                            Wabag District is highly vulnerable to landslides, flooding, and environmental
                            degradation. Climate change impacts are increasingly affecting infrastructure,
                            food security, and livelihoods.
                        </p>

                        <!-- 4. Sub-sections -->
                        <div class="font-bold text-lg border-b pb-2 mb-3 text-wabag-green">
                            Environmental Management
                        </div>
                        <p class="mb-4 leading-relaxed">
                            Unsustainable land use practices and deforestation have increased soil erosion
                            and environmental degradation across the district.
                        </p>

                        <div class="font-bold text-lg border-b pb-2 mb-3 text-wabag-green">
                            Climate Change & Disaster Risk
                        </div>
                        <p class="mb-4 leading-relaxed">
                            Increased rainfall intensity has resulted in frequent landslides and flooding,
                            damaging roads, schools, and health facilities.
                        </p>

                        <!-- 5. Stats grid -->
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
                            <div class="bg-green-100 p-4 rounded-lg border border-green-200">
                                <div class="text-sm font-semibold text-green-700">High Risk Areas</div>
                                <div class="text-2xl font-bold">8+</div>
                            </div>
                            <div class="bg-green-100 p-4 rounded-lg border border-green-200">
                                <div class="text-sm font-semibold text-green-700">Landslides</div>
                                <div class="text-2xl font-bold">Frequent</div>
                            </div>
                            <div class="bg-green-100 p-4 rounded-lg border border-green-200">
                                <div class="text-sm font-semibold text-green-700">Disaster Plans</div>
                                <div class="text-2xl font-bold">Limited</div>
                            </div>
                        </div>

                        <!-- 6. Tables -->
                        <div class="font-semibold text-lg mb-2">
                            Environmental Risk Summary
                        </div>
                        <div class="overflow-x-auto mb-6">
                            <table class="min-w-full">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th class="py-3 px-4 text-left text-sm font-semibold">Risk</th>
                                        <th class="py-3 px-4 text-left text-sm font-semibold">Impact</th>
                                        <th class="py-3 px-4 text-left text-sm font-semibold">Mitigation</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y">
                                    <tr>
                                        <td class="py-3 px-4">Landslides</td>
                                        <td class="py-3 px-4">High</td>
                                        <td class="py-3 px-4">Slope stabilization</td>
                                    </tr>
                                    <tr>
                                        <td class="py-3 px-4">Flooding</td>
                                        <td class="py-3 px-4">Moderate</td>
                                        <td class="py-3 px-4">Drainage improvement</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <!-- 7. Challenges -->
                        <div class="bg-green-50 border-l-4 border-green-400 p-4">
                            <p class="text-sm text-green-800">
                                <strong>Challenges:</strong> Limited disaster funding, lack of early warning
                                systems, and low community preparedness.
                            </p>
                        </div>

                    </div>
                </article>
            </div>

            <!-- SIDEBAR -->
            <div class="lg:w-1/3 space-y-6">

                <!-- 8. Sector links -->
                <div class="bg-wabag-green/5 p-6 rounded-xl border border-wabag-green/20">
                    <h3 class="text-xl font-serif font-bold text-wabag-green mb-4">
                        Sectoral Profile Links
                    </h3>

                    <div class="space-y-3">

                        {{-- Health --}}
                        <a href="{{ route('sectoral-profile.health') }}"
                        class="flex items-center {{ request()->routeIs('sectoral-profile.health') ? 'bg-yellow-50 border-yellow-200' : 'bg-white border-gray-200' }}
                                p-3 rounded-lg border hover:border-yellow-400 transition group sector-link">
                            <div class="w-10 h-10 rounded-full bg-yellow-100 flex items-center justify-center mr-3 group-hover:bg-green-200 transition">
                                <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                                </svg>
                            </div>
                            <div>
                                <h4 class="font-medium text-gray-800 group-hover:text-green-700 transition">Health Sector</h4>
                                <p class="text-xs text-gray-500 mt-1">Healthcare infrastructure and services</p>
                            </div>
                        </a>

                        {{-- Education --}}
                        <a href="{{ route('sectoral-profile.education') }}"
                        class="flex items-center {{ request()->routeIs('sectoral-profile.education') ? 'bg-green-50 border-wabag-green' : 'bg-white border-gray-200' }}
                                p-3 rounded-lg border hover:border-wabag-green transition group sector-link">
                            <div class="w-10 h-10 rounded-full {{ request()->routeIs('sectoral-profile.education') ? 'bg-green-200' : 'bg-green-100' }}
                                        flex items-center justify-center mr-3 group-hover:bg-green-200 transition">
                                <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 14l9-5-9-5-9 5 9 5z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 14v6"/>
                                </svg>
                            </div>
                            <div>
                                <h4 class="font-medium {{ request()->routeIs('sectoral-profile.education') ? 'text-wabag-green' : 'text-gray-800' }}
                                        group-hover:text-wabag-green transition">
                                    Education Sector
                                </h4>
                                <p class="text-xs text-gray-500 mt-1">Schools and learning facilities</p>
                            </div>
                        </a>

                        {{-- Community Development --}}
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

                        {{-- Infrastructure --}}
                        <a href="{{ route('sectoral-profile.infrastructure') }}"
                        class="flex items-center {{ request()->routeIs('sectoral-profile.infrastructure') ? 'bg-orange-50 border-orange-200' : 'bg-white border-gray-200' }}
                                p-3 rounded-lg border hover:border-wabag-green transition group sector-link">
                            <div class="w-10 h-10 rounded-full bg-orange-100 flex items-center justify-center mr-3 group-hover:bg-orange-200 transition">
                                <svg class="w-5 h-5 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13 10V3L4 14h7v7l9-11h-7z"/>
                                </svg>
                            </div>
                            <div>
                                <h4 class="font-medium text-gray-800 group-hover:text-wabag-green transition">
                                    Infrastructure
                                </h4>
                                <p class="text-xs text-gray-500 mt-1">Roads, bridges and public facilities</p>
                            </div>
                        </a>

                        {{-- Economic Development --}}
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


                <!-- 9. Quick stats -->
                <div class="bg-green-50 p-6 rounded-xl border border-green-200">
                    <h3 class="text-lg font-bold text-green-700 mb-3">Quick Stats</h3>
                    <div class="space-y-2 text-sm">
                        <div class="flex justify-between"><span>Risk Areas</span><span class="font-semibold">8+</span></div>
                        <div class="flex justify-between"><span>Landslides</span><span class="font-semibold">Frequent</span></div>
                        <div class="flex justify-between"><span>Disaster Plans</span><span class="font-semibold">Limited</span></div>
                    </div>
                </div>

                <!-- 10. Contact block -->
                <div class="bg-gray-50 p-6 rounded-xl border">
                    <h3 class="text-lg font-bold text-wabag-green mb-3">Contact – Environment</h3>
                    <p class="text-sm">Wabag District Administration<br>Enga Province</p>
                </div>

                <!-- 11. Resources -->
                <div class="bg-gray-50 p-6 rounded-xl border">
                    <h3 class="text-lg font-bold text-wabag-green mb-3">Resources</h3>
                    <ul class="text-sm space-y-2">
                        <li>PNG Climate Change Policy</li>
                        <li>Provincial Disaster Plan</li>
                        <li>Environmental Sustainability Guidelines</li>
                    </ul>
                </div>

            </div>
        </div>
    </div>
</section>
@endsection
