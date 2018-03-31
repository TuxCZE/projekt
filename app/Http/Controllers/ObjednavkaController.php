<?php
  namespace App\Http\Controllers;
  
  use Illuminate\Support\Facades\DB;
  use App\Menu;
  use App\Dovolene;
  
  class ObjednavkaController extends Controller
  {
    public function VratMenu($id_vybrane)
    {
      $menu = Menu::all();
      
      return ['menu' => $menu, 'menu_vybrane' => $id_vybrane];
    }
  
    public function zobraz($id)
    {
      $dovolena = Dovolene::where('ID', "=", $id)->get()[0];
    
      return view('dovolene.objednavka', $this->VratMenu(1), ['dovolena_vybrana' => $dovolena]);
    }
    
    public function zpracuj($id)
    {
      return "text";
    }
  }
?>