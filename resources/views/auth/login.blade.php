@extends('layouts.app')
@section('content')    
    <section class="container">
        <h1 class="large text-primary">Sign In</h1>
        <p class="lead">Sign into Your Account</p>
        <form class="form" action="{{ route('login')}}" method="post">
            @csrf
            @if (session('status'))
            <div class="alert-danger">
                {{ session('status')}}
            </div>
                
            @endif
            <div class=" my-1">
                <input
                type="email"
                placeholder="Email Address"
                name="email"
                />
                @error('email')
                    <div class="alert-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="my-1">
                <input
                type="password"
                placeholder="Password"
                name="password"
                />
            </div>
                @error('password')
                <div class="alert-danger">
                    {{ $message }}
                </div>
                @enderror
            <div>
                <input type="checkbox" name="remember" id="remember">
                <label for="remember">Remember me</label>
            </div>
            <input type="submit" class="btn btn-primary  my-1" value="Login" />
            <div>
                <a class="btn btn-danger my-1" href="{{ route('login.google')}}">
                    {{-- <i class="fa fa-google mr-2"></i> --}}
                    <i class="fab fa-google"></i>Login With Google</a>
            </div>
        {{-- <span>{{$sub}}</span> --}}
        </form>
        <p class="my-1">
        Don't have an account? <a href="{{ route('register')}}">Sign Up</a>
        </p>
    </section>    
@endsection