@extends('layouts.public')

@section('title', $item->title . ' - Explore Wabag')

@section('content')
<section class="py-16 bg-gradient-to-b from-white to-wabag-yellow/10">
    <div class="container mx-auto px-6">
        <div class="mb-8">
            <a href="/" class="text-wabag-green hover:underline">Home</a>
            <span class="text-gray-400 mx-2">/</span>
            <span class="text-gray-600">Explore Wabag</span>
        </div>

        @php
            $normalizeList = function ($list) {
                return collect($list ?? [])
                    ->map(function ($value) {
                        if (is_array($value)) {
                            return trim((string) ($value['value'] ?? ''));
                        }
                        return trim((string) $value);
                    })
                    ->filter()
                    ->values();
            };

            $highlights = $normalizeList($item->highlights);
            $tips = $normalizeList($item->tips);
            $checklist = $normalizeList($item->checklist);
            $itinerary = $normalizeList($item->itinerary);
            $locations = $normalizeList($item->locations);
        @endphp

        <div class="relative bg-white/90 rounded-2xl p-6 md:p-8 border border-wabag-green/15 shadow-sm">
            <div class="rounded-2xl overflow-hidden border border-gray-200 shadow-lg md:float-left md:w-1/2 md:mr-10 md:mb-6">
                <img src="{{ $item->image_path ? asset('storage/' . $item->image_path) : asset('images/wabag/landscape.jpg') }}"
                     alt="{{ $item->title }}"
                     class="w-full h-full object-cover">
            </div>

            @if($item->category_label)
                <div class="inline-flex items-center text-sm text-wabag-green mb-3">
                    <span class="px-3 py-1 rounded-full bg-wabag-green/10">{{ $item->category_label }}</span>
                </div>
            @endif
            <h1 class="text-4xl font-serif font-bold text-wabag-black mb-4">{{ $item->title }}</h1>
            <p class="text-lg text-gray-700 leading-relaxed mb-4">{{ $item->description }}</p>
            @if($item->detail_intro)
                <div class="text-gray-700 leading-relaxed mb-6 prose max-w-none">
                    {!! $item->detail_intro !!}
                </div>
            @endif
            @if($item->link_url)
                <a href="{{ $item->link_url }}" class="inline-flex items-center bg-wabag-green text-white px-5 py-3 rounded-lg hover:bg-green-800 transition">
                    {{ $item->link_label ?? 'Learn More' }}
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                    </svg>
                </a>
            @endif
            <div class="clear-both"></div>
        </div>

        @if(($item->gallery_images ?? []) && count($item->gallery_images))
            <div class="mt-10 bg-wabag-green/5 rounded-2xl p-6 border border-wabag-green/10">
                <h2 class="text-2xl font-serif font-bold text-wabag-green mb-4">Gallery</h2>
                <div class="grid md:grid-cols-3 gap-6">
                    @foreach($item->gallery_images as $image)
                        <div class="rounded-xl overflow-hidden border border-wabag-green/15 shadow-sm bg-white">
                            <img src="{{ asset('storage/' . $image) }}"
                                 alt="{{ $item->title }} gallery image"
                                 class="w-full h-48 object-cover">
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

        @if($highlights->count() || $tips->count() || $checklist->count())
            <div class="mt-14 grid md:grid-cols-3 gap-4">
                @if($highlights->count())
                    <div class="bg-wabag-yellow/10 rounded-xl p-6 border border-wabag-green/15 shadow-sm">
                        <h3 class="text-lg font-bold text-wabag-green mb-3">Highlights</h3>
                        <ul class="list-disc pl-5 text-gray-700 space-y-2">
                            @foreach($highlights as $value)
                                <li>{{ $value }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if($tips->count())
                    <div class="bg-wabag-yellow/10 rounded-xl p-6 border border-wabag-green/15 shadow-sm">
                        <h3 class="text-lg font-bold text-wabag-green mb-3">Visitor Tips</h3>
                        <ul class="list-disc pl-5 text-gray-700 space-y-2">
                            @foreach($tips as $value)
                                <li>{{ $value }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if($checklist->count())
                    <div class="bg-wabag-yellow/10 rounded-xl p-6 border border-wabag-green/15 shadow-sm">
                        <h3 class="text-lg font-bold text-wabag-green mb-3">Checklist</h3>
                        <ul class="list-disc pl-5 text-gray-700 space-y-2">
                            @foreach($checklist as $value)
                                <li>{{ $value }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
        @endif

        @if($item->best_time || $item->duration || $item->difficulty || $item->opening_hours || $item->price_info)
            <div class="mt-10 grid md:grid-cols-3 gap-4">
                @if($item->best_time)
                    <div class="bg-wabag-yellow/10 rounded-xl p-5 border border-wabag-green/15 shadow-sm">
                        <div class="text-sm text-gray-500 mb-1">Best Time</div>
                        <div class="text-wabag-black font-semibold">{{ $item->best_time }}</div>
                    </div>
                @endif
                @if($item->duration)
                    <div class="bg-wabag-yellow/10 rounded-xl p-5 border border-wabag-green/15 shadow-sm">
                        <div class="text-sm text-gray-500 mb-1">Typical Duration</div>
                        <div class="text-wabag-black font-semibold">{{ $item->duration }}</div>
                    </div>
                @endif
                @if($item->difficulty)
                    <div class="bg-wabag-yellow/10 rounded-xl p-5 border border-wabag-green/15 shadow-sm">
                        <div class="text-sm text-gray-500 mb-1">Difficulty / Access</div>
                        <div class="text-wabag-black font-semibold">{{ $item->difficulty }}</div>
                    </div>
                @endif
                @if($item->opening_hours)
                    <div class="bg-wabag-yellow/10 rounded-xl p-5 border border-wabag-green/15 shadow-sm">
                        <div class="text-sm text-gray-500 mb-1">Opening Hours</div>
                        <div class="text-wabag-black font-semibold">{{ $item->opening_hours }}</div>
                    </div>
                @endif
                @if($item->price_info)
                    <div class="bg-wabag-yellow/10 rounded-xl p-5 border border-wabag-green/15 shadow-sm">
                        <div class="text-sm text-gray-500 mb-1">Price</div>
                        <div class="text-wabag-black font-semibold">{{ $item->price_info }}</div>
                    </div>
                @endif
            </div>
        @endif

        @if($itinerary->count())
            <div class="mt-12 bg-gray-50 rounded-2xl p-6 border border-gray-300 shadow-sm">
                <h2 class="text-2xl font-serif font-bold text-wabag-green mb-4">Suggested Itinerary</h2>
                <ol class="list-decimal pl-6 text-gray-700 space-y-2">
                    @foreach($itinerary as $value)
                        <li class="bg-gray-100 border border-gray-300 rounded-lg px-3 py-2">{{ $value }}</li>
                    @endforeach
                </ol>
            </div>
        @endif

        @if($locations->count())
            <div class="mt-10 bg-gray-50 rounded-2xl p-6 border border-gray-300 shadow-sm">
                <h2 class="text-2xl font-serif font-bold text-wabag-green mb-4">Locations and Stops</h2>
                <ul class="list-disc pl-6 text-gray-700 space-y-2">
                    @foreach($locations as $value)
                        <li class="bg-gray-100 border border-gray-300 rounded-lg px-3 py-2">{{ $value }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if($item->getting_there || $item->safety_notes || $item->contact_info)
            <div class="mt-10 grid md:grid-cols-3 gap-4">
                @if($item->getting_there)
                    <div class="bg-wabag-yellow/10 rounded-xl p-6 border border-wabag-green/15 shadow-sm">
                        <h3 class="text-lg font-bold text-wabag-green mb-3">Getting There</h3>
                        <p class="text-gray-700">{{ $item->getting_there }}</p>
                    </div>
                @endif
                @if($item->safety_notes)
                    <div class="bg-wabag-yellow/10 rounded-xl p-6 border border-wabag-green/15 shadow-sm">
                        <h3 class="text-lg font-bold text-wabag-green mb-3">Safety Notes</h3>
                        <p class="text-gray-700">{{ $item->safety_notes }}</p>
                    </div>
                @endif
                @if($item->contact_info)
                    <div class="bg-wabag-yellow/10 rounded-xl p-6 border border-wabag-green/15 shadow-sm">
                        <h3 class="text-lg font-bold text-wabag-green mb-3">Contact</h3>
                        <p class="text-gray-700">{{ $item->contact_info }}</p>
                    </div>
                @endif
            </div>
        @endif

        @if($item->map_embed_url || ($item->latitude && $item->longitude))
            <div class="mt-12 bg-wabag-green/5 rounded-2xl p-6 border border-wabag-green/10">
                <h2 class="text-2xl font-serif font-bold text-wabag-green mb-4">Map</h2>
                <div class="rounded-xl overflow-hidden border border-wabag-green/15 shadow-sm bg-white">
                    @if($item->map_embed_url)
                        <iframe
                            src="{{ $item->map_embed_url }}"
                            width="100%"
                            height="360"
                            style="border:0;"
                            allowfullscreen=""
                            loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    @else
                        <div class="p-6 text-gray-700">
                            Coordinates: {{ $item->latitude }}, {{ $item->longitude }}
                        </div>
                    @endif
                </div>
            </div>
        @endif

        @if($relatedItems->count() > 0)
            @php
                $relatedChunks = $relatedItems->chunk(3);
            @endphp
            <section class="mt-16 home-animate py-16 bg-wabag-yellow/10 rounded-2xl">
                <div class="container mx-auto px-6">
                    <div class="text-center mb-10">
                        <h2 class="text-2xl md:text-3xl font-serif font-bold text-wabag-green mb-4">More to Explore</h2>
                        <div class="w-24 h-1 bg-wabag-yellow mx-auto mt-4"></div>
                    </div>

                    <div class="relative overflow-hidden" data-explore-related-carousel>
                        <div class="explore-related-track flex transition-transform duration-700 ease-in-out">
                            @foreach($relatedChunks as $chunk)
                                <div class="explore-related-slide w-full shrink-0">
                                    <div class="grid md:grid-cols-3 gap-8">
                                        @foreach($chunk as $related)
                                            <div class="bg-white rounded-xl shadow-lg overflow-hidden border border-gray-200 hover:shadow-xl transition duration-300">
                                                <div class="h-40 overflow-hidden">
                                                    <img src="{{ $related->image_path ? asset('storage/' . $related->image_path) : asset('images/wabag/landscape.jpg') }}"
                                                         alt="{{ $related->title }}"
                                                         class="w-full h-full object-cover">
                                                </div>
                                                <div class="p-5">
                                                    <div class="flex items-center text-sm text-wabag-green mb-3">
                                                        @switch($related->icon)
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
                                                        <span>{{ $related->category_label }}</span>
                                                    </div>
                                                    <h3 class="text-lg font-bold text-wabag-black mb-2">{{ $related->title }}</h3>
                                                    <p class="text-gray-600 mb-4 line-clamp-3">{{ $related->description }}</p>
                                                    <a href="{{ route('public.explore-wabag.show', $related->slug) }}" class="text-wabag-green hover:text-green-800 font-medium inline-flex items-center">
                                                        View Details
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

                        @if($relatedChunks->count() > 1)
                            <button type="button"
                                    class="related-prev absolute left-2 top-1/2 -translate-y-1/2 bg-white/80 hover:bg-white text-wabag-green border border-gray-200 rounded-full h-10 w-10 flex items-center justify-center shadow-sm"
                                    aria-label="Previous slide">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                                </svg>
                            </button>
                            <button type="button"
                                    class="related-next absolute right-2 top-1/2 -translate-y-1/2 bg-white/80 hover:bg-white text-wabag-green border border-gray-200 rounded-full h-10 w-10 flex items-center justify-center shadow-sm"
                                    aria-label="Next slide">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                </svg>
                            </button>
                            <div class="related-dots absolute -bottom-6 left-0 right-0 flex justify-center space-x-2">
                                @foreach($relatedChunks as $index => $chunk)
                                    <button type="button"
                                            class="related-dot h-2.5 w-2.5 rounded-full bg-wabag-green/30 {{ $index === 0 ? 'bg-wabag-green' : '' }}"
                                            data-related-dot="{{ $index }}"
                                            aria-label="Go to slide {{ $index + 1 }}"></button>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
            </section>
        @endif
    </div>
</section>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const relatedCarousel = document.querySelector('[data-explore-related-carousel]');
        if (!relatedCarousel) return;

        const track = relatedCarousel.querySelector('.explore-related-track');
        const slides = relatedCarousel.querySelectorAll('.explore-related-slide');
        const prev = relatedCarousel.querySelector('.related-prev');
        const next = relatedCarousel.querySelector('.related-next');
        const dots = relatedCarousel.querySelectorAll('[data-related-dot]');

        if (!track || slides.length === 0) return;

        let index = 0;
        const intervalMs = 8000;
        let timer;

        const render = (i) => {
            track.style.transform = `translateX(-${i * 100}%)`;
            dots.forEach((dot, idx) => {
                dot.classList.toggle('bg-wabag-green', idx === i);
                dot.classList.toggle('bg-wabag-green/30', idx !== i);
            });
        };

        const start = () => {
            if (slides.length <= 1) return;
            timer = setInterval(() => {
                index = (index + 1) % slides.length;
                render(index);
            }, intervalMs);
        };

        const stop = () => {
            clearInterval(timer);
        };

        prev?.addEventListener('click', () => {
            stop();
            index = (index - 1 + slides.length) % slides.length;
            render(index);
            start();
        });

        next?.addEventListener('click', () => {
            stop();
            index = (index + 1) % slides.length;
            render(index);
            start();
        });

        dots.forEach((dot) => {
            dot.addEventListener('click', () => {
                const target = Number(dot.dataset.relatedDot || 0);
                stop();
                index = target;
                render(index);
                start();
            });
        });

        relatedCarousel.addEventListener('mouseenter', stop);
        relatedCarousel.addEventListener('mouseleave', start);

        start();
    });
</script>
@endpush
