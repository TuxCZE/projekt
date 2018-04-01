<?php
  namespace App\Http\Controllers;
  
  use Illuminate\Support\Facades\DB;
  use App\Menu;
  use App\Dovolene;
  
  class HledaniController extends Controller
  {
    private $na_stranku = 10;
  
    public function VratMenu($id_vybrane)
    {
      $menu = Menu::all();
      
      return ['menu' => $menu, 'menu_vybrane' => $id_vybrane];
    }
    
    private function zobrazChybu($text)
    {
      $destinace_vse = DB::select('select * from destinace ORDER BY ID ASC');
      $dovolene = Dovolene::select()->orderByRaw('(Cena_pred - Cena) DESC')->take(9)->get();
      
      return view('uvod', $this->VratMenu(0), ['dovolene_top' => $dovolene, 'destinance_vse' => $destinace_vse, 'chyba' => $text]);
    }
  
    public function zadani()
    {
      if(isset($_POST["hledat_pokoju"])){
        $zeme = $_POST["hledat_zem"]; 
      
        $datum_od = $_POST["hledat_od"]; 
        $datum_do = $_POST["hledat_do"]; 
      
        $dospeli = $_POST["hledat_dospeli"]; 
        $deti = $_POST["hledat_deti"]; 
        $pokoju = $_POST["hledat_pokoju"]; 
        
        if($datum_od != ""){
          if($datum_do != ""){
            return redirect('/hledat/' . $zeme . '/' . $datum_od . '/' . $datum_do . '/' . $dospeli . '-' . $deti . '-' . $pokoju);  
          } else return $this->zobrazChybu("Položka 'Termín DO' není vyplněná!");
        } else return $this->zobrazChybu("Položka 'Termín OD' není vyplněná!");
      } else return redirect('/');  
    }
    
    public function zobrazVysledek($destinace, $od, $do, $dospeli, $deti, $pokoju, $stranka = 1)
    {
       $destinace_id = DB::table('destinace')->where('Seo_url', "=", $destinace)->pluck("ID")[0];
    
       $dovolene = Dovolene::where([
        ['ID_DESTINACE', "=", $destinace_id],
        ['Termin_od', ">=", $od],
        ['Termin_do', "<=", $do]  
       ])->get();
       $dovolene_celkem = count($dovolene);
       $stranky_pocet = ceil($dovolene_celkem / $this->na_stranku);
       
       if($stranka < 0 || $stranka > $stranky_pocet) $stranka = 1;
       $od = ($stranka - 1) * $this->na_stranku;   
       
       $dovolene_obsah = Dovolene::where([
         ['ID_DESTINACE', "=", $destinace_id],
         ['Termin_od', ">=", $od],
         ['Termin_do', "<=", $do]   
       ])->orderBy('ID', 'desc')->skip($od)->take($this->na_stranku)->get(); 
       
       return view('ostatni.hledani', $this->VratMenu(1), ['max_stranek' => $stranky_pocet, 'nalezene' => $dovolene_obsah]);
    }
  }
?>