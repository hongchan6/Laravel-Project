@extends('layouts.master')

@section('title')
    WIL
@endsection

@section('content')
<h1>Project List </h1>
<br>
<br>
    @if ($projects)

        <div class="tablediv">
        <table class="table table-striped table-hover table-bordered">

        <tbody> 
            <tr>
            <th> Project Title </th>
            <th> Industry Name </th>
            <th> Number of application received </th>
            </tr>

            <tr> 
                @foreach($projects as $project)
            <td><a href="{{url("project_detail/$project->projectID")}}" class="list-group-item list-group-item-action"> {{$project->projectTitle}} </a></td>
            <td>{{$project->comName}}</td>
            <td>{{$project->numOfApplicant}}</td>
            </tr> 

                @endforeach
        </tbody>
        </table>
        </div>

        <a href="{{url("add_project")}}">Add New Project</a>
    @else 
        No Projects found
        <a href="{{url("add_project")}}">Add New Project</a>

    @endif



@endsection

