@extends('layouts.master')

@section('title')
    Top 3 Industry Partner
@endsection

@section('content')
    <h2>Top 3 Industry Partner </h2>
    <br>
    <img src="{{url('images/no1.png')}}" width="60" height="60">
    <img src="{{url('images/no2.png')}}" width="60" height="60">
    <img src="{{url('images/no3.png')}}" width="60" height="60">
    <br>
    <br>
    <br>
    
    <table>
        <tbody>
            <tr>
            <th>Industry Name </th>
            <th>Number of projects advertise</th>
            </tr>

            <tr>
                @foreach($tops as $top)
            <td>{{$top->comName}}</td>
            <td>{{$top->number}}</td>
            </tr>
                @endforeach
        </tbody>
    </table>
    
@endsection