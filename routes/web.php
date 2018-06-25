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
Route::post('/kontakt', ['uses' => 'WebController@kontaktZpracuj', 'as' => 'web.kontaktZpracuj']);
Route::get('/registrace', ['uses' => 'WebController@regform', 'as' => 'web.regform']);

//Přihlášení + uživatelský panel
Route::get('/prihlaseni', ['uses' => 'WebController@logForm', 'as' => 'web.logForm']);
Route::post('/prihlaseni', ['uses' => 'WebController@Prihlaseni', 'as' => 'web.Prihlaseni']);
Route::get('/odhlaseni', ['uses' => 'WebController@odhlasit', 'as' => 'web.odhlasit']);

Route::get('/ucet', ['uses' => 'WebController@ucet', 'as' => 'web.ucet'])->middleware('prihlasenyuzivatel');
Route::get('/ucet/objednavky', ['uses' => 'WebController@ucetObjednavky', 'as' => 'web.ucetObjednavky'])->middleware('prihlasenyuzivatel');
Route::get('/ucet/objednavky/{stranka}', ['uses' => 'WebController@ucetObjednavky', 'as' => 'web.ucetObjednavky'])->where('stranka', '[0-9]+')->middleware('prihlasenyuzivatel');
Route::get('/ucet/editace', ['uses' => 'WebController@ucetEditace', 'as' => 'web.ucetEditace'])->middleware('prihlasenyuzivatel');

//Hledání
Route::get('/hledat/{destinace}/{termin_od}/{termin_do}/{dospeli}-{deti}-{pokoju}/{stranka}', ['uses' => 'HledaniController@zobrazVysledek', 'as' => 'hledani.zobraz'])->where(
['destinace' => '[a-zA-Z_]+', 'termin_od' => '[0-9-]+', 'termin_do' => '[0-9-]+', 'dospeli' => '[1-6]+', 'deti' => '[1-6]+', 'pokoju' => '[1-6]+', 'stranka' => '[0-9]+']);
Route::get('/hledat/{destinace}/{termin_od}/{termin_do}/{dospeli}-{deti}-{pokoju}', ['uses' => 'HledaniController@zobrazVysledek', 'as' => 'hledani.zobraz'])->where(
['destinace' => '[a-zA-Z_]+', 'termin_od' => '[0-9-]+', 'termin_do' => '[0-9-]+', 'dospeli' => '[1-6]+', 'deti' => '[1-6]+', 'pokoju' => '[1-6]+']);

/*
  DETAIL DOVOLENÉ
*/
Route::get('/dovolena/{seo_titulek}', ['uses' => 'DovolenaController@index', 'as' => 'web']);

/*
  VĚCI S PARAMETRY - NABÍDKA
*/
Route::get('/nabidka/{stranka}', ['uses' => 'NabidkaController@zobraz', 'as' => 'dovolena.zobraz'])->where('stranka', '[0-9]+');
Route::get('/nabidka/{destinace}-{cena_min}-{cena_max}-{akce}-{lm}', ['uses' => 'NabidkaController@zobrazFiltr', 'as' => 'dovolena.zobraz'])->where(
['destinace' => '[-0-9a-zA-Z_]+', 'cena_min' => '[0-9]+', 'cena_max' => '[0-9]+', 'akce' => '[0-9]+', 'lm' => '[0-9]+']);
Route::get('/nabidka/{destinace}-{cena_min}-{cena_max}-{akce}-{lm}/{stranka}', ['uses' => 'NabidkaController@zobrazFiltr', 'as' => 'dovolena.zobraz'])->where(
['destinace' => '[-0-9a-zA-Z_]+', 'cena_min' => '[0-9]+', 'cena_max' => '[0-9]+', 'akce' => '[0-1]+', 'lm' => '[0-1]+', 'stranka' => '[0-9]+']);

/*
  VĚCI S PARAMETRY - OBJEDNAT DOVOLENOU
*/
Route::get('/objednat/{ID}', ['uses' => 'ObjednavkaController@zobraz', 'as' => 'objednavka.zobraz'])->where('ID', '[0-9]+');
Route::post('/objednat/{ID}', ['uses' => 'ObjednavkaController@zpracuj', 'as' => 'objednavka.zpracuj'])->where('ID', '[0-9]+');

/*
  ZPRACOVÁNÍ FORMULÁŘŮ - POST
*/
Route::post('/hledat', ['uses' => 'HledaniController@zadani', 'as' => 'hledani.zadani']);
Route::post('/registrace', ['uses' => 'WebController@Registrace', 'as' => 'web.Registrace']);
Route::post('/nabidka', ['uses' => 'NabidkaController@filtrovaniParametru', 'as' => 'web.filtrovaniParametru']);
Route::post('/', ['uses' => 'WebController@hledanidovolene', 'as' => 'web.hledanidovolene']);

/*
  ADMINISTRACE
*/
Route::get('/administrace', ['uses' => 'AdminController@prihlaseni', 'as' => 'admin.prihlaseni']);
Route::get('/administrace/uvod', ['uses' => 'AdminController@uvod', 'as' => 'admin.uvod'])->middleware('prihlasenyuzivatel', 'admin');

Route::get('/administrace/dovolene', ['uses' => 'AdminController@dovolene', 'as' => 'admin.dovolene'])->middleware('prihlasenyuzivatel', 'admin');
Route::get('/administrace/dovolene/{stranka}', ['uses' => 'AdminController@dovolene', 'as' => 'admin.dovolene'])->where('stranka', '[0-9]+')->middleware('prihlasenyuzivatel', 'admin');
Route::get('/administrace/dovolene/pridat', ['uses' => 'AdminController@pridaniDovolene', 'as' => 'admin.pridaniDovolene'])->middleware('prihlasenyuzivatel', 'admin');
Route::get('/administrace/dovolene/smazat/{ID}', ['uses' => 'AdminController@smazatDovolenou', 'as' => 'admin.smazatDovolenou'])->where('ID', '[0-9]+')->middleware('prihlasenyuzivatel', 'admin');
Route::get('/administrace/dovolene/upravit/{ID}', ['uses' => 'AdminController@upravitDovolenou', 'as' => 'admin.upravitDovolenou'])->where('ID', '[0-9]+')->middleware('prihlasenyuzivatel', 'admin');

Route::get('/administrace/uzivatele', ['uses' => 'AdminController@uzivatele', 'as' => 'admin.uzivatele'])->middleware('prihlasenyuzivatel', 'admin');
Route::get('/administrace/uzivatele/{stranka}', ['uses' => 'AdminController@uzivatele', 'as' => 'admin.uzivatele'])->where('stranka', '[0-9]+')->middleware('prihlasenyuzivatel', 'admin');
Route::get('/administrace/uzivatele/uprav/{ID}', ['uses' => 'AdminController@UpravUzivatele', 'as' => 'admin.UpravUzivatele'])->where('ID', '[0-9]+')->middleware('prihlasenyuzivatel', 'admin');
Route::get('/administrace/uzivatele/smaz/{ID}', ['uses' => 'AdminController@SmazUzivatele', 'as' => 'admin.SmazUzivatele'])->where('ID', '[0-9]+')->middleware('prihlasenyuzivatel', 'admin');

Route::get('/administrace/sluzby', ['uses' => 'AdminController@sluzby', 'as' => 'admin.sluzby'])->middleware('prihlasenyuzivatel', 'admin');
Route::post('/administrace/sluzby', ['uses' => 'AdminController@upravSluzby', 'as' => 'admin.upravSluzby'])->middleware('prihlasenyuzivatel', 'admin');

Route::get('/administrace/kontakt', ['uses' => 'AdminController@kontakt', 'as' => 'admin.kontakt'])->middleware('prihlasenyuzivatel', 'admin');
Route::get('/administrace/kontakt/{stranka}', ['uses' => 'AdminController@kontakt', 'as' => 'admin.kontakt'])->where('stranka', '[0-9]+')->middleware('prihlasenyuzivatel', 'admin');
Route::get('/administrace/kontakt/zobraz/{ID}', ['uses' => 'AdminController@zobrazKontakt', 'as' => 'admin.zobrazKontakt'])->where('ID', '[0-9]+')->middleware('prihlasenyuzivatel', 'admin');
Route::get('/administrace/kontakt/smaz/{ID}', ['uses' => 'AdminController@smazKontakt', 'as' => 'admin.smazKontakt'])->where('ID', '[0-9]+')->middleware('prihlasenyuzivatel', 'admin');

/*
  ADMINISTRACE- ZPRACOVÁNÍ POST POŽADAVKŮ
*/
Route::post('/administrace/dovolene/pridat', ['uses' => 'AdminController@pridejDovolenou', 'as' => 'admin.pridejDovolenou']);
