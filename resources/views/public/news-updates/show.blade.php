@extends('layouts.public')

@section('title', $news->title . ' | Wabag DDA')

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
                                <a href="{{ route('public.news-updates') }}" class="ml-2 text-sm font-medium text-wabag-green hover:text-green-800 transition">News</a>
                            </div>
                        </li>
                        <li aria-current="page">
                            <div class="flex items-center">
                                <svg class="w-5 h-5 text-gray-300" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                                <span class="ml-2 text-sm font-medium text-gray-500">{{ Str::limit($news->title, 40) }}</span>
                            </div>
                        </li>
                    </ol>
                </nav>

                <!-- News Article -->
                <article class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
                    <header class="px-6 pt-6 pb-4">
                        @if($news->newsCategory)
                        <span class="inline-block bg-wabag-green/10 text-wabag-green text-xs font-semibold px-3 py-1 rounded-full mb-4 uppercase tracking-wider">
                            {{ $news->newsCategory->category }}
                        </span>
                        @endif
                        <h1 class="text-3xl lg:text-4xl font-serif font-bold text-wabag-black mb-3 leading-tight">{{ $news->title }}</h1>
                        <div class="flex flex-wrap items-center text-sm text-gray-500 gap-x-4 gap-y-2 mt-4">
                            <div class="flex items-center">
                                <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                                <span>{{ $news->formatted_published_date }}</span>
                            </div>
                            @if($news->user)
                            <div class="flex items-center">
                                <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                                <span>By {{ $news->user->name }}</span>
                            </div>
                            @endif
                        </div>
                    </header>

                    @if($news->featured_image)
                    <figure class="mb-6">
                        <img src="{{ Storage::url($news->featured_image) }}" alt="{{ $news->title }}" class="w-full h-auto max-h-[32rem] object-cover">
                        @if($news->featured_image_caption)
                        <figcaption class="text-center text-sm text-gray-500 mt-2 px-6">{{ $news->featured_image_caption }}</figcaption>
                        @endif
                    </figure>
                    @endif

                    <div class="px-6 pb-8">
                        <div class="formatted-content text-gray-700">
                            {!!
            preg_replace(
                [
                    '/<h1[^>]*>(.*?)<\/h1>/is',
                    '/<h2[^>]*>(.*?)<\/h2>/is',
                    '/<h3[^>]*>(.*?)<\/h3>/is',
                    '/<h4[^>]*>(.*?)<\/h4>/is',
                    '/<p[^>]*>(.*?)<\/p>/is'
                ],
                [
                    '<div class="font-bold text-2xl mt-6 mb-4">$1</div>',
                    '<div class="font-bold text-xl mt-5 mb-3">$1</div>',
                    '<div class="font-bold text-lg mt-4 mb-3">$1</div>',
                    '<div class="font-semibold text-lg mt-4 mb-2">$1</div>',
                    '<div class="mb-4 leading-relaxed">$1</div>'
                ],
                $news->content
            )
        !!}
                        </div>

                        <!-- Tags -->
                        @if($news->tags)
                        <div class="mt-8 pt-6 border-t border-gray-100">
                            <div class="flex flex-wrap gap-2">
                                @foreach(explode(',', $news->tags) as $tag)
                                <span class="inline-block bg-gray-100 text-gray-700 text-xs px-3 py-1 rounded-full">{{ trim($tag) }}</span>
                                @endforeach
                            </div>
                        </div>
                        @endif
                    </div>
                </article>

                <!-- Related News -->
                @if($relatedNews->count() > 0)
                <div class="mt-12">
                    <h3 class="text-2xl font-serif font-bold text-wabag-green mb-6 pb-2 border-b border-gray-100">More Stories</h3>
                    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach($relatedNews as $related)
                        <a href="{{ route('public.news-updates.show', $related->slug) }}" class="group block">
                            <div class="bg-white rounded-lg shadow-sm border border-gray-200 hover:shadow-md transition duration-300 overflow-hidden h-full flex flex-col">
                                @if($related->featured_image)
                                <div class="aspect-w-16 aspect-h-9 overflow-hidden">
                                    <img src="{{ Storage::url($related->featured_image) }}" alt="{{ $related->title }}" class="w-full h-48 object-cover group-hover:scale-105 transition duration-300">
                                </div>
                                @endif
                                <div class="p-4 flex-grow">
                                    @if($related->newsCategory)
                                    <span class="inline-block bg-wabag-green/10 text-wabag-green text-xs font-semibold px-2 py-1 rounded-full mb-2">{{ $related->newsCategory->category }}</span>
                                    @endif
                                    <h4 class="font-bold text-wabag-black mb-2 group-hover:text-wabag-green transition">{{ Str::limit($related->title, 60) }}</h4>
                                    <p class="text-sm text-gray-500">{{ $related->formatted_published_date }}</p>
                                </div>
                            </div>
                        </a>
                        @endforeach
                    </div>
                </div>
                @endif

                <!-- Back to News -->
                <div class="mt-12 text-center">
                    <a href="{{ route('public.news-updates') }}" class="inline-flex items-center px-6 py-3 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-wabag-green hover:bg-green-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-wabag-green transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                        </svg>
                        Back to All News
                    </a>
                </div>
            </div>

            <!-- Sidebar (1/3 width) -->
            <div class="lg:w-1/3">
                <div class="space-y-6 sticky top-6">

                    <!-- Categories Dropdown -->
                    <div class="bg-gray-50 p-6 rounded-xl border border-gray-200">
                        <h3 class="text-xl font-serif font-bold text-wabag-green mb-4">Browse Categories</h3>
                        <div class="relative">
                            <select
                                id="category-dropdown"
                                class="w-full py-2 pl-3 pr-10 bg-white border border-gray-300 rounded-lg appearance-none focus:outline-none focus:ring-2 focus:ring-wabag-green focus:border-wabag-green text-sm cursor-pointer"
                                onchange="window.location.href = this.value"
                            >
                                <option value="{{ route('public.news-updates') }}">All Categories</option>
                                @foreach($categories as $category)
                                <option
                                    value="{{ route('public.news-updates', ['category' => $category->slug]) }}"
                                    {{ request()->category == $category->slug ? 'selected' : '' }}
                                >
                                    {{ $category->category }} ({{ $category->news_updates_count }})
                                </option>
                                @endforeach
                            </select>
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </div>
                    </div>

                    <!-- Recent News -->
                    <div class="bg-gray-50 p-6 rounded-xl border border-gray-200">
                        <h3 class="text-xl font-serif font-bold text-wabag-green mb-4">Recent Updates</h3>
                        <div class="space-y-4">
                            @foreach($recentNews as $recent)
                            <a href="{{ route('public.news-updates.show', $recent->slug) }}" class="block group">
                                <div class="flex items-start">
                                    @if($recent->featured_image)
                                    <div class="flex-shrink-0 mr-3">
                                        <img src="{{ Storage::url($recent->featured_image) }}" alt="{{ $recent->title }}" class="h-14 w-14 object-cover rounded">
                                    </div>
                                    @endif
                                    <div>
                                        <h4 class="text-sm font-medium text-wabag-black group-hover:text-wabag-green transition">{{ Str::limit($recent->title, 50) }}</h4>
                                        <p class="text-xs text-gray-500 mt-1">{{ $recent->formatted_published_date }}</p>
                                    </div>
                                </div>
                            </a>
                            @endforeach
                        </div>
                    </div>

                    <!-- Newsletter Signup -->
                    <div class="bg-wabag-green/5 p-6 rounded-xl border border-wabag-green/20">
                        <h3 class="text-xl font-serif font-bold text-wabag-green mb-3">Stay Updated</h3>
                        <p class="text-sm text-gray-600 mb-4">Subscribe to our newsletter for the latest news and updates.</p>
                        <form class="space-y-3">
                            <input type="email" placeholder="Your email address" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-wabag-green focus:border-wabag-green text-sm">
                            <button type="submit" class="w-full bg-wabag-green hover:bg-green-800 text-white py-2 px-4 rounded-lg text-sm font-medium transition">Subscribe</button>
                        </form>
                    </div>

                    <!-- Social Sharing -->
                    <div class="bg-gray-50 p-6 rounded-xl border border-gray-200">
                        <h3 class="text-xl font-serif font-bold text-wabag-green mb-4">Share This Story</h3>
                        <div class="flex space-x-3">
                            <a href="#" class="w-10 h-10 flex items-center justify-center bg-blue-600 text-white rounded-full hover:bg-blue-700 transition">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"/></svg>
                            </a>
                            <a href="#" class="w-10 h-10 flex items-center justify-center bg-blue-400 text-white rounded-full hover:bg-blue-500 transition">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84"/></svg>
                            </a>
                            <a href="#" class="w-10 h-10 flex items-center justify-center bg-red-600 text-white rounded-full hover:bg-red-700 transition">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/></svg>
                            </a>
                            <a href="#" class="w-10 h-10 flex items-center justify-center bg-blue-700 text-white rounded-full hover:bg-blue-800 transition">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/></svg>
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
    /* Custom select dropdown styles */
    #category-dropdown {
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3e%3cpath stroke='%236b7280' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='M6 8l4 4 4-4'/%3e%3c/svg%3e");
        background-position: right 0.75rem center;
        background-repeat: no-repeat;
        background-size: 1.5em 1.5em;
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        padding-right: 2.5rem;
    }

    /* Hide default dropdown arrow in IE */
    select::-ms-expand {
        display: none;
    }

    /* Formatted content styles */
    .formatted-content {
        line-height: 1.7;
    }

    .formatted-content div {
        line-height: inherit;
    }

    .formatted-content div.mb-4 {
        margin-bottom: 1.5rem;
    }

    .formatted-content div.mb-3 {
        margin-bottom: 1rem;
    }

    .formatted-content div.mb-2 {
        margin-bottom: 0.75rem;
    }

    .formatted-content ul,
    .formatted-content ol {
        margin-left: 1.5rem;
        margin-bottom: 1.5rem;
        padding-left: 1rem;
    }

    .formatted-content ul {
        list-style-type: disc;
    }

    .formatted-content ol {
        list-style-type: decimal;
    }

    .formatted-content li {
        margin-bottom: 0.75rem;
        line-height: 1.6;
    }

    .formatted-content img {
        max-width: 100%;
        height: auto;
        margin: 1.5rem 0;
        border-radius: 0.5rem;
    }

    .formatted-content a {
        color: #065f46;
        text-decoration: underline;
    }

    .formatted-content a:hover {
        color: #064e3b;
    }

    .formatted-content blockquote {
        border-left: 4px solid #065f46;
        padding-left: 1.5rem;
        margin: 1.5rem 0;
        font-style: italic;
        color: #4b5563;
    }

    .formatted-content table {
        width: 100%;
        margin: 1.5rem 0;
        border-collapse: collapse;
    }

    .formatted-content th,
    .formatted-content td {
        padding: 0.75rem;
        border: 1px solid #e5e7eb;
        text-align: left;
    }

    .formatted-content th {
        background-color: #f3f4f6;
        font-weight: 600;
    }
</style>
@endpush
