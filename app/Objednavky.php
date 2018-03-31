<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Objednavky extends Model
{
    protected $fillable = [
      'ID', 'ID_uzivatele', 'ID_dovolene', 'Jmeno', 'Prijmeni', 'Ulice', 'Mesto', 'PSC', 'Telefon', 'Pocet_dospelych', 'Pocet_deti', 'Cena_celkem', 'Pokoju', 'Zaplaceno', 'Splatnost'];
    
    protected $table = 'objednavky';
}
