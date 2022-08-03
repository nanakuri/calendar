<?php

namespace App;

use App\menu;
use Illuminate\Database\Eloquent\Model;




class Menu extends Model
{
    
    protected $fillable = ['title', 'content', 'video','checkbox', 'create_user_id'];
    
}

