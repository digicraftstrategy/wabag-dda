<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\ExploreWabagItem;

class ExploreWabagController extends Controller
{
    public function show(string $slug)
    {
        $item = ExploreWabagItem::query()
            ->where('slug', $slug)
            ->where('is_published', true)
            ->firstOrFail();

        $relatedItems = ExploreWabagItem::query()
            ->where('is_published', true)
            ->where('id', '!=', $item->id)
            ->orderBy('sort_order')
            ->get();

        return view('public.explore-wabag.show', compact('item', 'relatedItems'));
    }
}
