@extends('layouts.public')

@section('title', 'Wabag District Development Authority')

@section('content')
<div class="home-enterprise">
    <!-- Hero Section with Slideshow -->
    <section class="home-animate">
        <div class="relative h-screen max-h-[600px] overflow-hidden">

            {{-- ================= SLIDES ================= --}}
            @php
                $slides = [
                    [
                        'image' => 'images/about-us/slide-img/road-upgrade.jpg',
                        'title' => 'Developing Wabag District Together',
                        'description' => 'Empowering communities through sustainable development projects and initiatives.',
                    ],
                    [
                        'image' => 'images/about-us/slide-img/hospital-upgrade.jpg',
                        'title' => 'Strengthening Healthcare Services',
                        'description' => 'Upgrading medical facilities to improve access, quality care, and community wellbeing across Wabag District.',
                    ],
                    [
                        'image' => 'images/about-us/slide-img/school-upgrade.jpg',
                        'title' => 'Investing in Education for Tomorrow',
                        'description' => 'Building better learning environments to empower the next generation of leaders in Enga Province.',
                    ],
                    [
                        'image' => 'images/about-us/slide-img/sports.jpg',
                        'title' => 'Empowering Youth & Community Growth',
                        'description' => 'Promoting sports, unity, and social development to build stronger and healthier communities.',
                    ],
                ];
            @endphp

            {{-- Background Slides --}}
            @foreach($slides as $index => $slide)
                <div class="absolute inset-0 w-full h-full transition-opacity duration-1000 ease-in-out {{ $index === 0 ? 'opacity-100 z-10' : 'opacity-0 z-0' }} slide"
                    data-index="{{ $index }}">

                    <img src="{{ asset($slide['image']) }}"
                        alt="Slide {{ $index + 1 }}"
                        class="w-full h-full object-cover">

                    <div class="absolute inset-0 bg-gradient-to-r from-wabag-green/80 to-wabag-black/80"></div>
                </div>
            @endforeach

            {{-- ================= CONTENT ================= --}}
            <div class="absolute inset-0 flex items-center justify-center text-center px-6 z-20">
                <div class="max-w-3xl mx-auto text-white">

                    <h1 id="slide-title"
                    class="text-4xl md:text-5xl lg:text-6xl font-serif font-bold mb-6 slide-text-hidden">
                        {{ $slides[0]['title'] }}
                    </h1>

                    <p id="slide-description"
                    class="text-xl md:text-2xl mb-8 slide-text-hidden">
                        {{ $slides[0]['description'] }}
                    </p>

                </div>
            </div>

            {{-- ================= DOT NAVIGATION ================= --}}
            <div class="absolute bottom-8 left-0 right-0 flex justify-center space-x-2 z-20">
                @foreach($slides as $index => $slide)
                    <button class="w-3 h-3 rounded-full bg-white bg-opacity-50 hover:bg-opacity-100 transition dot"
                            data-slide="{{ $index }}">
                    </button>
                @endforeach
            </div>

        </div>
    </section>

    <!-- About Section -->
    <section class="home-animate py-16 bg-white">
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
{{--
    <!-- Featured Projects -->
    <section class="home-animate py-16 bg-gray-50">
        <div class="container mx-auto px-6">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-serif font-bold text-wabag-green mb-4">Current Projects</h2>
                <p class="text-lg max-w-2xl mx-auto text-gray-600">
                    <span id="projects-typing" data-text="Discover our ongoing and completed development projects transforming communities across Wabag District."></span>
                    <span class="typing-cursor">|</span>
                </p>
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
    <!-- Featured Projects -->
    <section class="home-animate py-16 bg-gray-50">
        <div class="container mx-auto px-6">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-serif font-bold text-wabag-green mb-4">Current Projects</h2>
                <p class="text-lg max-w-2xl mx-auto text-gray-600">
                    <span id="projects-typing" data-text="Discover our ongoing and completed development projects transforming communities across Wabag District."></span>
                    <span class="typing-cursor">|</span>
                </p>
                <div class="w-24 h-1 bg-wabag-yellow mx-auto mt-4"></div>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                @forelse($projects as $project)
                <div class="bg-white border border-gray-200 rounded-xl shadow-sm hover:shadow-md transition duration-300 flex flex-col">
                    <div class="project-image h-48 overflow-hidden">
                        @if($project->featured_image)
                            <img src="{{ Storage::url($project->featured_image) }}" alt="{{ $project->name }}" class="w-full h-full object-cover">
                        @else
                            <div class="h-full bg-wabag-green/10 flex items-center justify-center">
                                <svg class="h-16 w-16 text-wabag-green" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    @if($project->projectType && str_contains(strtolower($project->projectType->type), 'health'))
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                    @elseif($project->projectType && str_contains(strtolower($project->projectType->type), 'education'))
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7v8a2 2 0 002 2h6M8 7V5a2 2 0 012-2h4.586a1 1 0 01.707.293l4.414 4.414a1 1 0 01.293.707V15a2 2 0 01-2 2h-2M8 7H6a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2v-2"></path>
                                    @else
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zM9 10l12-3"></path>
                                    @endif
                                </svg>
                            </div>
                        @endif
                    </div>
                    <div class="p-6 flex-grow">
                        @if($project->projectType)
                            <span class="inline-block bg-wabag-green/10 text-wabag-green text-xs px-3 py-1 rounded-full mb-3">
                                {{ $project->projectType->type }}
                            </span>
                        @endif
                        <h3 class="text-xl font-serif font-bold text-wabag-black mb-3">{{ $project->name }}</h3>
                        <ul class="space-y-3 text-sm text-gray-600 mb-6">
                            <li class="flex items-start">
                                <svg class="h-4 w-4 text-wabag-yellow mt-1 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                                <span>{{ $project->location }}</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="h-4 w-4 text-wabag-yellow mt-1 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                                <span>{{ $project->ward->name ?? 'N/A' }} Ward</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="h-4 w-4 text-wabag-yellow mt-1 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                                <span>Budget: PGK{{ number_format($project->budget, 2) }}</span>
                            </li>
                        </ul>
                        <div class="mt-auto">
                            <div class="flex justify-between text-sm mb-1 text-gray-500">
                                <span>Progress</span>
                                <span>{{ $project->progress_percentage }}% Complete</span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-2 mb-6">
                                <div class="bg-wabag-yellow h-2 rounded-full" style="width: {{ $project->progress_percentage }}%"></div>
                            </div>
                            <a href="#" class="w-full border border-wabag-green text-wabag-green hover:bg-wabag-green hover:text-white font-bold py-2 px-4 rounded-lg text-center transition duration-300 inline-flex items-center justify-center">
                                Read More
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-span-3 text-center py-12">
                    <p class="text-gray-600">No projects available at the moment.</p>
                </div>
                @endforelse
            </div>

            <div class="text-center mt-12">
                <a href="#" class="inline-block bg-wabag-green hover:bg-green-800 text-white font-bold py-3 px-8 rounded-lg transition duration-300">View All Projects</a>
            </div>
        </div>
    </section> --}}
    <section class="home-animate py-16 bg-gray-50">
        <div class="container mx-auto px-6">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-serif font-bold text-wabag-green mb-4">Current Projects</h2>
                <p class="text-lg max-w-2xl mx-auto text-gray-600">Discover our ongoing and completed development projects transforming communities across Wabag District.</p>
                <div class="w-24 h-1 bg-wabag-yellow mx-auto mt-4"></div>
            </div>

            <!-- Project Status Filter -->
            <div class="flex justify-center mb-8">
                <div class="inline-flex rounded-md shadow-sm" role="group">
                    <button type="button" data-filter="all"
                            class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-200 rounded-l-lg hover:bg-gray-100 focus:z-10 focus:ring-2 focus:ring-wabag-green active:bg-wabag-green active:text-white active:border-wabag-green">
                        All Projects
                    </button>
                    <button type="button" data-filter="in_progress"
                            class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border-t border-b border-gray-200 hover:bg-gray-100 focus:z-10 focus:ring-2 focus:ring-wabag-green">
                        Ongoing
                    </button>
                    <button type="button" data-filter="completed"
                            class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border-t border-b border-gray-200 hover:bg-gray-100 focus:z-10 focus:ring-2 focus:ring-wabag-green">
                        Completed
                    </button>
                    <button type="button" data-filter="planned"
                            class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-200 rounded-r-lg hover:bg-gray-100 focus:z-10 focus:ring-2 focus:ring-wabag-green">
                        Planned
                    </button>
                </div>
            </div>

            <div class="grid md:grid-cols-3 gap-8" id="projects-container">
                @forelse($projects as $project)
                <div class="project-card bg-white border border-gray-200 rounded-xl shadow-sm hover:shadow-md transition duration-300 flex flex-col" data-status="{{ $project->status }}">
                    <div class="project-image h-48 overflow-hidden relative">
                        @if($project->featured_image)
                            <img src="{{ Storage::url($project->featured_image) }}" alt="{{ $project->title }}" class="w-full h-full object-cover">
                        @else
                            <div class="h-full bg-wabag-green/10 flex items-center justify-center">
                                <svg class="h-16 w-16 text-wabag-green" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    @if($project->projectType && str_contains(strtolower($project->projectType->type), 'health'))
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                    @elseif($project->projectType && str_contains(strtolower($project->projectType->type), 'education'))
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7v8a2 2 0 002 2h6M8 7V5a2 2 0 012-2h4.586a1 1 0 01.707.293l4.414 4.414a1 1 0 01.293.707V15a2 2 0 01-2 2h-2M8 7H6a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2v-2"></path>
                                    @else
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zM9 10l12-3"></path>
                                    @endif
                                </svg>
                            </div>
                        @endif
                        <div class="absolute top-3 right-3">
                            <span class="px-3 py-1 rounded-full text-xs font-medium [box-shadow:0_2px_4px_rgba(0,0,0,0.1)]
                                @if($project->status === 'completed') bg-green-100 text-green-800
                                @elseif($project->status === 'in_progress') bg-blue-100 text-blue-800
                                @elseif($project->status === 'planned') bg-yellow-100 text-yellow-800
                                @else bg-gray-100 text-gray-800 @endif">
                                {{ ucfirst(str_replace('_', ' ', $project->status)) }}
                            </span>
                        </div>
                    </div>
                    <div class="p-6 flex-grow">
                        @if($project->projectType)
                            <span class="inline-block bg-wabag-green/10 text-wabag-green text-xs px-3 py-1 rounded-full mb-3">
                                {{ $project->projectType->type }}
                            </span>
                        @endif
                        <h3 class="text-xl font-serif font-bold text-wabag-black mb-3">{{ $project->title }}</h3>
                        <p class="text-gray-600 text-sm mb-4 line-clamp-2">{{ strip_tags($project->description) }}</p>
                        <ul class="space-y-3 text-sm text-gray-600 mb-6">
                            <li class="flex items-start">
                                <svg class="h-4 w-4 text-wabag-yellow mt-1 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/>
                                </svg>
                                <span>{{ $project->location }}</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="h-4 w-4 text-wabag-yellow mt-1 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/>
                                </svg>
                                <span>
                                    {{ $project->start_date->format('M Y') }} -
                                    @if($project->actual_end_date)
                                        {{ $project->actual_end_date->format('M Y') }}
                                    @else
                                        {{ $project->expected_end_date->format('M Y') }} (est.)
                                    @endif
                                </span>
                            </li>
                            <li class="flex items-start">
                                <svg class="h-4 w-4 text-wabag-yellow mt-1 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/>
                                </svg>
                                <span>Budget: PGK {{ number_format($project->budget, 2) }}</span>
                            </li>
                        </ul>
                        <div class="mt-auto">
                            <div class="flex justify-between text-sm mb-1 text-gray-500">
                                <span>Progress</span>
                                <span>{{ $project->progress_percentage }}% Complete</span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-2 mb-6">
                                <div class="h-2 rounded-full
                                    @if($project->progress_percentage >= 80) bg-green-500
                                    @elseif($project->progress_percentage >= 50) bg-blue-500
                                    @else bg-wabag-yellow @endif"
                                    style="width: {{ $project->progress_percentage }}%">
                                </div>
                            </div>
                            <a href="{{ route('projects.show', $project->id) }}" class="w-full border border-wabag-green text-wabag-green hover:bg-wabag-green hover:text-white font-bold py-2 px-4 rounded-lg text-center transition duration-300 inline-flex items-center justify-center">
                                View Details
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-span-3 text-center py-12">
                    <p class="text-gray-600">No projects available at the moment. Please check back later.</p>
                </div>
                @endforelse
            </div>

            @if(method_exists($projects, 'hasPages') && $projects->hasPages())
                <div class="mt-12">
                    {{ $projects->links() }}
                </div>
            @else
                <div class="text-center mt-12">
                    <a href="{{ route('projects.index') }}" class="inline-block bg-wabag-green hover:bg-green-800 text-white font-bold py-3 px-8 rounded-lg transition duration-300">
                        View All Projects
                    </a>
                </div>
            @endif
        </div>
    </section>
{{--
    <!-- News & Updates -->
    <section class="home-animate py-16 bg-white">
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
--}}
    <!-- News & Updates Section -->
    <section class="home-animate py-16 bg-white">
        <div class="container mx-auto px-6">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-serif font-bold text-wabag-green mb-4">News & Updates</h2>
                <div class="w-24 h-1 bg-wabag-yellow mx-auto mt-4"></div>
            </div>

            @if($newsUpdates->count() > 0)
            <div class="relative">
                <!-- Carousel Container -->
                <div class="news-carousel overflow-hidden">
                    <div class="flex transition-transform duration-300 ease-in-out">
                        @foreach($newsUpdates->chunk(3) as $chunk)
                        <div class="w-full flex-shrink-0 px-2">
                            <div class="grid md:grid-cols-3 gap-8">
                                @foreach($chunk as $news)
                                <div class="bg-white rounded-xl shadow-md overflow-hidden border border-gray-200 hover:shadow-lg transition duration-300">
                                    @if($news->featured_image)
                                    <img src="{{ Storage::url($news->featured_image) }}" alt="{{ $news->title }}" class="w-full h-48 object-cover">
                                    @else
                                    <div class="w-full h-48 bg-wabag-green/10 flex items-center justify-center">
                                        <svg class="h-16 w-16 text-wabag-green" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                                        </svg>
                                    </div>
                                    @endif
                                    <div class="p-6">
                                        <div class="flex items-center text-sm text-gray-500 mb-3">
                                            @if($news->formatted_published_date)
                                                <span>{{ $news->formatted_published_date }}</span>
                                            @endif
                                            @if($news->newsCategory)
                                                <span class="mx-2">•</span>
                                                <span class="text-wabag-green">{{ $news->newsCategory->category }}</span>
                                            @endif
                                        </div>
                                        <h3 class="text-xl font-bold text-wabag-black mb-3">{{ $news->title }}</h3>
                                        <p class="text-gray-600 mb-4">{{ Str::limit(strip_tags($news->content), 100) }}</p>
                                        <a href="{{ route('public.news-updates.show', $news->slug) }}" class="text-wabag-green hover:text-green-800 font-medium inline-flex items-center">
                                            Read More
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                <!-- Navigation Arrows -->
                <button class="news-carousel-prev absolute left-0 top-1/2 -translate-y-1/2 -ml-4 bg-white p-2 rounded-full shadow-md hover:bg-gray-100 transition z-10">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-wabag-green" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                    </svg>
                </button>
                <button class="news-carousel-next absolute right-0 top-1/2 -translate-y-1/2 -mr-4 bg-white p-2 rounded-full shadow-md hover:bg-gray-100 transition z-10">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-wabag-green" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                    </svg>
                </button>
            </div>
            @else
            <div class="text-center py-12">
                <p class="text-gray-600">No news updates available at the moment.</p>
            </div>
            @endif

            <div class="text-center mt-12">
                <a href="{{ route('public.news-updates') }}" class="inline-block border-2 border-wabag-green text-wabag-green hover:bg-wabag-green hover:text-white font-bold py-3 px-8 rounded-lg transition duration-300">
                    View All News
                </a>
            </div>
        </div>
    </section>
    <!-- Stats Section -->
    <section class="home-animate py-16 bg-wabag-green text-white">
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
    <section class="home-animate py-16 bg-wabag-yellow/10">
        <div class="container mx-auto px-6">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-serif font-bold text-wabag-green mb-4">
                    {{ $exploreSection->title ?? 'Explore Wabag District' }}
                </h2>
                <p class="text-lg max-w-2xl mx-auto text-gray-600">
                    {{ $exploreSection->subtitle ?? 'Discover the rich cultural heritage and natural beauty of our Highlands home' }}
                </p>
                <div class="w-24 h-1 bg-wabag-yellow mx-auto mt-4"></div>
            </div>

            @if(($exploreItems ?? collect())->count() > 0)
                @php
                    $exploreChunks = $exploreItems->chunk(3);
                @endphp
                <div class="relative overflow-hidden" data-explore-carousel>
                    <div class="explore-track flex transition-transform duration-700 ease-in-out">
                        @foreach($exploreChunks as $chunk)
                            <div class="explore-slide w-full shrink-0">
                                <div class="grid md:grid-cols-3 gap-8">
                                    @foreach($chunk as $item)
                                        <div class="bg-white rounded-xl shadow-lg overflow-hidden border border-gray-200 hover:shadow-xl transition duration-300">
                                            <div class="h-48 overflow-hidden">
                                                <img src="{{ $item->image_path ? asset('storage/' . $item->image_path) : asset('images/wabag/landscape.jpg') }}"
                                                     alt="{{ $item->title }}"
                                                     class="w-full h-full object-cover">
                                            </div>
                                            <div class="p-6">
                                                <div class="flex items-center text-sm text-wabag-green mb-3">
                                                    @switch($item->icon)
                                                        @case('cultural')
                                                            <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7v8a2 2 0 002 2h6M8 7V5a2 2 0 012-2h4.586a1 1 0 01.707.293l4.414 4.414a1 1 0 01.293.707V15a2 2 0 01-2 2h-2M8 7H6a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2v-2"></path>
                                                            </svg>
                                                            @break
                                                        @case('nature')
                                                            <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path>
                                                            </svg>
                                                            @break
                                                        @case('community')
                                                            <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                                                            </svg>
                                                            @break
                                                        @default
                                                            <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7v8a2 2 0 002 2h6M8 7V5a2 2 0 012-2h4.586a1 1 0 01.707.293l4.414 4.414a1 1 0 01.293.707V15a2 2 0 01-2 2h-2M8 7H6a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2v-2"></path>
                                                            </svg>
                                                    @endswitch
                                                    <span>{{ $item->category_label }}</span>
                                                </div>
                                                <h3 class="text-xl font-bold text-wabag-black mb-3">{{ $item->title }}</h3>
                                                <p class="text-gray-600 mb-4">{{ $item->description }}</p>
                                            @php
                                                $detailUrl = $item->slug
                                                    ? route('public.explore-wabag.show', $item->slug)
                                                    : $item->link_url;
                                            @endphp
                                            @if($detailUrl)
                                                <a href="{{ $detailUrl }}" class="text-wabag-green hover:text-green-800 font-medium inline-flex items-center">
                                                    {{ $item->link_label ?? 'Learn More' }}
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                                    </svg>
                                                </a>
                                            @endif
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>
                    @if($exploreChunks->count() > 1)
                        <button type="button"
                                class="explore-prev absolute left-2 top-1/2 -translate-y-1/2 bg-white/80 hover:bg-white text-wabag-green border border-gray-200 rounded-full h-10 w-10 flex items-center justify-center shadow-sm"
                                aria-label="Previous slide">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                            </svg>
                        </button>
                        <button type="button"
                                class="explore-next absolute right-2 top-1/2 -translate-y-1/2 bg-white/80 hover:bg-white text-wabag-green border border-gray-200 rounded-full h-10 w-10 flex items-center justify-center shadow-sm"
                                aria-label="Next slide">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                        </button>
                        <div class="explore-dots absolute -bottom-6 left-0 right-0 flex justify-center space-x-2">
                            @foreach($exploreChunks as $index => $chunk)
                                <button type="button"
                                        class="explore-dot h-2.5 w-2.5 rounded-full bg-wabag-green/30 {{ $index === 0 ? 'bg-wabag-green' : '' }}"
                                        data-explore-dot="{{ $index }}"
                                        aria-label="Go to slide {{ $index + 1 }}"></button>
                            @endforeach
                        </div>
                    @endif
                </div>
            @else
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
                @endif
        </div>
    </section>

    <!-- Slideshow JavaScript -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {

            /* ===================================
            HERO SLIDER (IMAGE + TEXT SYNCED)
            ==================================== */

            const slides = document.querySelectorAll('.slide');
            const dots = document.querySelectorAll('.dot');
            const title = document.getElementById('slide-title');
            const description = document.getElementById('slide-description');

            const slidesContent = @json($slides ?? []);

            let currentSlide = 0;
            let slideInterval;

            function showSlide(index) {

                // Hide all slides
                slides.forEach((slide, i) => {
                    slide.classList.remove('opacity-100', 'z-10');
                    slide.classList.add('opacity-0', 'z-0');

                    if (i === index) {
                        slide.classList.remove('opacity-0', 'z-0');
                        slide.classList.add('opacity-100', 'z-10');
                    }
                });

                // Remove animation classes first
                title.classList.remove('slide-text-show');
                description.classList.remove('slide-text-show');

                title.classList.add('slide-text-hidden');
                description.classList.add('slide-text-hidden');

                // Small delay before text appears
                setTimeout(() => {

                    if (slidesContent[index]) {
                        title.innerText = slidesContent[index].title;
                        description.innerText = slidesContent[index].description;
                    }

                    // Trigger animation
                    title.classList.remove('slide-text-hidden');
                    description.classList.remove('slide-text-hidden');

                    title.classList.add('slide-text-show');
                    description.classList.add('slide-text-show');

                }, 400); // Delay after image fades in

                // Update dots
                dots.forEach(dot => dot.classList.remove('bg-opacity-100'));
                if (dots[index]) {
                    dots[index].classList.add('bg-opacity-100');
                }

                currentSlide = index;
            }

            function nextSlide() {
                currentSlide = (currentSlide + 1) % slides.length;
                showSlide(currentSlide);
            }

            function startSlideShow() {
                slideInterval = setInterval(nextSlide, 6000);
            }

            function resetSlideShow() {
                clearInterval(slideInterval);
                startSlideShow();
            }

            if (slides.length > 0) {
                showSlide(0);
                startSlideShow();
            }

            dots.forEach(dot => {
                dot.addEventListener('click', function () {
                    const slideIndex = parseInt(this.dataset.slide);
                    showSlide(slideIndex);
                    resetSlideShow();
                });
            });

            /* ===================================
            NEWS CAROUSEL
            ==================================== */

            const carousel = document.querySelector('.news-carousel');
            const carouselSlides = document.querySelectorAll('.news-carousel > div > div');
            const prevBtn = document.querySelector('.news-carousel-prev');
            const nextBtn = document.querySelector('.news-carousel-next');

            if (carousel && carouselSlides.length > 0) {

                let currentIndex = 0;
                const slideCount = carouselSlides.length;
                const slideWidth = 100;

                function updateCarousel() {
                    carousel.querySelector('div').style.transform =
                        `translateX(-${currentIndex * slideWidth}%)`;
                }

                prevBtn?.addEventListener('click', () => {
                    currentIndex = (currentIndex > 0)
                        ? currentIndex - 1
                        : slideCount - 1;
                    updateCarousel();
                });

                nextBtn?.addEventListener('click', () => {
                    currentIndex = (currentIndex < slideCount - 1)
                        ? currentIndex + 1
                        : 0;
                    updateCarousel();
                });

                setInterval(() => {
                    currentIndex = (currentIndex < slideCount - 1)
                        ? currentIndex + 1
                        : 0;
                    updateCarousel();
                }, 10000);
            }

            /* ===================================
            EXPLORE WABAG CAROUSEL
            ==================================== */

            const exploreCarousel = document.querySelector('[data-explore-carousel]');
            if (exploreCarousel) {
                const exploreTrack = exploreCarousel.querySelector('.explore-track');
                const exploreSlides = exploreCarousel.querySelectorAll('.explore-slide');
                const explorePrev = exploreCarousel.querySelector('.explore-prev');
                const exploreNext = exploreCarousel.querySelector('.explore-next');
                const exploreDots = exploreCarousel.querySelectorAll('[data-explore-dot]');
                let exploreIndex = 0;
                const exploreIntervalMs = 8000;
                let exploreTimer;

                const showExploreSlide = (index) => {
                    if (!exploreTrack) return;
                    exploreTrack.style.transform = `translateX(-${index * 100}%)`;
                    exploreDots.forEach((dot, i) => {
                        dot.classList.toggle('bg-wabag-green', i === index);
                        dot.classList.toggle('bg-wabag-green/30', i !== index);
                    });
                };

                const nextExploreSlide = () => {
                    exploreIndex = (exploreIndex + 1) % exploreSlides.length;
                    showExploreSlide(exploreIndex);
                };

                const prevExploreSlide = () => {
                    exploreIndex = (exploreIndex - 1 + exploreSlides.length) % exploreSlides.length;
                    showExploreSlide(exploreIndex);
                };

                const startExploreAuto = () => {
                    exploreTimer = setInterval(nextExploreSlide, exploreIntervalMs);
                };

                const stopExploreAuto = () => {
                    clearInterval(exploreTimer);
                };

                if (exploreSlides.length > 1) {
                    startExploreAuto();

                    explorePrev?.addEventListener('click', () => {
                        stopExploreAuto();
                        prevExploreSlide();
                        startExploreAuto();
                    });

                    exploreNext?.addEventListener('click', () => {
                        stopExploreAuto();
                        nextExploreSlide();
                        startExploreAuto();
                    });

                    exploreDots.forEach((dot) => {
                        dot.addEventListener('click', () => {
                            const targetIndex = Number(dot.dataset.exploreDot || 0);
                            stopExploreAuto();
                            exploreIndex = targetIndex;
                            showExploreSlide(exploreIndex);
                            startExploreAuto();
                        });
                    });

                    exploreCarousel.addEventListener('mouseenter', stopExploreAuto);
                    exploreCarousel.addEventListener('mouseleave', startExploreAuto);
                }
            }



            /* ===================================
            PROJECT FILTER
            ==================================== */

            const filterButtons = document.querySelectorAll('[data-filter]');
            const projectCards = document.querySelectorAll('.project-card');

            filterButtons.forEach(button => {

                button.addEventListener('click', function () {

                    // Update active button style
                    filterButtons.forEach(btn => {
                        btn.classList.remove(
                            'bg-wabag-green',
                            'text-white',
                            'border-wabag-green'
                        );
                        btn.classList.add(
                            'bg-white',
                            'text-gray-700',
                            'border-gray-200'
                        );
                    });

                    this.classList.remove(
                        'bg-white',
                        'text-gray-700',
                        'border-gray-200'
                    );
                    this.classList.add(
                        'bg-wabag-green',
                        'text-white',
                        'border-wabag-green'
                    );

                    const filterValue = this.dataset.filter;

                    projectCards.forEach(card => {
                        if (
                            filterValue === 'all' ||
                            card.dataset.status === filterValue
                        ) {
                            card.classList.remove('hidden');
                            card.classList.add('flex');
                        } else {
                            card.classList.remove('flex');
                            card.classList.add('hidden');
                        }
                    });

                });

            });

            /* ===================================
            TYPING EFFECT - CURRENT PROJECTS
            ==================================== */

            const typingEl = document.getElementById('projects-typing');

            if (typingEl) {
                const fullText = typingEl.dataset.text || '';
                let idx = 0;
                let direction = 1;
                const typeSpeed = 30;
                const pauseTime = 1600;

                const tick = () => {
                    typingEl.textContent = fullText.slice(0, idx);

                    if (direction === 1 && idx >= fullText.length) {
                        direction = -1;
                        setTimeout(tick, pauseTime);
                        return;
                    }

                    if (direction === -1 && idx <= 0) {
                        direction = 1;
                        setTimeout(tick, 600);
                        return;
                    }

                    idx += direction;
                    setTimeout(tick, typeSpeed);
                };

                tick();
            }

        });
            /* ===================================
            ENTERPRISE MOTION
            ==================================== */

            const homeRoot = document.querySelector('.home-enterprise');

            if (homeRoot) {
                homeRoot.querySelectorAll('.shadow-sm, .shadow-lg').forEach((card) => {
                    card.classList.add('hover-lift');
                });

                const revealTargets = new Set();

                homeRoot.querySelectorAll('.home-animate').forEach((section) => {
                    const container = section.querySelector('.container');
                    if (container) {
                        Array.from(container.children).forEach((child) => {
                            revealTargets.add(child);
                        });
                    }

                    section.querySelectorAll('.grid > *').forEach((item) => {
                        revealTargets.add(item);
                    });
                });

                revealTargets.forEach((el) => {
                    el.classList.add('reveal-item');
                });

                const observer = new IntersectionObserver((entries) => {
                    entries.forEach((entry) => {
                        if (entry.isIntersecting) {
                            entry.target.classList.add('is-visible');
                            observer.unobserve(entry.target);
                        }
                    });
                }, {
                    threshold: 0.18,
                    rootMargin: '0px 0px -10% 0px',
                });

                revealTargets.forEach((el) => observer.observe(el));
            }

        </script>

</div>
@endsection
