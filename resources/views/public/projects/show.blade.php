@extends('layouts.public')

@section('content')
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-6">
        <div class="mb-8">
            <a href="{{ route('projects.index') }}" class="inline-flex items-center text-wabag-green hover:underline">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd" />
                </svg>
                Back to Projects
            </a>
        </div>

        <div class="bg-white rounded-xl shadow-md overflow-hidden">
            <!-- Project Header -->
            <div class="relative">
                @if($project->featured_image)
                    <img src="{{ Storage::url($project->featured_image) }}" alt="{{ $project->title }}" class="w-full h-96 object-cover">
                @else
                    <div class="h-96 bg-wabag-green/10 flex items-center justify-center">
                        <svg class="h-32 w-32 text-wabag-green" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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
                <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/70 to-transparent p-6">
                    <div class="flex justify-between items-end">
                        <div>
                            @if($project->projectType)
                                <span class="inline-block bg-wabag-green text-white text-xs px-3 py-1 rounded-full mb-2">
                                    {{ $project->projectType->type }}
                                </span>
                            @endif
                            <h1 class="text-3xl font-serif font-bold text-white">{{ $project->title }}</h1>
                        </div>
                        <span class="px-3 py-1 rounded-full text-sm font-medium [box-shadow:0_2px_4px_rgba(0,0,0,0.1)]
                            @if($project->status === 'completed') bg-green-100 text-green-800
                            @elseif($project->status === 'in_progress') bg-blue-100 text-blue-800
                            @elseif($project->status === 'planned') bg-yellow-100 text-yellow-800
                            @else bg-gray-100 text-gray-800 @endif">
                            {{ ucfirst(str_replace('_', ' ', $project->status)) }}
                        </span>
                    </div>
                </div>
            </div>

            <!-- Project Body -->
            <div class="p-8 grid md:grid-cols-3 gap-8">
                <!-- Main Content -->
                <div class="md:col-span-2">
                    <h2 class="text-2xl font-serif font-bold text-wabag-black mb-4">Project Overview</h2>
                    <div class="prose max-w-none text-gray-700 mb-8">
                        {!! $project->description !!}
                    </div>

                    <!-- Project Updates -->
                    <h2 class="text-2xl font-serif font-bold text-wabag-black mb-4">Project Updates</h2>
                    <div class="space-y-6">
                        @forelse($project->updates as $update)
                        <div class="border-l-4 border-wabag-green pl-4 py-2">
                            <div class="flex justify-between items-start mb-2">
                                <h3 class="font-bold text-wabag-black">{{ $update->created_at->format('F j, Y') }}</h3>
                                <span class="text-sm text-gray-500">By {{ $update->author->name }}</span>
                            </div>
                            <p class="text-gray-700 mb-3">{{ $update->update_text }}</p>

                            @if($update->images)
                                <div class="grid grid-cols-3 gap-2 mt-3">
                                    @foreach(json_decode($update->images) as $image)
                                        <a href="{{ Storage::url($image) }}" data-lightbox="update-{{ $update->id }}">
                                            <img src="{{ Storage::url($image) }}" alt="Update image" class="h-24 w-full object-cover rounded">
                                        </a>
                                    @endforeach
                                </div>
                            @endif

                            <div class="mt-3 flex items-center text-sm text-gray-500">
                                <span class="mr-4">Progress: {{ $update->new_progress_percentage }}%</span>
                                <span>Status: {{ ucfirst(str_replace('_', ' ', $update->current_status_snapshot)) }}</span>
                            </div>
                        </div>
                        @empty
                        <p class="text-gray-600">No updates available for this project yet.</p>
                        @endforelse
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="md:col-span-1">
                    <div class="bg-gray-50 rounded-lg p-6">
                        <h3 class="text-xl font-serif font-bold text-wabag-black mb-4">Project Details</h3>
                        <ul class="space-y-4">
                            <li>
                                <h4 class="font-medium text-gray-900">Location</h4>
                                <p class="text-gray-600">{{ $project->location }}</p>
                                @if($project->coordinates)
                                    <a href="https://www.google.com/maps?q={{ $project->coordinates }}" target="_blank" class="text-wabag-green hover:underline text-sm mt-1 inline-flex items-center">
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
                        </ul>
                    </div>

                    <!-- Gallery -->
                    @if($project->images->count() > 0)
                    <div class="mt-6">
                        <h3 class="text-xl font-serif font-bold text-wabag-black mb-4">Project Gallery</h3>
                        <div class="grid grid-cols-2 gap-2">
                            @foreach($project->images as $image)
                                <a href="{{ Storage::url($image->path) }}" data-lightbox="project-gallery">
                                    <img src="{{ Storage::url($image->path) }}" alt="Project image" class="h-24 w-full object-cover rounded">
                                </a>
                            @endforeach
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css">
@endpush

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>
@endpush
