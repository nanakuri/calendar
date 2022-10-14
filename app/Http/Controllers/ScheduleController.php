<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use App\Http\Requests\ScheduleRequest;
use Database\migrations;
use App\Menu;
use App\User;
use App\Create_menu;
use App\Models;
use Storage;
use Auth;
use App\Menu_user;




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
    
    public function store(ScheduleRequest $requests , Menu $menu , User $user , $date)
    { 
        //var_dump($user);
        //dd($user);
        $menu->user_id=Auth::id();
        $menu->click_date=$date;
        $menu->fill($requests->input());
        
        
        
       
        
        
      $form = $requests->all();

      //s3アップロード開始
      $image = $requests->file('video');
//      dd($image);
      
      
      if( $image ) {
          // バケットの`myprefix`フォルダへアップロード
          $path = Storage::disk('s3')->putFile('/nana-seven', $image, 'public');
         
          // アップロードした画像のフルパスを取得
          $menu->video = Storage::disk('s3')->url($path);
      }
      

      $menu->save();
      
        return redirect('/' );
    }
     
 
    public function date($date)
    {
       
       return view('/create')->with(['date' => $date]);
    }
    
   
     public function show(Request $request, Menu $menu ,User $user , Menu_user $menu_user)
    {
        //dd($user);
       $user_data = $user->find($menu->user_id);
       //var_dump($user_data);
       
       
       //$menu_users = $menu_user->where('menu_id', '=', $menu->id)->where('user_id', '=', $menu->user_id);

       $menu_user = Menu_user::where('menu_id', $menu->id)->where( 'user_id' , Auth::id() )->first();
       //$user_name = $menu->user->name;
       //dd( $menu_user ); 
       
       
       return view('/show')->with(['menu'=> $menu , 'user' => $user->get() , 'user_name' => $user_data->name , 'menu_user'=> $menu_user ] );
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
      //dd( $input_image );
      
      // バケットの`myprefix`フォルダへアップロード
      $input_path = Storage::disk('s3')->putFile('/nana-seven', $input_image, 'public');
     
      // アップロードした画像のフルパスを取得
      $menu->video = Storage::disk('s3')->url($input_path);

      $menu->save();

        return redirect('/show/' .$menu->id);
        
    }
    
    
    
     public function check(Request $request, Menu $menu, User $user , Menu_user $menu_user)
    {  
        $user = Auth::user();
        $user->save();
        
        
        $menu->fill($request->input());
        $menu_id = $menu->id;
       
        //$check=$request->checkbox;
        
        //$user->menu()->updateinsert($menu_id , ['checkbox' => $request->check]);
        
        \DB::table('menu_user')->updateOrInsert(
            ['menu_id' => $menu_id, 'user_id' => $user->id ],
            ['checkbox' => $request->check ]
            );
        
        
        
        
        
      return redirect('/show/' . $menu->id );  
        
    }
    
    
    
    
 
 
}




