@extends('layouts.app')

@section('content')
        {{-- <section class="container"> --}}
        <h1 class="large text-primary">
          Dashboard
        </h1>
        
        @if ($projects->count() > 0)
                @if ($projects->count()==1)
                <h2 class="my-2">There is 1 project at moment</h2>
                
                @else
                <h2 class="my-2">There are {{$projects->count()}} projects at moment</h2>
                @endif
                <table class="table">
                <thead>
                <tr>
                <th>Project Name</th>
                <th class="hide-sm">Created</th>
                <th class="hide-sm">Updated</th>
                <th class="hide-sm">Created By</th>
                <th class="hide-sm">Team Member</th>
                <th class="hide-sm">Status</th>
                @php
                        $user = Auth()->user();
                        if ($user->role_id == 1) {
                                echo '<th></th>';  
                        } 
                @endphp
                </tr>
                </thead>
                @foreach ($projects as $project)
               <tbody>
                <tr>
                <td><a class="text-primary bold" href="{{  route('projects.show', $project->id) }}"> {{ $project->projectName}} </a></td>
                <td class="hide-sm">{{$project->created_at->diffForHumans() }}</td>
                <td class="hide-sm">{{$project->updated_at->diffForHumans() }}</td>
                <td class="hide-sm">
                        {{$project->user->name }}
                </td>
                <td class="hide-sm">{{$project->teamMember }}</td>
                @php
                    $statuses = App\Models\Status::all();
                    foreach ($statuses as $status) {
                            if ($project->status_id == $status->id) {
                                    echo '<td class="hide-sm">'. $status->type .'</td>';
                                } 
                    }
                    if ($project->status_id == 0) {
                                     echo '<td class="hide-sm">Null</td>';
                             } 
                @endphp
                </select>
                <td>
                        <form action="{{ route('projects.destroy', $project) }}" method="POST">
                        @csrf  
                        @method("DELETE")
                
                @php
                    $user = Auth()->user();
                    if ($user->role_id == 1) {
                       echo '<button class="btn btn-danger">Delete</button>';  
                    } 
                @endphp
                </form>                         
                </td>
                </tr>
                </tbody>
                @endforeach
                </table>
            
        @else

           <p>No projects found.</p> 
        @endif
        
      {{-- </section>         --}}
@endsection