@extends('layouts.public')

@section('content')
<section class="py-12 bg-gray-50">
    <div class="container mx-auto px-4 sm:px-6">
        <div class="mb-6">
            <a href="{{ route('projects.index') }}" class="inline-flex items-center text-wabag-green hover:underline font-medium">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd" />
                </svg>
                Back to Projects
            </a>
        </div>

        <!-- Hero Section -->
        <div class="bg-white rounded-xl shadow-md overflow-hidden mb-8">
            <div class="relative">
                <!-- Hero Image with Aspect Ratio Fix -->
                <div class="aspect-w-16 aspect-h-9 md:aspect-h-7">
                    @if($project->featured_image)
                        <img src="{{ Storage::url($project->featured_image) }}"
                             alt="{{ $project->title }}"
                             class="w-full h-full object-cover">
                    @else
                        <div class="w-full h-full bg-wabag-green/10 flex items-center justify-center">
                            <svg class="h-24 w-24 text-wabag-green" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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

                <!-- Hero Content Overlay -->
                <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/80 to-transparent p-4 md:p-6">
                    <div class="container mx-auto">
                        <div class="flex flex-col md:flex-row justify-between items-start md:items-end">
                            <div class="mb-2 md:mb-0">
                                @if($project->projectType)
                                    <span class="inline-block bg-wabag-green text-white text-xs px-3 py-1 rounded-full mb-2">
                                        {{ $project->projectType->type }}
                                    </span>
                                @endif
                                <h1 class="text-2xl md:text-3xl font-serif font-bold text-white leading-tight">
                                    {{ $project->title }}
                                </h1>
                            </div>
                            <span class="px-3 py-1 rounded-full text-xs md:text-sm font-medium [box-shadow:0_2px_4px_rgba(0,0,0,0.1)]
                                @if($project->status === 'completed') bg-green-100 text-green-800
                                @elseif($project->status === 'in_progress') bg-blue-100 text-blue-800
                                @elseif($project->status === 'planned') bg-yellow-100 text-yellow-800
                                @elseif($project->status === 'delayed') bg-orange-100 text-orange-800
                                @elseif($project->status === 'cancelled') bg-red-100 text-red-800
                                @else bg-gray-100 text-gray-800 @endif">
                                {{ ucfirst(str_replace('_', ' ', $project->status)) }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Project Body -->
        <div class="bg-white rounded-xl shadow-md overflow-hidden">
            <div class="p-6 md:p-8 grid md:grid-cols-3 gap-6 md:gap-8">
                <!-- Main Content -->
                <div class="md:col-span-2">
                    <!-- Project Overview -->
                    <div class="mb-8">
    <h2 class="text-xl md:text-2xl font-serif font-bold text-wabag-black mb-4">Project Overview</h2>
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
                $project->description
            )
        !!}
    </div>
</div>

                    <!-- Project Updates -->
                    <div>
                        <h2 class="text-xl md:text-2xl font-serif font-bold text-wabag-black mb-4">Project Updates</h2>
                        <div class="space-y-6">
                            @forelse($project->updates as $update)
                            <div class="border-l-4 border-wabag-green pl-4 py-2">
                                <div class="flex flex-col sm:flex-row sm:justify-between sm:items-start mb-2 gap-2">
                                    <h3 class="font-bold text-wabag-black">{{ $update->created_at->format('F j, Y') }}</h3>
                                    <span class="text-sm text-gray-500">By {{ $update->author->name }}</span>
                                </div>
                                <p class="text-gray-700 mb-3">{{ $update->update_text }}</p>

                                @if($update->images)
                                    <div class="grid grid-cols-2 sm:grid-cols-3 gap-2 mt-3">
                                        {{-- SAFELY HANDLE IMAGES BASED ON STORAGE TYPE --}}
                                        @php
                                            // Handle both array and JSON string formats
                                            $images = is_array($update->images)
                                                ? $update->images
                                                : json_decode($update->images, true);
                                        @endphp

                                        @foreach($images as $image)
                                            <a href="{{ Storage::url($image) }}" data-lightbox="update-{{ $update->id }}" class="block overflow-hidden rounded">
                                                <img src="{{ Storage::url($image) }}"
                                                     alt="Update image"
                                                     class="h-24 w-full object-cover hover:scale-105 transition-transform duration-300">
                                            </a>
                                        @endforeach
                                    </div>
                                @endif

                                <div class="mt-3 flex flex-wrap items-center text-sm text-gray-500 gap-3">
                                    <span>Progress: {{ $update->new_progress_percentage }}%</span>
                                    <span>Status: {{ ucfirst(str_replace('_', ' ', $update->current_status_snapshot)) }}</span>
                                </div>
                            </div>
                            @empty
                            <p class="text-gray-600 py-4 text-center border border-dashed rounded-lg">
                                No updates available for this project yet.
                            </p>
                            @endforelse
                        </div>
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="md:col-span-1">
                    <div class="bg-gray-50 rounded-lg p-5 md:p-6 sticky top-6">
                        <h3 class="text-lg md:text-xl font-serif font-bold text-wabag-black mb-4">Project Details</h3>
                        <ul class="space-y-4">
                            <li>
                                <h4 class="font-medium text-gray-900">Project Code</h4>
                                <p class="text-gray-600">{{ $project->project_code }}</p>
                            </li>
                            <li>
                                <h4 class="font-medium text-gray-900">Location</h4>
                                <p class="text-gray-600">{{ $project->location }}</p>
                                @if($project->coordinates)
                                    <a href="https://www.google.com/maps?q={{ $project->coordinates }}"
                                       target="_blank"
                                       class="text-wabag-green hover:underline text-sm mt-1 inline-flex items-center">
                                        View on map
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                                        </svg>
                                    </a>
                                @endif
                            </li>
                            <li>
                                <h4 class="font-medium text-gray-900">Timeline</h4>
                                <p class="text-gray-600">
                                    {{ $project->start_date->format('M j, Y') }} -
                                    @if($project->actual_end_date)
                                        {{ $project->actual_end_date->format('M j, Y') }}
                                    @else
                                        {{ $project->expected_end_date->format('M j, Y') }} (estimated)
                                    @endif
                                </p>
                            </li>
                            <li>
                                <h4 class="font-medium text-gray-900">Budget</h4>
                                <p class="text-gray-600">PGK {{ number_format($project->budget, 2) }}</p>
                                @if($project->amount_spent)
                                    <p class="text-sm text-gray-500">Amount Spent: PGK {{ number_format($project->amount_spent, 2) }}</p>
                                @endif
                            </li>
                            <li>
                                <h4 class="font-medium text-gray-900">Funding Source</h4>
                                <p class="text-gray-600">{{ $project->fundingSource->funding_source ?? 'N/A' }}</p>
                            </li>
                            <li>
                                <h4 class="font-medium text-gray-900">LLG/Ward</h4>
                                <p class="text-gray-600">
                                    {{ $project->llg->name ?? 'N/A' }} /
                                    {{ $project->ward->name ?? 'N/A' }}
                                </p>
                            </li>
                            <li>
                                <h4 class="font-medium text-gray-900">Current Progress</h4>
                                <div class="mt-2">
                                    <div class="flex justify-between text-sm mb-1 text-gray-500">
                                        <span>{{ $project->progress_percentage }}% Complete</span>
                                    </div>
                                    <div class="w-full bg-gray-200 rounded-full h-2">
                                        <div class="h-2 rounded-full
                                            @if($project->progress_percentage >= 80) bg-green-500
                                            @elseif($project->progress_percentage >= 50) bg-blue-500
                                            @else bg-wabag-yellow @endif"
                                            style="width: {{ $project->progress_percentage }}%">
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <h4 class="font-medium text-gray-900">Visibility</h4>
                                <p class="text-gray-600">
                                    @if($project->is_public)
                                        <span class="text-green-600">Public</span>
                                    @else
                                        <span class="text-gray-600">Private</span>
                                    @endif
                                </p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css">
<style>
    /* Aspect ratio containers */
    .aspect-w-16 { position: relative; padding-bottom: 56.25%; }
    .aspect-w-16 > * { position: absolute; top: 0; left: 0; width: 100%; height: 100%; }

    /* Desktop aspect ratio */
    @media (min-width: 768px) {
        .md\:aspect-h-7 { padding-bottom: 42.85%; }
    }

    /* Smooth image transitions */
    .transition-transform { transition: transform 0.3s ease; }

    /* Status badge colors */
    .bg-orange-100 { background-color: #ffedd5; }
    .text-orange-800 { color: #9a3412; }


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

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>
<script>
    // Initialize lightbox with project name in caption
    lightbox.option({
        'albumLabel': 'Image %1 of %2',
        'wrapAround': true,
        'fadeDuration': 300
    });
</script>
@endpush
