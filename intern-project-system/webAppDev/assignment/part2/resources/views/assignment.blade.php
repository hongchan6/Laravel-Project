@extends('layouts.master')

@section('title')
    Assignment
@endsection

@section('content')
    <h3>Assignment Result</h3>
    <p>This is a project assignment page which displays the assignment of projects to students. </p>

    @if ($assignments)

        <div class="tablediv">
        <table class="table table-striped table-hover table-bordered">

        <tbody> 
            <tr>
            <th> Project ID </th>
            <th> Student Name </th>
            </tr>
            <tr> 
                @foreach($assignments as $assignment)
            <td>{{$assignment->projectID}} </td>
            <td>{{$assignment->firstName}} {{$assignment->lastName}} </td>
            </tr>
            
        @endforeach
        </tbody>
        </table>
        </div>

    @else 
        No Projects found

    @endif



@endsection