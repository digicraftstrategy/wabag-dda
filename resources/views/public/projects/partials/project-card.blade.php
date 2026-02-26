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
       {{-- <p class="text-gray-600 text-sm mb-4 line-clamp-2">{{ strip_tags($project->description) }}</p>--}}
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
