<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable = [
      'ID', 'Nazev', 'Url'];
    
    protected $table = 'menu';
}
