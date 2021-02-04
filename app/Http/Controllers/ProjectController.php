<?php

namespace App\Http\Controllers;

use App\Models\Issue;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function __construct()
    {
        // $this->middleware(['auth'])->only();
        $this->middleware(['auth']);
    }

    public function index()
    {
        $projects = Project::get();
        // $projects = Project::find(1);
        // $projects = Project::where(1);

        $data = [
            'projects' => $projects
        ];
        // dd(auth()->user()->projects);
        // foreach($projects as $project)
        // dd($projects);
        return view('projects.index')->with($data);
    }

    public function create()
    {
        return view('projects.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'projectName' => 'required',
            'description' => 'required',
            'teamMember' => 'required'
        ]);

        // Project::create([
        //     'projectName' => $request->projectName,
        //     'desc' => $request->description,
        //     'teamMember' => $request->teamMember,
        //     'user_id' => auth()->user()->id
        // ]);

        $request->user()->projects()->create([
            'projectName' => $request->projectName,
            'desc' => $request->description,
            'teamMember' => $request->teamMember
        ]);

        return redirect()->route('projects');
    }

    public function show(Project $project)
    {
        $issues = Issue::where('project_id', $project->id)->get();
        $data = [
            'project' => $project,
            'issues' => $issues
        ];

        return view('projects.show')->with($data);
    }

    public function edit(Project $project)
    {
        $data = [
            'project' => $project
        ];
        return view('projects.edit')->with($data);
    }

    public function update(Project $project, Request $request)
    {
        // dd($request);
        $data = request()->validate([
            'projectName' => 'required',
            'description' => 'required',
            'teamMember' => 'required'
        ]);

        $originalProject = Project:: find($project->id);
        $originalProject->update([
            'projectName' => $request->projectName,
            'desc' => $request->description,
            'teamMember' => $request->teamMember,
            'status_id' => $request->status
        ]);
        // dd(Project:: find($originalProject));

        return redirect()->route('projects.show', $project->id);
    }

    public function destroy(Project $project) 
    {
        $project->delete();
        return back();
    }
}
