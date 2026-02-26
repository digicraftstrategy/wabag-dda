@extends('layouts.public')

@section('title', 'Projects - Wabag District Development Authority')

@section('content')
<section class="py-16 bg-white">
    <div class="container mx-auto px-6">
        <div class="text-center mb-12">
            <h1 class="text-4xl font-serif font-bold text-wabag-green mb-4">Development Projects</h1>
            <div class="w-24 h-1 bg-wabag-yellow mx-auto mt-4"></div>
            <p class="text-lg max-w-2xl mx-auto text-gray-600 mt-6">Explore our ongoing and completed development initiatives across Wabag District</p>

            @if(request('query') || request('status'))
            <div class="mt-4">
                <p class="text-sm text-gray-600">
                    Showing results for:
                    @if(request('query'))
                        <span class="font-medium">"{{ request('query') }}"</span>
                    @endif
                    @if(request('query') && request('status'))
                        <span class="mx-1">with status</span>
                    @endif
                    @if(request('status'))
                        <span class="font-medium">"{{ ucfirst(str_replace('_', ' ', request('status'))) }}"</span>
                    @endif
                    <a href="{{ route('projects.index') }}" class="ml-2 text-sm text-wabag-green hover:text-green-800 inline-flex items-center">
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
                <!-- Project Status Filter -->
                <div class="flex justify-center mb-8">
                    <div class="inline-flex rounded-md shadow-sm" role="group">
                        <button type="button" data-filter="all"
                                class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-200 rounded-l-lg hover:bg-gray-100 focus:z-10 focus:ring-2 focus:ring-wabag-green {{ !request('status') ? 'bg-wabag-green text-white border-wabag-green' : '' }}">
                            All Projects
                        </button>
                        <button type="button" data-filter="in_progress"
                                class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border-t border-b border-gray-200 hover:bg-gray-100 focus:z-10 focus:ring-2 focus:ring-wabag-green {{ request('status') == 'in_progress' ? 'bg-blue-100 text-blue-800 border-blue-300' : '' }}">
                            Ongoing
                        </button>
                        <button type="button" data-filter="completed"
                                class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border-t border-b border-gray-200 hover:bg-gray-100 focus:z-10 focus:ring-2 focus:ring-wabag-green {{ request('status') == 'completed' ? 'bg-green-100 text-green-800 border-green-300' : '' }}">
                            Completed
                        </button>
                        <button type="button" data-filter="planned"
                                class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-200 rounded-r-lg hover:bg-gray-100 focus:z-10 focus:ring-2 focus:ring-wabag-green {{ request('status') == 'planned' ? 'bg-yellow-100 text-yellow-800 border-yellow-300' : '' }}">
                            Planned
                        </button>
                    </div>
                </div>

                @if($projects->count() > 0)
                <div class="grid md:grid-cols-2 gap-8">
                    @foreach($projects as $project)
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
                            <div class="text-gray-600 text-sm mb-4 line-clamp-2 formatted-content-inline">
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
                                            '<span class="font-bold">$1</span> ',
                                            '<span class="font-bold">$1</span> ',
                                            '<span class="font-bold">$1</span> ',
                                            '<span class="font-semibold">$1</span> ',
                                            '$1 '
                                        ],
                                        strip_tags($project->description, '<b><strong><i><em><u><span><br>')
                                    )
                                !!}
                            </div>
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
                                <a href="{{ route('projects.show', $project) }}" class="w-full border border-wabag-green text-wabag-green hover:bg-wabag-green hover:text-white font-bold py-2 px-4 rounded-lg text-center transition duration-300 inline-flex items-center justify-center">
                                    View Details
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                <!-- Pagination -->
                <div class="mt-12">
                    {{ $projects->withQueryString()->links() }}
                </div>
                @else
                <div class="text-center py-12">
                    <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <h3 class="mt-2 text-lg font-medium text-gray-900">No projects found</h3>
                    <p class="mt-1 text-gray-600">
                        @if(request('query') || request('status'))
                            Try adjusting your search or filter to find what you're looking for.
                        @else
                            No projects available at the moment. Please check back later.
                        @endif
                    </p>
                    @if(request('query') || request('status'))
                    <div class="mt-6">
                        <a href="{{ route('projects.index') }}" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-wabag-green hover:bg-green-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-wabag-green">
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
                        <h3 class="text-xl font-serif font-bold text-wabag-green mb-4">Search Projects</h3>
                        <form action="{{ route('projects.index') }}" method="GET">
                            <div class="relative">
                                <input type="text" name="query" placeholder="Search projects by name or location..."
                                    value="{{ request('query') }}"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-wabag-green focus:border-wabag-green">
                                <button type="submit" class="absolute right-2 top-2 text-wabag-green hover:text-green-800">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                    </svg>
                                </button>
                            </div>
                            @if(request('status'))
                                <input type="hidden" name="status" value="{{ request('status') }}">
                            @endif
                        </form>
                    </div>

                    <!-- Project Types Filter -->
                    <div class="mb-8">
                        <h3 class="text-xl font-serif font-bold text-wabag-green mb-4">Project Types</h3>
                        <div class="space-y-2">
                            @foreach($projectTypes as $type)
                            <a href="{{ route('projects.index', ['type' => $type->id, 'query' => request('query'), 'status' => request('status')]) }}"
                               class="flex justify-between items-center px-3 py-2 bg-white rounded-lg hover:bg-wabag-green/5 transition {{ request('type') == $type->id ? 'bg-wabag-green/10 border border-wabag-green' : '' }}">
                                <span class="text-sm font-medium text-gray-700">{{ $type->type }}</span>
                                <span class="text-xs bg-gray-100 text-gray-600 px-2 py-1 rounded-full">{{ $type->projects_count }}</span>
                            </a>
                            @endforeach
                        </div>
                    </div>

                    <!-- Recent Projects -->
                    <div>
                        <h3 class="text-xl font-serif font-bold text-wabag-green mb-4">Recent Projects</h3>
                        <div class="space-y-4">
                            @foreach($recentProjects as $project)
                            <a href="{{ route('projects.show', $project) }}" class="block group">
                                <div class="flex items-center">
                                    @if($project->featured_image)
                                    <div class="flex-shrink-0 mr-3">
                                        <img src="{{ Storage::url($project->featured_image) }}" alt="{{ $project->title }}" class="h-12 w-12 object-cover rounded">
                                    </div>
                                    @endif
                                    <div>
                                        <h4 class="text-sm font-medium text-wabag-black group-hover:text-wabag-green transition">{{ Str::limit($project->title, 50) }}</h4>
                                        <p class="text-xs text-gray-500">
                                            <span class="inline-block px-2 py-1 text-xs rounded-full
                                                @if($project->status === 'completed') bg-green-100 text-green-800
                                                @elseif($project->status === 'in_progress') bg-blue-100 text-blue-800
                                                @elseif($project->status === 'planned') bg-yellow-100 text-yellow-800
                                                @endif">
                                                {{ ucfirst(str_replace('_', ' ', $project->status)) }}
                                            </span>
                                        </p>
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
@endsection

@push('styles')
<style>
    .formatted-content-inline {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
        line-height: 1.5;
    }

    .formatted-content-inline span {
        display: inline;
        background: transparent;
    }

    .formatted-content-inline .font-bold {
        font-weight: 700;
    }

    .formatted-content-inline .font-semibold {
        font-weight: 600;
    }
</style>
@endpush

@push('scripts')
<script>
    // Filter projects by status
    document.querySelectorAll('[data-filter]').forEach(button => {
        button.addEventListener('click', function() {
            const status = this.getAttribute('data-filter');
            const url = new URL(window.location.href);

            if (status === 'all') {
                url.searchParams.delete('status');
            } else {
                url.searchParams.set('status', status);
            }

            window.location.href = url.toString();
        });
    });
</script>
@endpush
