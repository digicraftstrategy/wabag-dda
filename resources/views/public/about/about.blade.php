@extends('layouts.public')

@section('title', 'About Wabag DDA - Wabag District Development Authority')

@section('content')
    <!-- Hero Section -->
    <section class="relative h-[400px] md:h-[500px] overflow-hidden">
        <!-- Hero Image -->
        <div class="absolute inset-0 w-full h-full">
            <img src="{{ asset('images/about-us/enga-hq.avif') }}" 
                 alt="Wabag District Headquarters" 
                 class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-r from-wabag-green/80 to-wabag-black/80"></div>
        </div>
        
        <!-- Hero Content -->
        <div class="absolute inset-0 flex items-center justify-center text-center px-6 z-20">
            <div class="max-w-3xl mx-auto text-white">
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-serif font-bold mb-6">About Wabag District Development Authority</h1>
                <p class="text-xl md:text-2xl mb-8">Empowering our communities through sustainable development and transparent governance.</p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="#vision" class="bg-wabag-yellow hover:bg-yellow-600 text-wabag-black font-bold py-3 px-6 rounded-lg text-center transition duration-300">
                        Our Vision
                    </a>
                    <a href="#leadership" class="bg-white hover:bg-gray-100 text-wabag-green font-bold py-3 px-6 rounded-lg text-center transition duration-300">
                        Leadership
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
                <span class="text-wabag-yellow font-medium">About Wabag DDA</span>
            </div>
        </div>
    </div>

    <!-- Vision/Mission Section -->
    <section id="vision" class="py-16 bg-white">
        <div class="container mx-auto px-6">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-serif font-bold text-wabag-green mb-4">Our Purpose</h2>
                <p class="text-lg max-w-2xl mx-auto text-gray-600">Guiding principles that drive our development initiatives</p>
                <div class="w-24 h-1 bg-wabag-yellow mx-auto mt-4"></div>
            </div>

            <div class="grid md:grid-cols-2 gap-8 max-w-5xl mx-auto">
                <div class="bg-white p-8 rounded-xl shadow-lg border border-gray-100 hover:shadow-xl transition duration-300">
                    <div class="flex items-center mb-6">
                        <div class="bg-wabag-yellow bg-opacity-10 p-3 rounded-full mr-4">
                            <svg class="h-8 w-8 text-wabag-yellow" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-serif font-bold text-wabag-green">Our Vision</h3>
                    </div>
                    <p class="text-lg text-gray-700 mb-4">To create a district where every citizen has the opportunity to become <span class="font-semibold text-wabag-green">healthy, wealthy, wise, and educated</span> through equitable access to resources and services.</p>
                </div>

                <div class="bg-white p-8 rounded-xl shadow-lg border border-gray-100 hover:shadow-xl transition duration-300">
                    <div class="flex items-center mb-6">
                        <div class="bg-wabag-green bg-opacity-10 p-3 rounded-full mr-4">
                            <svg class="h-8 w-8 text-wabag-green" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-serif font-bold text-wabag-green">Our Mission</h3>
                    </div>
                    <ul class="space-y-4 text-gray-700">
                        <li class="flex items-start">
                            <svg class="h-5 w-5 text-wabag-yellow mt-1 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            <span>Deliver sustainable development through infrastructure and community programs</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="h-5 w-5 text-wabag-yellow mt-1 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            <span>Promote education and agriculture-based economic growth</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="h-5 w-5 text-wabag-yellow mt-1 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            <span>Ensure transparency and accountability in all initiatives</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- District Overview Section -->
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-6">
            <div class="grid md:grid-cols-2 gap-12 items-center">
                <div>
                    <h2 class="text-3xl font-serif font-bold text-wabag-green mb-4">Our Community</h2>
                    <div class="w-24 h-1 bg-wabag-yellow mb-6"></div>
                    <p class="text-lg text-gray-700 mb-6">Wabag District, located in Enga Province, Papua New Guinea, is home to approximately 100,000 people across three Local Level Governments (LLGs): Wabag Urban, Wabag Rural, and Maramuni.</p>
                    
                    <div class="space-y-6">
                        <div class="flex items-start">
                            <div class="bg-wabag-green bg-opacity-10 p-3 rounded-full mr-4">
                                <svg class="h-6 w-6 text-wabag-green" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-xl font-bold text-wabag-black mb-2">Wabag Urban</h3>
                                <p class="text-gray-600">Provincial capital and administrative center with key government institutions.</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start">
                            <div class="bg-wabag-green bg-opacity-10 p-3 rounded-full mr-4">
                                <svg class="h-6 w-6 text-wabag-green" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-xl font-bold text-wabag-black mb-2">Wabag Rural</h3>
                                <p class="text-gray-600">Surrounding villages and communities with rich cultural heritage.</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start">
                            <div class="bg-wabag-green bg-opacity-10 p-3 rounded-full mr-4">
                                <svg class="h-6 w-6 text-wabag-green" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-xl font-bold text-wabag-black mb-2">Maramuni LLG</h3>
                                <p class="text-gray-600">Remote highlands area with unique challenges and opportunities.</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="bg-white p-6 rounded-xl shadow-lg border border-gray-100">
                    <img src="{{ asset('images/wabag/landscape.jpg') }}" 
                         alt="Wabag District Landscape" 
                         class="w-full h-auto rounded-lg">
                </div>
            </div>
        </div>
    </section>

    <!-- Development Pillars Section -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-6">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-serif font-bold text-wabag-green mb-4">Key Development Pillars</h2>
                <p class="text-lg max-w-2xl mx-auto text-gray-600">Our comprehensive approach to sustainable development across critical sectors</p>
                <div class="w-24 h-1 bg-wabag-yellow mx-auto mt-4"></div>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Education -->
                <div class="bg-white p-6 rounded-xl shadow-md border border-gray-100 hover:shadow-lg transition duration-300">
                    <div class="bg-wabag-yellow bg-opacity-10 p-3 rounded-full w-12 h-12 flex items-center justify-center mb-4">
                        <svg class="h-6 w-6 text-wabag-yellow" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-serif font-bold text-wabag-black mb-4">Education</h3>
                    <ul class="space-y-3 text-gray-600">
                        <li class="flex items-start">
                            <svg class="h-5 w-5 text-wabag-yellow mt-1 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            <span>Increase school enrollment rates</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="h-5 w-5 text-wabag-yellow mt-1 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            <span>Construct and upgrade school facilities</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="h-5 w-5 text-wabag-yellow mt-1 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            <span>Teacher training programs</span>
                        </li>
                    </ul>
                </div>

                <!-- Health -->
                <div class="bg-white p-6 rounded-xl shadow-md border border-gray-100 hover:shadow-lg transition duration-300">
                    <div class="bg-wabag-green bg-opacity-10 p-3 rounded-full w-12 h-12 flex items-center justify-center mb-4">
                        <svg class="h-6 w-6 text-wabag-green" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2 2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-serif font-bold text-wabag-black mb-4">Health</h3>
                    <ul class="space-y-3 text-gray-600">
                        <li class="flex items-start">
                            <svg class="h-5 w-5 text-wabag-green mt-1 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            <span>Upgrade health facilities and equipment</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="h-5 w-5 text-wabag-green mt-1 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            <span>Maternal and child health programs</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="h-5 w-5 text-wabag-green mt-1 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            <span>Disease prevention initiatives</span>
                        </li>
                    </ul>
                </div>

                <!-- Infrastructure -->
                <div class="bg-white p-6 rounded-xl shadow-md border border-gray-100 hover:shadow-lg transition duration-300">
                    <div class="bg-wabag-black bg-opacity-10 p-3 rounded-full w-12 h-12 flex items-center justify-center mb-4">
                        <svg class="h-6 w-6 text-wabag-black" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-serif font-bold text-wabag-black mb-4">Infrastructure</h3>
                    <ul class="space-y-3 text-gray-600">
                        <li class="flex items-start">
                            <svg class="h-5 w-5 text-wabag-black mt-1 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            <span>Road construction and maintenance</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="h-5 w-5 text-wabag-black mt-1 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            <span>Bridge construction projects</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="h-5 w-5 text-wabag-black mt-1 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            <span>Water and sanitation improvements</span>
                        </li>
                    </ul>
                </div>

                <!-- Economic Development -->
                <div class="bg-white p-6 rounded-xl shadow-md border border-gray-100 hover:shadow-lg transition duration-300">
                    <div class="bg-wabag-yellow bg-opacity-10 p-3 rounded-full w-12 h-12 flex items-center justify-center mb-4">
                        <svg class="h-6 w-6 text-wabag-yellow" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-serif font-bold text-wabag-black mb-4">Economic Growth</h3>
                    <ul class="space-y-3 text-gray-600">
                        <li class="flex items-start">
                            <svg class="h-5 w-5 text-wabag-yellow mt-1 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            <span>Support for agriculture and SMEs</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="h-5 w-5 text-wabag-yellow mt-1 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            <span>Skills training programs</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="h-5 w-5 text-wabag-yellow mt-1 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            <span>Market access initiatives</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Governance & Leadership Section -->
    <section id="leadership" class="py-16 bg-gray-50">
        <div class="container mx-auto px-6">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-serif font-bold text-wabag-green mb-4">Governance & Leadership</h2>
                <p class="text-lg max-w-2xl mx-auto text-gray-600">Our structure and strategic approach to district development</p>
                <div class="w-24 h-1 bg-wabag-yellow mx-auto mt-4"></div>
            </div>

            <div class="grid md:grid-cols-2 gap-8">
                <div class="bg-white p-8 rounded-xl shadow-lg border border-gray-100">
                    <h3 class="text-2xl font-serif font-bold text-wabag-black mb-6">Leadership Structure</h3>

                    <div class="space-y-6">
                        <!-- Chairman -->
                        <div class="flex items-start">
                            <div class="bg-wabag-yellow text-wabag-black font-bold rounded-full h-12 w-12 flex items-center justify-center mr-4 flex-shrink-0">1</div>
                            <div>
                                <h4 class="font-bold text-lg text-wabag-black">Chairman</h4>
                                <p class="text-gray-600">Hon. Dr. Lino Tom, MP (Wabag Member)</p>
                                <div class="mt-2 flex space-x-2">
                                    <span class="bg-wabag-yellow bg-opacity-20 text-wabag-black text-xs px-2 py-1 rounded">Executive</span>
                                    <span class="bg-wabag-green bg-opacity-20 text-wabag-green text-xs px-2 py-1 rounded">Policy</span>
                                </div>
                            </div>
                        </div>

                        <!-- LLG Presidents -->
                        <div class="flex items-start">
                            <div class="bg-wabag-yellow text-wabag-black font-bold rounded-full h-12 w-12 flex items-center justify-center mr-4 flex-shrink-0">2</div>
                            <div>
                                <h4 class="font-bold text-lg text-wabag-black">LLG Presidents</h4>
                                <p class="text-gray-600">Representing Wabag Urban, Wabag Rural, and Maramuni</p>
                                <div class="mt-2 flex space-x-2">
                                    <span class="bg-wabag-green bg-opacity-20 text-wabag-green text-xs px-2 py-1 rounded">Local Governance</span>
                                    <span class="bg-wabag-black bg-opacity-20 text-wabag-black text-xs px-2 py-1 rounded">Community</span>
                                </div>
                            </div>
                        </div>

                        <!-- Community Reps -->
                        <div class="flex items-start">
                            <div class="bg-wabag-yellow text-wabag-black font-bold rounded-full h-12 w-12 flex items-center justify-center mr-4 flex-shrink-0">3</div>
                            <div>
                                <h4 class="font-bold text-lg text-wabag-black">Community Representatives</h4>
                                <p class="text-gray-600">Women, Youth, Church, and Business sectors</p>
                                <div class="mt-2 flex flex-wrap gap-2">
                                    <span class="bg-wabag-black bg-opacity-20 text-wabag-black text-xs px-2 py-1 rounded">Diversity</span>
                                    <span class="bg-wabag-green bg-opacity-20 text-wabag-green text-xs px-2 py-1 rounded">Inclusion</span>
                                    <span class="bg-wabag-yellow bg-opacity-20 text-wabag-black text-xs px-2 py-1 rounded">Perspectives</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-gradient-to-br from-wabag-green to-wabag-black text-white p-8 rounded-xl shadow-lg">
                    <h3 class="text-2xl font-serif font-bold mb-6">Strategic Goals</h3>

                    <div class="space-y-6">
                        <div class="flex items-start">
                            <div class="bg-white bg-opacity-20 p-3 rounded-full mr-4 flex-shrink-0">
                                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                                </svg>
                            </div>
                            <div>
                                <h4 class="font-bold text-lg">National Alignment</h4>
                                <p class="text-white text-opacity-80">Implement PNG's Vision 2050 and Medium-Term Development Plan through locally relevant policies and programs.</p>
                            </div>
                        </div>

                        <div class="flex items-start">
                            <div class="bg-white bg-opacity-20 p-3 rounded-full mr-4 flex-shrink-0">
                                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                </svg>
                            </div>
                            <div>
                                <h4 class="font-bold text-lg">Rural Empowerment</h4>
                                <p class="text-white text-opacity-80">Ensure inclusive development that reaches all communities, especially remote and rural areas.</p>
                            </div>
                        </div>

                        <div class="flex items-start">
                            <div class="bg-white bg-opacity-20 p-3 rounded-full mr-4 flex-shrink-0">
                                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                                </svg>
                            </div>
                            <div>
                                <h4 class="font-bold text-lg">Transparency</h4>
                                <p class="text-white text-opacity-80">Maintain accountability through open communication, regular reporting, and community engagement.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Interactive Map Section -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-6">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-serif font-bold text-wabag-green mb-4">Wabag District Map</h2>
                <div class="w-24 h-1 bg-wabag-yellow mx-auto mt-4"></div>
            </div>

            <div class="bg-white p-4 rounded-xl shadow-lg border border-gray-100">
                <div class="relative h-96 w-full rounded-lg overflow-hidden bg-gray-100">
                    <div id="wabagMap" class="absolute inset-0 z-0"></div>
                    <div class="absolute inset-0 flex items-center justify-center z-10" id="mapLoading">
                        <div class="text-center p-6 bg-white bg-opacity-90 rounded-lg shadow-md">
                            <div class="animate-spin rounded-full h-10 w-10 border-b-2 border-wabag-yellow mx-auto mb-4"></div>
                            <h4 class="font-bold text-wabag-black mb-1">Loading District Map</h4>
                            <p class="text-gray-600 text-sm">Please wait while we load the interactive map</p>
                        </div>
                    </div>
                </div>

                <div class="mt-6 flex flex-wrap justify-center gap-3">
                    <div class="flex items-center px-3 py-1.5 bg-white rounded-full shadow-sm border border-gray-200">
                        <span class="inline-block w-3 h-3 bg-blue-600 mr-2 rounded-full"></span>
                        <span class="text-sm">Wabag Urban</span>
                    </div>
                    <div class="flex items-center px-3 py-1.5 bg-white rounded-full shadow-sm border border-gray-200">
                        <span class="inline-block w-3 h-3 bg-green-600 mr-2 rounded-full"></span>
                        <span class="text-sm">Wabag Rural</span>
                    </div>
                    <div class="flex items-center px-3 py-1.5 bg-white rounded-full shadow-sm border border-gray-200">
                        <span class="inline-block w-3 h-3 bg-red-600 mr-2 rounded-full"></span>
                        <span class="text-sm">Maramuni</span>
                    </div>
                    <div class="flex items-center px-3 py-1.5 bg-white rounded-full shadow-sm border border-gray-200">
                        <span class="inline-block w-3 h-3 bg-wabag-yellow mr-2 rounded-full"></span>
                        <span class="text-sm">District HQ</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact CTA Section -->
    <section class="py-16 bg-wabag-green text-white">
        <div class="container mx-auto px-6 text-center">
            <div class="max-w-3xl mx-auto">
                <h2 class="text-3xl font-serif font-bold mb-6">Get Involved With Our Work</h2>
                <p class="text-xl mb-8">We welcome community participation and feedback to ensure our programs meet local needs.</p>
                <div class="flex flex-col sm:flex-row justify-center gap-4">
                    <a href="/contact" class="bg-wabag-yellow hover:bg-yellow-600 text-wabag-black font-bold py-3 px-8 rounded-lg text-center transition duration-300">
                        Contact Us
                    </a>
                    <a href="/projects" class="bg-white hover:bg-gray-100 text-wabag-green font-bold py-3 px-8 rounded-lg text-center transition duration-300">
                        View Projects
                    </a>
                </div>
            </div>
        </div>
    </section>

    @push('scripts')
    <!-- Leaflet JS for interactive maps -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        try {
            // Initialize the map
            const map = L.map('wabagMap', {
                zoomControl: false,
                attributionControl: false
            }).setView([-5.4833, 143.7167], 10); // Wabag coordinates

            // Add base map layer
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(map);

            // Sample LLG boundary coordinates (should be replaced with actual GeoJSON)
            const llgBoundaries = {
                "Wabag Urban": {
                    color: "#3b82f6", // blue-600
                    coordinates: [[143.7183303342154,-5.489842254865053], [143.7183303342154,-5.494690784785703],
                    [143.72482128003338,-5.494690784785703], [143.72482128003338,-5.489842254865053]]
                },
                "Wabag Rural": {
                    color: "#16a34a", // green-600
                    coordinates: [[-5.50,143.68], [-5.52,143.72], [-5.48,143.75], [-5.45,143.73]]
                },
                "Maramuni": {
                    color: "#dc2626", // red-600
                    coordinates: [[-5.55,143.65], [-5.58,143.68], [-5.60,143.72], [-5.56,143.75]]
                }
            };

            // Add polygons for each LLG
            Object.entries(llgBoundaries).forEach(([name, data]) => {
                L.polygon(data.coordinates, {
                    color: data.color,
                    fillColor: data.color,
                    fillOpacity: 0.15,
                    weight: 2,
                    dashArray: '5,5'
                }).addTo(map)
                .bindPopup(`<b>${name} LLG</b><br>Population: ~${estimatePopulation(name)}`);
            });

            // Add district center marker
            L.marker([-5.4833, 143.7167], {
                icon: L.divIcon({
                    html: `<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="#FFD700" class="w-6 h-6">
                            <path fill-rule="evenodd" d="M11.54 22.351l.07.04.028.016a.76.76 0 00.723 0l.028-.015.071-.041a16.975 16.975 0 001.144-.742 19.58 19.58 0 002.683-2.282c1.944-1.99 3.963-4.98 3.963-8.827a8.25 8.25 0 00-16.5 0c0 3.846 2.02 6.837 3.963 8.827a19.58 19.58 0 002.682 2.282 16.975 16.975 0 001.145.742zM12 13.5a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd" />
                          </svg>`,
                    className: '',
                    iconSize: [32, 32],
                    iconAnchor: [16, 32]
                })
            }).addTo(map)
            .bindPopup("<b>Wabag Town</b><br>District Headquarters")
            .openPopup();

            // Simple population estimator
            function estimatePopulation(llg) {
                const base = {
                    "Wabag Urban": 35000,
                    "Wabag Rural": 45000,
                    "Maramuni": 20000
                };
                return (base[llg] || 25000).toLocaleString();
            }

            // Hide loading spinner when map is ready
            document.getElementById('mapLoading').style.display = 'none';

            // Add zoom controls
            L.control.zoom({
                position: 'topright'
            }).addTo(map);

        } catch (error) {
            console.error("Map initialization failed:", error);
            document.getElementById('mapLoading').innerHTML = `
                <div class="text-center p-6 bg-white bg-opacity-90 rounded-lg shadow-md">
                    <svg class="h-10 w-10 text-red-500 mx-auto mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                    </svg>
                    <h4 class="font-bold text-wabag-black mb-1">Map Loading Failed</h4>
                    <p class="text-gray-600 text-sm">We couldn't load the interactive map. Please try again later.</p>
                </div>
            `;
        }
    });
    </script>
    @endpush
@endsection