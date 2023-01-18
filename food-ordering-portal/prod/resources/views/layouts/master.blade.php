<!DOCTYPE html>
<html>
<head>
  <title>@yield('title')</title>
  <meta charset="utf-8">
  <style>
    .nav-bar {
      background-color: #1BD7CC;
      overflow: hidden;
    }

    .nav-bar a {
      float: left;
      color: #f2f2f2;
      text-align: center;
      padding: 14px 16px;
      text-decoration: none;
      font-size: 17px;
    }

    .nav-bar a:hover {
      background-color: #ddd;
      color: black;
    }

    .nav-bar a.active {
      background-color: #04AA6D;
      color: white;
    }

    .nav-bar-login {
      background-color: #1BD7CC;
      overflow: hidden;
    }

    .nav-bar-login a {
      float: right;
      color: #f2f2f2;
      text-align: center;
      padding: 14px 16px;
      text-decoration: none;
      font-size: 17px;
    }

    .nav-bar-login a:hover {
      background-color: #ddd;
      color: black;
    }

    .nav-bar-login a.active {
      background-color: #04AA6D;
      color: white;
    }
    
  </style>
  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <!--<link rel="stylesheet" type="text/css" href="{{asset ('css/wp.css')}}" >-->
  <!--<link href="{{ asset('css/app.css') }}" rel="stylesheet">-->
</head>

<body>

    <div class="nav-bar">
      <a class="" href="{{url("/home")}}">Home</a>
      <a class="" href="{{url("/doc")}}">Documentation</a>
      <div class="nav-bar-login">
      @auth <!--- user is logged in --->
            <a><form method="POST" action= "{{url('/logout')}}">
               {{csrf_field()}}
                   <input type="submit" value="Logout" class="btn btn-info">
               </form></a>
               
            <a>User ID: {{Auth::user()->id}}</a>
            <a>You are a {{Auth::user()->type}} </a>
            <a>Welcome, {{Auth::user()->user_name}}!</a>

            <a class="" href="{{url("/redirects")}}">Dashboard</a>

        @else <!--- user is not logged in --->
        
               <a href="{{ route('login') }}">Login</a>
               <a href="{{ route('register') }}">Register</a>
        
        @endauth
      </div>
    </div>  
    
    @yield('content')
</body>

