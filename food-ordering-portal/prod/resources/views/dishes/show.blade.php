@extends('layouts.master')

@section('title')
    Dish Details
@endsection

@section('content')
    <h1>Dish Details </h1>    
    <br>
    <br>
    <br>

    <div class="tablediv">
    <table class="table table-striped table-hover table-bordered">
    <tbody>

        <tr>
        <th>Dish Name</th>
        <td>{{$dish->name}}</td>
        
        </tr>
        <tr>
        <th>Description</th>
        <td>{{$dish->description}}</td>
        </tr>

        <tr>
        <th>Cuisine</th>
        <td>{{$dish->cuisine}}</td>
        </tr>

        <tr>
        @if ($dish->promotion < 1.0)
            <b>Promotion! {{$promotion}} % OFF<b>
            <th>Orignial Price: </th>
            <td>{{$dish->price}}</td>
            <th>Discounted Price: </th>
            <td>{{$discount}}</td>

        @else

            <th>Price</th>
            <td>{{$dish->price}}</td>
        </tr>
        @endif


    </tbody>
    </table>
    <br>
            <form method="GET" action='{{url("photo/create")}}'>
            {{csrf_field()}}
            {{method_field('PUT')}}
            <input type="hidden" name="dish_name" value="{{$dish->name}}">
            <input type="hidden" name="dish_id" value="{{$dish->id}}">
            <input type="submit" class="btn btn-outline-dark btn-sm" value="Add Photo"></form>


    </div>
    <br>
    
    @auth
        @if (Auth::user()->type == "Restaurant")
        <div class="btn-group">
            <form method="GET" action='{{url("dish/$dish->id/edit")}}'>
            {{csrf_field()}}
            {{method_field('PUT')}}
            <input type="submit" class="btn btn-outline-dark btn-sm" value="Edit"></form>

            <form method="POST" action='{{url("dish/$dish->id")}}'>
            {{csrf_field()}} 
            {{method_field('DELETE')}} 
            <input type="submit" class="btn btn-outline-dark btn-sm" value="Delete"></form>
        </div>
        @endif
    @endauth
    <hr>



        @auth
            @if (Auth::user()->type == "Customer")
            <form method="post" action='{{url("fav_list")}}'>
            {{csrf_field()}} 
            <input type="hidden" name="dish_name" value="{{$dish->name}}">
            <input type="hidden" name="cuisine" value="{{$dish->cuisine}}">
            <input type="submit" class="btn btn-outline-dark btn-sm" value="Add to My Fav"></form>
            @endif
        @endauth


    <h5>Photos by members</h5>
        <div class="row">
            @foreach($photos as $photo)
            <div class="col-sm-3">
                <div class="card">
                    <div class="card-body">
                        <p>Photo posted by: {{$photo->user_name}}</p>
                        <img src="{{url($photo->photo)}}" alt="Dish photos" style="width:80px; height:100px;">
                    </div>
                </div>
            </div>
            @endforeach
        </div>


@endsection
