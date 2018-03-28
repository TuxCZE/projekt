<?php
  namespace App\Http\Controllers;
  
  use Illuminate\Support\Facades\DB;
  
  class WebController extends Controller
  {
    public function VratMenu($id_vybrane)
    {
      $menu = DB::select('select * from menu ORDER BY ID ASC');
      
      return ['menu' => $menu, 'menu_vybrane' => $id_vybrane];
    }
  
    public function index()
    {
       $menu = DB::select('select * from menu ORDER BY ID ASC');
    
        return view('uvod', $this->VratMenu(0));
    }
    
    public function destinace()
    {
      $destinace_vse = DB::select('select * from destinace ORDER BY ID ASC');
      $dovolene_nahoda = DB::select('SELECT * FROM dovolene ORDER BY RAND() LIMIT 10');
    
      return view('destinace', $this->VratMenu(2), ['destinance_vse' => $destinace_vse, 'dovolene_rand' => $dovolene_nahoda]);
    }
    
    public function sluzby()
    {
      return view('sluzby', $this->VratMenu(3));
    }
    
    public function kontakt()
    {
      return view('kontakt', $this->VratMenu(4));
    }
    
    public function regform()
    {
      return view('registrace', $this->VratMenu(0));
    }
    
    /*
      ZPRACOVÁNÍ FORMULÁŘE Z ÚVODNÍ STRÁNKY
    */
    public function hledanidovolene()
    {
    }
    
    public function Prihlaseni()
    {
    }
    
    public function Registrace()
    {
    }
  }
?>