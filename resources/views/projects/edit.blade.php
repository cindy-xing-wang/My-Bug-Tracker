@extends('layouts.app')
{{-- {{dd($project)}} --}}
@section('content')
        <h1 class="large text-primary">
                Edit Project
        </h1>
        <form class="form" action="{{ route('projects.update', $project->id)}}" method="post">
                @csrf
                @method('patch')
                <div class="form-group my-1">
                        <input type="text" placeholder="Project Name" name="projectName" value="{{ $project->projectName}}"/>
                        <small class="form-text">Project Name</small>
                        @error('projectName')
                        <div class="alert-danger">
                        {{ $message }}
                        </div>
                @enderror
                </div>

                <div class="form-group my-1">
                        <textarea placeholder="Description" name="description" >{{ $project->desc}}</textarea>
                        <small class="form-text"
                        >Project Description</small
                        >
                        @error('description')
                        <div class="alert-danger">
                        {{ $message }}
                        </div>
                        @enderror
                </div>

                <div class="form-group my-1">
                        <input type="text" placeholder="Team Member" name="teamMember" value="{{ $project->teamMember}}"/>
                        <small class="form-text"
                        >Team Member</small
                        >
                        @error('teamMember')
                        <div class="alert-danger">
                        {{ $message }}
                        </div>
                        @enderror                        
                </div>

                <div class="form-group my-1">
                <select name="status">
                <option value="0">Select Project Status</option>
                <option value="1">Planned</option>
                <option value="2">In Progress</option>
                <option value="3">Testing</option>
                <option value="4">Completed</option>
                </select>
                <small class="form-text">Project Status</small>
                @error('status')
                <div class="alert-danger">
                {{ $message }}
                </div>
                @enderror        
                </div>

                <input type="submit" class="btn btn-primary my-1" />
                <a class="btn btn-light my-1" href="{{ route('projects')}}">Go Back</a>
        </form>
@endsection