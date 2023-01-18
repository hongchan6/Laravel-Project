@extends('layouts.master')

@section('title')
    Approval
@endsection

@section('content')
<h1>Approval List </h1>
<br>
<br>
    @if ($users)

    <div class="tablediv">
        <table class="table table-striped table-hover table-bordered">

        <tbody> 
            <tr>
            <th> Restaurant Name </th>
            <th> Status </th>
            </tr>

            <tr> 
                @foreach($users as $user)
            <td>{{$user->user_name}}</td>
            <td><a href="{{url("approveAction/$user->id")}}"> {{$user->approved}} </a>

            </td>
            </tr> 

                @endforeach
        </tbody>
        </table>
        </div>


        </form>


    @endif



@endsection




