<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\NewsUpdate;
use App\Models\Project;
use App\Models\ExploreWabagSection;
use App\Models\ExploreWabagItem;
use App\Models\Ward;

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

        $totalWards = Ward::count();
        $estimatedPopulation = $totalWards > 0 ? $totalWards * 2000 : null;
        $communitiesServed = Project::where('status', Project::STATUS_COMPLETED)->count();
        $fundsInvested = Project::whereHas('fundingSources')->sum('budget');

        return view('public.home', compact(
            'newsUpdates',
            'projects',
            'exploreSection',
            'exploreItems',
            'totalWards',
            'estimatedPopulation',
            'communitiesServed',
            'fundsInvested'
        ));
    }
}
