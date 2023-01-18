@extends('layouts.master')

@section('title')
  Purchase Dishes
@endsection

@section('content')
  @if (count($errors) > 0)
    <div class="alert"> 
      <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach </ul>
    </div>
  @endif

<form method="POST" action='{{ route('order.store')}}'>
  {{csrf_field()}}  
  <p><label>Dish Name: </label>
  
  <p><select name="dish_id">
  @foreach ($dishes as $dish)
  @if($dish->id == old('dish'))
  <option value="{{$dish->id}}" selected="selected">{{$dish->name}}</option>
  @else
  <option value="{{$dish->id}}">{{$dish->name}}</option>
  @endif
  @endforeach
  </select></p>

  <p><label>Quantity: </label><input type="text" name="quantity" value="{{ old('quantity') }}"></p>
  <input type="submit" value="Place Order">
</form> @endsection




