
@extends('layouts.master')

@section('title')
  Restaurants
@endsection

@section('content')

<h1>Customer Dashboard</h1>

<h4> <a href="purchase">Purchase Dish</a> </h4>
<h4><a href="fav_list">My Fav</a> </h4>

<br>

@foreach($dishes as $dish)
  <a href="dish/{{$dish->id}}"><li>{{$dish->name}}</li></a>

@endforeach
{{ $dishes->links() }}

@endsection

