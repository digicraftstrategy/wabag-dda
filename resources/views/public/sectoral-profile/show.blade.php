@extends('layouts.public')

@section('title', $sectorPage->title . ' | Wabag DDA')

@section('content')
<section class="py-12 bg-white sector-page">
    {{-- <div class="mx-auto px-6 max-w-screen-2xl"> --}}
    <div class="container mx-auto px-4 lg:px-6 max-w-7xl">
        <div class="flex flex-col lg:flex-row gap-8">
            <!-- Main Content (2/3 width) -->
            <div class="lg:w-2/3">
                <!-- Breadcrumbs -->
                        <nav class="flex mb-6 public-breadcrumb" aria-label="Breadcrumb">
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
                                        <a href="#" class="ml-2 text-sm font-medium text-wabag-green hover:text-green-800 transition">Sectoral Profiles</a>
                                    </div>
                                </li>
                                <li aria-current="page">
                                    <div class="flex items-center">
                                        <svg class="w-5 h-5 text-gray-300" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                                        <span class="ml-2 text-sm font-medium text-gray-500">
                                            {{ $sectorPage->title }}
                                        </span>
                                    </div>
                                </li>
                            </ol>
                        </nav>
                <article class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
                    @php
                        $themeKey = $sectorPage->sector->theme_color ?? 'green';

                        $badgeColorMap = [
                            'green' => 'bg-green-100 text-green-800',
                            'blue' => 'bg-blue-100 text-blue-800',
                            'red' => 'bg-red-100 text-red-800',
                            'purple' => 'bg-purple-100 text-purple-800',
                            'orange' => 'bg-orange-100 text-orange-800',
                            'teal' => 'bg-teal-100 text-teal-800',
                        ];

                        $badgeTheme = $badgeColorMap[$themeKey]
                            ?? $badgeColorMap['green'];

                        $panelThemeMap = [
                            'green' => [
                                'bg' => 'bg-green-50',
                                'border' => 'border-green-200',
                                'text' => 'text-green-800',
                            ],
                            'blue' => [
                                'bg' => 'bg-blue-50',
                                'border' => 'border-blue-200',
                                'text' => 'text-blue-800',
                            ],
                            'red' => [
                                'bg' => 'bg-red-50',
                                'border' => 'border-red-200',
                                'text' => 'text-red-800',
                            ],
                            'purple' => [
                                'bg' => 'bg-purple-50',
                                'border' => 'border-purple-200',
                                'text' => 'text-purple-800',
                            ],
                            'orange' => [
                                'bg' => 'bg-orange-50',
                                'border' => 'border-orange-200',
                                'text' => 'text-orange-800',
                            ],
                            'teal' => [
                                'bg' => 'bg-teal-50',
                                'border' => 'border-teal-200',
                                'text' => 'text-teal-800',
                            ],
                        ];

                        $panelTheme = $panelThemeMap[$themeKey] ?? $panelThemeMap['green'];
                    @endphp
                    <header class="px-6 pt-4 pb-2">
                        <span class="inline-block {{ $badgeTheme }} 
                            text-xs font-semibold px-3 py-1 rounded-full mb-4 uppercase tracking-wider">
                            {{ $sectorPage->sector->name ?? 'Sector' }}
                        </span>
                        <h1 class="text-3xl lg:text-4xl font-serif font-bold text-wabag-black mb-2 leading-tight">
                            {{ $sectorPage->title }}
                        </h1>
                    </header>

                    <div class="px-6 pb-6">
                        <div class="formatted-content text-gray-700 space-y-5">

                            @foreach($sectorPage->blocks->sortBy('position') as $block)

                                @if(!$block->is_visible)
                                    @continue
                                @endif

                                {{-- HEADING --}}
                                @if($block->type === 'heading')
                                    @php
                                        $headingStyleMap = [
                                            'default' => 'font-sans font-bold',
                                            'serif' => 'font-serif font-bold',
                                            'mono' => 'font-mono font-bold',
                                        ];
                                        $headingSize = $block->content['heading_size'] ?? 'text-2xl';
                                        $headingColor = $block->content['heading_color'] ?? 'text-wabag-green';
                                        $headingStyle = $headingStyleMap[$block->content['heading_style'] ?? 'default'] ?? 'font-sans font-bold';
                                    @endphp
                                    <h2 class="{{ $headingSize }} {{ $headingColor }} {{ $headingStyle }} mt-4 mb-3">
                                        {{ $block->content['heading'] ?? '' }}
                                    </h2>
                                @endif

                                {{-- PARAGRAPH --}}
                                @if($block->type === 'paragraph')
                                    <div class="leading-relaxed mt-3 mb-4">
                                        {!! $block->content['paragraph'] ?? '' !!}
                                    </div>
                                @endif

                                {{-- STATS --}}
                                @if($block->type === 'stats_grid')

                                @php
                                    $statsThemeMap = [
                                        'green' => [
                                            'bg' => 'bg-green-50',
                                            'border' => 'border-green-200',
                                            'title' => 'text-green-800',
                                        ],
                                        'blue' => [
                                            'bg' => 'bg-blue-50',
                                            'border' => 'border-blue-200',
                                            'title' => 'text-blue-800',
                                        ],
                                        'red' => [
                                            'bg' => 'bg-red-50',
                                            'border' => 'border-red-200',
                                            'title' => 'text-red-800',
                                        ],
                                        'purple' => [
                                            'bg' => 'bg-purple-50',
                                            'border' => 'border-purple-200',
                                            'title' => 'text-purple-800',
                                        ],
                                        'orange' => [
                                            'bg' => 'bg-orange-50',
                                            'border' => 'border-orange-200',
                                            'title' => 'text-orange-800',
                                        ],
                                        'teal' => [
                                            'bg' => 'bg-teal-50',
                                            'border' => 'border-teal-200',
                                            'title' => 'text-teal-800',
                                        ],
                                    ];

                                    $statsTheme = $statsThemeMap[$sectorPage->sector->theme_color ?? 'green']
                                        ?? $statsThemeMap['green'];
                                @endphp

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4 mb-6">
                                    @foreach(($block->content['stats'] ?? []) as $stat)

                                        @php
                                            $value = $stat['value'] ?? null;
                                            $unit = $stat['unit'] ?? null;

                                            // Determine display unit
                                            $displayUnit = match ($unit) {
                                                '%'     => '%',
                                                'PGK'   => ' PGK',
                                                '$'     => ' $',
                                                'km'    => ' km',
                                                'm'     => ' m',
                                                'ratio' => '',
                                                '+'     => '+',
                                                'custom'=> ' ' . ($stat['unit_custom'] ?? ''),
                                                default => '',
                                            };

                                            // Format numeric values
                                            if (is_numeric($value)) {
                                                $formattedValue = number_format($value);
                                            } else {
                                                $formattedValue = $value;
                                            }

                                            $hasValue = !empty($formattedValue);
                                        @endphp

                                        <div class="{{ $statsTheme['bg'] }} p-4 rounded-lg border {{ $statsTheme['border'] }}">

                                            {{-- TITLE --}}
                                            <div class="text-sm {{ $statsTheme['title'] }} font-semibold mb-1">
                                                {{ $stat['title'] ?? '' }}
                                            </div>

                                            {{-- VALUE (Optional) --}}
                                            @if($hasValue)
                                                <div class="text-2xl font-bold">
                                                    {{ $formattedValue }}{{ $displayUnit }}
                                                </div>
                                            @endif

                                            {{-- DESCRIPTION (Optional) --}}
                                            @if(!empty($stat['description']))
                                                <div class="text-xs text-gray-500 mt-1">
                                                    {{ $stat['description'] }}
                                                </div>
                                            @endif

                                        </div>

                                    @endforeach
                                </div>

                            @endif


                                {{-- NOTE --}}
                                @if($block->type === 'note')
                                    <div class="{{ $panelTheme['bg'] }} border-l-4 {{ $panelTheme['border'] }} p-4 mt-3 mb-4">
                                        {!! $block->content['note'] ?? '' !!}
                                    </div>
                                @endif

                                {{-- DIVIDER --}}
                                @if($block->type === 'divider')
                                    <hr class="border-t border-gray-200 my-4">
                                @endif

                                {{-- TABLE --}}
                                @php
                                    $table = $block['content']['table'] ?? [];
                                @endphp

                                @if(!empty($table))
                                    <div class="overflow-x-auto mt-4 mb-6">
                                        @if(!empty($block->label))
                                            <div class="mb-3 text-lg font-semibold text-gray-700">
                                                {{ $block->label }}
                                            </div>
                                        @endif
                                        <table class="min-w-full">
                                            <thead>
                                                <tr class="bg-gray-50">
                                                    @foreach($table[0] as $cell)
                                                        <th class="py-3 px-4 text-left text-sm font-semibold text-gray-700 border-b">
                                                            {!! $cell !!}
                                                        </th>
                                                    @endforeach
                                                </tr>
                                            </thead>

                                            <tbody class="divide-y divide-gray-200">
                                                @foreach(array_slice($table, 1) as $row)
                                                    <tr>
                                                        @foreach($row as $cell)
                                                            <td class="py-3 px-4 text-sm text-gray-700">
                                                                {!! $cell !!}
                                                            </td>
                                                        @endforeach
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                @endif

                            @endforeach

                        </div>
                    </div>

                </article>
            </div>
            <!-- SIDEBAR -->
            <div class="lg:w-1/3 space-y-6">

                {{-- ================= SECTOR LINKS ================= --}}
                <div class="bg-wabag-green/5 p-6 rounded-xl border border-wabag-green/20">
                    <h3 class="text-xl font-serif font-bold text-wabag-green mb-4">
                        Sectoral Profile Links
                    </h3>

                    <div class="space-y-3">
                        @php
                        $colorMap = [
                            'green' => [
                                'bg' => 'bg-green-50',
                                'border' => 'border-green-400',
                                'iconBg' => 'bg-green-200',
                                'text' => 'text-green-700',
                                'hoverBorder' => 'hover:border-green-400',
                                'hoverBg' => 'hover:bg-green-50',
                            ],
                            'blue' => [
                                'bg' => 'bg-blue-50',
                                'border' => 'border-blue-400',
                                'iconBg' => 'bg-blue-200',
                                'text' => 'text-blue-700',
                                'hoverBorder' => 'hover:border-blue-400',
                                'hoverBg' => 'hover:bg-blue-50',
                            ],
                            'red' => [
                                'bg' => 'bg-red-50',
                                'border' => 'border-red-400',
                                'iconBg' => 'bg-red-200',
                                'text' => 'text-red-700',
                                'hoverBorder' => 'hover:border-red-400',
                                'hoverBg' => 'hover:bg-red-50',
                            ],
                            'purple' => [
                                'bg' => 'bg-purple-50',
                                'border' => 'border-purple-400',
                                'iconBg' => 'bg-purple-200',
                                'text' => 'text-purple-700',
                                'hoverBorder' => 'hover:border-purple-400',
                                'hoverBg' => 'hover:bg-purple-50',
                            ],
                            'orange' => [
                                'bg' => 'bg-orange-50',
                                'border' => 'border-orange-400',
                                'iconBg' => 'bg-orange-200',
                                'text' => 'text-orange-700',
                                'hoverBorder' => 'hover:border-orange-400',
                                'hoverBg' => 'hover:bg-orange-50',
                            ],
                            'teal' => [
                                'bg' => 'bg-teal-50',
                                'border' => 'border-teal-400',
                                'iconBg' => 'bg-teal-200',
                                'text' => 'text-teal-700',
                                'hoverBorder' => 'hover:border-teal-400',
                                'hoverBg' => 'hover:bg-teal-50',
                            ],
                        ];
                        @endphp

                        @foreach($allSectors as $sector)

                            @php
                                $isActive = $sector->slug === $sectorPage->slug;

                                $theme = $colorMap[$sector->sector->theme_color ?? 'green'] ?? $colorMap['green'];
                            @endphp

                            <a href="{{ route('public.sector.profile', $sector->slug) }}"
                                class="flex items-center
                                    {{ $isActive 
                                        ? $theme['bg'].' '.$theme['border'] 
                                        : 'bg-white border-gray-200 '.$theme['hoverBorder'].' '.$theme['hoverBg'] 
                                    }}
                                    p-3 rounded-lg border transition-all duration-300 group">

                                <div class="w-10 h-10 rounded-full
                                    {{ $isActive ? $theme['iconBg'] : 'bg-gray-100 group-hover:'.$theme['iconBg'] }}
                                    flex items-center justify-center mr-3 transition-all duration-300">

                                    @switch($sector->sector->icon)

                                    {{-- Health --}}
                                    @case('health')
                                        <svg class="w-5 h-5 {{ $theme['text'] }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                                        </svg>
                                    @break

                                    {{-- Education --}}
                                    @case('education')
                                        <svg class="w-5 h-5 {{ $theme['text'] }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 14l9-5-9-5-9 5 9 5z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 14v6"/>
                                        </svg>
                                    @break

                                    {{-- Community Development --}}
                                    @case('community')
                                        <svg class="w-5 h-5 {{ $theme['text'] }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0z"/>
                                        </svg>
                                    @break

                                    {{-- Infrastructure --}}
                                    @case('infrastructure')
                                        <svg class="w-5 h-5 {{ $theme['text'] }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M13 10V3L4 14h7v7l9-11h-7z"/>
                                        </svg>
                                    @break

                                    {{-- Economic Development --}}
                                    @case('economic')
                                        <svg class="w-5 h-5 {{ $theme['text'] }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                        </svg>
                                    @break

                                    {{-- Law & Justice --}}
                                    @case('law')
                                        <svg class="w-5 h-5 {{ $theme['text'] }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 3l7 4v5c0 5-3.5 9-7 9s-7-4-7-9V7l7-4z"/>
                                        </svg>
                                    @break

                                    {{-- Environment --}}
                                    @case('environment')
                                        <svg class="w-5 h-5 {{ $theme['text'] }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 3v18M4 12h16"/>
                                        </svg>
                                    @break

                                    {{-- Default --}}
                                    @default
                                        <svg class="w-5 h-5 {{ $theme['text'] }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 4v16m8-8H4"/>
                                        </svg>

                                @endswitch

                                </div>

                                <div>
                                   <h4 class="font-medium 
                                        {{ $isActive ? $theme['text'] : 'text-gray-800 group-hover:'.$theme['text'] }}
                                        transition-colors duration-300">

                                        {{ $sector->sector->name ?? $sector->title }}
                                    </h4>

                                    <p class="text-xs text-gray-500 mt-1">
                                        {{ $sector->sector->description ?? '' }}
                                    </p>

                                </div>
                            </a>

                        @endforeach

                    </div>
                </div>


                {{-- ================= SIDEBAR / KEY STATS ================= --}}
                @php
                    $statsBlock = $sectorPage->blocks
                        ->where('type', 'stats_grid')
                        ->first();
                @endphp

                @if(!empty($sectorPage->sidebar_stats))
                    <div class="bg-wabag-green/5 p-6 rounded-xl border border-wabag-green/20">
                        <h3 class="text-xl font-serif font-bold text-wabag-green mb-4">
                            Quick Stats
                        </h3>

                        <div class="space-y-3">
                            @foreach($sectorPage->sidebar_stats as $stat)
                                <div class="flex justify-between border-b pb-2 last:border-0 last:pb-0">
                                    <span class="text-gray-600">
                                        {{ $stat['label'] ?? '' }}
                                    </span>
                                    <span class="font-semibold">
                                        {{ $stat['value'] ?? '' }}
                                    </span>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @elseif($statsBlock && !empty($statsBlock->content['stats']))
                    <div class="bg-wabag-green/5 p-6 rounded-xl border border-wabag-green/20">
                        <h3 class="text-xl font-serif font-bold text-wabag-green mb-4">
                            Key {{ $sectorPage->sector->name ?? '' }} Stats
                        </h3>

                        <div class="space-y-3">

                            @foreach($statsBlock->content['stats'] as $stat)

                                @php
                                    $unit = $stat['unit'] ?? null;

                                    $displayUnit = match ($unit) {
                                        '%'     => '%',
                                        'PGK'   => ' PGK',
                                        '$'     => ' $',
                                        'km'    => ' km',
                                        'm'     => ' m',
                                        'ratio' => '',
                                        '+'     => '+',
                                        'custom'=> ' ' . ($stat['unit_custom'] ?? ''),
                                        default => '',
                                    };

                                    $formattedValue = is_numeric($stat['value'] ?? null)
                                        ? number_format($stat['value'])
                                        : ($stat['value'] ?? '');
                                @endphp

                                <div class="flex justify-between border-b pb-2 last:border-0 last:pb-0">
                                    <span class="text-gray-600">
                                        {{ $stat['title'] ?? '' }}
                                    </span>
                                    <span class="font-semibold">
                                        {{ $formattedValue }}{{ $displayUnit }}
                                    </span>
                                </div>

                            @endforeach

                        </div>
                    </div>
                @endif

                {{-- ================= CONTACT (Optional Future Dynamic) ================= --}}
                <div class="bg-gray-50 p-6 rounded-xl border border-gray-200">
                    <h3 class="text-xl font-serif font-bold text-wabag-green mb-4">
                        Contact {{ $sectorPage->sector->name ?? '' }} Division
                    </h3>

                    <div class="space-y-2 text-sm">
                        <div class="flex items-start">
                            <svg class="w-5 h-5 text-wabag-green mr-2 mt-0.5 flex-shrink-0"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                            </svg>
                            <span>{{ config('app.phone') ?? '+675 XXX XXXX' }}</span>
                        </div>

                        <div class="flex items-start">
                            <svg class="w-5 h-5 text-wabag-green mr-2 mt-0.5 flex-shrink-0"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                            <span>{{ config('app.email') ?? 'info@wabagdda.gov.pg' }}</span>
                        </div>

                        <div class="flex items-start">
                            <svg class="w-5 h-5 text-wabag-green mr-2 mt-0.5 flex-shrink-0"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                <path stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                            <span>Wabag District Headquarters, Enga Province</span>
                        </div>
                    </div>
                </div>
                {{-- ================= RESOURCES ================= --}}
                @if(!empty($sectorPage->sidebar_resources))
                <div class="bg-gray-50 p-6 rounded-xl border border-gray-200">
                    <h3 class="text-xl font-serif font-bold text-wabag-green mb-4">
                        Resources
                    </h3>

                    <div class="space-y-3">
                        @foreach($sectorPage->sidebar_resources as $resource)
                            <a href="{{ $resource['url'] ?? '#' }}"
                            target="_blank"
                            class="flex items-center text-wabag-green hover:text-green-800 group transition">

                                <svg class="w-5 h-5 mr-2 text-gray-400 group-hover:text-wabag-green transition"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                </svg>

                                {{ $resource['title'] ?? '' }}
                            </a>
                        @endforeach
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</section>
@endsection
