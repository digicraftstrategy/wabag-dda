<x-filament::page>

    @php
        $sectorPage = $record;
    @endphp

    <section class="py-12 bg-white">
        <div class="container mx-auto px-4 lg:px-6 max-w-7xl">

            <div class="flex flex-col lg:flex-row gap-8">
                <div class="w-full">

                    <article class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">

                        {{-- HEADER --}}
                        <header class="px-6 pt-6 pb-4">
                            <span class="inline-block bg-yellow-100 text-wabag-green text-xs font-semibold px-3 py-1 rounded-full mb-4 uppercase tracking-wider">
                                {{ $sectorPage->sector->name ?? 'Sector' }}
                            </span>

                            <h1 class="text-3xl lg:text-4xl font-serif font-bold text-wabag-black mb-3 leading-tight">
                                {{ $sectorPage->title }}
                            </h1>
                        </header>

                        {{-- CONTENT --}}
                        <div class="px-6 pb-8">
                            <div class="formatted-content text-gray-700 space-y-6">

                                @foreach($sectorPage->blocks->sortBy('position') as $block)

                                    @continue(!$block->is_visible)

                                    {{-- =========================
                                        HEADING
                                    ========================== --}}
                                    @if($block->type === 'heading')
                                        <div class="font-bold text-2xl mt-6 mb-4 text-wabag-green">
                                            {{ $block->content['heading'] ?? '' }}
                                        </div>
                                    @endif


                                    {{-- =========================
                                        PARAGRAPH
                                    ========================== --}}
                                    @if($block->type === 'paragraph')
                                        <div class="mb-4 leading-relaxed">
                                            {!! $block->content['paragraph'] ?? '' !!}
                                        </div>
                                    @endif


                                    {{-- =========================
                                        NOTE BOX
                                    ========================== --}}
                                    @if($block->type === 'note')
                                        <div class="bg-yellow-50 border-l-4 border-yellow-400 p-4 mb-6">
                                            <div class="text-yellow-700 text-sm">
                                                {!! $block->content['note'] ?? '' !!}
                                            </div>
                                        </div>
                                    @endif


                                    {{-- =========================
                                        STATS GRID
                                    ========================== --}}
                                    @if($block->type === 'stats_grid')
                                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                                            @foreach(($block->content['stats'] ?? []) as $stat)

                                                @php
                                                    $unit = $stat['unit'] ?? null;

                                                    $displayUnit = match ($unit) {
                                                        '%'     => '%',
                                                        'PGK'   => ' PGK',
                                                        '$'     => ' $',
                                                        'km'    => ' km',
                                                        'm'     => ' m',
                                                        'count' => '',
                                                        'ratio' => '',
                                                        'custom'=> ' ' . ($stat['unit_custom'] ?? ''),
                                                        default => '',
                                                    };

                                                    $formattedValue = is_numeric($stat['value'] ?? null)
                                                        ? number_format($stat['value'])
                                                        : ($stat['value'] ?? '');
                                                @endphp

                                                <div class="bg-yellow-100 p-4 rounded-lg border border-yellow-200">
                                                    <div class="text-sm text-green-800 font-semibold mb-1">
                                                        {{ $stat['title'] ?? '' }}
                                                    </div>

                                                    <div class="text-2xl font-bold">
                                                        {{ $formattedValue }}{{ $displayUnit }}
                                                    </div>

                                                    @if(!empty($stat['description']))
                                                        <div class="text-xs text-gray-500 mt-1">
                                                            {{ $stat['description'] }}
                                                        </div>
                                                    @endif
                                                </div>

                                            @endforeach
                                        </div>
                                    @endif


                                    {{-- =========================
                                        TABLE
                                    ========================== --}}
                                    @php
                                        $table = $block['content']['table'] ?? [];
                                    @endphp

                                    @if(!empty($table))
                                        <div class="overflow-x-auto mb-6">
                                            <table class="min-w-full">

                                                {{-- HEADER --}}
                                                <thead>
                                                    <tr class="bg-gray-50">
                                                        @foreach($table[0] as $cell)
                                                            <th class="py-3 px-4 text-left text-sm font-semibold text-gray-700 border-b">
                                                                {{ $cell }}
                                                            </th>
                                                        @endforeach
                                                    </tr>
                                                </thead>

                                                {{-- BODY --}}
                                                <tbody class="divide-y divide-gray-200">
                                                    @foreach(array_slice($table, 1) as $row)
                                                        <tr>
                                                            @foreach($row as $cell)
                                                                <td class="py-3 px-4 text-sm text-gray-700">
                                                                    {{ $cell }}
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
            </div>

        </div>
    </section>

</x-filament::page>
