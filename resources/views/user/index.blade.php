@extends('layouts.app')

@section('content')
    <div class="flex ">
        <h1 class="large text-primary">
            {{ $user->name}}
        </h1>
        {{-- <a class="my-edit" href="{{ route('user.editPassword', $user)}}">
            <button class="btn btn-primary my-1">Change Password</button>
        </a>  --}}
    </div>  
    
    <div class="col-md-6">
        <div class="card" style="min-height: 484px;">
            <div class="card-body">
                <form class="form" action="{{ route('user.update', $user)}}" method="post">
                    @csrf
                    @method('patch')
                    <div class="form-group row">
                        <div class="col-sm-9">
                            <input type="text" placeholder="Username" name="name" value="{{ $user->name }}"/>
                        </div>
                        <small class="form-text">Username</small>
                        @error('name')
                            <div class="alert-danger">
                            {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-9">
                            <input type="email" placeholder="Email" name="email" value="{{ $user->email }}">
                        </div>
                        <small class="form-text">Email</small>
                        @error('email')
                            <div class="alert-danger">
                            {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>
                    <button class="btn btn-light">Back</button>
                </form>
            </div>
        </div>
    </div>     
@endsection