 @extends('layouts.app')　　　　　　　　　　　　　　　　　　

 @section('content')
  
       
       
   <body>  
        {{Auth::user()->name}}<br><br>
       
       <h1 class="title">編集画面</h1>
       <form method="POST" action="/editstore/{{$menu->id}}"  enctype="multipart/form-data" ><br>
            
            @method('PUT')
            @csrf
            
            <div class="content__title">
                <h3>タイトル</h3>
                <input type="text" name="title" value="{{ $menu->title }}"/>
            </div><br>
            <div class="content__body">
                <h3>本文</h3>
                <input type='text' name='content' value="{{ $menu->content }}"/>
            </div><br>
            
            <div class="content__video">
                <input type='file' name='video' value="{{ $menu->video }}"/>
                 {{ csrf_field() }}
            </div><br>
            
            <input type="submit" value="update"/><br>
            
        </form>
        
       
        

        <div class="back">[<a href="/show/{{$menu->id}}">back</a>]</div>
    </body>

@endsection
