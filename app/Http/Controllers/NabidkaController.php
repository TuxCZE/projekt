<?php
  namespace App\Http\Controllers;
  
  use Illuminate\Support\Facades\DB;
  
  class NabidkaController extends Controller
  {
    private $na_stranku = 6;
  
    public function VratMenu($id_vybrane)
    {
      $menu = DB::select('select * from menu ORDER BY ID ASC');
      
      return ['menu' => $menu, 'menu_vybrane' => $id_vybrane];
    }
    
    public function filtrovaniParametru()
    {
      if(isset($_POST["cena_max"])){
        $dest_id = $_POST["destinace_id"];
        $seo_dest = DB::table('destinace')->where('ID', "=" , $dest_id)->value("Seo_url");
        
        $cena_min = $_POST["cena_min"];
        if($cena_min < 0) $cena_min = 0;
        
        $cena_max = $_POST["cena_max"];
        if($cena_max <= 0) $cena_max = 999999999;
        
        if(isset($_POST["akce"])) $akce = $_POST["akce"];
        else $akce = 0;
        
        if(isset($_POST["lm"])) $lm = $_POST["lm"];
        else $lm = 0;
      
        $text = $seo_dest . "-" . $cena_min . "-" . $cena_max . "-" . $akce . "-" . $lm;
        return redirect('/nabidka/' . $text);
      }
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
      if($destinace == -1) {
        $dovolene_celkem = DB::table('dovolene')->count();
      } else {
        $id_dest = DB::table('destinace')->where('Seo_url', "=" , $destinace)->pluck('ID');
        $dovolene_celkem = DB::table('dovolene')->where('ID_DESTINACE', "=" , $id_dest)->count();
      }
      
      $destinace_vse = DB::select('select * from destinace ORDER BY Nazev ASC');
      
      //Upravení proměnných parametrů
      if($cena_min == -1) $cena_min = 0;
      if($cena_max == -1) $cena_max = 999999999;
      
      if($dovolene_celkem > 0){ 
        $stranky_pocet = ceil($dovolene_celkem / $this->na_stranku);
        
        if($stranka < 0 || $stranka > $stranky_pocet) $stranka = 1;
        $od = ($stranka - 1) * $this->na_stranku;   
        
        if($destinace == -1){
          if($lm == 1 && $akce == 1) {
            $dovolene = DB::table('dovolene')->where([['Cena', ">=", $cena_min], ['Cena', "<=", $cena_max], ['Lastminute', "=", 1], ['Cena_pred', ">", 0]])->orderBy('ID', 'desc')->skip($od)->take($this->na_stranku)->get();
          } elseif($lm == 1) {
            $dovolene = DB::table('dovolene')->where([['Cena', ">=", $cena_min], ['Cena', "<=", $cena_max], ['Lastminute', "=", 1]])->orderBy('ID', 'desc')->skip($od)->take($this->na_stranku)->get();
          } elseif($akce == 1) {
             $dovolene = DB::table('dovolene')->where([['Cena', ">=", $cena_min], ['Cena', "<=", $cena_max], ['Cena_pred', ">", 0]])->orderBy('ID', 'desc')->skip($od)->take($this->na_stranku)->get();
          } else {
            $dovolene = DB::table('dovolene')->where([['Cena', ">=", $cena_min], ['Cena', "<=", $cena_max]])->orderBy('ID', 'desc')->skip($od)->take($this->na_stranku)->get();
          }
        } else {
          $dovolene = DB::table('dovolene')->where('ID_DESTINACE', "=", $id_dest)->orderBy('ID', 'desc')->skip($od)->take($this->na_stranku)->get();
        }
      } else {
         return view('nabidka', $this->VratMenu(1), ['destinace' => $destinace_vse, 'chyba' => "Nebyla nalezena žádná dovolená!", 'stranek' => 0]);
      } 
    
      return view('nabidka', $this->VratMenu(1), ['destinace' => $destinace_vse, 'dovolene' => $dovolene, 'stranek' => $stranky_pocet]);
    }
  }
?>