<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'Jmeno',
        'Prijmeni',
        'Telefon',
        'Email', 
        'Heslo', 
        'Prava',
    ];

    protected $hidden = [
        'heslo', 'remember_token',
    ];
    
    protected $table = 'uzivatele';
    
    public function nastavHeslo($heslo)
    {
        $this->attributes['heslo'] = "l1" . sha1($heslo . "47") . "web";
    }
}
