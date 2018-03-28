<?php
  namespace App\Http\Controllers;
  
  use Illuminate\Support\Facades\DB;
  
  class NabidkaController extends Controller
  {
    public function VratMenu($id_vybrane)
    {
      $menu = DB::select('select * from menu ORDER BY ID ASC');
      
      return ['menu' => $menu, 'menu_vybrane' => $id_vybrane];
    }
  
    public function index()
    {
       return $this->zobrazFiltr(-1, -1, -1, -1, -1, 1);
    }
    
    public function Zobraz($stranka = 1)
    {
      return $this->zobrazFiltr(-1, -1, -1, -1, -1, $stranka);
    }
    
    public function zobrazFiltr($destinace = -1, $cena_min = -1, $cena_max = -1, $akce = -1, $lm = -1, $stranka = 1)
    {
      $destinace_vse = DB::select('select * from destinace ORDER BY Nazev ASC');
    
      return view('nabidka', $this->VratMenu(1), ['destinace' => $destinace_vse]);
    }
  }
?>