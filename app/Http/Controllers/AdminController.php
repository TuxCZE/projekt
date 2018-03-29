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
      
    public function uzivatele($stranka = 1)
    {
      $vysledek = array_merge($this->VratMenu(2), $this->VratObsahTabulky('uzivatele', 'uzivatele', $stranka));
    
      return view("administrace.uzivatele", $vysledek, ['uzivatel' => session("email"), 'pat_text' => ""]);
    }
      
    public function sluzby()
    {
      return view("administrace.sluzby", $this->VratMenu(3), ['uzivatel' => session("email"), 'pat_text' => ""]);
    }
      
    public function kontakt($stranka = 1)
    {
      $vysledek = array_merge($this->VratMenu(4), $this->VratObsahTabulky('kontakt', 'kontakt_zpravy', $stranka));
    
      return view("administrace.kontakt", $vysledek, ['uzivatel' => session("email"), 'pat_text' => ""]);
    }
    
    public function pridaniDovolene()
    {
      $destinace = DB::select('select * from destinace ORDER BY ID ASC');
      
      $termin = array();
      $termin[] = date('Y-m-d');
      $termin[] = date('Y-m-d', strtotime($termin[0]. ' + 7 days'));
    
      return view("administrace.dovolena_pridat", $this->VratMenu(1), ['uzivatel' => session("email"), 'pat_text' => "", 'destinace' => $destinace, 'termin' => $termin]);
    }
    
    public function pridejDovolenou()
    {
      $umisteni_nahrani = "/images/"; 
      
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
      }
    }
  }
?>