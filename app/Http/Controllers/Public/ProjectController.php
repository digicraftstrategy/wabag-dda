<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use App\Models\ProjectType;

class ProjectController extends Controller
{
    public function index(Request $request)
    {
        $query = Project::query()
            ->with(['type', 'fundingSource', 'llg', 'ward'])
            ->latest();

        // Search query
        if ($request->filled('query')) {
            $searchTerm = $request->input('query');
            $query->where(function ($q) use ($searchTerm) {
                $q->where('title', 'like', '%' . $searchTerm . '%')
                ->orWhere('location', 'like', '%' . $searchTerm . '%')
                ->orWhere('description', 'like', '%' . $searchTerm . '%');
            });
        }

        // Status filter
        if ($request->filled('status')) {
            $query->where('status', $request->input('status'));
        }

        // Project type filter
        if ($request->filled('type')) {
            $query->where('project_type_id', $request->input('type'));
        }

        // Get project types with counts for sidebar
        $projectTypes = ProjectType::withCount('projects')->get();

        // Get recent projects for sidebar (last 5)
        $recentProjects = Project::latest()->take(5)->get();

        // Paginate results
        $projects = $query->paginate(6);

        return view('public.projects.index', compact('projects', 'projectTypes', 'recentProjects'));
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
        ]);

        return view('public.projects.show', compact('project'));
    }
}
