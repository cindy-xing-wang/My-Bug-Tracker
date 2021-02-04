@extends('layouts.app')

@section('content')
    <section class="container">
        <h1 class="large text-primary">Register</h1>
        <p class="lead">Register a new account</p>
        <form class="form" action="{{ route('register.store')}}" method="post">
            @csrf
            <div class="form-group my-1">
                <input type="text" placeholder="Name" name="name" value="{{ old('name')}}" />
                {{-- <span><?= $data['username_err']; ?></span> --}}

                @error('name')
                  <div class="alert-danger">
                    {{ $message }}
                  </div>
                @enderror
              </div>
              <div class="form-group my-1">
                <input type="email" placeholder="Email Address" name="email" value="{{ old('email')}}"/>
                {{-- <span><?= $data['email_err']; ?></span> --}}
                @error('email')
                  <div class="alert-danger">
                    {{ $message }}
                  </div>
                @enderror
              </div>
              <div class="form-group my-1">
                <input
                  type="password"
                  placeholder="Password"
                  name="password"
                  minLength="6"
                />
                {{-- <span><?= $data['password_err']; ?></span> --}}
              </div>
              <div class="form-group my-1">
                <input
                type="password"
                placeholder="Confirm Password"
                name="password_confirmation"
                minLength="6"
                />
                {{-- <span><?=$data['confirm_password_err'] ; ?></span> --}}
                @error('password')
                  <div class="alert-danger">
                    {{ $message }}
                  </div>
                @enderror                
              </div>
              <input type="submit" name="register" class="btn btn-primary" value="Register" />
        </form>
    </section>
@endsection