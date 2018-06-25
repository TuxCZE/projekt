<?php
  namespace App\Http\Controllers;

  use Illuminate\Support\Facades\DB;

  class AdminController extends Controller
  {
    private $na_stranku = 10;

    public function VratMenu($id_vybrane)
    {
      $menu = DB::select('select * from admin_menu ORDER BY ID ASC');

      return ['menu' => $menu, 'menu_vybrane' => $id_vybrane];
    }

    public function index()
    {

    }

    public function prihlaseni()
    {
       if(session('email') != ""){
        return redirect('/administrace/uvod');
      } else return redirect('/');
    }

    public function uvod()
    {
      $info = array();
      $info[] = DB::table('dovolene')->count();
      $info[] = DB::table('uzivatele')->count();
      $info[] = DB::table('uzivatele')->where('Aktivovan', "=", 1)->count();
      $info[] = DB::table('objednavky')->count();

      return view("administrace.uvod", $this->VratMenu(0), ['uzivatel' => session("email"), 'pat_text' => "", 'info' => $info]);
    }

    public function VratObsahTabulky($nazev, $nazev_prommene, $stranka)
    {
      $obsah_celkem =  DB::table($nazev)->count();
      $stranky_pocet = ceil($obsah_celkem / $this->na_stranku);

      if($stranka < 0 || $stranka > $stranky_pocet) $stranka = 1;
      $od = ($stranka - 1) * $this->na_stranku;

      $obsah = DB::table($nazev)->orderBy('ID', 'desc')->skip($od)->take($this->na_stranku)->get();

      return ['max_stranek' => $stranky_pocet, $nazev_prommene => $obsah];
    }

    public function dovolene($stranka = 1)
    {
      $vysledek = array_merge($this->VratMenu(1), $this->VratObsahTabulky('dovolene', 'dovolene', $stranka));

      $paticka_text = "Přidat novou dovolenou";
      $paticka_odkaz = "/administrace/dovolene/pridat";

      return view("administrace.dovolene", $vysledek, ['uzivatel' => session("email"),  'pat_text' => $paticka_text, 'pat_odkaz' => $paticka_odkaz]);
    }

    public function objednavky($stranka = 1)
    {
      $vysledek = array_merge($this->VratMenu(5), $this->VratObsahTabulky('objednavky', 'objednavky', $stranka));

      return view("administrace.objednavky", $vysledek, ['uzivatel' => session("email"),  'pat_text' => '', 'pat_odkaz' => '']);
    }

    public function uzivatele($stranka = 1)
    {
      $vysledek = array_merge($this->VratMenu(2), $this->VratObsahTabulky('uzivatele', 'uzivatele', $stranka));

      return view("administrace.uzivatele", $vysledek, ['uzivatel' => session("email"), 'pat_text' => ""]);
    }

    public function UpravUzivatele($ID)
    {

    }

    public function SmazUzivatele($ID)
    {
      $smazani = array();
      $smazani[] = "Administrace - Smazání uživatele";
      $smazani[] = "Opravdu chcete smazat uživatele s ID " . $ID . "?";
      $smazani[] = "/administrace/uzivatele/smaz/" . $ID;

      return view("administrace.smazani", $this->VratMenu(2), ['uzivatel' => session("email"), 'pat_text' => "", 'smazani' => $smazani]);
    }

    public function sluzby()
    {
      $sluzby_text = DB::table("jednostrankove")->where('Nazev', "=", "sluzby")->get()[0];

      return view("administrace.sluzby", $this->VratMenu(3), ['uzivatel' => session("email"), 'pat_text' => "", 'sluzby_text' => $sluzby_text->Text]);
    }

    public function upravSluzby()
    {
      $text = $_POST["sluzby_text"];

      if(strlen($text) > 10){
         DB::table("jednostrankove")->where('Nazev', "=", "sluzby")->update([
          'Nazev' => "sluzby",
          'Text' => $text]);

          return redirect('/administrace/sluzby');
      }
    }

    public function kontakt($stranka = 1)
    {
      $vysledek = array_merge($this->VratMenu(4), $this->VratObsahTabulky('kontakt', 'kontakt_zpravy', $stranka));

      return view("administrace.kontakt", $vysledek, ['uzivatel' => session("email"), 'pat_text' => ""]);
    }

    public function zobrazKontakt($ID)
    {
      $kontakt = DB::table("kontakt")->where('ID', "=", $ID)->get()[0];

      return view("administrace.kont_zobraz", $this->VratMenu(4), ['uzivatel' => session("email"), 'pat_text' => "", 'kontakt' => $kontakt]);
    }

    public function smazKontakt($ID)
    {
      $smazani = array();
      $smazani[] = "Administrace - Smazání zprávy";
      $smazani[] = "Opravdu chcete smazat zprávu s ID " . $ID . "?";
      $smazani[] = "/administrace/kontakt/smaz/" . $ID;

      return view("administrace.smazani", $this->VratMenu(4), ['uzivatel' => session("email"), 'pat_text' => "", 'smazani' => $smazani]);
    }

    public function pridaniDovolene()
    {
      $destinace = DB::select('select * from destinace ORDER BY ID ASC');

      $termin = array();
      $termin[] = date('Y-m-d');
      $termin[] = date('Y-m-d', strtotime($termin[0]. ' + 7 days'));

      return view("administrace.dovolena_pridat", $this->VratMenu(1), ['uzivatel' => session("email"), 'pat_text' => "", 'destinace' => $destinace, 'termin' => $termin]);
    }

    private function GenerujSoubor()
    {
       $pridane = array("su", "pr", "br", "lu", "va", "sr", "nu", "jj", "qs", "sd", "bf", "zg", "jh");
       $vysledek = $pridane[rand(0, count($pridane) - 1)];
       $vysledek = $vysledek . rand(0, 99);

       return $vysledek;
    }

    public function pridejDovolenou()
    {
      $umisteni_nahrani = "images/";

      if(isset($_POST["dov_titulek"])){
        $destinace = $_POST["dov_destinace"];
        $titulek = $_POST["dov_titulek"];
        $seo_url = $_POST["dov_seourl"];

        $kratky_popisek = $_POST["dov_kpopisek"];
        $popisek = $_POST["dov_popisek"];

        $cena = $_POST["dov_cena"];
        $cena_pred = $_POST["dov_cenapred"];

        $dovolena_od = $_POST["dov_od"];
        $dovolena_do = $_POST["dov_do"];

        $pokoj_max = $_POST["dov_maxpokoj"];
        $lastminute = $_POST["dov_lastmin"];

        $pokracovat = true;
        if(getimagesize($_FILES["dov_nahled"]["tmp_name"]) == false) $pokracovat = false;

        for($i=1; $i<6; $i++){
          if(!isset($_FILES["dov_foto" . $i]["tmp_name"])) continue;

          if(getimagesize($_FILES["dov_foto" . $i]["tmp_name"]) == false) $pokracovat = false;
        }

        if($pokracovat){
          for($i=1; $i<6; $i++){
            if(!isset($_FILES["dov_foto" . $i]["tmp_name"])) continue;

            if ($_FILES["dov_foto" . $i]["size"] > 500000) {
              $pokracovat = false;
            }
          }

          if($pokracovat){
            for($i=1; $i<6; $i++){
              $jmeno_souboru = basename($_FILES["dov_foto" . $i]["name"]);
              $info = pathinfo($jmeno_souboru);
              $pripona = $info['extension'];

              $soubor_nazev = date('ymd_His') . $this->GenerujSoubor() . "." . $pripona;
              $cesta_ulozeni = $umisteni_nahrani . $soubor_nazev;

              move_uploaded_file($_FILES["dov_foto" . $i]["tmp_name"], $cesta_ulozeni);
            }
          }
        }
      }
    }

    public function smazatDovolenou($ID)
    {
      $smazani = array();
      $smazani[] = "Administrace - Smazání dovolené";
      $smazani[] = "Opravdu chcete smazat dovolenou s ID " . $ID . "?";
      $smazani[] = "/administrace/dovolene/smaz/" . $ID;

      return view("administrace.smazani", $this->VratMenu(1), ['uzivatel' => session("email"), 'pat_text' => "", 'smazani' => $smazani]);
    }

    public function upravitDovolenou($ID)
    {

    }

    public function smazatObjednavku($ID)
    {
      $smazani = array();
      $smazani[] = "Administrace - Smazání objednávky";
      $smazani[] = "Opravdu chcete smazat objednávku s ID " . $ID . "?";
      $smazani[] = "/administrace/objednavky/smaz/" . $ID;

      return view("administrace.smazani", $this->VratMenu(1), ['uzivatel' => session("email"), 'pat_text' => "", 'smazani' => $smazani]);
    }
  }
?>
