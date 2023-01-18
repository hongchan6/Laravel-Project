@extends('layouts.master')

@section('title')
    Update Project
@endsection
@section('content')

<h1>Update Project </h1>
    <form method="post" action="{{url("update_project_action")}}">
    {{csrf_field()}}
    <br>
    <input type="hidden" name="projectID" value="{{$project->projectID}}">
    <div class="form-group">
        <label for="exampleFormControlInput1">Project Title</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" name="projectTitle" value="{{$project->projectTitle}}">
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">Number of Student Required</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" name="numOfStudentRequired" value="{{$project->numOfStudentRequired}}">
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">Description</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" name="description" value="{{$project->description}}">
    </div>
    <div class="form-group">
        <label for="exampleFormControlSelect1">Major</label>
        <select class="form-control" id="exampleFormControlSelect1" name="major">
        <option>Data Analytics</option>
        <option>Software Development and Support</option>
        <option>Network and Security</option>
        <option>Information Systems and Enterprise Architecture</option>
        </select>
    </div>
    <input type="submit" value="Update">
    
    
    </form>

@endsection