 @extends('layouts.app')　　　　　　　　　　　　　　　　　　

 @section('content')
  
   {{Auth::user()->name}}
<h1>Active Calendar</h1>   
<div id='calendar'></div>  


      


@endsection
