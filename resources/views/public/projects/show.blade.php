@extends('layouts.public')

@section('content')
<section class="project-show">
    <div class="container mx-auto px-4 sm:px-6">
        <div class="mb-6 mt-8 pt-1">
            <nav class="flex" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-2">
                    <li class="inline-flex items-center">
                        <a href="/" class="inline-flex items-center text-sm font-medium text-wabag-green hover:text-green-800 transition">
                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path>
                            </svg>
                            Home
                        </a>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <svg class="w-5 h-5 text-gray-300" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                            </svg>
                            <a href="{{ route('projects.index') }}" class="ml-2 text-sm font-medium text-wabag-green hover:text-green-800 transition">Projects</a>
                        </div>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                            <svg class="w-5 h-5 text-gray-300" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                            </svg>
                            <span class="ml-2 text-sm font-medium text-gray-500">{{ Str::limit($project->title, 40) }}</span>
                        </div>
                    </li>
                </ol>
            </nav>
        </div>
        <div class="project-hero grid lg:grid-cols-12 gap-6 mb-8 mt-4">
            <div class="lg:col-span-7 project-card project-enter p-4">
                <div class="card-surface relative overflow-hidden rounded-2xl border border-white/60 shadow-lg">
                    <div class="hero-meta mt-1 pt-1">
                        <div class="flex flex-wrap items-center text-xs text-gray-600 gap-x-3 gap-y-1 py-4">
                            <div class="flex items-center">
                                <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                                <span>{{ ($project->published_at ?? $project->created_at)?->format('F j, Y') ?? 'Date not set' }}</span>
                            </div>
                            <div class="flex items-center">
                                <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                                <span>{{ $project->createdBy->name ?? 'Wabag DDA' }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="project-hero-media">
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
                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent"></div>
                    <div class="absolute bottom-0 left-0 right-0 p-5 md:p-6 text-white">
                        @if($project->projectType)
                            <span class="inline-flex items-center rounded-full bg-white/15 px-3 py-1 text-xs font-semibold uppercase tracking-wide">
                                {{ $project->projectType->type }}
                            </span>
                        @endif
                        <h1 class="mt-3 text-3xl md:text-4xl font-serif font-bold leading-tight">
                            {{ $project->title }}
                        </h1>
                    </div>
                </div>
            </div>

            <div class="lg:col-span-5 project-card project-enter" style="animation-delay: 120ms;">
                <div class="card-surface rounded-2xl border border-white/60 shadow-lg p-6 md:p-7 h-full">
                    <div class="flex items-start justify-between gap-4">
                        <div>
                            <div class="text-sm font-semibold text-gray-500">Project Status</div>
                            <div class="mt-2">
                                <span class="status-pill
                                    @if($project->status === 'completed') status-complete
                                    @elseif($project->status === 'in_progress') status-progress
                                    @elseif($project->status === 'planned') status-planned
                                    @elseif($project->status === 'delayed') status-delayed
                                    @elseif($project->status === 'cancelled') status-cancelled
                                    @else status-default @endif">
                                    {{ ucfirst(str_replace('_', ' ', $project->status)) }}
                                </span>
                            </div>
                        </div>
                        @if($project->isPublicFieldVisible('show_project_code', false))
                            <div class="text-right">
                                <div class="text-sm font-semibold text-gray-500">Project Code</div>
                                <div class="mt-2 text-sm font-semibold text-gray-900">
                                    {{ $project->project_code ?? 'N/A' }}
                                </div>
                            </div>
                        @endif
                    </div>

                    <div class="mt-6">
                        <div class="text-sm font-semibold text-gray-500">Progress</div>
                        <div class="mt-2">
                            <div class="flex justify-between text-xs text-gray-500 mb-2">
                                <span>{{ $project->progress_percentage }}% Complete</span>
                                <span>{{ $project->progress_percentage >= 100 ? 'Delivered' : 'In Delivery' }}</span>
                            </div>
                            <div class="w-full bg-gray-200/80 rounded-full h-2">
                                <div class="h-2 rounded-full
                                    @if($project->progress_percentage >= 80) bg-green-500
                                    @elseif($project->progress_percentage >= 50) bg-blue-500
                                    @else bg-wabag-yellow @endif"
                                    style="width: {{ $project->progress_percentage }}%">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-6 grid grid-cols-2 gap-4">
                        @if($project->isPublicFieldVisible('show_budget', true))
                            <div class="metric-card">
                            <div class="text-xs uppercase tracking-wide text-gray-500 flex items-center gap-2">
                                <svg class="h-4 w-4 text-wabag-green" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-10V6m0 10v2m7-6a7 7 0 11-14 0 7 7 0 0114 0z"/>
                                </svg>
                                Budget
                            </div>
                            <div class="mt-2 text-lg font-semibold text-gray-900">PGK {{ number_format($project->budget ?? 0, 2) }}</div>
                        </div>
                        @endif
                        @if($project->isPublicFieldVisible('show_amount_spent', false))
                            <div class="metric-card">
                            <div class="text-xs uppercase tracking-wide text-gray-500 flex items-center gap-2">
                                <svg class="h-4 w-4 text-wabag-green" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a5 5 0 00-10 0v2m-2 0h14a2 2 0 012 2v7a2 2 0 01-2 2H5a2 2 0 01-2-2v-7a2 2 0 012-2z"/>
                                </svg>
                                Spent
                            </div>
                            <div class="mt-2 text-lg font-semibold text-gray-900">
                                {{ $project->amount_spent ? 'PGK ' . number_format($project->amount_spent, 2) : 'N/A' }}
                            </div>
                        </div>
                        @endif
                        <div class="metric-card">
                            <div class="text-xs uppercase tracking-wide text-gray-500 flex items-center gap-2">
                                <svg class="h-4 w-4 text-wabag-green" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10m-12 9h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                </svg>
                                Timeline
                            </div>
                            <div class="mt-2 text-sm font-semibold text-gray-900">
                                {{ $project->start_date?->format('M j, Y') ?? 'TBD' }} -
                                @if($project->actual_end_date)
                                    {{ $project->actual_end_date->format('M j, Y') }}
                                @else
                                    {{ $project->expected_end_date?->format('M j, Y') ?? 'TBD' }}
                                @endif
                            </div>
                        </div>
                        <div class="metric-card">
                            <div class="text-xs uppercase tracking-wide text-gray-500 flex items-center gap-2">
                                <svg class="h-4 w-4 text-wabag-green" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                                Location
                            </div>
                            <div class="mt-2 text-sm font-semibold text-gray-900">
                                {{ $project->location ?? 'N/A' }}
                            </div>
                        </div>
                    </div>

                    <div class="mt-6">
                        <a href="{{ route('projects.index') }}" class="inline-flex items-center text-wabag-green font-semibold hover:underline text-sm">
                            Explore more projects
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="grid lg:grid-cols-12 gap-8">
            <div class="lg:col-span-8 space-y-8">
                <div class="project-card project-enter" style="animation-delay: 200ms;">
                    <div class="card-surface overview-surface rounded-2xl border border-white/60 shadow-lg p-6 md:p-8">
                        <div class="flex items-center justify-between gap-4 mb-6">
                            <h2 class="text-xl md:text-2xl font-serif font-bold text-wabag-black">Project Overview</h2>
                        </div>
                        <div class="formatted-content text-gray-700">
                            {!!
                                preg_replace(
                                    [
                                        '/<h1[^>]*>(.*?)<\\/h1>/is',
                                        '/<h2[^>]*>(.*?)<\\/h2>/is',
                                        '/<h3[^>]*>(.*?)<\\/h3>/is',
                                        '/<h4[^>]*>(.*?)<\\/h4>/is',
                                        '/<p[^>]*>(.*?)<\\/p>/is'
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
                </div>

                <div class="project-card project-enter" style="animation-delay: 280ms;">
                    <div class="card-surface rounded-2xl border border-white/60 shadow-lg p-6 md:p-8">
                        <div class="flex items-center justify-between gap-4 mb-6">
                            <h2 class="text-xl md:text-2xl font-serif font-bold text-wabag-black">Project Updates</h2>
                            <span class="text-xs font-semibold uppercase tracking-wide text-gray-500">{{ $project->updates->count() }} updates</span>
                        </div>
                        <div class="space-y-6">
                            @forelse($project->updates as $update)
                                <div class="timeline-item">
                                    <div class="timeline-marker"></div>
                                    <div class="timeline-content">
                                        <div class="flex flex-col sm:flex-row sm:justify-between sm:items-start mb-2 gap-2">
                                            <h3 class="font-bold text-wabag-black">{{ $update->created_at->format('F j, Y') }}</h3>
                                            @if($project->isPublicFieldVisible('show_updates_author', false))
                                                <span class="text-sm text-gray-500">By {{ $update->author->name }}</span>
                                            @else
                                                <span class="text-sm text-gray-500">By Wabag DDA</span>
                                            @endif
                                        </div>
                                        <p class="text-gray-700 mb-3">{{ $update->update_text }}</p>

                                        @if($update->images)
                                            <div class="grid grid-cols-2 sm:grid-cols-3 gap-2 mt-3">
                                                @php
                                                    $images = is_array($update->images)
                                                        ? $update->images
                                                        : json_decode($update->images, true);
                                                @endphp

                                                @foreach($images as $image)
                                                    <a href="{{ Storage::url($image) }}" data-lightbox="update-{{ $update->id }}" class="block overflow-hidden rounded-lg">
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
                                </div>
                            @empty
                                <p class="text-gray-600 py-6 text-center border border-dashed rounded-lg">
                                    No updates available for this project yet.
                                </p>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>

            <aside class="lg:col-span-4 project-card project-enter mt-4" style="animation-delay: 240ms;">
                <div class="card-surface details-surface rounded-2xl border border-white/60 shadow-lg p-6 md:p-7 sticky top-6">
                    <h3 class="text-lg md:text-xl font-serif font-bold text-wabag-black mb-4">Project Details</h3>
                    <div class="space-y-4">
                        @if($project->isPublicFieldVisible('show_project_code', false))
                            <div class="detail-row">
                                <h4>Project Code</h4>
                                <p>{{ $project->project_code ?? 'N/A' }}</p>
                            </div>
                        @endif
                        <div class="detail-row">
                            <h4>Location</h4>
                            <p>{{ $project->location ?? 'N/A' }}</p>
                            @if($project->coordinates)
                                <a href="https://www.google.com/maps?q={{ $project->coordinates }}"
                                   target="_blank"
                                   class="map-badge mt-2 inline-flex items-center text-xs font-semibold">
                                    View on map
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                                    </svg>
                                </a>
                            @endif
                        </div>
                        <div class="detail-row">
                            <h4>Timeline</h4>
                            <p>
                                {{ $project->start_date?->format('M j, Y') ?? 'TBD' }} -
                                @if($project->actual_end_date)
                                    {{ $project->actual_end_date->format('M j, Y') }}
                                @else
                                    {{ $project->expected_end_date?->format('M j, Y') ?? 'TBD' }} (estimated)
                                @endif
                            </p>
                        </div>
                        <div class="detail-row">
                            <h4>Budget</h4>
                            @if($project->isPublicFieldVisible('show_budget', true))
                                <p>PGK {{ number_format($project->budget ?? 0, 2) }}</p>
                            @endif
                            @if($project->amount_spent && $project->isPublicFieldVisible('show_amount_spent', false))
                                <p class="text-sm text-gray-500">Amount Spent: PGK {{ number_format($project->amount_spent, 2) }}</p>
                            @endif
                        </div>
                        @if($project->isPublicFieldVisible('show_funding_sources', true))
                            <div class="detail-row">
                                <h4>Funding Sources</h4>
                                <ul class="mt-1 space-y-1 text-gray-600">
                                    @forelse ($project->fundingSources as $source)
                                        <li>{{ $source->funding_source }}</li>
                                    @empty
                                        <li>N/A</li>
                                    @endforelse
                                </ul>
                            </div>
                        @endif
                        <div class="detail-row">
                            <h4>LLG/Ward</h4>
                            <p>
                                {{ $project->llg->name ?? 'N/A' }} /
                                {{ $project->ward->name ?? 'N/A' }}
                            </p>
                        </div>
                        @if($project->isPublicFieldVisible('show_visibility_flag', false))
                            <div class="detail-row">
                                <h4>Visibility</h4>
                                <p>
                                    @if($project->is_public)
                                        <span class="text-green-600">Public</span>
                                    @else
                                        <span class="text-gray-600">Private</span>
                                    @endif
                                </p>
                            </div>
                        @endif
                    </div>
                </div>
            </aside>
        </div>
    </div>
</section>
@endsection

@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css">
<style>
    .project-show {
        --project-accent: #0f3d2e;
        --project-gold: #f7c948;
        background: linear-gradient(180deg, #f7f7f2 0%, #ffffff 40%, #f9fafb 100%);
        padding: 3rem 0 4.5rem;
    }

    .card-surface {
        background: linear-gradient(140deg, rgba(255, 255, 255, 0.92), rgba(248, 250, 252, 0.96)) !important;
        backdrop-filter: blur(6px);
    }

    .overview-surface {
        background: linear-gradient(150deg, rgba(240, 253, 244, 0.9), rgba(255, 255, 255, 0.98)) !important;
    }

    .details-surface {
        background: linear-gradient(150deg, rgba(224, 242, 254, 0.85), rgba(255, 255, 255, 0.98)) !important;
    }

    .project-hero-media {
        height: 420px;
        max-height: 420px;
    }

    .hero-meta {
        position: absolute;
        top: 1.25rem;
        left: 1.25rem;
        z-index: 10;
        background: rgba(255, 255, 255, 0.92);
        border: 1px solid rgba(15, 23, 42, 0.1);
        border-radius: 1rem;
        padding: 0.75rem 1rem;
        box-shadow: 0 10px 24px rgba(15, 23, 42, 0.12);
        backdrop-filter: blur(6px);
    }

    @media (max-width: 1024px) {
        .project-hero-media {
            height: 360px;
        }
    }

    @media (max-width: 640px) {
        .project-hero-media {
            height: 260px;
        }
    }

    .project-card {
        transition: transform 250ms ease, box-shadow 250ms ease;
    }

    .project-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 20px 50px rgba(15, 23, 42, 0.16);
    }

    .project-enter {
        opacity: 0;
        transform: translateY(18px);
        animation: project-fade 700ms ease forwards;
    }

    @keyframes project-fade {
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .status-pill {
        display: inline-flex;
        align-items: center;
        padding: 0.45rem 0.9rem;
        border-radius: 999px;
        font-size: 0.75rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.05em;
    }

    .status-complete { background: #dcfce7; color: #166534; }
    .status-progress { background: #dbeafe; color: #1d4ed8; }
    .status-planned { background: #fef9c3; color: #854d0e; }
    .status-delayed { background: #ffedd5; color: #9a3412; }
    .status-cancelled { background: #fee2e2; color: #991b1b; }
    .status-default { background: #f3f4f6; color: #1f2937; }

    .metric-card {
        background: linear-gradient(140deg, #f8fafc, #ffffff);
        border: 1px solid #e5e7eb;
        border-radius: 1rem;
        padding: 0.9rem 1rem;
    }

    .map-badge {
        background: rgba(15, 61, 46, 0.12);
        color: #0f3d2e;
        border: 1px solid rgba(15, 61, 46, 0.2);
        border-radius: 999px;
        padding: 0.35rem 0.75rem;
        transition: transform 200ms ease, box-shadow 200ms ease;
    }

    .map-badge:hover {
        transform: translateY(-1px);
        box-shadow: 0 8px 16px rgba(15, 61, 46, 0.18);
    }

    .timeline-item {
        position: relative;
        padding-left: 2rem;
    }

    .timeline-item::before {
        content: '';
        position: absolute;
        left: 0.4rem;
        top: 0.4rem;
        bottom: -1.5rem;
        width: 2px;
        background: #e5e7eb;
    }

    .timeline-item:last-child::before {
        bottom: 0.6rem;
    }

    .timeline-marker {
        position: absolute;
        left: 0.05rem;
        top: 0.3rem;
        width: 0.85rem;
        height: 0.85rem;
        border-radius: 999px;
        background: var(--project-gold);
        box-shadow: 0 0 0 4px #fff, 0 0 0 6px #fef3c7;
    }

    .detail-row h4 {
        font-weight: 600;
        color: #111827;
    }

    .detail-row p,
    .detail-row li {
        color: #4b5563;
        font-size: 0.95rem;
    }

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

    @media (prefers-reduced-motion: reduce) {
        .project-card,
        .project-enter {
            transition: none;
            animation: none;
            transform: none;
        }
    }
</style>
@endpush

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>
<script>
    lightbox.option({
        'albumLabel': 'Image %1 of %2',
        'wrapAround': true,
        'fadeDuration': 300
    });
</script>
@endpush
