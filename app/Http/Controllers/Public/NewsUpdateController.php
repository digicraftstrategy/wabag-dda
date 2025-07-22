<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\NewsUpdate;
use App\Models\NewsUpdateCategory;

class NewsUpdateController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('query');
        $categorySlug = $request->input('category');

        $newsUpdates = NewsUpdate::with(['newsCategory', 'user'])
                        ->when($query, function($q) use ($query) {
                            $q->where(function($q) use ($query) {
                                $q->where('title', 'like', "%$query%")
                                ->orWhere('content', 'like', "%$query%");
                            });
                        })
                        ->when($categorySlug, function($q) use ($categorySlug) {
                            $q->whereHas('newsCategory', function($q) use ($categorySlug) {
                                $q->where('slug', $categorySlug);
                            });
                        })
                        ->published()
                        ->latest('published_date')
                        ->paginate(6)
                        ->withQueryString(); // Preserve all query parameters

        $categories = NewsUpdateCategory::withCount(['newsUpdates' => function($query) {
                            $query->published();
                        }])->get();

        $recentNews = NewsUpdate::published()
                        ->latest('published_date')
                        ->take(3)
                        ->get();

        return view('public.news-updates.news-updates', compact(
            'newsUpdates',
            'categories',
            'recentNews',
            'query',
            'categorySlug'
        ));
    }

    public function show($slug)
    {
        $news = NewsUpdate::with(['newsCategory', 'user'])
                    ->where('slug', $slug)
                    ->published()
                    ->firstOrFail();

        // Using relationship to get related news
        $relatedNews = $news->newsCategory->newsUpdates()
                            ->where('id', '!=', $news->id)
                            ->published()
                            ->latest('published_date')
                            ->take(3)
                            ->get();

        $categories = NewsUpdateCategory::withCount(['newsUpdates' => function($query) {
                            $query->published();
                        }])->get();

        $recentNews = NewsUpdate::published()
                        ->latest('published_date')
                        ->take(3)
                        ->get();

        return view('public.news-updates.show', compact(
            'news',
            'relatedNews',
            'categories',
            'recentNews'
        ));
    }

    public function category($slug)
    {
        $category = NewsUpdateCategory::where('slug', $slug)->firstOrFail();

        // Using relationship to get news updates
        $newsUpdates = $category->newsUpdates()
                        ->with(['newsCategory', 'user'])
                        ->published()
                        ->latest('published_date')
                        ->paginate(6);

        $categories = NewsUpdateCategory::withCount(['newsUpdates' => function($query) {
                            $query->published();
                        }])->get();

        $recentNews = NewsUpdate::published()
                        ->latest('published_date')
                        ->take(3)
                        ->get();

        return view('public.news-updates.category', compact(
            'newsUpdates',
            'categories',
            'recentNews',
            'category'
        ));
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        $newsUpdates = NewsUpdate::with(['newsCategory', 'user'])
                        ->where(function($q) use ($query) {
                            $q->where('title', 'like', "%$query%")
                              ->orWhere('content', 'like', "%$query%");
                        })
                        ->published()
                        ->latest('published_date')
                        ->paginate(6);

        $categories = NewsUpdateCategory::withCount(['newsUpdates' => function($query) {
                            $query->published();
                        }])->get();

        $recentNews = NewsUpdate::published()
                        ->latest('published_date')
                        ->take(3)
                        ->get();

        return view('public.news-updates.search', compact(
            'newsUpdates',
            'categories',
            'recentNews',
            'query'
        ));
    }
}
