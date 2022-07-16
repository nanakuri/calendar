 @extends('layouts.app')　　　　　　　　　　　　　　　　　　

 @section('content')
  
       
       
   <body>  
        {{Auth::user()->name}}
       <h1>Active Calendar</h1>   
        
        
        <div class='menu'>
            <h2 class='title'>{{$menu->title}}</h2>
            <p class='content'>{{$menu->content}}</p>
　　　　　　<video controls width="600" height="600" src="{{$menu->video}}"></video>
            <p class='check'>{{$menu->check}}</p>
            <p class='create_user_id'>{{$menu->create_user_id}}</p>
             
        </div>
       
       
       
        <div class="back">[<a href="/">back</a>]</div>
    </body>

@endsection
