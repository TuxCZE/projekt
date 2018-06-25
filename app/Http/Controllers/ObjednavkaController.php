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

      return view('dovolene.objednavka', $this->VratMenu(1), ['dovolena_vybrana' => $dovolena, 'uziv_data' => $data, 'zprava' => '']);
    }

    private function JeTelDobre($cislo)
    {
      $pattern = '~^(\+420)? ?\d{3} ?\d{3} ?\d{3}$~';

      if (preg_match($pattern, $cislo)) return true;
      return false;
    }

    private function JeEmailDobre($mail)
    {
      if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) return false;
      return true;
    }

    private function ZpracovaniZprava($dovolena, $data, $text)
    {
      return view('dovolene.objednavka', $this->VratMenu(1), ['dovolena_vybrana' => $dovolena, 'uziv_data' => $data, 'zprava' => $text]);
    }

    public function zpracuj($id)
    {
      $dovolena = Dovolene::where('ID', "=", $id)->get()[0];

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

         $data = array();
         if(session("email") != ""){
           $uzivatel = User::where('email', "=", session("email"))->get()[0];
           $uzivatel_id = $uzivatel["ID"];

           $data[0] = $uzivatel["Jmeno"];
           $data[1] = $uzivatel["Prijmeni"];
           $data[2] = $uzivatel["Email"];
           $data[3] = $uzivatel["Telefon"];
         } else {
           $uzivatel_id = "0";

           $data[0] = "";
           $data[1] = "";
           $data[2] = "";
           $data[3] = "";
         }

         if(strlen($jmeno) > 2){
           if(strlen($prijmeni) > 2){
             if($this->JeTelDobre($telefon)){
               if($this->JeEmailDobre($email)){
                 if(strlen($ulice) > 2){
                   if(strlen($mesto) > 2){
                     if(strlen($psc) >= 5){
                       if($dospeli > 0){
                        $cena_celk = round($dospeli * $dovolena["Cena"] + $deti * (0.75 * $dovolena["Cena"]));
                        $splatnost = date('Y-m-d', strtotime('-7 day', strtotime($dovolena["Termin_od"])));

                         DB::table('objednavky')->insert([
                             ['ID' => 0,
                             'ID_uzivatele' => $uzivatel_id,
                             'ID_dovolene' => $id,
                             'Jmeno' => $jmeno,
                             'Prijmeni' => $prijmeni,
                             'Ulice' => $ulice,
                             'Mesto' => $mesto,
                             'PSC' => $psc,
                             'Telefon' => $telefon,
                             'Pocet_dospelych' => $dospeli,
                             'Pocet_deti' => $deti,
                             'Cena_celkem' => $cena_celk,
                             'Pokoju' => $pokoje,
                             'Zaplaceno' => 0,
                             'Splatnost' => $splatnost]
                         ]);

                         return $this->ZpracovaniZprava($dovolena, $data, 'Objednávka byla úspěšně odeslána! Celková cena: ' . $cena_celk);
                       } else return $this->ZpracovaniZprava($dovolena, $data, 'Pro odeslání objednávky musí být vybrán alespoň 1 dospělý!');
                     } else return $this->ZpracovaniZprava($dovolena, $data, 'PSČ nemá správný tvar!');
                   } else return $this->ZpracovaniZprava($dovolena, $data, 'Položka město musí být správně vyplněná!');
                 } else return $this->ZpracovaniZprava($dovolena, $data, 'Položka ulice musí být správně vyplněná!');
               } else return $this->ZpracovaniZprava($dovolena, $data, 'Zadaná emailová adresa nemá správný formát! (neco@domena)');
             } else return $this->ZpracovaniZprava($dovolena, $data, 'Zadaný Telefon nemá správný formát! (+420 777 666 555)');
           } else return $this->ZpracovaniZprava($dovolena, $data, 'Položka příjmení musí být správně vyplněná!');
         } else return $this->ZpracovaniZprava($dovolena, $data, 'Položka jméno musí být správně vyplněná!');
      }
    }
  }
?>
