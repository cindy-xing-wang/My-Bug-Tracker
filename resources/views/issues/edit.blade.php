@extends('layouts.app')
{{-- {{dd($project)}} --}}
@section('content')
        <h1 class="large text-primary">
                Edit Issue
        </h1>
        <form class="form" action="{{ route('project.updateIssue', $issue->id)}}" method="post">
                @csrf
                @method('patch')
                <div class="form-group my-1">
                        <input type="text" placeholder="Title" name="title" value="{{ $issue->title}}"/>
                        <small class="form-text">Title</small>
                        @error('title')
                        <div class="alert-danger">
                        {{ $message }}
                        </div>
                @enderror
                </div>

                <div class="form-group my-1">
                        <textarea placeholder="Description" name="description" >{{ $issue->description}}</textarea>
                        <small class="form-text"
                        >Description</small
                        >
                        @error('description')
                        <div class="alert-danger">
                        {{ $message }}
                        </div>
                        @enderror
                </div>

                <div class="form-group my-1">
                    <select name="priority">
                        @php
                            $priorities = App\Models\Priority::all();
                            foreach($priorities as $priority)
                            {
                                if($issue->priority_id == $priority->id)
                                {
                                    echo '<option value="'.$priority->id.'" selected>'.$priority->type.'</option>';
                                }
                                else
                                {
                                    echo '<option value="'.$priority->id.'">'.$priority->type.'</option>';
                                }
                            }
                        @endphp
                    </select>
                    <small class="form-text">Project Status</small>
                    @error('priority')
                    <div class="alert-danger">
                    {{ $message }}
                    </div>
                    @enderror        
                    </div>

                <div class="form-group my-1">
                <select name="status">
                    @php
                        $statuses = App\Models\Status::all();
                        foreach($statuses as $status)
                        {
                            if($issue->status_id == $status->id)
                            {
                                echo '<option value="'.$status->id.'" selected>'.$status->type.'</option>';
                            }
                            else
                            {
                                echo '<option value="'.$status->id.'">'.$status->type.'</option>';
                            }
                        }
                    @endphp
                {{-- <option value="0">Select Issue Status</option>
                <option value="1">Planned</option>
                <option value="2">In Progress</option>
                <option value="3">Testing</option>
                <option value="4">Completed</option> --}}
                </select>
                <small class="form-text">Project Status</small>
                @error('status')
                <div class="alert-danger">
                {{ $message }}
                </div>
                @enderror        
                </div>

                <div class="form-group my-1">
                    @php
                        $user = Auth()->user();
                        if ($user->role_id == 1) {
                                echo '<select name="assigned_to_user_id"> ';
                                $users = App\Models\User::all();
                                foreach ($users as $user) {
                                    echo '<option value='.$user->id.'>'.$user->name.'</option>';
                                };
                                echo '</select> <small class="form-text">Assigned To</small>';  
                        } 
                    @endphp
                    {{-- <textarea placeholder="Assigned To" name="assignedTo" >{{ $issue->assignedTo}}</textarea> --}}
                    
                    @error('description')
                    <div class="alert-danger">
                    {{ $message }}
                    </div>
                    @enderror
                </div>
                <input type="submit" class="btn btn-primary my-1" />
                {{-- {{dd($project)}} --}}
                <a class="btn btn-light my-1" href="{{ route('projects.show', $project->id)}}">Go Back</a>
        </form>
@endsection