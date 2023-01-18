@extends('layouts.master')

@section('title')
  Dish
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

  <form method="POST" action= '{{url("dish/$dish->id")}}'>
  {{csrf_field()}}
  {{ method_field('PUT') }}
  <p><label>Name</label>
  <input type="text" name="name" value="{{$dish->name}}"></p> 
  <p><label>Price</label>
  <input type="text" name="price" value="{{$dish->price}}"><br></p> 
    <p><label>Description</label>
  <input type="text" name="description" value="{{$dish->description}}"></p> 
  <div class="form-group">
        <label for="exampleFormControlSelect1">Promotion (x100%):</label>
        <select class="form-control" id="exampleFormControlSelect1" name="promotion">
        <option>1.0</option>
        <option>0.9</option>
        <option>0.8</option>
        <option>0.7</option>
        <option>0.6</option>
        <option>0.5</option>
        <option>0.4</option>
        <option>0.3</option>
        <option>0.2</option>
        <option>0.1</option>
        </select>
    </div>
<br>
  <input type="submit" value="Update">
  </form> 
@endsection




