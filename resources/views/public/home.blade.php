@extends('layouts.public')

@section('title', 'Wabag District Development Authority')

@section('content')
    <!-- Hero Section with Slideshow -->
    <section>
        <!-- Slideshow Container -->
        <div class="relative h-screen max-h-[600px] overflow-hidden">
            <!-- Slide 1 -->
            <div class="absolute inset-0 w-full h-full transition-opacity duration-1000 ease-in-out opacity-100 z-10">
                <img src="{{ asset('images/about-us/slide-img/road-upgrade.jpg') }}"
                     alt="Wabag Landscape"
                     class="w-full h-full object-cover">
                <div class="absolute inset-0 bg-gradient-to-r from-wabag-green/80 to-wabag-black/80"></div>
            </div>

            <!-- Slide 2 -->
            <div class="absolute inset-0 w-full h-full transition-opacity duration-1000 ease-in-out opacity-0 z-0">
                <img src="{{ asset('images/about-us/slide-img/hospital-upgrade.jpg') }}"
                     alt="Community Development"
                     class="w-full h-full object-cover">
                <div class="absolute inset-0 bg-gradient-to-r from-wabag-green/80 to-wabag-black/80"></div>
            </div>

            <!-- Slide 3 -->
            <div class="absolute inset-0 w-full h-full transition-opacity duration-1000 ease-in-out opacity-0 z-0">
                <img src="{{ asset('images/about-us/slide-img/school-upgrade.jpg') }}"
                     alt="Infrastructure Projects"
                     class="w-full h-full object-cover">
                <div class="absolute inset-0 bg-gradient-to-r from-wabag-green/80 to-wabag-black/80"></div>
            </div>

            <!-- Slide 4 -->
            <div class="absolute inset-0 w-full h-full transition-opacity duration-1000 ease-in-out opacity-0 z-0">
                <img src="{{ asset('images/about-us/slide-img/sports.jpg') }}"
                     alt="Community Engagement"
                     class="w-full h-full object-cover">
                <div class="absolute inset-0 bg-gradient-to-r from-wabag-green/80 to-wabag-black/80"></div>
            </div>

            <!-- Slideshow Content -->
            <div class="absolute inset-0 flex items-center justify-center text-center px-6 z-20">
                <div class="max-w-3xl mx-auto text-white">
                    <h1 class="text-4xl md:text-5xl lg:text-6xl font-serif font-bold mb-6 animate-fadeIn">Developing Wabag District Together</h1>
                    <p class="text-xl md:text-2xl mb-8 animate-fadeIn delay-100">Empowering communities through sustainable development projects and initiatives.</p>
                    <div class="flex flex-col sm:flex-row gap-4 justify-center animate-fadeIn delay-200">
                       {{-- <a href="/projects" class="bg-wabag-yellow hover:bg-yellow-600 text-wabag-black font-bold py-3 px-6 rounded-lg text-center transition duration-300">Our Projects</a>
                        <a href="/contact" class="bg-white hover:bg-gray-100 text-wabag-green font-bold py-3 px-6 rounded-lg text-center transition duration-300">Contact Us</a> --}}
                    </div>
                </div>
            </div>

            <!-- Slideshow Navigation -->
            <div class="absolute bottom-8 left-0 right-0 flex justify-center space-x-2 z-20">
                <button class="w-3 h-3 rounded-full bg-white bg-opacity-50 hover:bg-opacity-100 transition" data-slide="0"></button>
                <button class="w-3 h-3 rounded-full bg-white bg-opacity-50 hover:bg-opacity-100 transition" data-slide="1"></button>
                <button class="w-3 h-3 rounded-full bg-white bg-opacity-50 hover:bg-opacity-100 transition" data-slide="2"></button>
                <button class="w-3 h-3 rounded-full bg-white bg-opacity-50 hover:bg-opacity-100 transition" data-slide="3"></button>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-6">
            <div class="grid md:grid-cols-2 gap-12 items-center">
                <div>
                    <h2 class="text-3xl font-serif font-bold text-wabag-green mb-4">About Wabag DDA</h2>
                    <div class="w-24 h-1 bg-wabag-yellow mb-6"></div>
                    <p class="text-lg mb-4">The Wabag District Development Authority is committed to improving the quality of life for all residents through strategic development initiatives, infrastructure projects, and community empowerment programs.</p>
                    <p class="text-lg mb-6">Our mission is to foster sustainable development that benefits current and future generations while preserving our cultural heritage and natural resources.</p>
                    <a href="/about" class="inline-block bg-wabag-green hover:bg-green-800 text-white font-bold py-2 px-6 rounded-lg transition duration-300">Learn More</a>
                </div>
                <div class="bg-white p-6 rounded-xl shadow-lg border border-gray-100">
                    <img src="{{ asset('images/about-us/enga-hq.avif') }}" alt="Wabag District" class="w-full h-auto rounded-lg">
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Projects -->
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-6">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-serif font-bold text-wabag-green mb-4">Current Projects</h2>
                <p class="text-lg max-w-2xl mx-auto text-gray-600">Discover our ongoing and completed development projects transforming communities across Wabag District.</p>
                <div class="w-24 h-1 bg-wabag-yellow mx-auto mt-4"></div>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                <!-- Project 1 -->
                <div class="bg-white border border-gray-200 rounded-xl shadow-sm hover:shadow-md transition duration-300 flex flex-col">
                    <div class="project-image h-48 bg-wabag-green/10 flex items-center justify-center">
                        <svg class="h-16 w-16 text-wabag-green" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zM9 10l12-3"></path>
                        </svg>
                    </div>
                    <div class="p-6 flex-grow">
                        <span class="inline-block bg-wabag-green/10 text-wabag-green text-xs px-3 py-1 rounded-full mb-3">Infrastructure</span>
                        <h3 class="text-xl font-serif font-bold text-wabag-black mb-3">Wabag Central Water Supply</h3>
                        <ul class="space-y-3 text-sm text-gray-600 mb-6">
                            <li class="flex items-start">
                                <svg class="h-4 w-4 text-wabag-yellow mt-1 mr-2" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                                <span>Installation of modern water treatment system</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="h-4 w-4 text-wabag-yellow mt-1 mr-2" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                                <span>15,000 residents served</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="h-4 w-4 text-wabag-yellow mt-1 mr-2" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                                <span>Budget: K2,000,000</span>
                            </li>
                        </ul>
                        <div class="mt-auto">
                            <div class="flex justify-between text-sm mb-1 text-gray-500">
                                <span>Progress</span>
                                <span>100% Complete</span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-2 mb-6">
                                <div class="bg-wabag-yellow h-2 rounded-full" style="width: 100%"></div>
                            </div>
                            <a href="/projects/water-supply" class="w-full border border-wabag-green text-wabag-green hover:bg-wabag-green hover:text-white font-bold py-2 px-4 rounded-lg text-center transition duration-300 inline-flex items-center justify-center">
                                Read More
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Project 2 -->
                <div class="bg-white border border-gray-200 rounded-xl shadow-sm hover:shadow-md transition duration-300 flex flex-col">
                    <div class="project-image h-48 bg-wabag-green/10 flex items-center justify-center">
                        <svg class="h-16 w-16 text-wabag-green" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                        </svg>
                    </div>
                    <div class="p-6 flex-grow">
                        <span class="inline-block bg-wabag-green/10 text-wabag-green text-xs px-3 py-1 rounded-full mb-3">Health</span>
                        <h3 class="text-xl font-serif font-bold text-wabag-black mb-3">Hospital Expansion</h3>
                        <ul class="space-y-3 text-sm text-gray-600 mb-6">
                            <li class="flex items-start">
                                <svg class="h-4 w-4 text-wabag-yellow mt-1 mr-2" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                                <span>New wards and modern equipment</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="h-4 w-4 text-wabag-yellow mt-1 mr-2" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                                <span>50,000 residents served</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="h-4 w-4 text-wabag-yellow mt-1 mr-2" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                                <span>Budget: K5,000,000</span>
                            </li>
                        </ul>
                        <div class="mt-auto">
                            <div class="flex justify-between text-sm mb-1 text-gray-500">
                                <span>Progress</span>
                                <span>60% Complete</span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-2 mb-6">
                                <div class="bg-wabag-yellow h-2 rounded-full" style="width: 60%"></div>
                            </div>
                            <a href="/projects/hospital-expansion" class="w-full border border-wabag-green text-wabag-green hover:bg-wabag-green hover:text-white font-bold py-2 px-4 rounded-lg text-center transition duration-300 inline-flex items-center justify-center">
                                Read More
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Project 3 -->
                <div class="bg-white border border-gray-200 rounded-xl shadow-sm hover:shadow-md transition duration-300 flex flex-col">
                    <div class="project-image h-48 bg-wabag-green/10 flex items-center justify-center">
                        <svg class="h-16 w-16 text-wabag-green" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7v8a2 2 0 002 2h6M8 7V5a2 2 0 012-2h4.586a1 1 0 01.707.293l4.414 4.414a1 1 0 01.293.707V15a2 2 0 01-2 2h-2M8 7H6a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2v-2"></path>
                        </svg>
                    </div>
                    <div class="p-6 flex-grow">
                        <span class="inline-block bg-wabag-green/10 text-wabag-green text-xs px-3 py-1 rounded-full mb-3">Infrastructure</span>
                        <h3 class="text-xl font-serif font-bold text-wabag-black mb-3">Rural Roads Rehabilitation</h3>
                        <ul class="space-y-3 text-sm text-gray-600 mb-6">
                            <li class="flex items-start">
                                <svg class="h-4 w-4 text-wabag-yellow mt-1 mr-2" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                                <span>Upgrading rural roads network</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="h-4 w-4 text-wabag-yellow mt-1 mr-2" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                                <span>25,000 residents served</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="h-4 w-4 text-wabag-yellow mt-1 mr-2" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                                <span>Budget: K8,000,000</span>
                            </li>
                        </ul>
                        <div class="mt-auto">
                            <div class="flex justify-between text-sm mb-1 text-gray-500">
                                <span>Progress</span>
                                <span>30% Complete</span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-2 mb-6">
                                <div class="bg-wabag-yellow h-2 rounded-full" style="width: 30%"></div>
                            </div>
                            <a href="/projects/roads-rehabilitation" class="w-full border border-wabag-green text-wabag-green hover:bg-wabag-green hover:text-white font-bold py-2 px-4 rounded-lg text-center transition duration-300 inline-flex items-center justify-center">
                                Read More
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="text-center mt-12">
                <a href="/projects" class="inline-block bg-wabag-green hover:bg-green-800 text-white font-bold py-3 px-8 rounded-lg transition duration-300">View All Projects</a>
            </div>
        </div>
    </section>

    <!-- News & Updates -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-6">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-serif font-bold text-wabag-green mb-4">News & Updates</h2>
                <p class="text-lg max-w-2xl mx-auto text-gray-600">Stay informed about our latest activities and announcements.</p>
                <div class="w-24 h-1 bg-wabag-yellow mx-auto mt-4"></div>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                <!-- News 1 -->
                <div class="bg-white rounded-xl shadow-md overflow-hidden border border-gray-200 hover:shadow-lg transition duration-300">
                    <img src="https://images.unsplash.com/photo-1450101499163-c8848c66ca85?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" alt="Funding announcement" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <div class="flex items-center text-sm text-gray-500 mb-3">
                            <span>June 15, 2023</span>
                            <span class="mx-2">•</span>
                            <span class="text-wabag-green">Announcement</span>
                        </div>
                        <h3 class="text-xl font-bold text-wabag-black mb-3">New Infrastructure Funding</h3>
                        <p class="text-gray-600 mb-4">The Wabag DDA has secured K5 million in additional funding for rural infrastructure projects across the district.</p>
                        <a href="#" class="text-wabag-green hover:text-green-800 font-medium inline-flex items-center">
                            Read More
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- News 2 -->
                <div class="bg-white rounded-xl shadow-md overflow-hidden border border-gray-200 hover:shadow-lg transition duration-300">
                    <img src="https://images.unsplash.com/photo-1431540015161-0bf868a2d407?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" alt="Community meeting" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <div class="flex items-center text-sm text-gray-500 mb-3">
                            <span>May 28, 2023</span>
                            <span class="mx-2">•</span>
                            <span class="text-wabag-green">Event</span>
                        </div>
                        <h3 class="text-xl font-bold text-wabag-black mb-3">Community Consultation</h3>
                        <p class="text-gray-600 mb-4">Public meetings scheduled to gather input on proposed Wabag Central Market redevelopment.</p>
                        <a href="#" class="text-wabag-green hover:text-green-800 font-medium inline-flex items-center">
                            Read More
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- News 3 -->
                <div class="bg-white rounded-xl shadow-md overflow-hidden border border-gray-200 hover:shadow-lg transition duration-300">
                    <img src="https://images.unsplash.com/photo-1588072432836-e10032774350?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" alt="School construction" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <div class="flex items-center text-sm text-gray-500 mb-3">
                            <span>May 10, 2023</span>
                            <span class="mx-2">•</span>
                            <span class="text-wabag-green">Progress Report</span>
                        </div>
                        <h3 class="text-xl font-bold text-wabag-black mb-3">Education Project Update</h3>
                        <p class="text-gray-600 mb-4">The district-wide school rehabilitation program is on track for August completion.</p>
                        <a href="#" class="text-wabag-green hover:text-green-800 font-medium inline-flex items-center">
                            Read More
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>

            <div class="text-center mt-12">
                <a href="/news" class="inline-block border-2 border-wabag-green text-wabag-green hover:bg-wabag-green hover:text-white font-bold py-3 px-8 rounded-lg transition duration-300">View All News</a>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="py-16 bg-wabag-green text-white">
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8 text-center">
                <div class="p-6">
                    <div class="text-4xl font-serif font-bold mb-2">1 Million</div>
                    <div class="text-wabag-yellow font-medium">Total Population</div>
                </div>
                <div class="p-6">
                    <div class="text-4xl font-serif font-bold mb-2">18</div>
                    <div class="text-wabag-yellow font-medium">Tatol Wards</div>
                </div>
                <div class="p-6">
                    <div class="text-4xl font-serif font-bold mb-2">15</div>
                    <div class="text-wabag-yellow font-medium">Communities Served</div>
                </div>
                <div class="p-6">
                    <div class="text-4xl font-serif font-bold mb-2">K28M</div>
                    <div class="text-wabag-yellow font-medium">Funds Invested</div>
                </div>
            </div>
        </div>
    </section>

        <!-- Cultural Heritage & Tourism Section -->
    <section class="py-16 bg-wabag-yellow/10">
        <div class="container mx-auto px-6">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-serif font-bold text-wabag-green mb-4">Explore Wabag District</h2>
                <p class="text-lg max-w-2xl mx-auto text-gray-600">Discover the rich cultural heritage and natural beauty of our Highlands home</p>
                <div class="w-24 h-1 bg-wabag-yellow mx-auto mt-4"></div>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                <!-- Cultural Showcase -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden border border-gray-200 hover:shadow-xl transition duration-300">
                    <div class="h-48 overflow-hidden">
                        <img src="{{ asset('images/wabag/sing-sing.jpg') }}" alt="Traditional Sing-Sing" class="w-full h-full object-cover">
                    </div>
                    <div class="p-6">
                        <div class="flex items-center text-sm text-wabag-green mb-3">
                            <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7v8a2 2 0 002 2h6M8 7V5a2 2 0 012-2h4.586a1 1 0 01.707.293l4.414 4.414a1 1 0 01.293.707V15a2 2 0 01-2 2h-2M8 7H6a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2v-2"></path>
                            </svg>
                            <span>CULTURAL HERITAGE</span>
                        </div>
                        <h3 class="text-xl font-bold text-wabag-black mb-3">Traditional Sing-Sing Festivals</h3>
                        <p class="text-gray-600 mb-4">Experience our vibrant cultural festivals featuring traditional dances, elaborate headdresses, and sacred rituals passed down through generations.</p>
                        <a href="/culture" class="text-wabag-green hover:text-green-800 font-medium inline-flex items-center">
                            Learn More
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Natural Attractions -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden border border-gray-200 hover:shadow-xl transition duration-300">
                    <div class="h-48 overflow-hidden">
                        <img src="{{ asset('images/wabag/landscape.jpg') }}" alt="Highlands Landscape" class="w-full h-full object-cover">
                    </div>
                    <div class="p-6">
                        <div class="flex items-center text-sm text-wabag-green mb-3">
                            <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path>
                            </svg>
                            <span>NATURAL WONDERS</span>
                        </div>
                        <h3 class="text-xl font-bold text-wabag-black mb-3">Highlands Landscapes</h3>
                        <p class="text-gray-600 mb-4">Explore our breathtaking mountain vistas, pristine rivers, and fertile valleys that make Wabag one of PNG's most beautiful districts.</p>
                        <a href="/tourism" class="text-wabag-green hover:text-green-800 font-medium inline-flex items-center">
                            Explore
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Community Initiatives -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden border border-gray-200 hover:shadow-xl transition duration-300">
                    <div class="h-48 overflow-hidden">
                        <img src="{{ asset('images/wabag/artisans.jpg') }}" alt="Local Artisans" class="w-full h-full object-cover">
                    </div>
                    <div class="p-6">
                        <div class="flex items-center text-sm text-wabag-green mb-3">
                            <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                            </svg>
                            <span>COMMUNITY</span>
                        </div>
                        <h3 class="text-xl font-bold text-wabag-black mb-3">Local Artisans & Crafts</h3>
                        <p class="text-gray-600 mb-4">Support our talented weavers, carvers, and artisans who create traditional bilums, sculptures, and artifacts using centuries-old techniques.</p>
                        <a href="/artisans" class="text-wabag-green hover:text-green-800 font-medium inline-flex items-center">
                            Discover
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Slideshow JavaScript -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const slides = document.querySelectorAll('.relative > div[class*="transition-opacity"]');
            const dots = document.querySelectorAll('[data-slide]');
            let currentSlide = 0;
            let slideInterval;

            function showSlide(index) {
                // Hide all slides
                slides.forEach(slide => {
                    slide.classList.remove('opacity-100', 'z-10');
                    slide.classList.add('opacity-0', 'z-0');
                });

                // Show current slide
                slides[index].classList.remove('opacity-0', 'z-0');
                slides[index].classList.add('opacity-100', 'z-10');

                // Update dots
                dots.forEach(dot => dot.classList.remove('bg-opacity-100'));
                dots[index].classList.add('bg-opacity-100');

                currentSlide = index;
            }

            function nextSlide() {
                const nextIndex = (currentSlide + 1) % slides.length;
                showSlide(nextIndex);
            }

            // Initialize first slide
            showSlide(0);

            // Start auto-rotation
            function startSlideShow() {
                slideInterval = setInterval(nextSlide, 5000);
            }
            startSlideShow();

            // Dot navigation
            dots.forEach(dot => {
                dot.addEventListener('click', function() {
                    const slideIndex = parseInt(this.getAttribute('data-slide'));
                    showSlide(slideIndex);
                    // Reset interval
                    clearInterval(slideInterval);
                    startSlideShow();
                });
            });
        });
    </script>
@endsection
