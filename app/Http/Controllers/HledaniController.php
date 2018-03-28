<?php
  namespace App\Http\Controllers;
  
  use Illuminate\Support\Facades\DB;
  
  class HledaniController extends Controller
  {
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
          }
        }
      } else return redirect('/');  
    }
    
    public function zobrazVysledek($destinace, $od, $dp, $dospeli, $deti, $pokoju, $stranka = 1)
    {
    }
  }
?>