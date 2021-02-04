@extends('layouts.app')

@section('content')
    
        <div class="flex ">
            <h1 class="large text-primary">
                {{ $user->name}}
            </h1>
        </div>
                <div class="alert-danger my-1">
                {{ $message }}
                </div>
        <form class="form" action="{{ route('user.updatePassword', $user)}}" method="POST">
            @csrf
            @method('patch')
            <div class="col-sm-9">
                <input type="password" name="oldPass" placeholder="Old Password">
            </div>
            <small class="my-1 form-text">Old Password</small>
            @error('oldPass')
                <div class="alert-danger">
                {{ $message }}
                </div>
            @enderror
            <div class="col-sm-9">
                <input type="password" name="password" placeholder="New Password">
            </div>
            <small class="my-1 form-text">New Password</small>
            {{-- @error('newPassword')
                <div class="alert-danger">
                {{ $message }}
                </div>
            @enderror --}}
            <div class="col-sm-9">
                <input type="password" name="password_confirmation" placeholder="Confirm Password">
            </div>
            <small class="my-1 form-text">Confirm Password</small>
            {{-- @error('password_confirmation')
                <div class="alert-danger">
                {{ $message }}
                </div>
            @enderror --}}
            @error('password')
                <div class="alert-danger">
                {{ $message }}
                </div>
            @enderror
            <button type="submit" class="btn btn-primary mr-2">Update</button>
            <button class="btn btn-light">Back</button>
        </form>
@endsection