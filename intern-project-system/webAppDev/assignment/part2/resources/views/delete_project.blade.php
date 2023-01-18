@extends('layouts.master')

@section('title')
    Delete Project
@endsection
@section('content')

<h1>Delete Project </h1>
<br>

<form method="post" action="{{url("delete_project_action")}}">
    {{csrf_field()}}
    <input type="hidden" name="projectID" value="{{$project->projectID}}">
    <p>
        <label>Are you sure?</label>
        
    </p>
    <input type="submit" value="Yes">
</form>

@endsection