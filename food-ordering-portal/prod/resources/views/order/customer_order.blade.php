@extends('layouts.master')

@section('title')
    Order Details
@endsection

@section('content')
<h1>Thank you for your order! </h1>    
<br>
<br>
<br>

You have ordered {{$dish->name}}.
<br>
You have paid $ {{ $quantity * $dish->price }}.
<br>
Deliver to {{$user->address}}.

@endsection
