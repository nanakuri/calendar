<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu_user extends Model
{
    protected $table = "menu_user";
     protected $fillable = ['user_id', 'menu_id', 'checkbox'];
}
