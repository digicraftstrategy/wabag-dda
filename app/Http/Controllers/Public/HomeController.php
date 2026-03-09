<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\NewsUpdate;
use App\Models\Project;
use App\Models\ExploreWabagSection;
use App\Models\ExploreWabagItem;

class HomeController extends Controller
{
    public function index()
    {
        $newsUpdates = NewsUpdate::published()
                        ->latest('published_date')
                        ->take(6)
                        ->get();

        $projects = Project::where('is_public', true)
                    ->orderBy('created_at', 'desc')
                    ->with(['type', 'ward'])
                    ->latest()
                    ->paginate(9);

        $exploreSection = ExploreWabagSection::query()
            ->where('is_published', true)
            ->latest('updated_at')
            ->first();

        $exploreItems = ExploreWabagItem::query()
            ->where('is_published', true)
            ->orderBy('sort_order')
            ->orderBy('created_at')
            ->get();

        return view('public.home', compact('newsUpdates', 'projects', 'exploreSection', 'exploreItems'));
    }
}
