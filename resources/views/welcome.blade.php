@extends('layouts.mainapp')

@section('content')

  @if (Route::has('login'))
       
          
            @auth
            <p class="my-titles-2">Welcome {{ Auth::user()->name }}</p>

                <div class="welcome-main">
                    <ul>
                        <a href="addcar"><li class="welcome-li">Add Auto</li></a>
                        <li class="welcome-li">My Autos</li>
                    </ul>
                </div>

            @else
            <h1 class="my-titles-2">Welcome to Auto Sys</h1>
                <a href="{{ route('login') }}" class="welcome-btn">Log in</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="welcome-btn">Register</a>
                @endif
            @endauth
      
        
    @endif


@endsection
