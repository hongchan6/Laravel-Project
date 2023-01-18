<!doctype html>
<html>

@extends('layouts.master')

@section('title')
    Apply Project
@endsection

@section('content')
    <h1>Apply Project</h1>
    <p class="alert-info">{{$msgError}}</p>
    <form method="post" action="{{url("add_application_action")}}"?>
    {{csrf_field()}}
    <br>
    <div class="form-group">
        <label for="exampleFormControlInput1">Project ID</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" name="projectID" placeholder="Please indicate projectID" >
    </div>

    <div class="form-group">
        <label for="exampleFormControlInput1">First Name</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" name="firstName" placeholder="At least 3 characters long and contain only alphabetic" >
    </div>

    <div class="form-group">
        <label for="exampleFormControlInput1">Last Name</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" name="lastName" placeholder="At least 3 characters long and contain only alphabetic" >
    </div>

    <div class="form-group">
        <label for="exampleFormControlInput1">Justification</label>
        <textarea class="form-control" id="exampleFormControlInput1" name="justification" placeholder="Write something to describe your background and reason for applying for this project. Write at least 5 words. " ></textarea>
    </div>
    
    <div class="form-group">
        <label for="exampleFormControlSelect1">Preference (You can only apply for up to 3 Projects. Please choose your preference. 1 is the highest preference.)</label>
        <select class="form-control" id="exampleFormControlSelect1" name="preference">
        <option>1</option>
        <option>2</option>
        <option>3</option>
        </select>
    </div>

        <br> <input type="submit" value="Apply">
        <br> 
    
    </form>


@endsection

</html>
