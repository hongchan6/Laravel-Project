@extends('layouts.master')

@section('title')
  Document
@endsection

@section('content')
<h4>Assignment 2: 7005ICT Programming Principles 2 
</h4>

<img src="{{url('doc_image/ERD2.jpeg')}}" width="1200" height="700">


<br>
  
<p>2.	I managed to do most of the requirements except Requirement 12.</p><br>

<p>3.	I started the task by drawing a draft ERD. tried to build the application based on the initial ERD, but then I realised the entities should be amended and more attributes should be added. I modified the ERD several times during the process. I tested my codes from time to time by using dd to check if it would return what I wanted. When I came across problems, I did lots of research online to see if I could find the solution myself. I also discussed with classmates for new ideas.</p><br>

<p>4.	 I have created an attribute “cuisine” to categories every dishes by their cuisine, for example, Asian, Italian, Indian, Veggie, Meat Lover, Fast Food, etc. By counting the most occurrence of cuisine from the favourite list, dishes of the same cuisine types will be fall into the recommendations. And then, I merged two collections: favourites and recommendations to remove duplicates.</p><br>




@endsection