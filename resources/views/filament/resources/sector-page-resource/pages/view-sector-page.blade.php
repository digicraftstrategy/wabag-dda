<x-filament::page>

    @php
        $sectorPage = $record;
    @endphp

    <div class="max-w-5xl mx-auto">

        <article class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">

            <header class="px-6 pt-6 pb-4">
                <span class="inline-block bg-yellow-100 text-wabag-green text-xs font-semibold px-3 py-1 rounded-full mb-4 uppercase tracking-wider">
                    {{ $sectorPage->sector->name ?? 'Sector' }}
                </span>

                <h1 class="text-3xl font-serif font-bold text-gray-900 mb-3 leading-tight">
                    {{ $sectorPage->title }}
                </h1>
            </header>

            <div class="px-6 pb-8">
                <div class="space-y-6">

                    @foreach($sectorPage->blocks->sortBy('position') as $block)

                        @if(!$block->is_visible)
                            @continue
                        @endif

                        {{-- HEADING --}}
                        @if($block->type === 'heading')
                            <h2 class="text-2xl font-bold text-wabag-green">
                                {{ $block->content['heading'] ?? '' }}
                            </h2>
                        @endif

                        {{-- PARAGRAPH --}}
                        @if($block->type === 'paragraph')
                            <div class="text-gray-700 leading-relaxed">
                                {!! $block->content['paragraph'] ?? '' !!}
                            </div>
                        @endif

                        {{-- NOTE --}}
                        @if($block->type === 'note')
                            <div class="bg-yellow-50 border-l-4 border-yellow-400 p-4">
                                {!! $block->content['note'] ?? '' !!}
                            </div>
                        @endif

                        {{-- STATS --}}
                        @if($block->type === 'stats_grid')
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                @foreach(($block->content['stats'] ?? []) as $stat)
                                    <div class="bg-yellow-100 p-4 rounded-lg border border-yellow-200">
                                        <div class="text-sm font-semibold">
                                            {{ $stat['title'] ?? '' }}
                                        </div>
                                        <div class="text-xl font-bold">
                                            {{ $stat['value'] ?? '' }}
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif

                        {{-- TABLE --}}
                        @php
                            $table = $block['content']['table'] ?? [];
                        @endphp

                        @if(!empty($table))
                            <div class="overflow-x-auto mb-6">
                                <table class="min-w-full border border-gray-200 rounded-lg overflow-hidden">
                                    
                                    {{-- HEADER --}}
                                    <thead>
                                        <tr class="bg-gray-100 text-gray-700 text-sm font-semibold">
                                            @foreach($table[0] as $cell)
                                                <th class="py-3 px-4 text-left border-b border-gray-200">
                                                    {{ $cell }}
                                                </th>
                                            @endforeach
                                        </tr>
                                    </thead>

                                    {{-- BODY --}}
                                    <tbody class="divide-y divide-gray-200 text-sm text-gray-700">
                                        @foreach(array_slice($table, 1) as $row)
                                            <tr class="hover:bg-gray-50">
                                                @foreach($row as $cell)
                                                    <td class="py-3 px-4 text-left">
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

</x-filament::page>
