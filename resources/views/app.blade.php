<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{asset('css/app.css')}}" />
    <title>{{config('app.name', 'postMVC')}}</title>
  </head>
  <body>
    <header class="home-header bg-primary">
      <img class="logo round-img" src="{{asset('img/logo.png')}}" alt="logo">
    </header>
    <section class="home-section">
      <h1 class="large text-primary">Welcome to My Bug Tracker</h1>
      <p class="m-1 text-primary medium">Create and Manage your projects...</p>
    </section>
    <section class="home-section">
      <a class= " btn btn-primary enter" href="{{ route('projects')}}">Enter</a>
      {{-- <a class= " btn btn-primary enter" href="#">Enter</a> --}}
    </section>
  </body>
</html>
