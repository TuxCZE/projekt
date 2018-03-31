<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dovolene extends Model
{
    protected $fillable = [
      'ID', 'ID_DESTINACE', 'Titulek', 'Seo_url', 'Obrazek', 'Popisek_kratky', 'Popisek', 'Cena', 'Termin_od', 'Termin_do'];
    
    protected $table = 'dovolene';
}
