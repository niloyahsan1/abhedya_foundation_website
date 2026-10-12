<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(Request $request): View
    {
        $status = $request->query('status');

        $query = Project::query()->published();

        if ($status && in_array($status, ['ongoing', 'completed', 'planning'])) {
            $query->where('status', $status);
        }

        $projects = $query->latest()->paginate(9)->withQueryString();

        return view('pages.projects.index', compact('projects', 'status'));
    }

    public function show(string $slug): View
    {
        $project = Project::query()
            ->published()
            ->where('slug', $slug)
            ->firstOrFail();

        $relatedProjects = Project::query()
            ->published()
            ->where('id', '!=', $project->id)
            ->latest()
            ->take(3)
            ->get();

        return view('pages.projects.show', compact('project', 'relatedProjects'));
    }
}
