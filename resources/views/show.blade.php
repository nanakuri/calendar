 @extends('layouts.app')　　　　　　　　　　　　　　　　　　

 @section('content')
  
       
       
   <body>  
        
          
        
        
        <div class='menu'>
            <span class= menu_title>タイトル</span><br><br>
            <h2 class='title'>{{$menu->title}}</h2><br>
            <span class= menu_content>今日のメニュー</span><br><br>
            <p class='content'>{{$menu->content}}</p>
           
            <span class= menu_video>参考動画</span><br>
　　　　　　<video controls width="600" height="600" src="{{$menu->video}}"></video>
　　　　　　
　　　　　　<p><span class= menu_check>出席確認</span></p>
　　　　　　
            <p><form>
                 @csrf
                @method('PUT')
               
                <label><input type="checkbox" id="chk" value="{{$user_name}}"/>終わった！！
            </label>
           
           <br><p>終わった人 <span id="span"></span></p>
            </form></p>
            
            <span class= menu_user>作成者</span><br><br>
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
