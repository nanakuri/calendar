<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Database\migrations;
use App\Menu;
use App\Models;
use Storage;
use Auth;



class ScheduleController extends Controller
{
    
    
    public function schedule(Request $request)
    {
            return view('/schedule');

    }

    public function getAllMenus(Menu $menu)
    {
           return $menu->all()->toJson();
           
   }  
    
    
   
    /**
     * イベントを登録
     *
     * @param  Request  $request
     */
    public function store(Request $request, Menu $menu ,$date)
    {  
        

        $menu->create_user_id=Auth::id();
        $menu->click_date=$date;
        $menu->fill($request->input());
        
        
      $form = $request->all();

      //s3アップロード開始
      $image = $request->file('video');
      
      // バケットの`myprefix`フォルダへアップロード
      $path = Storage::disk('s3')->putFile('/nana-seven', $image, 'public');
     
      // アップロードした画像のフルパスを取得
      $menu->video = Storage::disk('s3')->url($path);

      $menu->save();
      
        return redirect('/');
    }
     
 
    public function date($date)
    {
       
       return view('/create')->with(['date' => $date]);
    }
    
   
     public function show(Request $request, Menu $menu )
    {
       return view('/show')->with(['menu'=> $menu ]);
    }
   
    
    
    
     public function delete(Menu $menu)
    {
        $menu->delete();
        return redirect('/');
    }
 
 
     public function edit(Menu $menu)
    {
        return view('/edit')->with(['menu' => $menu]);
    }
    
    
     public function editstore(Request $request, Menu $menu)
    {  
        
      $menu->fill($request->input());
        
        
      $input_form = $request->all();

      //s3アップロード開始
      $input_image = $request->file('video');
      
      // バケットの`myprefix`フォルダへアップロード
      $input_path = Storage::disk('s3')->putFile('/nana-seven', $input_image, 'public');
     
      // アップロードした画像のフルパスを取得
      $menu->video = Storage::disk('s3')->url($input_path);

      $menu->save();

        return redirect('/show/' .$menu->id);
        
    }
    
    
    
    
 
 
}




