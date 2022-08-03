 @extends('layouts.app')　　　　　　　　　　　　　　　　　　

 @section('content')
  
       
       
   <body>  
        {{Auth::user()->name}}
      
       
       <form method="POST" action="/store/{{$date}}"  enctype="multipart/form-data"><br>
            @csrf
            <h1>新しいメニュー</h1><br>
            <div class="title">
                <h3>タイトル</h3>
                <input type="text" name="title">
            </div><br>
            <div class="body">
                <h3>内容</h3>
                <textarea name="content" rows"10" cols"10" placeholder="腹筋1000回、スクワット1000回　"></textarea>
            </div><br>
            <input type="file" name="video"/><br>
            {{ csrf_field() }}
            <input type="hidden" value="{{Auth::id()}}" name="user_"/><br>
            <p><button type="submit">登録</button></p>
        </form>
        

        <div class="back">[<a href="/">back</a>]</div>
    </body>

@endsection
