 @extends('layouts.app')　　　　　　　　　　　　　　　　　　

 @section('content')
  
       
       
   <body>  
        {{Auth::user()->name}}<br><br>
          
        
        
        <div class='menu'>
            <h1 class='title'>{{$menu->title}}</h1><br>
            <p class='content'>{{$menu->content}}</p>
           
　　　　　　<video controls width="600" height="600" src="{{$menu->video}}"></video>
　　　　　　
            <p><label>
                <input type="checkbox" name="accepted" value="1"
                {{ old('accepted') == '1' ? 'checked' : '' }}> 終わった！！
            </label></p>
            
            <p class='create_user_id'>{{$menu->create_user_id}}</p>
            
             <style>
             
                .content{
                      white-space: pre;
                  }
                  
                  
                
            </style>
            
            
            
             
        </div>
        
        <form action="" id="form_{{ $menu->id }}" method="post" style="display:inline">
            @csrf
            @method('DELETE')
            <button type="submit">削除</button> 
        </form>
        
        <p class="edit">[<a href="/show/{{ $menu->id }}/edit">更新</a>]</p>
       
       
       
        <div class="back">[<a href="/">戻る</a>]</div>
    </body>

@endsection
