<x-filament::page class="news-page">
    <style>
        .news-page > section { padding-top: 0; }
        .news-page { margin-top: 0; }
    </style>
    <div class="space-y-6">
        <div class="-mx-6 mt-0 rounded-2xl bg-gradient-to-r from-slate-900 via-slate-800 to-emerald-900 px-6 pt-6 pb-6 text-white shadow-sm ring-1 ring-slate-900/10">
            <div class="flex flex-col gap-4 md:flex-row md:items-start md:justify-between">
                <div>
                    <h1 class="text-2xl font-semibold">News Updates</h1>
                    <p class="mt-2 text-sm text-slate-100/90">All published news items and announcements.</p>
                </div>
                <a
                    href="{{ \App\Filament\Pages\Dashboard::getUrl() }}"
                    class="inline-flex items-center justify-center rounded-lg border border-white/20 bg-white/10 px-3 py-2 text-xs font-semibold text-white shadow-sm hover:bg-white/20"
                >
                    Back to Dashboard
                </a>
            </div>
        </div>

        <x-filament-widgets::widgets
            :widgets="[\App\Filament\Widgets\NewsUpdatesTable::class]"
            :columns="1"
        />
    </div>
</x-filament::page>
