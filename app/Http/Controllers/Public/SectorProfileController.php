<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\SectorPage;

class SectorProfileController extends Controller
{
    // public function show($slug)
    // {
    //     // Current sector page
    //     $sectorPage = SectorPage::with(['blocks', 'sector'])
    //         ->where('slug', $slug)
    //         ->where('is_published', true)
    //         ->firstOrFail();

    //     // All sector pages for sidebar links
    //     $allSectors = SectorPage::with('sector')
    //         ->where('is_published', true)
    //         ->orderBy('title')
    //         ->get();

    //     return view('public.sectoral-profile.show', [
    //         'sectorPage' => $sectorPage,
    //         'allSectors' => $allSectors,
    //     ]);
    // }
    public function show($slug)
    {
        // Current sector page
        $sectorPage = SectorPage::with(['blocks', 'sector'])
            ->where('slug', $slug)
            ->firstOrFail();
        // All sector pages for sidebar links
        $allSectors = SectorPage::with(['sector', 'blocks'])
            ->where('is_published', true)
            ->get();

        return view('public.sectoral-profile.show', compact('sectorPage', 'allSectors'));
    }

}
