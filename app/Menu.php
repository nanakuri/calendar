<?php

namespace App;

use App\menu;
use Illuminate\Database\Eloquent\Model;




class Menu extends Model
{
    
    protected $fillable = ['title', 'content', 'video','checkbox','color', 'user_id'];
    
    
    public function user()   
{
    return $this->belongsTo('App\user');  
}
}

