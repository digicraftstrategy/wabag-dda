<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(Request $request)
    {
        $query = Project::query()
            ->with(['type', 'fundingSource', 'llg', 'ward'])
            ->latest();

        if ($request->has('search')) {
            $query->where('title', 'like', '%' . $request->search . '%')
                  ->orWhere('description', 'like', '%' . $request->search . '%');
        }

        if ($request->has('status')) {
            $query->where('status', $request->status);
        }

        $projects = $query->paginate(12);

        return view('public.projects.index', compact('projects'));
    }

    public function show(Project $project)
    {
        $project->load([
            'type',
            'fundingSource',
            'llg',
            'ward',
            'updates' => function($query) {
                $query->latest()->with('author');
            },
            'images'
        ]);

        return view('public.projects.show', compact('project'));
    }
}
