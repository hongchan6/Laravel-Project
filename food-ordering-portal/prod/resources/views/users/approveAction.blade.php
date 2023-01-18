@extends('layouts.master')

@section('title')
    Approval
@endsection


@section('content')
<form method="post" action='{{url("approveAction/{id}")}}'>
{{csrf_field()}}  
<h2>Approve for  {{$user->user_name}} (User ID:{{$user->id}}) @ {{$user->address}}?</h2>
<input type="hidden" name="user_id" value="{{$user->id}}">
<input type="hidden" name="approved" value="{{$user->approved}}">
    <div class="form-group">
        <select class="form-control" id="exampleFormControlSelect1" name="approved">
        <option>N</option>
        <option>Y</option>
        </select>
    </div>

<input type="submit" value="Confirm">
</form>

@endsection
