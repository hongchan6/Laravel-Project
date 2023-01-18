@extends('layouts.master')

@section('title')
    My Fav
@endsection

@section('content')
    <h2>My Favourite Dishes </h2>

    @if($favs)

        <table>
            <tbody>

                <tr>
                    @foreach($favs as $fav)
                <td>{{$fav->dish_name}}</td>
                </tr>
                    @endforeach
            </tbody>
        </table>
        <br>
        @if($favCuisineCount)
            @if ($favCuisineCount >= 5)
                <b>Recommendation:<b>
                @foreach($recommendations as $recommendation)
                    <li>{{$recommendation->name}}</li>
                @endforeach
            @endif
        @endif
    @else
        <b>Empty<b>
    @endif


@endsection