<?php

namespace App\Http\Controllers;

use App\Models\Issue;
use App\Models\Project;
use Illuminate\Http\Request;

class IssueController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function store(Request $request, $id)
    {
        $project = Project::where('id', $id);
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required'
        ]);

        $issue = new Issue([
            'title' => $request->title,
            'description' => $request->description,
            'priority_id' => $request->priority,
            'project_id' => $id,
            'status_id' => 0,
            'closed' => false
        ]);
        // $request->user()->projects()->create([
        //     'projectName' => $request->projectName,
        //     'desc' => $request->description,
        //     'teamMember' => $request->teamMember
        // ]);

        // $request->user()->issues()->create([
            
        // ]);
        $user = auth()->user();
        $issue->created_by_user_id = $user->id;
        $issue->save();
        return back();
    }

    public function edit(Issue $issue)
    {
        $project = Project::find($issue->project_id);
        $data = [
            'project' => $project,
            'issue' => $issue
        ];

        return view('issues.edit')->with($data);
    }

    public function update(Issue $issue, Request $request)
    {
        $data = request()->validate([
            'title' => 'required',
            'description' => 'required',
            'assigned_to_user_id' => 'required'
        ]);

        $originalIssue = Issue:: find($issue->id);
        $originalIssue->update([
            'title' => $request->title,
            'description' => $request->description,
            'priority_id' => $request->priority,
            'status_id' => $request->status,
            'assigned_to_user_id' => $request->assigned_to_user_id
        ]);
        // dd(Project:: find($originalProject));

        return redirect()->route('projects.show', $issue->project_id);
    }

    public function destroy(Issue $issue) 
    {
        $issue->delete();
        return back();
    }
}
