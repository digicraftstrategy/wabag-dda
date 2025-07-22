@extends('layouts.public')

@section('title', 'News & Updates - Wabag District Development Authority')

@section('content')
<section class="py-16 bg-white">
    <div class="container mx-auto px-6">
        <div class="text-center mb-12">
            <h1 class="text-4xl font-serif font-bold text-wabag-green mb-4">News & Updates</h1>
            <div class="w-24 h-1 bg-wabag-yellow mx-auto mt-4"></div>
            <p class="text-lg max-w-2xl mx-auto text-gray-600 mt-6">Stay informed about the latest developments and announcements from Wabag DDA</p>

            @if(request('query') || request('category'))
            <div class="mt-4">
                <p class="text-sm text-gray-600">
                    Showing results for:
                    @if(request('query'))
                        <span class="font-medium">"{{ request('query') }}"</span>
                    @endif
                    @if(request('query') && request('category'))
                        <span class="mx-1">in</span>
                    @endif
                    @if(request('category'))
                        <span class="font-medium">"{{ $categories->firstWhere('slug', request('category'))->category ?? '' }}"</span>
                    @endif
                    <a href="{{ route('public.news-updates') }}" class="ml-2 text-sm text-wabag-green hover:text-green-800 inline-flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                        Clear filters
                    </a>
                </p>
            </div>
            @endif
        </div>

        <div class="flex flex-col lg:flex-row gap-8">
            <!-- Main Content Area (2/3 width) -->
            <div class="lg:w-2/3">
                @if($newsUpdates->count() > 0)
                <div class="grid md:grid-cols-2 gap-8">
                    @foreach($newsUpdates as $news)
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

                <!-- Pagination -->
                <div class="mt-12">
                    {{ $newsUpdates->withQueryString()->links() }}
                </div>
                @else
                <div class="text-center py-12">
                    <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <h3 class="mt-2 text-lg font-medium text-gray-900">No news found</h3>
                    <p class="mt-1 text-gray-600">
                        @if(request('query') || request('category'))
                            Try adjusting your search or filter to find what you're looking for.
                        @else
                            No news updates available at the moment. Please check back later.
                        @endif
                    </p>
                    @if(request('query') || request('category'))
                    <div class="mt-6">
                        <a href="{{ route('public.news-updates') }}" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-wabag-green hover:bg-green-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-wabag-green">
                            Clear filters
                        </a>
                    </div>
                    @endif
                </div>
                @endif
            </div>

            <!-- Sidebar (1/3 width) -->
            <div class="lg:w-1/3">
                <div class="bg-gray-50 p-6 rounded-xl border border-gray-200 sticky top-6">
                    <!-- Search Form -->
                    <div class="mb-8">
                        <h3 class="text-xl font-serif font-bold text-wabag-green mb-4">Search News</h3>
                        <form action="{{ route('public.news-updates') }}" method="GET">
                            <div class="relative">
                                <input type="text" name="query" placeholder="Search news using keywords..."
                                    value="{{ request('query') }}"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-wabag-green focus:border-wabag-green">
                                <button type="submit" class="absolute right-2 top-2 text-wabag-green hover:text-green-800">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                    </svg>
                                </button>
                            </div>
                            @if(request('category'))
                                <input type="hidden" name="category" value="{{ request('category') }}">
                            @endif
                        </form>
                    </div>

                    <!-- Categories Section -->
                    <div class="mb-8">
                        <h3 class="text-xl font-serif font-bold text-wabag-green mb-4">Categories</h3>
                        <div x-data="{ open: false }" class="relative">
                            <button @click="open = !open" class="w-full flex justify-between items-center px-4 py-3 bg-white border border-gray-300 rounded-lg text-wabag-black hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-wabag-green">
                                <span>{{ request('category') ? $categories->firstWhere('slug', request('category'))->category : 'Select a category' }}</span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </button>

                            <div x-show="open" @click.away="open = false" x-transition class="absolute z-10 mt-1 w-full bg-white shadow-lg rounded-md py-1 border border-gray-200 max-h-60 overflow-auto">
                                <a href="{{ route('public.news-updates', ['query' => request('query')]) }}"
                                   class="block px-4 py-2 text-sm {{ !request('category') ? 'bg-wabag-green/10 text-wabag-green font-medium' : 'text-gray-700' }} hover:bg-wabag-green/10 hover:text-wabag-green">
                                    All Categories
                                </a>
                                @foreach($categories as $category)
                                <a href="{{ route('public.news-updates', ['category' => $category->slug, 'query' => request('query')]) }}"
                                   class="block px-4 py-2 text-sm {{ request('category') == $category->slug ? 'bg-wabag-green/10 text-wabag-green font-medium' : 'text-gray-700' }} hover:bg-wabag-green/10 hover:text-wabag-green flex justify-between items-center">
                                    <span>{{ $category->category }}</span>
                                    <span class="text-xs bg-gray-100 text-gray-600 px-2 py-1 rounded-full">{{ $category->news_updates_count }}</span>
                                </a>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <!-- Recent News -->
                    <div>
                        <h3 class="text-xl font-serif font-bold text-wabag-green mb-4">Recent Updates</h3>
                        <div class="space-y-4">
                            @foreach($recentNews as $recent)
                            <a href="{{ route('public.news-updates.show', $recent->slug) }}" class="block group">
                                <div class="flex items-center">
                                    @if($recent->featured_image)
                                    <div class="flex-shrink-0 mr-3">
                                        <img src="{{ Storage::url($recent->featured_image) }}" alt="{{ $recent->title }}" class="h-12 w-12 object-cover rounded">
                                    </div>
                                    @endif
                                    <div>
                                        <h4 class="text-sm font-medium text-wabag-black group-hover:text-wabag-green transition">{{ Str::limit($recent->title, 50) }}</h4>
                                        <p class="text-xs text-gray-500">{{ $recent->formatted_published_date }}</p>
                                    </div>
                                </div>
                            </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@push('scripts')
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js" defer></script>
@endpush
@endsection
