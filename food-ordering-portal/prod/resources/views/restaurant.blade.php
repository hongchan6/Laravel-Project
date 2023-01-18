@extends('layouts.master')

@section('title')
  Restaurants
@endsection

@section('content')
<h1>Restaurant Dashboard</h1>


@auth
    @if (Auth::user()->approved == "Y")
<h4><a href="dish/create">Create Dish</a> </h4>
<h4><a href="rest_order">My Order</a> </h4>
    @else
    You have to be approved first to use exclusive function.
    @endif
@endauth

<br>
<br>
<br>

@foreach($dishes as $dish)
  <a href="dish/{{$dish->id}}"><li>{{$dish->name}}</li></a>

@endforeach
{{ $dishes->links() }}

@endsection
