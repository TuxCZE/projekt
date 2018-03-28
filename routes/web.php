<?php

/*
  ZÁKLADNÍ STRÁNKY Z MENU
*/
Route::get('/', ['uses' => 'WebController@index', 'as' => 'web']);
Route::get('/nabidka', ['uses' => 'NabidkaController@index', 'as' => 'nabidka.index']);
Route::get('/lastminute', ['uses' => 'LMController@index', 'as' => 'lm.index']);
Route::get('/destinace', ['uses' => 'WebController@destinace', 'as' => 'web.destinace']);
Route::get('/sluzby', ['uses' => 'WebController@sluzby', 'as' => 'web.sluzby']);
Route::get('/kontakt', ['uses' => 'WebController@kontakt', 'as' => 'web.kontakt']);
/*
  VĚCI S PARAMETRY - NABÍDKA
*/
Route::get('/nabidka/{stranka}', ['uses' => 'NabidkaController@zobraz', 'as' => 'dovolena.zobraz'])->where('stranka', '[0-9]+');
Route::get('/nabidka/{destinace}-{cena_min}-{cena_max}-{akce}-{lm}', ['uses' => 'NabidkaController@zobrazFiltr', 'as' => 'dovolena.zobraz'])->where(
['destinace' => '[a-zA-Z_]+', 'cena_min' => '[0-9]+', 'cena_max' => '[0-9]+', 'akce' => '[0-9]+', 'lm' => '[0-9]+']);
Route::get('/nabidka/{destinace}-{cena_min}-{cena_max}-{akce}-{lm}/{stranka}', ['uses' => 'NabidkaController@zobrazFiltr', 'as' => 'dovolena.zobraz'])->where(
['destinace' => '[a-zA-Z_]+', 'cena_min' => '[0-9]+', 'cena_max' => '[0-9]+', 'akce' => '[0-1]+', 'lm' => '[0-1]+', 'stranka' => '[0-9]+']);

/*
  VĚCI S PARAMETRY - LASTMINUTE
*/
/*Route::get('/clanky/{stranka}', ['uses' =>'ClankyController@index'])->where('stranka', '[0-9]+');
Route::get('/clanky/{kategorie}', ['uses' =>'ClankyController@vypisKategorii'])->where('kategorie', '[A-Za-z]+');
Route::get('/clanky/{kategorie}/{stranka}', ['uses' =>'ClankyController@vypisKategorii'])->where(['stranka' => '[0-9]+', 'kategorie' => '[a-z]+']);
Route::get('/clanek/{id}-{seo_url}', ['uses' =>'ClankyController@zobrazClanek']); */

/*
  VĚCI S PARAMETRY - DESTINACE
*/
/*Route::get('/scripty/{nazev_kat}', ['uses' =>'ScriptyController@zobrazKategorii']);
Route::get('/scripty/{nazev_kat}/{stranka}', ['uses' =>'ScriptyController@zobrazKatStranku'])->where('stranka', '[0-9]+');
Route::get('/scripty/{nazev_kat}/{ID}-{nazev_scriptu}', ['uses' =>'ScriptyController@zobrazScript'])->where(['ID' => '[0-9]+', 'nazev_scriptu' => '[a-zA-Z_]+']);  */

/*
  ZPRACOVÁNÍ FORMULÁŘŮ - POST
*/
Route::post('/', ['uses' => 'WebController@hledanidovolene', 'as' => 'web.hledanidovolene']);

/*
  ADMINISTRACE
*/