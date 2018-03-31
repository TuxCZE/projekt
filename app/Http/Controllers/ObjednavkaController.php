<?php
  namespace App\Http\Controllers;
  
  use Illuminate\Support\Facades\DB;
  use App\Menu;
  use App\Dovolene;
  use App\User;
  
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
                        
      //Předvyplnění údajů, pokud je uživatel přihlášený           
      $data = array();
      if(session("email") != ""){
        $uzivatel = User::where('email', "=", session("email"))->get()[0];
        
        $data[0] = $uzivatel["Jmeno"]; 
        $data[1] = $uzivatel["Prijmeni"]; 
        $data[2] = $uzivatel["Email"]; 
        $data[3] = $uzivatel["Telefon"]; 
      } else {
        $data[0] = ""; 
        $data[1] = ""; 
        $data[2] = ""; 
        $data[3] = "";  
      }
    
      return view('dovolene.objednavka', $this->VratMenu(1), ['dovolena_vybrana' => $dovolena, 'uziv_data' => $data]);
    }
    
    public function zpracuj($id)
    {
      if(isset($_POST["obj_jmeno"]))
      {
         $jmeno = $_POST["obj_jmeno"];
         $prijmeni = $_POST["obj_prijmeni"];
         $telefon = $_POST["obj_telefon"];
         $email = $_POST["obj_email"];
         
         $ulice = $_POST["obj_ulice"];
         $mesto = $_POST["obj_mesto"];
         $psc = $_POST["obj_psc"];
         
         $dospeli = $_POST["obj_dospeli"];
         $deti = $_POST["obj_deti"];
         $pokoje = $_POST["obj_pokoje"];
      }
    }
  }
?>