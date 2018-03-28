@extends('rozvrzeni.stranka')
@section('content')
  @include('rozvrzeni.menu')
  
<div id="main">
    <div class="head">
      <div class="obsah box-solutions left">
        <div class="nastred">
          <h1>Články <?php if(isset($cl_kat_nazev)) echo " - " . $cl_kat_nazev;?></h1>
          <p>&nbsp;</p>
        </div>
        
        <div class="cl cara">&nbsp;</div>
      </div>
        
        <div class="obsah box-solutions left">&nbsp;</div>
        
        <div class="obsah box-solutions left">
        <div class="nastred">
              <div id="clanky_l_panel">   
                <div id="levy_odshora">
                  @isset($clanky)
                    @foreach ($clanky as $clanek)   
                      <div class="clanek_vrsek panel_vrsek">{{$clanek->Titulek}}</div>
                      <div class="clanek_obsah">
                        <div class="clanek_obsah_t">Napsal: <font color="red">{{$clanek->Autor}}</font> <span class="vpravo">{{$clanek->Datum}}</span></div>
                        <p class="mezera">{{$clanek->Text_nahled}}</p>
                        
                        <div class="zvice_stred"><a href="/clanek/{{$clanek->ID}}-{{$clanek->SEO_url}}" class="zobrazit_vice">Zobrazit více</a></div>
                      </div>
                      
                      <p>&nbsp;</p>
                    @endforeach
                  @endisset  
                 
                  @isset($chyba) 
                    <h3><font color="red"><strong>{{$chyba}}</strong></font></h3>
                  @endisset  
                  
                  <div id="scripty">
                     @for ($i = 1; $i <= $stranky_pocet; $i++)
                      <a href="/clanky/<?php echo $str_url;?>{{$i}}" class="vybrane">{{$i}}</a>
                     @endfor
                  </div>
                </div>
              </div>
                
              <div id="clanky_p_panel">
                <div id="pravy_odshora">
                  <div class="panel_vrsek">Kategorie</div>
                  
                  <div id="lmenu_obsah">
                    <ul>
                      <li><a href="/clanky/programovani">Programování</a></li>
                      <li><a href="/clanky/bezpecnost">IT Bezpečnost</a></li>
                      <li><a href="/clanky/unityengine">Unity engine</a></li>
                      <li><a href="/clanky/ostatni">Ostatní</a></li>
                    </ul>
                  </div>
                </div>
              </div>
        </div>
        
        <div class="obsah box-solutions left">&nbsp;</div>
        
        <div class="info">&nbsp;</div>
        <div>&nbsp;</div>
      </div>
    </div>
    
    <p>&nbsp;</p>
  </div>
@endsection