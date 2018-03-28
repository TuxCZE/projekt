<?php
  namespace App\Http\Controllers;
  
  use Illuminate\Support\Facades\DB;
  
  class DovolenaController extends Controller
  {
    public function VratMenu($id_vybrane)
    {
      $menu = DB::select('select * from menu ORDER BY ID ASC');
      
      return ['menu' => $menu, 'menu_vybrane' => $id_vybrane];
    }
    
   
    public function index($seo_url)
    {
       $dovolene_celkem = DB::table('dovolene')->where('Seo_url', "=" , $seo_url)->count();
       if($dovolene_celkem > 0){
         $dovolena = DB::table('dovolene')->where('Seo_url', "=", $seo_url)->get()[0];
      
         return view("detail", $this->VratMenu(1), ['dovolena' => $dovolena]);
       } else return redirect('/nabidka/');
    }
  }
?>