 @extends('layouts.app')　　　　　　　　　　　　　　　　　　

 @section('content')
  
       
       
   <body>  
        
          
        
        
        <div class='menu'>
            <span class= menu_title>Title</span><br><br>
            <h2 class='title'>{{$menu->title}}</h2><br>
            <span class= menu_content>Menu</span><br><br>
            <p class='content'>{{$menu->content}}</p>
           
            @if($menu->video)
           
                        <span class= menu_video>Video</span><br>
            　　　　    　　<video controls width="600" height="600" src="{{$menu->video}}"></video>
            　　　　　
            　　　　　　
            　　　　    　　<p><span class= menu_check>Check</span></p>
            　　　　　　
                        <p><form method="POST" action="/check/{{$menu->id}}"  enctype="multipart/form-data" >
                                @method('PUT')
                                @csrf
                                
                                <label>
                                    <input type="hidden" name="check" value="0">
                                    <input type="checkbox" name="check" value="1" {{ $menu_user  ? ($menu_user->checkbox ? 'checked="checked"' : '') : '' }}/>終わった！！
                                </label>
                                
                               {{-- <input type="hidden" value="{{Auth::id()}}" name="user_id"/>--}}
                        <button type="submit">登録</button>
                        
           
                   
                  
                        <br><p>終わった人 <span id="span"></span></p>
                        </form></p>
                        
             @endif
            
            <span class= menu_user>Create</span><br><br>
            <p class='user_id'>{{$user_name}}</p>
            
            
            </div>
            
            <form action="" id="form_{{ $menu->id }}" method="post" style="display:inline">
                @csrf
                @method('DELETE')
                <button type="submit">削除</button> 
            </form>
            
            <p class="edit">[<a href="/show/{{ $menu->id }}/edit">更新</a>]</p>
           
           
           
            <div class="back">[<a href="/">戻る</a>]</div>
            
        
        
        
         <script>
              var chk = document.getElementById("chk");
              var spn = document.getElementById("span");
            
            
            
              chk.addEventListener("click", function (e) {
                if (chk.checked) {
                  spn.textContent = chk.value;
                } else {
                  spn.textContent = "";
                  
                
                 
                }
                 
              });
        </script>
        
        
        
    </body>

@endsection
