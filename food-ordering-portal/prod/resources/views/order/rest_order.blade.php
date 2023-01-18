@extends('layouts.master')

@section('title')
Order Details
@endsection

@section('content')

<div class="container">
  <div class="row align-items-start">
    <div class="col">
      <ul> 
<h1>  Congratulations! You have received orders. </h1>

<ul>
    @foreach($myOrders as $myOrder)
      <li>{{$myOrder->name}} 
      <br>for 
      {{$myOrder->user_name}} @
      {{$myOrder->address}} on
      {{$myOrder->updated_at}}</li>
    <br>
    @endforeach
</ul>
</div>
</div>
</div>

@endsection



