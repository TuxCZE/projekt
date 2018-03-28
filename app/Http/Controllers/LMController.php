<?php
  namespace App\Http\Controllers;
  
  use Illuminate\Support\Facades\DB;
  
  class LMController extends Controller
  {
    public function VratMenu($id_vybrane)
    {
      $menu = DB::select('select * from menu ORDER BY ID ASC');
      
      return ['menu' => $menu, 'menu_vybrane' => $id_vybrane];
    }
  
    public function index()
    {
       return view('lm', $this->VratMenu(2));
    }
  }
?>