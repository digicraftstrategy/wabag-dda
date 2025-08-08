@extends('layouts.public')
@section('title', 'Community Development Sector | Wabag DDA')
@section('content')
<section class="py-12 bg-white">
    <div class="container mx-auto px-4 lg:px-6 max-w-7xl">
        <div class="flex flex-col lg:flex-row gap-8">
            <!-- Main Content (2/3 width) -->
            <div class="lg:w-2/3">
                <!-- Breadcrumbs -->
                <nav class="flex mb-6" aria-label="Breadcrumb">
                    <ol class="inline-flex items-center space-x-1 md:space-x-2">
                        <li class="inline-flex items-center">
                            <a href="/" class="inline-flex items-center text-sm font-medium text-wabag-green hover:text-green-800 transition">
                                <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path></svg>
                                Home
                            </a>
                        </li>
                        <li>
                            <div class="flex items-center">
                                <svg class="w-5 h-5 text-gray-300" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                                <a href="#" class="ml-2 text-sm font-medium text-wabag-green hover:text-green-800 transition">Sectoral Profiles</a>
                            </div>
                        </li>
                        <li aria-current="page">
                            <div class="flex items-center">
                                <svg class="w-5 h-5 text-gray-300" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                                <span class="ml-2 text-sm font-medium text-gray-500">Community Development Profile</span>
                            </div>
                        </li>
                    </ol>
                </nav>

                <!-- Sectoral Profile Content -->
                <article class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
                    <header class="px-6 pt-6 pb-4">
                        <span class="inline-block bg-blue-100 text-blue-800 text-xs font-semibold px-3 py-1 rounded-full mb-4 uppercase tracking-wider">
                            Community Development
                        </span>
                        <h1 class="text-3xl lg:text-4xl font-serif font-bold text-wabag-black mb-3 leading-tight">Community Development Profile</h1>
                    </header>

                    <div class="px-6 pb-8">
                        <div class="formatted-content text-gray-700">
                            <!-- Community Development Status -->
                            <div class="font-bold text-2xl mt-6 mb-4 text-wabag-green">SECTORAL DEVELOPMENT PROFILE</div>
                            <div class="font-bold text-xl mt-5 mb-3 text-wabag-green">Community Development Status</div>
                            <div class="mb-4 leading-relaxed">
                                Community-based organizations like churches, sports organizations, and their activities have always been active in Wabag with or without government support. Churches have had their presence in Enga for over 50 years and were the first to bring tangible services to our people. While most receive some government support, it has not been consistent or organized, except for Rugby League which has been consistently funded by the Enga Provincial Government for over 20 years.
                            </div>
                            <div class="mb-4 leading-relaxed">
                                The Wabag District Development Authority plans to bring more coordination and organization to this sector as these groups play important roles in society. According to the WHO's definition, health is not merely the absence of illness but rather a complete state of SOCIAL, MENTAL, and SPIRITUAL wellbeing. Therefore, as a district we would like to address this in a more organized and structured way as these organizations contribute greatly to peace and good order in society.
                            </div>

                            <!-- Community Development Programs -->
                            <div class="font-bold text-lg mt-6 mb-3 text-wabag-green border-b pb-2">Community Development Programs</div>

                            <!-- Table 10 -->
                            <div class="font-semibold text-lg mt-6 mb-2 text-gray-700">Table 10: Statistics on community development activities in the district</div>
                            <div class="overflow-x-auto mb-6">
                                <table class="min-w-full">
                                    <thead>
                                        <tr class="bg-gray-50">
                                            <th class="py-3 px-4 text-left text-sm font-semibold text-gray-700 border-b">No.</th>
                                            <th class="py-3 px-4 text-left text-sm font-semibold text-gray-700 border-b">Type of Group</th>
                                            <th class="py-3 px-4 text-left text-sm font-semibold text-gray-700 border-b">Total</th>
                                            <th class="py-3 px-4 text-left text-sm font-semibold text-gray-700 border-b">Programs/Activities</th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-200">
                                        <tr>
                                            <td class="py-3 px-4 text-sm font-medium text-gray-900">1</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">Youth Groups</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">-</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">Community services/spiritual</td>
                                        </tr>
                                        <tr>
                                            <td class="py-3 px-4 text-sm font-medium text-gray-900">2</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">Women Groups</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">-</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">Community services/credit Schemes</td>
                                        </tr>
                                        <tr>
                                            <td class="py-3 px-4 text-sm font-medium text-gray-900">3</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">Church/Religion Groups</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">-</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">Spiritual services/Counseling</td>
                                        </tr>
                                        <tr>
                                            <td class="py-3 px-4 text-sm font-medium text-gray-900">4</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">Sports Associations</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">-</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">Recreational</td>
                                        </tr>
                                        <tr>
                                            <td class="py-3 px-4 text-sm font-medium text-gray-900">5</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">Other NGO Groups</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">-</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">Various activities</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <!-- Key Focus Areas -->
                            <div class="font-bold text-lg mt-6 mb-3 text-wabag-green border-b pb-2">Key Focus Areas</div>
                            <div class="mb-4 leading-relaxed">
                                The Wabag District Development Authority will focus on the following key areas in community development:
                            </div>
                            <ul class="list-disc pl-5 mb-4 space-y-2">
                                <li><strong>Youth Engagement:</strong> Supporting youth groups and programs that provide skills training and recreational activities</li>
                                <li><strong>Women's Empowerment:</strong> Facilitating women's groups and credit schemes to improve livelihoods</li>
                                <li><strong>Religious Organizations:</strong> Partnering with churches to deliver spiritual services and counseling</li>
                                <li><strong>Sports Development:</strong> Continuing support for sports associations to promote recreation and unity</li>
                                <li><strong>NGO Collaboration:</strong> Working with various NGOs to implement community development programs</li>
                            </ul>

                            <!-- Strategic Approach -->
                            <div class="font-bold text-lg mt-6 mb-3 text-wabag-green border-b pb-2">Strategic Approach</div>
                            <div class="mb-4 leading-relaxed">
                                Our approach to community development includes:
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                                <div class="bg-blue-100 p-4 rounded-lg border border-blue-200">
                                    <div class="text-sm text-blue-800 font-semibold mb-1">Coordination</div>
                                    <div class="text-gray-700">Better coordination between government and community organizations</div>
                                </div>
                                <div class="bg-blue-100 p-4 rounded-lg border border-blue-200">
                                    <div class="text-sm text-blue-800 font-semibold mb-1">Capacity Building</div>
                                    <div class="text-gray-700">Training and support for community group leaders</div>
                                </div>
                                <div class="bg-blue-100 p-4 rounded-lg border border-blue-200">
                                    <div class="text-sm text-blue-800 font-semibold mb-1">Resource Allocation</div>
                                    <div class="text-gray-700">More consistent funding and resource allocation</div>
                                </div>
                                <div class="bg-blue-100 p-4 rounded-lg border border-blue-200">
                                    <div class="text-sm text-blue-800 font-semibold mb-1">Monitoring & Evaluation</div>
                                    <div class="text-gray-700">Regular assessment of community programs</div>
                                </div>
                            </div>

                            <!-- Expected Outcomes -->
                            <div class="font-bold text-lg mt-6 mb-3 text-wabag-green border-b pb-2">Expected Outcomes</div>
                            <div class="mb-4 leading-relaxed">
                                Through these community development initiatives, we expect to achieve:
                            </div>
                            <ul class="list-disc pl-5 mb-4 space-y-2">
                                <li>Increased community participation in development activities</li>
                                <li>Improved social cohesion and reduced law and order issues</li>
                                <li>Enhanced spiritual and mental wellbeing of community members</li>
                                <li>More effective use of community resources</li>
                                <li>Stronger partnerships between government and civil society</li>
                            </ul>
                        </div>
                    </div>
                </article>
            </div>

            <!-- Sidebar (1/3 width) -->
            <div class="lg:w-1/3">
                <div class="space-y-6 sticky top-6">
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
                            <a href="#" class="flex items-center {{ request()->routeIs('sectoral-profile.infrastructure') ? 'bg-orange-50 border-orange-200' : 'bg-white border-gray-200' }} p-3 rounded-lg border hover:border-wabag-green transition group sector-link">
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
                            <a href="#" class="flex items-center {{ request()->routeIs('sectoral-profile.economic-development') ? 'bg-purple-50 border-purple-200' : 'bg-white border-gray-200' }} p-3 rounded-lg border hover:border-wabag-green transition group sector-link">
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
                        </div>
                    </div>

                    <!-- Quick Stats -->
                    <div class="bg-blue-50 p-6 rounded-xl border border-blue-200">
                        <h3 class="text-xl font-serif font-bold text-blue-800 mb-4">Community Development Stats</h3>
                        <div class="space-y-3">
                            <div class="flex justify-between border-b pb-2">
                                <span class="text-gray-600">Active Youth Groups</span>
                                <span class="font-semibold">15+</span>
                            </div>
                            <div class="flex justify-between border-b pb-2">
                                <span class="text-gray-600">Women's Groups</span>
                                <span class="font-semibold">20+</span>
                            </div>
                            <div class="flex justify-between border-b pb-2">
                                <span class="text-gray-600">Church Groups</span>
                                <span class="font-semibold">10+</span>
                            </div>
                            <div class="flex justify-between border-b pb-2">
                                <span class="text-gray-600">Sports Associations</span>
                                <span class="font-semibold">5+</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">NGO Partners</span>
                                <span class="font-semibold">8+</span>
                            </div>
                        </div>
                    </div>

                    <!-- Contact -->
                    <div class="bg-gray-50 p-6 rounded-xl border border-gray-200">
                        <h3 class="text-xl font-serif font-bold text-wabag-green mb-4">Contact Community Development</h3>
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
                                <span>community@wabagdda.gov.pg</span>
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
                        <div class="space-y-3">
                            <a href="#" class="flex items-center text-wabag-green hover:text-green-800 group transition">
                                <svg class="w-5 h-5 mr-2 text-gray-400 group-hover:text-wabag-green transition" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                                Community Development Guidelines
                            </a>
                            <a href="#" class="flex items-center text-wabag-green hover:text-green-800 group transition">
                                <svg class="w-5 h-5 mr-2 text-gray-400 group-hover:text-wabag-green transition" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                                Youth Group Registration Form
                            </a>
                            <a href="#" class="flex items-center text-wabag-green hover:text-green-800 group transition">
                                <svg class="w-5 h-5 mr-2 text-gray-400 group-hover:text-wabag-green transition" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                                Women's Credit Scheme Info
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@push('styles')
<style>
    .formatted-content h2,
    .formatted-content h3,
    .formatted-content h4 {
        color: #065f46;
    }

    .formatted-content table {
        border-radius: 0.5rem;
        overflow: hidden;
        box-shadow: 0 1px 3px rgba(0,0,0,0.05);
    }

    .formatted-content th {
        background-color: #f0fdf4;
        font-weight: 600;
        color: #065f46;
    }

    .formatted-content tr:nth-child(even) {
        background-color: #f9fafb;
    }

    .formatted-content tr:hover {
        background-color: #f0fdf4;
    }

    .sector-link {
        transition: all 0.3s ease;
    }
    .sector-link:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 6px rgba(0,0,0,0.05);
    }

    /* Custom styles for sector links */
    .sector-link {
        transition: all 0.3s ease;
    }
    .sector-link:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 6px rgba(0,0,0,0.05);
    }
</style>
@endpush
