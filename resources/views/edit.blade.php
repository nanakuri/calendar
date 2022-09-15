 @extends('layouts.app')　　　　　　　　　　　　　　　　　　

 @section('content')
  
       
       
   <body>  
        
       
       
       <form method="POST" action="/editstore/{{$menu->id}}"  enctype="multipart/form-data" ><br>
            
            @method('PUT')
            @csrf
            
            <div class="content__title">
                <h3 class="menu_title">Title</h3>
                <input type="text" name="title" value="{{ $menu->title }}"/>
            </div><br>
            <div class="content__body">
                <h3 class="menu_content">Menu</h3>
                <input type='text' name='content' value="{{ $menu->content }}"/>
            </div><br>
            
            <div class="content__video">
                <input type='file' name='video' value="{{ $menu->video }}"/>
                 {{ csrf_field() }}
            </div><br>
            
            <div class="colorform">
                    <div class="menu_color"><label>Color</label></div>
                    <input type="radio" name="color" value="red" />red
                    <input type="radio" name="color" value="blue" />blue
                    <input type="radio" name="color" value="green" />green
                    <input type="radio" name="color" value="orange" />orange
                    <input type="radio" name="color" value="pink" />pink
                </div>
            
            
            <input type="submit" value="update"/><br>
            
            
            
        </form>
        
       
        

        <div class="back">[<a href="/show/{{$menu->id}}">back</a>]</div>
    </body>

@endsection
