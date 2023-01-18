@extends('layouts.master')

@section('title')
  Document
@endsection

@section('content')
<h4>Assignment 1: 7005ICT Programming Principles 2 
</h4>

<img src="{{url('images/ERD.png')}}" width="1200" height="700">


<br>
  
<p>1.	There is a many to many relationships between project table and student table. So I broke it down into two one-to-many relationships. Application table is then the bridging entity that indicates a project may receive one or more application while a student may apply one or more application.
</p><br>

<p>2.	I tried my best to attempt all tasks including the extra task for 7005ICT, and I managed to do most of the requirements except Requirement 14. I could start a new session and get a session ID. Yet I couldn’t make the system remember the industry name and location and recall it within the session.
</p><br>

<p>3.	I started the task by drawing a draft ERD. At first I had 4 entities (project, application, student, justification). I tried to build the application based on the initial ERD, but then I realised the entities should be amended and more attributes should be added. I modified the ERD several times during the process. I tested my codes every time I wrote a new function or new route to make sure everything work as I expected. When I came across problems, I did lots of research online to see if I could find the solution myself. I would ask classmates and tutor for advices if I couldn’t find one. I think for assignment 2, I should do more research on JavaScript and any other PHP features that  I am not familiar with to be more prepared.
</p><br>

<p>4.	I created an attribute “numOfAvailableSlot” to record the number of available slot. The “numOfAvailableSlot” will be minus 1 whenever a student is assigned to the project. If the “numOfAvailableSlot” is bigger than 0, assignment process can start. If the student preference is 1, that student can be assigned to the project. If there is no more preference1, preference2 will be processed and then preference3. The assignemenr will stop when “numOfAvailableSlot” equals to 0, a message of “The project is full” will pop up.
</p><br>


@endsection