{{ __('Dashboard') }}

You're logged in!


@extends('layouts.master')

@section('title')
  Restaurants
@endsection

@section('content')
<ul>
    @foreach($users as $user)
      <a href="user/{{$user->id}}"><li>{{$user->name}}</li></a>
    @endforeach
</ul>

{{ $users->links()}}
@endsection

