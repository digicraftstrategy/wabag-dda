@php
    use App\Models\Project;
@endphp

<x-filament::page>
    <x-filament::card>
        <h2 class="text-xl font-bold mb-4">Project Timeline Overview</h2>
        <div id="project-timeline-chart" class="h-96">
            <!-- Placeholder for chart.js or any timeline chart integration -->
            <p class="text-gray-500 text-sm">Timeline chart coming soon...</p>
        </div>
    </x-filament::card>

    <x-filament::card class="mt-6">
        <h2 class="text-xl font-bold mb-2">Recent News & Updates</h2>
        <ul>
            @foreach(\App\Models\NewsUpdate::latest()->take(5)->get() as $news)
                <li class="border-b py-2">
                    <strong>{{ $news->title }}</strong>
                    <p class="text-sm text-gray-600">
                        {{ optional($news->created_at)->diffForHumans() ?? 'Unknown date' }}
                    </p>
                </li>
            @endforeach
        </ul>
    </x-filament::card>
</x-filament::page>
