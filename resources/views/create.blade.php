 @extends('layouts.app')　　　　　　　　　　　　　　　　　　

 @section('content')
  
       
       
   <body>  
        
      
       
       <form method="POST" action="/store/{{$date}}"  enctype="multipart/form-data"><br>
                @csrf
                <h1>新しいメニュー</h1><br>
                <div class="title">
                    <h3>タイトル</h3>
                    <input type="text" name="title">
                </div><br>
                <div class="body">
                    <h3>メニュー</h3>
                    <textarea name="content" rows"10" cols"10" placeholder="腹筋1000回、スクワット1000回　"></textarea>
                </div><br>
            
                <h3 class= video>参考動画</h3>
                <input type="file" name="video"/><br>
                
                <input type="hidden" value="{{Auth::id()}}" name="user_"/><br><br>
            
            
                <div class="colorform">
                    <label>イベントの色</label><br />
                    <input type="radio" name="color" value="red" />赤
                    <input type="radio" name="color" value="blue" />青
                    <input type="radio" name="color" value="green" />緑
                    <input type="radio" name="color" value="orange" />オレンジ
                    <input type="radio" name="color" value="pink" />ピンク
                </div>
               
            
                <p><button type="submit">登録</button></p>
            
                <div class="back">[<a href="/">back</a>]</div>

        </form>
        
        
       

</body>

@endsection
