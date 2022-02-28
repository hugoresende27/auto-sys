<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">



    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet"/>


    <link href="//cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">

    <link rel="stylesheet" href="{{ asset('css/my_styles.css') }}">

    <title>Auto Sys</title>
</head>
<body >

<div class="top-bar">

    @if (Route::has('login'))

        @auth

        <div class="p-3">
           
            
                <button class="btn btn-mine dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                    {{ Auth::user()->name }}
                </button>

              
         
            <ul class="dropdown-menu">
             

                @if (Auth::user()->role == 3)
                    <li >

                        <a href="/../allusers">All Users</a>

                    </li>

                    <li >

                        <a href="/../allmakes">All Manufacturers</a>

                    </li>

                    <li >

                        <a href="/../allcars">All Cars</a>

                    </li>
                @endif

                <li>
                    
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault();
                                            this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-dropdown-link>
                    </form>
                
                </li>

            </ul>
          </div>
          <div class="text-left m-3">
            <form action="{{ route('search') }}" method="GET">
                {{ csrf_field() }}
                <input type="text" name="search" required/>
                <button type="submit" class="btn-procurar">Search</button>
            </form>
        </div>

        


          <a href="{{ url()->previous() }}">
            <img src="https://cdn.pixabay.com/photo/2016/09/05/10/50/app-1646213_960_720.png" alt="back" class="back-img">
            </a>
           

        @endauth
        
    @endif

   

   

   

<a href="/"><img src="{{ asset('images/logo.jpg') }}" alt="logo" class="logo-img"></a>

 




</div>

@if (session()->has('message'))
<div id='hideMe'  >
    <p class="message-box">
        {{ session()->get('message') }}
    </p>
</div>
@endif

    
    {{-- <div class="main-content"> --}}
        @yield('content')
   {{-- </div> --}}

<script src="//cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

   <div>
        @include('layouts.footer')
   </div>
</body>
</html>