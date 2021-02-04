@extends('layouts.app')

@section('content')
    <div class="flex ">
        <h1 class="large text-primary">
            {{ $project->projectName}}
        </h1>
        <a class="my-edit" href="{{ route('projects.edit', $project->id)}}">
            <button class="btn btn-primary my-1">Edit</button>
        </a> 
    </div>  
    <p class="post-date my-bottom-1">
        Created on: {{ $project->created_at}} 
    </p>
    <div class="profile-about bg-light p-2">
        <h2 class="text-primary">Description</h2>
        <p>
          {{ $project->desc}}
        </p>
        <div class="line"></div>
        <h2 class="text-primary">Team Member</h2>
        <div class="skills">
          {{ $project->teamMember}}
        </div>
      </div>

      <h3 class="medium bg-primary p my-3">
        Bugs
      </h3>
      <form class="form" action="{{ route('project.createIssue', $project->id)}}" method="post">
            @csrf
            <div class="form-group my-1">
                    <input type="text" placeholder="Title" name="title" />
                    <small class="form-text">Title</small>
                    @error('title')
                    <div class="alert-danger">
                    {{ $message }}
                    </div>
            @enderror
            </div>

            <div class="form-group my-1">
                    <textarea placeholder="Description" name="description"></textarea>
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
            <option value="0">Select The Bug Priority</option>
            <option value="1">Low</option>
            <option value="2">Minor</option>
            <option value="3">Major</option>
            <option value="4">Critical</option>
            </select>
            <small class="form-text">Priority</small>
            @error('priority')
            <div class="alert-danger">
            {{ $message }}
            </div>
            @enderror        
            </div>

            <input type="submit" class="btn btn-primary my-bottom" />
        </form>   
        
        @if ($issues->count() > 0)
            @if ($issues->count()==1)
              <h2 class="my-2">There is 1 bug at moment</h2>
            
            @else
              <h2 class="my-2">There are {{$issues->count()}} bugs at moment</h2>
            @endif
              <table class="table">
              <thead>
              <tr>
              <th>Title</th>
              <th class="hide-sm">Description</th>
              <th class="hide-sm">Created</th>
              <th class="hide-sm">Updated</th>
              <th class="hide-sm">Created By</th>
              <th class="hide-sm">Priority</th>
              <th class="hide-sm">Status</th>
              <th class="hide-sm">Assigned To</th>
              @php
                  $user = Auth()->user();
                  if ($user->role_id == 1) {
                    echo '<th></th>';  
                  } 
              @endphp
              
              </tr>
              </thead>  
              @foreach ($issues as $issue)
              <tbody>
               <tr>
               <td><a class="text-primary bold" href="{{  route('project.editIssue', $issue->id) }}"> {{ $issue->title}} </a></td>
               <td class="hide-sm">{{$issue->description }}</td>
               <td class="hide-sm">{{$issue->created_at->diffForHumans() }}</td>
               <td class="hide-sm">{{$issue->updated_at->diffForHumans() }}</td>
               <td class="hide-sm">
                 @php
                     $user = App\Models\User::find($issue->created_by_user_id);
                 @endphp
                       {{$user->name }}
               </td>
                @php
                      $priorities = App\Models\Priority::all();
                      foreach ($priorities as $priority) {
                              if ($issue->priority_id == $priority->id) {
                                      echo '<td class="hide-sm">'. $priority->type .'</td>';
                                  } 
                      }
                      if ($issue->priority_id == 0) {
                                        echo '<td class="hide-sm">Null</td>';
                                } 
                @endphp
                @php
                    $statuses = App\Models\Status::all();
                    foreach ($statuses as $status) {
                            if ($issue->status_id == $status->id) {
                                    echo '<td class="hide-sm">'. $status->type .'</td>';
                                } 
                    }
                    if ($issue->status_id == 0) {
                                      echo '<td class="hide-sm">Null</td>';
                              } 
                @endphp
                @php
                    $developer = App\Models\User::find($issue->assigned_to_user_id);
                @endphp
                @if ($developer == null)
                  <td class="hide-sm">Null</td>
                @else
                  <td class="hide-sm">{{$developer->name }}</td>
                @endif
               <td>
               <form action="{{ route('project.destroyIssue', $issue)}}" method="POST">
                       @csrf  
                       @method('DELETE')
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
          <p>No bugs found.</p>              
        @endif      
@endsection