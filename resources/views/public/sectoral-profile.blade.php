@extends('layouts.public')

@section('title', 'Education Status | Wabag DDA')

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
                                <span class="ml-2 text-sm font-medium text-gray-500">Educational Development Profile</span>
                            </div>
                        </li>
                    </ol>
                </nav>

                <!-- Sectoral Profile Content -->
                <article class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
                    <header class="px-6 pt-6 pb-4">
                        <span class="inline-block bg-yellow-100 text-green text-xs font-semibold px-3 py-1 rounded-full mb-4 uppercase tracking-wider">
                            Education Sector
                        </span>
                        <h1 class="text-3xl lg:text-4xl font-serif font-bold text-wabag-black mb-3 leading-tight">Education Development Profile</h1>
                    </header>

                    <div class="px-6 pb-8">
                        <div class="formatted-content text-gray-700">
                            <!-- Education Status -->
                            <div class="font-bold text-2xl mt-6 mb-4 text-wabag-green">SECTORAL DEVELOPMENT PROFILE</div>
                            <div class="font-bold text-xl mt-5 mb-3 text-wabag-green">Education Status</div>
                            <div class="mb-4 leading-relaxed">
                                Enga through its Free Education policy has made huge strides in Education in Papua New Guinea. Wabag District, being centrally located, has benefited significantly as most educational institutions in the province are located in this district. Wabag has the most educational infrastructures as it is the provincial capital.
                            </div>

                            <!-- Basic Education -->
                            <div class="font-bold text-lg mt-6 mb-3 text-wabag-green border-b pb-2">Basic Education</div>
                            <div class="mb-4 leading-relaxed">
                                Data availability and collection remains a significant challenge for schools in Wabag and Enga province. The figures presented here are from 2010, with plans for a comprehensive demographic database project underway with assistance from tertiary students.
                            </div>

                            <!-- Stats Grid -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                                <div class="bg-yellow-100 p-4 rounded-lg border border-yellow-200">
                                    <div class="text-sm text-green-800 font-semibold mb-1">Adult Literacy Rate</div>
                                    <div class="text-2xl font-bold">30%</div>
                                    <div class="text-xs text-gray-500 mt-1">One of the lowest in the nation</div>
                                </div>
                                <div class="bg-yellow-100 p-4 rounded-lg border border-yellow-200">
                                    <div class="text-sm text-green-800 font-semibold mb-1">Enrollment Rate</div>
                                    <div class="text-2xl font-bold">66%</div>
                                </div>
                                <div class="bg-yellow-100 p-4 rounded-lg border border-yellow-200">
                                    <div class="text-sm text-green-800 font-semibold mb-1">Primary Drop-out Rate</div>
                                    <div class="text-2xl font-bold">40%</div>
                                </div>
                                <div class="bg-yellow-100 p-4 rounded-lg border border-yellow-200">
                                    <div class="text-sm text-green-800 font-semibold mb-1">Secondary Retention</div>
                                    <div class="text-2xl font-bold">52%</div>
                                    <div class="text-xs text-gray-500 mt-1">Second only behind NCD</div>
                                </div>
                                <div class="bg-yellow-100 p-4 rounded-lg border border-yellow-200 md:col-span-2">
                                    <div class="text-sm text-green-800 font-semibold mb-1">Gender Parity</div>
                                    <div class="text-2xl font-bold">Nearly 1:1</div>
                                    <div class="text-xs text-gray-500 mt-1">One of the best in the country (Female at 46%)</div>
                                </div>
                            </div>

                            <!-- Education Staff -->
                            <div class="font-bold text-lg mt-6 mb-3 text-wabag-green border-b pb-2">Education Staff and Support Staff</div>
                            <div class="mb-4 leading-relaxed">
                                Current information on staff numbers and qualifications is being gathered. Most schools are staffed except those in Maramuni, which are closed for various reasons. Teacher appointments are made by the Provincial Government with political affiliation as a main determining factor, leading to nepotism and bias that has reduced school quality - as acknowledged in the Provincial Education Development Plan.
                            </div>

                            <!-- Infrastructure Section -->
                            <div class="font-bold text-lg mt-6 mb-3 text-wabag-green border-b pb-2">Education Infrastructure and Facilities</div>
                            <div class="mb-4 leading-relaxed">
                                The district maintains an equal female-to-male ratio (1:1). Most Elementary and Primary Schools are understaffed and lack adequate staff accommodation.
                            </div>

                            <!-- Table 5 -->
                            <div class="font-semibold text-lg mt-6 mb-2 text-gray-700">Table 5: Statistics on education facilities in the district</div>
                            <div class="overflow-x-auto mb-6">
                                <table class="min-w-full">
                                    <thead>
                                        <tr class="bg-gray-50">
                                            <th class="py-3 px-4 text-left text-sm font-semibold text-gray-700 border-b">Level of school</th>
                                            <th colspan="3" class="py-3 px-4 text-center text-sm font-semibold text-gray-700 border-b">Wabag district</th>
                                            <th colspan="2" class="py-3 px-4 text-center text-sm font-semibold text-gray-700 border-b">Sex</th>
                                            <th colspan="2" class="py-3 px-4 text-center text-sm font-semibold text-gray-700 border-b">No. of Staff</th>
                                        </tr>
                                        <tr class="bg-gray-50">
                                            <th class="py-2 px-4 border-b"></th>
                                            <th class="py-2 px-4 text-sm font-medium text-gray-700 border-b">Total</th>
                                            <th class="py-2 px-4 text-sm font-medium text-gray-700 border-b">Govt.</th>
                                            <th class="py-2 px-4 text-sm font-medium text-gray-700 border-b">Others</th>
                                            <th class="py-2 px-4 text-sm font-medium text-gray-700 border-b">Female</th>
                                            <th class="py-2 px-4 text-sm font-medium text-gray-700 border-b">Male</th>
                                            <th class="py-2 px-4 text-sm font-medium text-gray-700 border-b">Current</th>
                                            <th class="py-2 px-4 text-sm font-medium text-gray-700 border-b">required</th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-200">
                                        <tr>
                                            <td class="py-3 px-4 text-sm font-medium text-gray-900">Elementary</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">73</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">71</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">02</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">3062</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">2327</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">257</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">65</td>
                                        </tr>
                                        <tr>
                                            <td class="py-3 px-4 text-sm font-medium text-gray-900">Community</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">13</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">09</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">04</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">500</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">1062</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">50</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">-</td>
                                        </tr>
                                        <tr>
                                            <td class="py-3 px-4 text-sm font-medium text-gray-900">Primary</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">12</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">06</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">06</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">2405</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">3001</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">200</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">-</td>
                                        </tr>
                                        <tr>
                                            <td class="py-3 px-4 text-sm font-medium text-gray-900">High school</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">02</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">01</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">00</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">-</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">-</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">-</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">-</td>
                                        </tr>
                                        <tr>
                                            <td class="py-3 px-4 text-sm font-medium text-gray-900">Secondary</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">02</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">01</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">01</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">-</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">-</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">-</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">-</td>
                                        </tr>
                                        <tr>
                                            <td class="py-3 px-4 text-sm font-medium text-gray-900">Tertiary</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">04</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">02</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">02</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">-</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">-</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">-</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">-</td>
                                        </tr>
                                        <tr>
                                            <td class="py-3 px-4 text-sm font-medium text-gray-900">Technical/Vocational</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">0</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">0</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">0</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">0</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">0</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">0</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">0</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="bg-yellow-50 border-l-4 border-yellow-400 p-4 mb-6">
                                <div class="flex">
                                    <div class="text-yellow-700 text-sm">
                                        <p><span class="font-semibold">NB:</span><i> The two technical/vocational colleges that went into non-existent are Pupang and Pina
Vocational Centres. They need to be looked into and revived soon, funding derived from
DSIP, PIP-GoPNG & Education Department or from Donors (development partners)</i></p>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-4 leading-relaxed">
                                Most Primary and Secondary schools in Wabag district have permanent classrooms. Over 50% of staff houses have permanent buildings.
                            </div>

                            <!-- Table 6 -->
                            <div class="font-semibold text-lg mt-6 mb-2 text-gray-700">Table 6: Education facilities in the district</div>
                            <div class="overflow-x-auto mb-6">
                                <table class="min-w-full">
                                    <thead>
                                        <tr class="bg-gray-50">
                                            <th rowspan="2" class="py-3 px-4 text-left text-sm font-semibold text-gray-700 border-b">Name & type of school</th>
                                            <th colspan="4" class="py-3 px-4 text-center text-sm font-semibold text-gray-700 border-b">Classrooms</th>
                                            <th colspan="4" class="py-3 px-4 text-center text-sm font-semibold text-gray-700 border-b">Teachers houses</th>
                                        </tr>
                                        <tr class="bg-gray-50">
                                            <th class="py-2 px-4 text-sm font-medium text-gray-700 border-b">perm.</th>
                                            <th class="py-2 px-4 text-sm font-medium text-gray-700 border-b">semi.</th>
                                            <th class="py-2 px-4 text-sm font-medium text-gray-700 border-b">bush.</th>
                                            <th class="py-2 px-4 text-sm font-medium text-gray-700 border-b">Total</th>
                                            <th class="py-2 px-4 text-sm font-medium text-gray-700 border-b">perm.</th>
                                            <th class="py-2 px-4 text-sm font-medium text-gray-700 border-b">semi.</th>
                                            <th class="py-2 px-4 text-sm font-medium text-gray-700 border-b">bush.</th>
                                            <th class="py-2 px-4 text-sm font-medium text-gray-700 border-b">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-200">
                                        <tr>
                                            <td class="py-3 px-4 text-sm font-medium text-gray-900">Elementary</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">102</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">72</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">57</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">171</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">00</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">00</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">00</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">00</td>
                                        </tr>
                                        <tr>
                                            <td class="py-3 px-4 text-sm font-medium text-gray-900">Community</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">12</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">26</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">26</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">64</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">06</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">12</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">34</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">52</td>
                                        </tr>
                                        <tr>
                                            <td class="py-3 px-4 text-sm font-medium text-gray-900">Primary</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">12</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">42</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">05</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">59</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">00</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">00</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">00</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">00</td>
                                        </tr>
                                        <tr>
                                            <td class="py-3 px-4 text-sm font-medium text-gray-900">High School</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">30</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">07</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">00</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">37</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">18</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">05</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">00</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">23</td>
                                        </tr>
                                        <tr>
                                            <td class="py-3 px-4 text-sm font-medium text-gray-900">Secondary</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">34</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">00</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">00</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">34</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">54</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">00</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">00</td>
                                            <td class="py-3 px-4 text-sm text-gray-700">54</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <!-- Division Info -->
                            <div class="font-bold text-lg mt-6 mb-3 text-wabag-green border-b pb-2">Division of Education – Wabag District</div>
                            <div class="mb-4 leading-relaxed">
                                The following tables summarize the total number of institutions in the Wabag Electorate and their current status.
                            </div>
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
                    <div class="bg-wabag-green/5 p-6 rounded-xl border border-wabag-green/20">
                        <h3 class="text-xl font-serif font-bold text-wabag-green mb-4">Key Education Stats</h3>
                        <div class="space-y-3">
                            <div class="flex justify-between border-b pb-2">
                                <span class="text-gray-600">Adult Literacy</span>
                                <span class="font-semibold">30%</span>
                            </div>
                            <div class="flex justify-between border-b pb-2">
                                <span class="text-gray-600">Enrollment Rate</span>
                                <span class="font-semibold">66%</span>
                            </div>
                            <div class="flex justify-between border-b pb-2">
                                <span class="text-gray-600">Drop-out Rate</span>
                                <span class="font-semibold">40%</span>
                            </div>
                            <div class="flex justify-between border-b pb-2">
                                <span class="text-gray-600">Gender Parity</span>
                                <span class="font-semibold">1:1</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Elementary Schools</span>
                                <span class="font-semibold">73</span>
                            </div>
                        </div>
                    </div>

                    <!-- Contact -->
                    <div class="bg-gray-50 p-6 rounded-xl border border-gray-200">
                        <h3 class="text-xl font-serif font-bold text-wabag-green mb-4">Contact Education Division</h3>
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
                        <div class="space-y-3">
                            <a href="#" class="flex items-center text-wabag-green hover:text-green-800 group transition">
                                <svg class="w-5 h-5 mr-2 text-gray-400 group-hover:text-wabag-green transition" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                                Provincial Education Plan
                            </a>
                            <a href="#" class="flex items-center text-wabag-green hover:text-green-800 group transition">
                                <svg class="w-5 h-5 mr-2 text-gray-400 group-hover:text-wabag-green transition" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                                School Infrastructure Report
                            </a>
                            <a href="#" class="flex items-center text-wabag-green hover:text-green-800 group transition">
                                <svg class="w-5 h-5 mr-2 text-gray-400 group-hover:text-wabag-green transition" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                                Teacher Recruitment Policy
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
