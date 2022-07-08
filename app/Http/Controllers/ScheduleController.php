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
    public function store(Request $request, Menu $menu)
    {  
        
        $menu->create_user_id=Auth::id();
        $menu->fill($request->input());
        
      $form = $request->all();

      //s3アップロード開始
      $image = $request->file('video');
      // バケットの`myprefix`フォルダへアップロード
      $path = Storage::disk('s3')->putFile('nana-seven', $image, 'public');
      // アップロードした画像のフルパスを取得
      $menu->video = Storage::disk('s3')->url($path);

      $menu->save();

        return redirect('/create');
    }
     
 
    public function date($date)
    {
       return view('/create');
    }
    
    public function create(Request $request)
    {
       return view('/show');
    }
    
    
   
    public function postMenu(Request $request)
    {
        $result = Event::select('id', 'title', 'date as start')->whereBetween('date', [$start, $end])->get()->toArray();
        echo json_encode($result);
    }
    
     
 
 
 
 
 
 
 
 
}




