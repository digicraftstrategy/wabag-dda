@extends('layouts.public')

@section('title', 'Contact Us | Wabag DDA')

@section('content')

<style>
    [x-cloak] { display: none !important; }
</style>

<div x-data="{ openForm: false, mapZoom: false }">

    {{-- HERO SECTION --}}
    <section class="relative h-[400px] md:h-[500px] overflow-hidden">

        <div class="absolute inset-0 w-full h-full">
            <img src="{{ Vite::asset('resources/images/Wabag_Town.avif') }}"
                 alt="Wabag Town"
                 class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-r from-wabag-green/80 to-wabag-black/80"></div>
        </div>

        <div class="absolute inset-0 flex items-center justify-center text-center px-6 z-20">
            <div class="max-w-3xl mx-auto text-white">
            
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-serif font-bold mb-6">
                    Contact Wabag District Development Authority
                </h1>

                <p class="text-xl md:text-2xl mb-8">
                    We are here to serve you. Reach out for inquiries, feedback, or partnership opportunities.
                </p>

                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    {{-- OPEN MODAL FORM --}}
                    <button
                        @click="openForm = true"
                        class="bg-wabag-yellow hover:bg-yellow-600 text-wabag-black font-bold py-3 px-6 rounded-lg transition duration-300">
                        Send a Message
                    </button>
                    {{-- VIEW LOCATION WITH ANIMATION --}}
                    <button
                        @click="
                            document.getElementById('location-section').scrollIntoView({ behavior: 'smooth' });
                            setTimeout(() => mapZoom = true, 600);
                        "
                        class="bg-white hover:bg-gray-100 text-wabag-green font-bold py-3 px-6 rounded-lg transition duration-300">
                        View Location
                    </button>
                </div>
            </div>
        </div>
    </section>

    {{-- BODY SECTION --}}
    <section id="location-section" class="py-16 bg-gray-50">
        <div class="container mx-auto px-6 max-w-7xl">

            <div class="grid md:grid-cols-2 gap-10">

                {{-- CONTACT INFO --}}
                <div class="bg-wabag-green/5 p-8 rounded-xl border border-wabag-green/20">

                    <h2 class="text-2xl font-bold text-wabag-green mb-6">
                        Head Office Information
                    </h2>

                    <div class="space-y-5 text-gray-700">

                        <p><strong>Address:</strong><br>
                            Wabag District Headquarters<br>
                            P.O. Box 5218, Wabag Town<br>
                            Enga Province, Papua New Guinea
                        </p>

                        <p><strong>Phone:</strong> +675 547 12345</p>
                        <p><strong>Email:</strong> info@wabagdda.gov.pg</p>
                        <p><strong>Office Hours:</strong> Monday – Friday (8:00 AM – 4:30 PM)</p>
                    </div>

                    {{-- ANIMATED MAP CONTAINER --}}
                    <div 
                        class="mt-8 rounded-lg overflow-hidden shadow transition-all duration-700 ease-in-out relative"
                        :class="mapZoom ? 'fixed inset-0 z-50 bg-white p-6 rounded-none' : ''"
                    >

                        {{-- CLOSE BUTTON WHEN ZOOMED --}}
                        <button
                            x-show="mapZoom"
                            x-transition
                            @click="mapZoom = false"
                            class="absolute top-4 right-4 bg-white shadow px-3 py-1 rounded text-sm font-semibold z-50">
                            Close Map
                        </button>

                        <iframe
                            src="https://www.google.com/maps?q=Wabag,+Papua+New+Guinea&output=embed"
                            width="100%"
                            :height="mapZoom ? '100%' : '250'"
                            class="transition-all duration-700 ease-in-out"
                            style="border:0;"
                            allowfullscreen=""
                            loading="lazy">
                        </iframe>
                    </div>

                </div>

                {{-- STATIC CONTACT FORM --}}
                <div class="bg-white p-8 rounded-2xl shadow-lg">
                    <h2 class="text-3xl font-serif font-bold text-wabag-green mb-6">
                        Send Us a Message
                    </h2>

                    <form action="{{ route('contact.send') }}" method="POST" class="space-y-5">
                        @csrf

                        <input type="text" name="name"
                            placeholder="Full Name"
                            class="w-full border-gray-300 rounded-md focus:ring-wabag-green focus:border-wabag-green">

                        <input type="email" name="email"
                            placeholder="Email Address"
                            class="w-full border-gray-300 rounded-md focus:ring-wabag-green focus:border-wabag-green">

                        <input type="text" name="subject"
                            placeholder="Subject"
                            class="w-full border-gray-300 rounded-md focus:ring-wabag-green focus:border-wabag-green">

                        <textarea name="message" rows="4"
                            placeholder="Your Message"
                            class="w-full border-gray-300 rounded-md focus:ring-wabag-green focus:border-wabag-green"></textarea>

                        <button type="submit"
                                class="w-full bg-wabag-green text-white py-3 rounded-md font-semibold hover:bg-wabag-yellow hover:text-black transition">
                            Send Message
                        </button>

                        @if(session('success'))
                            <div class="bg-green-100 text-green-700 p-4 rounded-lg mb-6">
                                {{ session('success') }}
                            </div>
                        @endif

                    </form>
                </div>
            </div>
        </div>
    </section>


    {{-- MODAL FORM --}}
    <div 
        x-cloak
        x-show="openForm"
        x-transition.opacity
        @click="openForm = false"
        class="fixed inset-0 bg-black/60 backdrop-blur-sm flex items-center justify-center z-50"
        style="display: none;"
    >

        <div 
            @click.stop
            class="bg-white rounded-2xl shadow-2xl w-full max-w-2xl p-8 relative"
        >

            <button @click="openForm = false"
                    class="absolute top-4 right-4 text-gray-400 hover:text-gray-700">
                ✕
            </button>

            <h2 class="text-2xl font-serif font-bold text-wabag-green mb-6">
                Send Us a Message
            </h2>

            <form action="{{ route('contact.send') }}" method="POST" class="space-y-4">
                @csrf

                <input type="text" name="name"
                       placeholder="Full Name"
                       class="w-full border-gray-300 rounded-md focus:ring-wabag-green focus:border-wabag-green">

                <input type="email" name="email"
                       placeholder="Email Address"
                       class="w-full border-gray-300 rounded-md focus:ring-wabag-green focus:border-wabag-green">

                <input type="text" name="subject"
                       placeholder="Subject"
                       class="w-full border-gray-300 rounded-md focus:ring-wabag-green focus:border-wabag-green">

                <textarea name="message" rows="4"
                          placeholder="Your Message"
                          class="w-full border-gray-300 rounded-md focus:ring-wabag-green focus:border-wabag-green"></textarea>

                <button type="submit"
                        class="w-full bg-wabag-green text-white py-3 rounded-md font-semibold hover:bg-wabag-yellow hover:text-black transition">
                    Send Message
                </button>
            </form>
        </div>
    </div>

</div>
@endsection
