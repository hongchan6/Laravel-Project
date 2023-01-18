@extends('layouts.master')

@section('title')
  Create Dishes
@endsection

@section('content')
<br>
  @if (count($errors) > 0)
    <div class="alert"> 
      <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach </ul>
    </div>
  @endif

<form method="POST" action='{{url("dish")}}'>
  {{csrf_field()}}  
  <p><label>Name: </label><input type="text" name="name" value="{{ old('name') }}"></p>
  <p><label>Price: </label><input type="text" name="price" value="{{ old('price') }}"></p>
  <p><label>Description: </label><input type="text" name="description" value="{{ old('description') }}"></p>
  <div class="form-group">
        <label for="exampleFormControlSelect1">Best Describe Your Dish:</label>
        <select class="form-control" id="exampleFormControlSelect1" name="cuisine">
        <option>Asian</option>
        <option>Italian</option>
        <option>FastFood</option>
        <option>Veggie</option>
        <option>MeatLover</option>
        <option>Indian</option>
        <option>Greek</option>
        <option>Bread</option>
        <option>Others</option>
        </select>
  </div>
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
  <input type="submit" value="Create">
</form> @endsection




