 @extends('layouts.app')　　　　　　　　　　　　　　　　　　

 @section('content')
  
       
       
   <body>  
        {{Auth::user()->name}}
       <h1>Active Calendar</h1>   
       
       
        <div class="back">[<a href="/">back</a>]</div>
    </body>

@endsection
