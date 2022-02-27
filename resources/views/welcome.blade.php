@extends('layouts.mainapp')

@section('content')
<div class="main-content">
  @if (Route::has('login'))
       
          
            @auth
            <p class="my-titles-2">Welcome {{ Auth::user()->name }}</p>

                <div class="welcome-main">
                    <ul>
                        <a href="addcar"><li class="welcome-li">Add Car</li></a>
                        <a href="myautos"> <li class="welcome-li">My Autos</li></a>
                    </ul>
                </div>

            @else
            <h1 class="my-titles-2">Welcome to Auto Sys</h1>
                <a href="{{ route('login') }}" class="welcome-btn">Login</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="welcome-btn">Register</a>
                @endif
            @endauth
      
        
    @endif

</div>
@endsection
