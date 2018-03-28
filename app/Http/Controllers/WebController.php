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
      return view('destinace', $this->VratMenu(2));
    }
    
    public function sluzby()
    {
      return view('sluzby', $this->VratMenu(3));
    }
    
    public function kontakt()
    {
      return view('kontakt', $this->VratMenu(4));
    }
    
    /*
      ZPRACOVÁNÍ FORMULÁŘE Z ÚVODNÍ STRÁNKY
    */
    public function hledanidovolene()
    {
    }
  }
?>