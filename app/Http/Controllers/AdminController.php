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
      
    public function dovolene($stranka = 1)
    {
      $dovolene_celkem = DB::table('dovolene')->count();
      $stranky_pocet = ceil($dovolene_celkem / $this->na_stranku);
      
      if($stranka < 0 || $stranka > $stranky_pocet) $stranka = 1;
      $od = ($stranka - 1) * $this->na_stranku;   
       
      $dovolene = DB::table('dovolene')->orderBy('ID', 'desc')->skip($od)->take($this->na_stranku)->get(); 
      
      $paticka_text = "Přidat novou dovolenou";
      $paticka_odkaz = "/administrace/dovolene/pridat";
    
      return view("administrace.dovolene", $this->VratMenu(1), ['uzivatel' => session("email"), 'dovolene' => $dovolene, 'pat_text' => $paticka_text, 'pat_odkaz' => $paticka_odkaz,
      'max_stranek' => $stranky_pocet]);
    }
      
    public function uzivatele($stranka = 1)
    {
      $uziv_celkem = DB::table('uzivatele')->count();
      $stranky_pocet = ceil($uziv_celkem / $this->na_stranku);
      
      if($stranka < 0 || $stranka > $stranky_pocet) $stranka = 1;
      $od = ($stranka - 1) * $this->na_stranku; 
      
      $uzivatele = DB::table('uzivatele')->orderBy('ID', 'desc')->skip($od)->take($this->na_stranku)->get(); 
    
      return view("administrace.uzivatele", $this->VratMenu(2), ['uzivatel' => session("email"), 'pat_text' => "", 'uzivatele' => $uzivatele, 'max_stranek' => $stranky_pocet]);
    }
      
    public function sluzby()
    {
      return view("administrace.sluzby", $this->VratMenu(3), ['uzivatel' => session("email"), 'pat_text' => ""]);
    }
      
    public function kontakt($stranka = 1)
    {
      $kontakt_celkem = DB::table('kontakt')->count();                                                        
      $stranky_pocet = ceil($kontakt_celkem / $this->na_stranku);
      
      if($stranka < 0 || $stranka > $stranky_pocet) $stranka = 1;
      $od = ($stranka - 1) * $this->na_stranku; 
      
      $zpravy = DB::table('kontakt')->orderBy('ID', 'desc')->skip($od)->take($this->na_stranku)->get(); 
    
      return view("administrace.kontakt", $this->VratMenu(4), ['uzivatel' => session("email"), 'pat_text' => "", 'kontakt_zpravy' => $zpravy, 'max_stranek' => $stranky_pocet]);
    }
  }
?>