<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\NewsUpdate;

class HomeController extends Controller
{
    public function showNewsUpdates()
    {
        $newsUpdates = NewsUpdate::published()
                        ->latest('published_date')
                        ->take(6)
                        ->get();

        return view('public.home', compact('newsUpdates'));
    }
}
