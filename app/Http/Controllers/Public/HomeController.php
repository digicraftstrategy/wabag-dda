<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\NewsUpdate;
use App\Models\Project;

class HomeController extends Controller
{
    public function index()
    {
        $newsUpdates = NewsUpdate::published()
                        ->latest('published_date')
                        ->take(6)
                        ->get();

        $projects = Project::where('approved', true)
                    ->orderBy('created_at', 'desc')
                    ->take(3)
                    ->get();

        return view('public.home', compact('newsUpdates', 'projects'));
    }
}
