 @extends('layouts.app')　　　　　　　　　　　　　　　　　　

 @section('content')
  
       
       
   <body>  
        
      
       
       <form method="POST" action="/store/{{$date}}"  enctype="multipart/form-data"><br>
         <div class="create_menu">
                @csrf
                <h1>New Menu</h1><br>
                <div class="title">
                    <h3>Title</h3>
                    <input type="text" name="title">
                </div><br>
                <div class="body">
                    <h3>Menu</h3>
                    <textarea name="content" rows"10" cols"10" placeholder="腹筋1000回、スクワット1000回　"></textarea>
                </div><br>
            
                <h3 class= video>Video</h3>
                <input type="file" name="video"/><br>
                
                <input type="hidden" value="{{Auth::id()}}" name="user_"/><br><br>
          </div>
            
            
                <div class="colorform">
                    <div class="menu_color"><label>Color</label></div>
                    <input type="radio" name="color" value="red" />red
                    <input type="radio" name="color" value="blue" />blue
                    <input type="radio" name="color" value="green" />green
                    <input type="radio" name="color" value="orange" />orange
                    <input type="radio" name="color" value="pink" />pink
                </div>
               
            
                <p><button type="submit">登録</button></p>
            
                <div class="back">[<a href="/">戻る</a>]</div>
            

        </form>
        
        <style>
            .create_menu{
                font-family:'impact';
            }
        </style>
       

</body>

@endsection
