<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Project;

class ProjectController extends Controller
{
    public function index()
    {
        // render a list of a resource
        $projects = Project::latest()->get();

        return view('projects.index', ['projects' => $projects]);
    }

    public function show(Project $project)
    {
        // show a single resource
        return view('projects.show', ['project' => $project]);
    }

    public function store()
    {
        // persist the new resource
        $project = new Project($this->validateProject());
        $project->save();

        return redirect(route('projects.index'));
    }

    public function validateProject()
    {
        return request()->validate([
            'title'       => 'required',
            'description' => 'required',
            'owner_id'    => 'required'
        ]);
    }
}
