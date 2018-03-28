<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'jmeno',
        'prijmeni',
        'telefon',
        'email', 
        'heslo', 
        'prava',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'heslo', 'remember_token',
    ];
    
    public function nastavHeslo($heslo)
    {
        $this->attributes['heslo'] = "l1" . sha1($heslo . "47") . "web";
    }
}
