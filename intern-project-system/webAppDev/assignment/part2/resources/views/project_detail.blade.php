@extends('layouts.master')

@section('title')
    Project Details
@endsection

@section('content')
    <h1>Project Details </h1>    
    <a href="{{url("add_application/$project->projectID")}}">Click to apply</a>
    <br>
    <br>
    <br>

    <div class="tablediv">
    <table class="table table-striped table-hover table-bordered">
    <tbody>
        <tr>
        <th>Project ID</th>
        <td>{{$project->projectID}}</td>
        
        </tr>
        <tr>
        <th>Project Title</th>
        <td>{{$project->projectTitle}}</td>
        
        </tr>
        <tr>
        <th>Description</th>
        <td>{{$project->description}}</td>
        
        </tr>
        <tr>
        <th>Number of Student</th>
        <td>{{$project->numOfStudentRequired}}</td>
        </tr>

        <tr>
        <th>Company Name</th>
        <td>{{$project->comName}}</td>
        </tr>

        <tr>
        <th>Location</th>
        <td>{{$project->location}}</td>
        </tr>

        <tr>
        <th>Company Major</th>
        <td>{{$project->major}}</td>
        </tr>

    </tbody>
    </table>
    </div>
    <br>

    <h1>Current Application </h1>
    <br>
    @if($applications)
    @foreach($applications as $application)
    @endforeach
    
    

        @if ($students)
        <div class="tablediv">
        <div class="list-group">
            @foreach($students as $student)
            <a href="{{url("justification/$application->studentID")}}" class="list-group-item list-group-item-action">{{$student->firstName}} {{$student->lastName}}</a>
            @endforeach
        @endif
    
        </div>
        </div>
    @else 
    No application found
    @endif

        

    <br>
    <br>
    <br>
    <br>
    <a href="{{url("project_update/$project->projectID")}}">Update Project</a>
    <br>
    <br>
    <a href="{{url("delete_project/$project->projectID")}}">Delete Project</a>
           

@endsection
