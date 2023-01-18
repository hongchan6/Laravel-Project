
@extends('layouts.master')

@section('title')
  Restaurants
@endsection

@section('content')
<h1>Admin Dashboard</h1>

<h4><a href="approvalList">Approval</a> </h4>

<br>

@foreach($dishes as $dish)
  <a href="dish/{{$dish->id}}"><li>{{$dish->name}}</li></a>

@endforeach
{{ $dishes->links() }}

@endsection
