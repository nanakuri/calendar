 @extends('layouts.app')　　　　　　　　　　　　　　　　　　

 @section('content')
  
       
       
   <body>  
        {{Auth::user()->name}}
       <h1>Active Calendar</h1>   
       
       <form method="POST" action="/store"  enctype="multipart/form-data">
            @csrf
            <h1>新しいメニュー</h1>
            <div class="title">
                <h3>タイトル</h3>
                <input type="text" name="title">
            </div>
            <div class="body">
                <h3>本文</h3>
                <textarea name="content" rows"10" cols"10" placeholder="今日も1日お疲れさまでした。"></textarea>
            </div>
            <input type="file" name="video"/>
            {{ csrf_field() }}
            <input type="hidden" value="{{Auth::id()}}" name="user_"/>
            <p><button type="submit">登録</button></p>
        </form>
        <div class="back">[<a href="/">back</a>]</div>
    </body>

@endsection
