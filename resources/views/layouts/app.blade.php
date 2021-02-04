<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{asset('css/app.css')}}" />
    <link rel="stylesheet" href="C:\xampp\htdocs\myBugTracker\node_modules\@fortawesome\fontawesome-free\css\all.css" />
    <link rel="stylesheet" href="C:\xampp\htdocs\myBugTracker\node_modules\@fortawesome\fontawesome-free\css\brands.css" />
    <link rel="stylesheet" href="C:\xampp\htdocs\myBugTracker\node_modules\@fortawesome\fontawesome-free\css\fontawesome.css" />
    <title>{{config('app.name', 'postMVC')}}</title>
  </head>
  <body>
    @include('inc.nav')
    <section class="container">
      @yield('content')
  
    </section>
</body>
</html>
