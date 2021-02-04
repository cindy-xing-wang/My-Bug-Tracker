<nav class="navbar bg-primary">
    <a href="{{ route('home')}}"> <img class="logo round-img" src="{{asset('img/logo.png')}}" alt="logo"></a>
  <ul class="flex items-center">
    <li><a href="{{ route('home')}}">Home</a></li>
    @auth
    <li>
      |
      <a href="{{ route('projects')}}">Projects</a>
    </li>
    <li>
      |
      <a href="{{ route('projects.create')}}">New Project</a>
    </li>
    <li>
      |
      <a href="{{ route('user.show',  auth()->user())}}">{{ auth()->user()->name }}</a>
    </li>
    @if (Auth::user()->avatar)
      <li>
        <img src="{{ Auth::user()->avatar}}" alt="{{ Auth::user()->name}}" 
        style="border: 1px solid #cccccc; border-radius: 5px; width:39px; height: auto; float: right; margin-right: 7px;">
      </li>
      <li>
    @endif
      
      <form action="{{ route('logout')}}" method="post" >
        @csrf
        <button class="inline btn" type="submit" >Logout</button>
      </form>
    </li>
    @endauth
    @guest
    <li>
      |
    <a href="{{ route('login')}}">Login</a>
    </li>
    <li>
      |
      <a href="{{ route('register')}}">Register</a>
    </li>
    @endguest
    
  </ul>
</nav>
