@extends('layouts.public')

@section('content')
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-6">
        <div class="text-center mb-12">
            <h1 class="text-3xl font-serif font-bold text-wabag-green mb-4">All Projects</h1>
            <p class="text-lg max-w-2xl mx-auto text-gray-600">Browse through all our development projects transforming communities across Wabag District.</p>
            <div class="w-24 h-1 bg-wabag-yellow mx-auto mt-4"></div>
        </div>

        <!-- Search and Filters -->
        <div class="mb-8 flex flex-col md:flex-row justify-between items-center gap-4">
            <div class="w-full md:w-1/3">
                <form action="{{ route('projects.index') }}" method="GET">
                    <div class="relative">
                        <input type="text" name="search" placeholder="Search projects..."
                               class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-wabag-green focus:border-wabag-green"
                               value="{{ request('search') }}">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                    </div>
                </form>
            </div>

            <div class="w-full md:w-auto">
                <div class="inline-flex rounded-md shadow-sm" role="group">
                    <button type="button" onclick="filterProjects('all')"
                            class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-200 rounded-l-lg hover:bg-gray-100 focus:z-10 focus:ring-2 focus:ring-wabag-green active:bg-wabag-green active:text-white active:border-wabag-green">
                        All Projects
                    </button>
                    <button type="button" onclick="filterProjects('in_progress')"
                            class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border-t border-b border-gray-200 hover:bg-gray-100 focus:z-10 focus:ring-2 focus:ring-wabag-green">
                        Ongoing
                    </button>
                    <button type="button" onclick="filterProjects('completed')"
                            class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border-t border-b border-gray-200 hover:bg-gray-100 focus:z-10 focus:ring-2 focus:ring-wabag-green">
                        Completed
                    </button>
                    <button type="button" onclick="filterProjects('planned')"
                            class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-200 rounded-r-lg hover:bg-gray-100 focus:z-10 focus:ring-2 focus:ring-wabag-green">
                        Planned
                    </button>
                </div>
            </div>
        </div>

        <!-- Projects Grid -->
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8" id="projects-container">
            @forelse($projects as $project)
               @include('public.projects.partials.project-card', ['project' => $project])
            @empty
            <div class="col-span-3 text-center py-12">
                <p class="text-gray-600">No projects found matching your criteria.</p>
                <a href="{{ route('projects.index') }}" class="mt-4 inline-block text-wabag-green hover:underline">Clear filters</a>
            </div>
            @endforelse
        </div>

        <!-- Pagination -->
        @if($projects->hasPages())
            <div class="mt-12">
                {{ $projects->appends(request()->query())->links() }}
            </div>
        @endif
    </div>
</section>

@push('scripts')
<script>
    function filterProjects(status) {
        const url = new URL(window.location.href);
        url.searchParams.set('status', status);
        window.location.href = url.toString();
    }
</script>
@endpush
@endsection
