@extends('layouts.master')

@section('title')
    Top 5
@endsection

@section('content')
    <h2>Top 5 most popular dishes </h2>

    <table>
        <tbody>
            <tr>
            <th>Dish Name </th>
            <th>Number of times ordered</th>
            </tr>

            <tr>
                @foreach($tops as $top)
            <td>{{$top->name}}</td>
            <td>{{$top->number}}</td>
            </tr>
                @endforeach
        </tbody>
    </table>
    
@endsection