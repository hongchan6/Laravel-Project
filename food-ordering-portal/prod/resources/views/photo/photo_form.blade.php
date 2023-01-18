@extends('layouts.master')

@section('title')
  Add a photo
@endsection

@section('content')
  <h4>Add a photo for {{$dish_name}}</h4><br>
 

  <form method="POST" action='{{url("photo")}}' enctype="multipart/form-data">
    {{csrf_field()}}
    <p><input type="hidden" name="dish_id" value="{{$dish_id}}" ></p>
    <p><input type="hidden" name="user_name" value="{{Auth::user()->user_name}}"></p>

    <p><label>Photo: </label><input type="file"  class="btn btn-outline-dark btn-sm" name="photo"></P>
    @if (count($errors)>0)
      <div class="alert">
      {{$errors->first('photo')}}
      </div>
    @endif
    <p><input type="submit" class="btn btn-primary" value="Add photo"></p></form>
    <a class="btn btn-light" href="{{url("dish/$dish_id")}}">Go back</a>

@endsection
