<?php
$comName="comName";

session_start();
echo session_id();

//$request = $request->session()->put(['comName' => 'comName']);
//$value = $request->session()->get('projectID');
// Set session variables
// $_SESSION['comName']=$comName;
// $_SESSION['comName'] = $_POST['comName'];
// $_SESSION["location"] = $_POST['location'];
//<?php echo $_SESSION['comName'];?>
?>

@extends('layouts.master')

@section('title')
 Project Register
@endsection

@section('content')
    <h1>Project Register </h1>
    <form method="post" action="{{url("add_project_action")}}">
    {{csrf_field()}}
    <br>
    <div class="form-group">
        <label for="exampleFormControlInput1">Project Title</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" name="projectTitle" placeholder="Project Title">
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">Description</label>
        <textarea type="text" class="form-control" id="exampleFormControlInput1" name="description" placeholder="Description"></textarea>
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">Number of Student Required (between 3 and 8)</label>
        <input type="number" class="form-control" id="exampleFormControlInput1" name="numOfStudentRequired" placeholder="Number of Student Required" min="3" max="8">
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">Company Name</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" name="comName" placeholder="Company Name">
    </div>


    <div class="form-group">
        <label for="exampleFormControlInput1">Company Location</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" name="location" placeholder="Company Location">
    </div>
    <div class="form-group">
        <label for="exampleFormControlSelect1">Major</label>
        <select class="form-control" id="exampleFormControlSelect1" name="major">
        <option>Data Analytics</option>
        <option>Software Development and Support</option>
        <option>Network and Security</option>
        <option>Information Systems and Enterprise Architecture</option>
        </select>
    </div>
    <input type="submit" value="Add">
    
    
    </form>

@endsection
    