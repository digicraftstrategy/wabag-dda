@extends('layouts.public')

@section('title', 'Sectoral Development Profile - Wabag District Development Authority')

@section('content')
    <!-- Hero Section -->
    <section class="relative h-[400px] md:h-[500px] overflow-hidden">
        <!-- Hero Image -->
        <div class="absolute inset-0 w-full h-full">
            <img src="{{ asset('images/development/development-hero.jpg') }}"
                 alt="Wabag District Development"
                 class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-r from-wabag-green/80 to-wabag-black/80"></div>
        </div>

        <!-- Hero Content -->
        <div class="absolute inset-0 flex items-center justify-center text-center px-6 z-20">
            <div class="max-w-3xl mx-auto text-white">
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-serif font-bold mb-6">Sectoral Development Profile</h1>
                <p class="text-xl md:text-2xl mb-8">2018-2022 Wabag District Development Plan</p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="#education" class="bg-wabag-yellow hover:bg-yellow-600 text-wabag-black font-bold py-3 px-6 rounded-lg text-center transition duration-300">
                        Education
                    </a>
                    <a href="#health" class="bg-white hover:bg-gray-100 text-wabag-green font-bold py-3 px-6 rounded-lg text-center transition duration-300">
                        Health
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Breadcrumb -->
    <div class="bg-gray-50">
        <div class="container mx-auto px-6 py-4">
            <div class="flex items-center text-sm text-gray-600">
                <a href="/" class="hover:text-wabag-yellow transition-colors">Home</a>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mx-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
                {{--<a href="/development" class="hover:text-wabag-yellow transition-colors">Development Plan</a>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mx-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>--}}
                <span class="text-wabag-yellow font-medium">Sectoral Development Profile</span>
            </div>
        </div>
    </div>

    <!-- District Overview Section -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-6">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-serif font-bold text-wabag-green mb-4">Wabag District at a Glance</h2>
                <p class="text-lg max-w-2xl mx-auto text-gray-600">Key statistics and development context</p>
                <div class="w-24 h-1 bg-wabag-yellow mx-auto mt-4"></div>
            </div>

            <div class="grid md:grid-cols-3 gap-8 mb-12">
                <div class="bg-gray-50 p-6 rounded-xl text-center">
                    <div class="text-4xl font-bold text-wabag-green mb-2">100,000+</div>
                    <div class="text-lg">Population</div>
                </div>
                <div class="bg-gray-50 p-6 rounded-xl text-center">
                    <div class="text-4xl font-bold text-wabag-green mb-2">1,090 km²</div>
                    <div class="text-lg">Land Area</div>
                </div>
                <div class="bg-gray-50 p-6 rounded-xl text-center">
                    <div class="text-4xl font-bold text-wabag-green mb-2">65</div>
                    <div class="text-lg">Wards</div>
                </div>
            </div>

            <div class="grid md:grid-cols-2 gap-8 items-center">
                <div>
                    <h3 class="text-2xl font-serif font-bold text-wabag-black mb-4">Development Context</h3>
                    <p class="text-lg text-gray-700 mb-6">
                        Wabag District faces unique development challenges due to its mountainous terrain,
                        isolated communities, and historical lack of coordinated planning. The 2018-2022
                        Development Plan addresses these challenges through strategic interventions across key sectors.
                    </p>

                    <div class="space-y-4">
                        <div class="flex items-start">
                            <div class="bg-wabag-green bg-opacity-10 p-3 rounded-full mr-4">
                                <svg class="h-6 w-6 text-wabag-green" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                </svg>
                            </div>
                            <div>
                                <h4 class="text-xl font-bold text-wabag-black mb-2">Vision 2050 Alignment</h4>
                                <p class="text-gray-600">Our plan contributes to PNG's national goal of becoming a Smart, Wise, Fair and Happy Society by 2050.</p>
                            </div>
                        </div>

                        <div class="flex items-start">
                            <div class="bg-wabag-green bg-opacity-10 p-3 rounded-full mr-4">
                                <svg class="h-6 w-6 text-wabag-green" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                                </svg>
                            </div>
                            <div>
                                <h4 class="text-xl font-bold text-wabag-black mb-2">Key Challenges</h4>
                                <p class="text-gray-600">Difficult terrain, infrastructure gaps, and service delivery limitations.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-xl shadow-lg border border-gray-100">
                    <div class="aspect-w-16 aspect-h-9">
                        <img src="{{ asset('images/development/district-map.png') }}"
                             alt="Wabag District Map"
                             class="w-full h-auto rounded-lg">
                    </div>
                    <div class="mt-4 text-center text-sm text-gray-600">
                        Wabag District with its three Local Level Governments
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Education Sector Section -->
    <section id="education" class="py-16 bg-gray-50">
        <div class="container mx-auto px-6">
            <div class="text-center mb-12">
                <div class="inline-flex items-center justify-center bg-wabag-yellow text-wabag-black p-3 rounded-full mb-4">
                    <svg class="h-8 w-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                    </svg>
                </div>
                <h2 class="text-3xl font-serif font-bold text-wabag-green mb-4">Education Sector</h2>
                <p class="text-lg max-w-2xl mx-auto text-gray-600">Building a foundation for the future through quality education</p>
                <div class="w-24 h-1 bg-wabag-yellow mx-auto mt-4"></div>
            </div>

            <div class="grid md:grid-cols-2 gap-8 mb-12">
                <div class="bg-white p-6 rounded-xl shadow-lg">
                    <h3 class="text-xl font-bold text-wabag-black mb-4">Current Status</h3>
                    <div class="space-y-4">
                        <div class="flex justify-between items-center border-b pb-2">
                            <span>Adult literacy rate</span>
                            <span class="font-bold text-wabag-green">30%</span>
                        </div>
                        <div class="flex justify-between items-center border-b pb-2">
                            <span>Enrollment rate</span>
                            <span class="font-bold text-wabag-green">66%</span>
                        </div>
                        <div class="flex justify-between items-center border-b pb-2">
                            <span>Primary school drop-out rate</span>
                            <span class="font-bold text-wabag-green">40%</span>
                        </div>
                        <div class="flex justify-between items-center border-b pb-2">
                            <span>Secondary school retention rate</span>
                            <span class="font-bold text-wabag-green">52%</span>
                        </div>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-xl shadow-lg">
                    <h3 class="text-xl font-bold text-wabag-black mb-4">Infrastructure</h3>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="text-center">
                            <div class="text-3xl font-bold text-wabag-green">73</div>
                            <div class="text-gray-600">Elementary Schools</div>
                        </div>
                        <div class="text-center">
                            <div class="text-3xl font-bold text-wabag-green">12</div>
                            <div class="text-gray-600">Primary Schools</div>
                        </div>
                        <div class="text-center">
                            <div class="text-3xl font-bold text-wabag-green">2</div>
                            <div class="text-gray-600">High Schools</div>
                        </div>
                        <div class="text-center">
                            <div class="text-3xl font-bold text-wabag-green">2</div>
                            <div class="text-gray-600">Secondary Schools</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white p-6 rounded-xl shadow-lg">
                <h3 class="text-xl font-bold text-wabag-black mb-4">Challenges & Interventions</h3>
                <div class="grid md:grid-cols-2 gap-6">
                    <div>
                        <h4 class="font-bold text-lg text-wabag-green mb-3">Key Challenges</h4>
                        <ul class="space-y-3">
                            <li class="flex items-start">
                                <svg class="h-5 w-5 text-red-500 mt-1 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                                <span>Limited road access to schools in remote areas</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="h-5 w-5 text-red-500 mt-1 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                                <span>Inadequate teacher qualifications and housing</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="h-5 w-5 text-red-500 mt-1 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                                <span>High drop-out rates, especially in primary education</span>
                            </li>
                        </ul>
                    </div>

                    <div>
                        <h4 class="font-bold text-lg text-wabag-green mb-3">Strategic Interventions</h4>
                        <ul class="space-y-3">
                            <li class="flex items-start">
                                <svg class="h-5 w-5 text-green-500 mt-1 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                                <span>Construction of new schools in isolated areas</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="h-5 w-5 text-green-500 mt-1 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                                <span>Improved teacher appointment processes</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="h-5 w-5 text-green-500 mt-1 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                                <span>Establishment of vocational training centers</span>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="mt-6">
                    <h4 class="font-bold text-lg text-wabag-green mb-3">Targets for 2022</h4>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div class="bg-wabag-green bg-opacity-10 p-4 rounded-lg text-center">
                            <div class="text-2xl font-bold text-wabag-green">80%+</div>
                            <div class="text-gray-600">Enrollment Rate</div>
                        </div>
                        <div class="bg-wabag-green bg-opacity-10 p-4 rounded-lg text-center">
                            <div class="text-2xl font-bold text-wabag-green">80%+</div>
                            <div class="text-gray-600">Retention Rate (Y1-6)</div>
                        </div>
                        <div class="bg-wabag-green bg-opacity-10 p-4 rounded-lg text-center">
                            <div class="text-2xl font-bold text-wabag-green">50%</div>
                            <div class="text-gray-600">Increase in Adult Literacy</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Health Sector Section -->
    <section id="health" class="py-16 bg-white">
        <div class="container mx-auto px-6">
            <div class="text-center mb-12">
                <div class="inline-flex items-center justify-center bg-wabag-green text-white p-3 rounded-full mb-4">
                    <svg class="h-8 w-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2 2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                    </svg>
                </div>
                <h2 class="text-3xl font-serif font-bold text-wabag-green mb-4">Health Sector</h2>
                <p class="text-lg max-w-2xl mx-auto text-gray-600">Improving health outcomes for all residents</p>
                <div class="w-24 h-1 bg-wabag-yellow mx-auto mt-4"></div>
            </div>

            <div class="grid md:grid-cols-2 gap-8 mb-12">
                <div class="bg-white p-6 rounded-xl shadow-lg">
                    <h3 class="text-xl font-bold text-wabag-black mb-4">Health Indicators</h3>
                    <div class="space-y-4">
                        <div class="flex justify-between items-center border-b pb-2">
                            <span>Infant mortality rate</span>
                            <span class="font-bold text-wabag-green">81 per 1000</span>
                        </div>
                        <div class="flex justify-between items-center border-b pb-2">
                            <span>Maternal mortality</span>
                            <span class="font-bold text-wabag-green">12 per 100,000</span>
                        </div>
                        <div class="flex justify-between items-center border-b pb-2">
                            <span>Male life expectancy</span>
                            <span class="font-bold text-wabag-green">57 years</span>
                        </div>
                        <div class="flex justify-between items-center border-b pb-2">
                            <span>Female life expectancy</span>
                            <span class="font-bold text-wabag-green">53-60 years</span>
                        </div>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-xl shadow-lg">
                    <h3 class="text-xl font-bold text-wabag-black mb-4">Health Facilities</h3>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="text-center">
                            <div class="text-3xl font-bold text-wabag-green">1</div>
                            <div class="text-gray-600">Provincial Hospital</div>
                        </div>
                        <div class="text-center">
                            <div class="text-3xl font-bold text-wabag-green">1</div>
                            <div class="text-gray-600">District Hospital</div>
                        </div>
                        <div class="text-center">
                            <div class="text-3xl font-bold text-wabag-green">4</div>
                            <div class="text-gray-600">Health Centers</div>
                        </div>
                        <div class="text-center">
                            <div class="text-3xl font-bold text-wabag-green">40</div>
                            <div class="text-gray-600">Aid Posts</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white p-6 rounded-xl shadow-lg">
                <h3 class="text-xl font-bold text-wabag-black mb-4">Challenges & Interventions</h3>
                <div class="grid md:grid-cols-2 gap-6">
                    <div>
                        <h4 class="font-bold text-lg text-wabag-green mb-3">Key Challenges</h4>
                        <ul class="space-y-3">
                            <li class="flex items-start">
                                <svg class="h-5 w-5 text-red-500 mt-1 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                                <span>Limited access to healthcare in remote areas</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="h-5 w-5 text-red-500 mt-1 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                                <span>Shortage of medical equipment and supplies</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="h-5 w-5 text-red-500 mt-1 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                                <span>High incidence of communicable diseases</span>
                            </li>
                        </ul>
                    </div>

                    <div>
                        <h4 class="font-bold text-lg text-wabag-green mb-3">Strategic Interventions</h4>
                        <ul class="space-y-3">
                            <li class="flex items-start">
                                <svg class="h-5 w-5 text-green-500 mt-1 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                                <span>Construction of 27 new Aid Posts</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="h-5 w-5 text-green-500 mt-1 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                                <span>Establishment of 3 new Health Centers</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="h-5 w-5 text-green-500 mt-1 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                                <span>Improved disease prevention programs</span>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="mt-6">
                    <h4 class="font-bold text-lg text-wabag-green mb-3">Targets for 2022</h4>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div class="bg-wabag-green bg-opacity-10 p-4 rounded-lg text-center">
                            <div class="text-2xl font-bold text-wabag-green">50/1000</div>
                            <div class="text-gray-600">Infant Mortality</div>
                        </div>
                        <div class="bg-wabag-green bg-opacity-10 p-4 rounded-lg text-center">
                            <div class="text-2xl font-bold text-wabag-green">35/1000</div>
                            <div class="text-gray-600">Maternal Mortality</div>
                        </div>
                        <div class="bg-wabag-green bg-opacity-10 p-4 rounded-lg text-center">
                            <div class="text-2xl font-bold text-wabag-green">70/1000</div>
                            <div class="text-gray-600">Under-5 Mortality</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Infrastructure Section -->
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-6">
            <div class="text-center mb-12">
                <div class="inline-flex items-center justify-center bg-wabag-black text-white p-3 rounded-full mb-4">
                    <svg class="h-8 w-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                    </svg>
                </div>
                <h2 class="text-3xl font-serif font-bold text-wabag-green mb-4">Infrastructure Development</h2>
                <p class="text-lg max-w-2xl mx-auto text-gray-600">Building the foundation for economic growth and service delivery</p>
                <div class="w-24 h-1 bg-wabag-yellow mx-auto mt-4"></div>
            </div>

            <div class="grid md:grid-cols-2 gap-8 mb-12">
                <div class="bg-white p-6 rounded-xl shadow-lg">
                    <h3 class="text-xl font-bold text-wabag-black mb-4">Road Network</h3>
                    <div class="space-y-4">
                        <div class="flex justify-between items-center border-b pb-2">
                            <span>National Highway (sealed)</span>
                            <span class="font-bold text-wabag-green">45 km</span>
                        </div>
                        <div class="flex justify-between items-center border-b pb-2">
                            <span>Gravel roads</span>
                            <span class="font-bold text-wabag-green">120 km</span>
                        </div>
                        <div class="flex justify-between items-center border-b pb-2">
                            <span>Bridges needing construction</span>
                            <span class="font-bold text-wabag-green">17</span>
                        </div>
                        <div class="flex justify-between items-center border-b pb-2">
                            <span>Bridges needing repair</span>
                            <span class="font-bold text-wabag-green">4</span>
                        </div>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-xl shadow-lg">
                    <h3 class="text-xl font-bold text-wabag-black mb-4">Other Infrastructure</h3>
                    <div class="space-y-4">
                        <div class="flex justify-between items-center border-b pb-2">
                            <span>Airstrips</span>
                            <span class="font-bold text-wabag-green">4</span>
                        </div>
                        <div class="flex justify-between items-center border-b pb-2">
                            <span>Water supply systems</span>
                            <span class="font-bold text-wabag-green">Under development</span>
                        </div>
                        <div class="flex justify-between items-center border-b pb-2">
                            <span>Electricity coverage</span>
                            <span class="font-bold text-wabag-green">Limited to main centers</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white p-6 rounded-xl shadow-lg">
                <h3 class="text-xl font-bold text-wabag-black mb-4">Challenges & Interventions</h3>
                <div class="grid md:grid-cols-2 gap-6">
                    <div>
                        <h4 class="font-bold text-lg text-wabag-green mb-3">Key Challenges</h4>
                        <ul class="space-y-3">
                            <li class="flex items-start">
                                <svg class="h-5 w-5 text-red-500 mt-1 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                                <span>Difficult mountainous terrain for construction</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="h-5 w-5 text-red-500 mt-1 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                                <span>High maintenance costs for existing roads</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="h-5 w-5 text-red-500 mt-1 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                                <span>Limited access to remote areas like Maramuni</span>
                            </li>
                        </ul>
                    </div>

                    <div>
                        <h4 class="font-bold text-lg text-wabag-green mb-3">Strategic Interventions</h4>
                        <ul class="space-y-3">
                            <li class="flex items-start">
                                <svg class="h-5 w-5 text-green-500 mt-1 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                                <span>Wabag District Rural Road Network Program</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="h-5 w-5 text-green-500 mt-1 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                                <span>Wabag District Bridge Connection Program</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="h-5 w-5 text-green-500 mt-1 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                                <span>Rural Electrification Program</span>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="mt-6">
                    <h4 class="font-bold text-lg text-wabag-green mb-3">Targets for 2022</h4>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div class="bg-wabag-green bg-opacity-10 p-4 rounded-lg text-center">
                            <div class="text-2xl font-bold text-wabag-green">200+ km</div>
                            <div class="text-gray-600">New Roads Constructed</div>
                        </div>
                        <div class="bg-wabag-green bg-opacity-10 p-4 rounded-lg text-center">
                            <div class="text-2xl font-bold text-wabag-green">17</div>
                            <div class="text-gray-600">New Bridges Built</div>
                        </div>
                        <div class="bg-wabag-green bg-opacity-10 p-4 rounded-lg text-center">
                            <div class="text-2xl font-bold text-wabag-green">7</div>
                            <div class="text-gray-600">Rural Electrification Projects</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Economic Development Section -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-6">
            <div class="text-center mb-12">
                <div class="inline-flex items-center justify-center bg-wabag-yellow text-wabag-black p-3 rounded-full mb-4">
                    <svg class="h-8 w-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <h2 class="text-3xl font-serif font-bold text-wabag-green mb-4">Economic Development</h2>
                <p class="text-lg max-w-2xl mx-auto text-gray-600">Promoting sustainable growth through agriculture and enterprise</p>
                <div class="w-24 h-1 bg-wabag-yellow mx-auto mt-4"></div>
            </div>

            <div class="grid md:grid-cols-2 gap-8 mb-12">
                <div class="bg-white p-6 rounded-xl shadow-lg">
                    <h3 class="text-xl font-bold text-wabag-black mb-4">Agriculture</h3>
                    <div class="space-y-4">
                        <div class="flex justify-between items-center border-b pb-2">
                            <span>Main cash crop (coffee)</span>
                            <span class="font-bold text-wabag-green">K360,000+</span>
                        </div>
                        <div class="flex justify-between items-center border-b pb-2">
                            <span>Food crops value</span>
                            <span class="font-bold text-wabag-green">K50-60,000+</span>
                        </div>
                        <div class="flex justify-between items-center border-b pb-2">
                            <span>Livestock</span>
                            <span class="font-bold text-wabag-green">Household consumption</span>
                        </div>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-xl shadow-lg">
                    <h3 class="text-xl font-bold text-wabag-black mb-4">Other Sectors</h3>
                    <div class="space-y-4">
                        <div class="flex justify-between items-center border-b pb-2">
                            <span>Forestry potential</span>
                            <span class="font-bold text-wabag-green">Significant</span>
                        </div>
                        <div class="flex justify-between items-center border-b pb-2">
                            <span>Mining prospects</span>
                            <span class="font-bold text-wabag-green">Gold in Maramuni</span>
                        </div>
                        <div class="flex justify-between items-center border-b pb-2">
                            <span>SME development</span>
                            <span class="font-bold text-wabag-green">Agriculture-based</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white p-6 rounded-xl shadow-lg">
                <h3 class="text-xl font-bold text-wabag-black mb-4">Challenges & Interventions</h3>
                <div class="grid md:grid-cols-2 gap-6">
                    <div>
                        <h4 class="font-bold text-lg text-wabag-green mb-3">Key Challenges</h4>
                        <ul class="space-y-3">
                            <li class="flex items-start">
                                <svg class="h-5 w-5 text-red-500 mt-1 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                                <span>Limited market access for agricultural products</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="h-5 w-5 text-red-500 mt-1 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                                <span>Lack of start-up capital for commercial farming</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="h-5 w-5 text-red-500 mt-1 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                                <span>Land mobilization issues</span>
                            </li>
                        </ul>
                    </div>

                    <div>
                        <h4 class="font-bold text-lg text-wabag-green mb-3">Strategic Interventions</h4>
                        <ul class="space-y-3">
                            <li class="flex items-start">
                                <svg class="h-5 w-5 text-green-500 mt-1 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                                <span>Wabag District Savings and Loans Society</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="h-5 w-5 text-green-500 mt-1 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                                <span>Agriculture-SME incubation center</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="h-5 w-5 text-green-500 mt-1 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                                <span>Construction of vegetable markets and depots</span>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="mt-6">
                    <h4 class="font-bold text-lg text-wabag-green mb-3">Targets for 2022</h4>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div class="bg-wabag-green bg-opacity-10 p-4 rounded-lg text-center">
                            <div class="text-2xl font-bold text-wabag-green">200+</div>
                            <div class="text-gray-600">Agriculture-based SMEs</div>
                        </div>
                        <div class="bg-wabag-green bg-opacity-10 p-4 rounded-lg text-center">
                            <div class="text-2xl font-bold text-wabag-green">K3.5M</div>
                            <div class="text-gray-600">Credit Facility Capital</div>
                        </div>
                        <div class="bg-wabag-green bg-opacity-10 p-4 rounded-lg text-center">
                            <div class="text-2xl font-bold text-wabag-green">5+</div>
                            <div class="text-gray-600">New Markets Established</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Plan Implementation Section -->
    <section class="py-16 bg-wabag-green text-white">
        <div class="container mx-auto px-6">
            <div class="max-w-4xl mx-auto text-center">
                <h2 class="text-3xl font-serif font-bold mb-6">Implementation & Monitoring</h2>
                <p class="text-xl mb-8">Our approach to ensuring the successful execution of the 2018-2022 Development Plan</p>

                <div class="grid md:grid-cols-3 gap-6 mb-12">
                    <div class="bg-white/10 p-6 rounded-xl">
                        <div class="text-4xl font-bold mb-2">1</div>
                        <h3 class="text-xl font-bold mb-2">District Development Authority</h3>
                        <p>Oversees planning, budget allocation, and implementation</p>
                    </div>
                    <div class="bg-white/10 p-6 rounded-xl">
                        <div class="text-4xl font-bold mb-2">2</div>
                        <h3 class="text-xl font-bold mb-2">Sectoral Coordination</h3>
                        <p>Integrated approach across all development sectors</p>
                    </div>
                    <div class="bg-white/10 p-6 rounded-xl">
                        <div class="text-4xl font-bold mb-2">3</div>
                        <h3 class="text-xl font-bold mb-2">Community Engagement</h3>
                        <p>Involving local communities in development initiatives</p>
                    </div>
                </div>

                <a href="/development-plan" class="inline-block bg-wabag-yellow hover:bg-yellow-600 text-wabag-black font-bold py-3 px-8 rounded-lg text-center transition duration-300">
                    View Full Development Plan
                </a>
            </div>
        </div>
    </section>
@endsection
