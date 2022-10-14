<?php

namespace App;

use App\menu;
use Illuminate\Database\Eloquent\Model;




class Menu extends Model
{
    
    protected $fillable = ['title', 'content', 'video','color', 'user_id'];
    
    
    public function user()   
    {
        return $this->belongsToMany('App\user');  
    }
}

