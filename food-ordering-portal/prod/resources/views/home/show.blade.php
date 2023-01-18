@extends('layouts.master')

@section('title')
  Dishes
@endsection

@section('content')

<h2> This restaurant offers</h2>

<div class="container">
  <div class="row">
    <div class="col-sm">

  @foreach($dishes as $dish)
  <li>{{$dish->name}}</li>

  @endforeach
  
  {{ $dishes->links() }}
  </div>
  </div>
  </div>

@endsection





