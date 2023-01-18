@extends('layouts.master')

@section('title')
  Home page
@endsection

@section('content')
<h1>Welcome to ABC Food Ordering.</h1>

<p>
Here are some restaurants you can choose from.
<a class="" href="{{url("/top_list")}}">Click to see our Top 5 List :)</a>

<br>
<div class="container">
  <div class="row align-items-start">
    <div class="col">
      <ul>
@foreach($users as $user)
<h3><a href="user/{{$user->id}}"><li>{{$user->user_name}}</li></a></h3>
@endforeach
</ul>
</div>
</div>
</div>

@endsection



