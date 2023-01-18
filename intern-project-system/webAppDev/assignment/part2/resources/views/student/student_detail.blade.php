@extends('layouts.master')

@section('title')
    Student Detail
@endsection

@section('content')
    <h3>{{$student->firstName}} {{$student->lastName}} has applied: </h3>

    <br>
    
    @if ($studentapps)

        @foreach($studentapps as $studentapp)
        <li>{{$studentapp->projectTitle}} : {{$studentapp->comName}}  </li>
        @endforeach
    @else 
        No Application found

    @endif


@endsection