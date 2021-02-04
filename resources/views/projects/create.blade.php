@extends('layouts.app')

@section('content')
        <h1 class="large text-primary">
                New Project
        </h1>
        <form class="form" action="{{ route('projects')}}" method="post">
                @csrf
                <div class="form-group my-1">
                        <input type="text" placeholder="Project Name" name="projectName" />
                        <small class="form-text">Project Name</small>
                        @error('projectName')
                        <div class="alert-danger">
                        {{ $message }}
                        </div>
                @enderror
                </div>

                <div class="form-group my-1">
                        <textarea placeholder="Description" name="description"></textarea>
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
                        <input type="text" placeholder="Team Member" name="teamMember" />
                        <small class="form-text"
                        >Team Member</small
                        >
                        @error('teamMember')
                        <div class="alert-danger">
                        {{ $message }}
                        </div>
                        @enderror                        
                </div>

                {{-- <div class="form-group my-1">
                <select name="status">
                <option value="0">Select Your Job Title</option>
                <option value="Developer">Developer</option>
                <option value="Manager">Manager</option>
                <option value="Admin">Admin</option>
                </select>
                <small class="form-text">Your Job Title</small>
                @error('jobTitle')
                <div class="alert-danger">
                {{ $message }}
                </div>
                @enderror        
                </div> --}}

                <input type="submit" class="btn btn-primary my-1" />
                <a class="btn btn-light my-1" href="{{ route('projects')}}">Go Back</a>
        </form>
@endsection