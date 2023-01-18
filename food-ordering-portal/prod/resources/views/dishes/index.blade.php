/////NO//////USE////



@extends('layouts.master')

@section('title')
  Dishes
@endsection

@section('content')



<ul>
    @foreach($users as $user)
      <a href="user/{{$user->id}}"><li>{{$user->name}}</li></a>
    @endforeach
</ul>



@endsection




