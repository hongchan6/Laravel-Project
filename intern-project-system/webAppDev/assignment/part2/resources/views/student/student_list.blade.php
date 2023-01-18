@extends('layouts.master')

@section('title')
    Student List
@endsection

@section('content')
<h1>Student List</h1>
<br>
    @if ($students)
        <div class="tablediv">
        <div class="list-group">
        @foreach($students as $student)
            <a href="{{url("student_detail/$student->studentID")}}" class="list-group-item list-group-item-action">{{$student->firstName}} {{$student->lastName}}</a>
        @endforeach
 
    @else 
        No students found
    @endif
@endsection
    