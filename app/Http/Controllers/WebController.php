<?php
  namespace App\Http\Controllers;

  use Illuminate\Support\Facades\DB;
  use App\Dovolene;
  use App\Menu;
  use App\User;
  use App\Objednavky;

  class WebController extends Controller
  {
    private $na_stranku = 10;

    public function VratMenu($id_vybrane)
    {
      $menu = Menu::all();

      return ['menu' => $menu, 'menu_vybrane' => $id_vybrane];
    }

    public function index()
    {
        $destinace_vse = DB::select('select * from destinace ORDER BY ID ASC');
        $dovolene = Dovolene::select()->orderByRaw('(Cena_pred - Cena) DESC')->take(9)->get();

        $datum = array();
        $datum[] = date('Y-m-d');
        $datum[] = date('Y-m-d', strtotime($datum[0] . ' - 14 days'));

        return view('uvod', $this->VratMenu(0), ['dovolene_top' => $dovolene, 'destinance_vse' => $destinace_vse, 'datum' => $datum]);
    }

    public function destinace()
    {
      $destinace_vse = DB::select('select * from destinace ORDER BY ID ASC');
      $dovolene_nahoda = DB::select('SELECT * FROM dovolene ORDER BY RAND() LIMIT 10');

      return view('destinace', $this->VratMenu(2), ['destinance_vse' => $destinace_vse, 'dovolene_rand' => $dovolene_nahoda]);
    }

    public function sluzby()
    {
      return view('sluzby', $this->VratMenu(2));
    }

    public function kontakt()
    {
      return view('kontakt', $this->VratMenu(3), ['chyba' => '']);
    }

    public function KontaktChyba($text){ return view('kontakt', $this->VratMenu(3), ['chyba' => $text]); }

    public function kontaktZpracuj()
    {
      $jmeno = $_POST["kontakt_jmeno"];
      $prijmeni = $_POST["kontakt_prijmeni"];
      $email = $_POST["kontakt_email"];
      $telefon = $_POST["kontakt_telefon"];
      $zprava = $_POST["kontakt_zprava"];

      if(strlen($jmeno) > 2){
        if(strlen($prijmeni) > 2){
          if($this->JeEmailDobre($email)){
            if($this->JeTelDobre($telefon)){
              if(strlen($zprava) > 4){
                $IP = $_SERVER['REMOTE_ADDR'];
                $odeslano = date("Y-m-d H:i:s");

                DB::insert('insert into kontakt (ID, Telefon, Jmeno, Prijmeni, Text, Odeslano, IP, Email) values (?, ?, ?, ?, ?, ?, ?, ?)',
                [0, $telefon, $jmeno, $prijmeni, $zprava, $odeslano, $IP, $email]);

                return $this->KontaktChyba('Zpráva byla úspěšně odeslána!');
              } else return $this->KontaktChyba('Zpráva je příliš krátká!');
            } else return $this->KontaktChyba('Telefon nemá správný formát! (+420 xxxxxxxxx)');
          } else return $this->KontaktChyba('Email nemá správný formát! (neco@domena)');
        } else return $this->KontaktChyba('Zadané příjmení je příliš krátké!');
      } else return $this->KontaktChyba('Zadané jméno je příliš krátké!');
    }

    public function regform()
    {
      return view('registrace', $this->VratMenu(0));
    }

    public function logForm()
    {
      return view('prihlaseni', $this->VratMenu(0));
    }

    public function ucet()
    {
      $uzivatel_data = User::where('Email', "=", session("email"))->get()[0];
      $objednavky_uzivatel = count(Objednavky::where('ID_uzivatele', "=", $uzivatel_data->ID)->pluck("ID"));

      return view('ucet', $this->VratMenu(0), ['uziv_data' => $uzivatel_data, 'pocet_objednavek' => $objednavky_uzivatel]);
    }

    public function ucetObjednavky($stranka = 1)
    {
      $id = User::where('Email', "=", session("email"))->pluck("ID");

      $objednavky = Objednavky::where('ID_uzivatele', "=", $id)->get();
      $objednavky_celkem = count($objednavky);
      $stranky_pocet = ceil($objednavky_celkem / $this->na_stranku);

       if($stranka < 0 || $stranka > $stranky_pocet) $stranka = 1;
       $od = ($stranka - 1) * $this->na_stranku;

       $objednavky = Objednavky::where('ID_uzivatele', "=", $id)->skip($od)->take($this->na_stranku)->get();

      return view('ucet.objednavky', $this->VratMenu(0), ['uziv_objednavky' => $objednavky, 'max_stranek' => $stranky_pocet]);
    }

    public function ucetEditace()
    {
      return view('ucet.editace', $this->VratMenu(0));
    }

    /*
      ZPRACOVÁNÍ FORMULÁŘE Z ÚVODNÍ STRÁNKY
    */
    public function hledanidovolene()
    {
    }

    public function Prihlaseni()
    {
      if(isset($_POST["log_email"])){
        $email = $_POST["log_email"];
        $heslo = $_POST["log_heslo"];

        if($this->JeEmailDobre($email)){
          if(strlen($heslo) > 4){
            $heslo = "l1" . sha1($heslo . "47") . "web";

            $udaje_kontrola = DB::table('uzivatele')->where([['Email', "=" , $email], ['Heslo', "=", $heslo]])->count();

            if($udaje_kontrola > 0){
               $prava = DB::table('uzivatele')->where('Email', "=" , $email)->pluck('Prava')[0];

               session(['email' => $email, 'hash' => $heslo, 'prava' => $prava]);
               return redirect('/ucet');
            } else return $this->LogChyba("Zadané údaje nejsou správné!");
          } else return $this->LogChyba("Zadaná heslo je příliš krátké! Musí obsahovat minimálně 4 znaky!");
        } else return $this->LogChyba("Chybně vyplněná položka email! (Email nemá správný formát - neco@domena)");
      }
    }

    private function LogChyba($text)
    {
      return view('prihlaseni', $this->VratMenu(0), ['chyba' => $text]);
    }

    private function RegChyba($text)
    {
      return view('registrace', $this->VratMenu(0), ['chyba' => $text]);
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

    public function Registrace()
    {
      if(isset($_POST["reg_jmeno"])){
        $jmeno = $_POST["reg_jmeno"];
        $prijmeni = $_POST["reg_prijmeni"];
        $telefon = $_POST["reg_telefon"];
        $email = $_POST["reg_email"];

        $heslo = $_POST["reg_heslo"];
        $heslo2 = $_POST["reg_heslo2"];

        if(strlen($jmeno) > 2){
          if(strlen($prijmeni) > 2){
            if($this->JeTelDobre($telefon)){
              if($this->JeEmailDobre($email)){
                if($heslo == $heslo2){
                  if(strlen($heslo) > 4){
                    $email_kontrola = DB::table('uzivatele')->where('Email', "=" , $email)->count();

                    if($email_kontrola < 1){
                      $tel_kontrola = DB::table('uzivatele')->where('Telefon', "=" , $telefon)->count();

                      if($tel_kontrola < 1){
                        //Pokud je vše dobře vytvoří nový uživatelský účet v DB
                        $heslo = "l1" . sha1($heslo . "47") . "web";
                        $IP = $_SERVER['REMOTE_ADDR'];
                        $datum_reg = date("Y-m-d H:i:s");
                        $kod = substr(md5(uniqid(mt_rand(), true)) , 0, 8);

                        //Při výchozím nastavení je účet automaticky aktivován
                        DB::insert('insert into uzivatele (ID, Jmeno, Prijmeni, Email, Heslo, Telefon, Prava, IP, Datum_registrace, Aktivovan, AktivacniKod) values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)',
                        [0, $jmeno, $prijmeni, $email, $heslo, $telefon, 1, $IP, $datum_reg, 1, $kod]);

                        return $this->RegChyba("Uživatelský účet byl úspěšně vytvořen, můžete se přihlásit!");
                      } else return $this->RegChyba("Zadané telefonní číslo už někdo používá!");
                    } else return $this->RegChyba("Zadanou emailovou adresu už někdo používá!");
                  } else return $this->RegChyba("Zadaná heslo je příliš krátké! Musí obsahovat minimálně 4 znaky!");
                }  else return $this->RegChyba("Zadaná hesla se neshodují!");
              } else return $this->RegChyba("Chybně vyplněná položka email! (Email nemá správný formát - neco@domena)");
            } else return $this->RegChyba("Chybně vyplněná položka telefon! (Číslo nemá správný formát - +420 777 666 555)");
          } else return $this->RegChyba("Chybně vyplněná položka příjmení! (Text je kratrší jak 2 znaky)");
        } else return $this->RegChyba("Chybně vyplněná položka jméno! (Text je kratrší jak 2 znaky)");
      }
    }

    public function odhlasit()
    {
      session()->forget('email');
      session()->forget('hash');
      session()->forget('prava');

      return redirect('/');
    }
  }
?>
