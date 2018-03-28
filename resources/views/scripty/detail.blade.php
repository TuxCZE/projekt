@extends('rozvrzeni.stranka')
@section('content')
   @include('rozvrzeni.menu')
    <div id="main">
      <div class="head">
         <div class="obsah box-solutions left">
          <div class="nastred">
            <h1>{{$kategorie_nazev[0]}}</h1>
            <p>&nbsp;</p>
            
            <div class="cl cara">&nbsp;</div>
            
            @if (count($scripty) == 0)
              <p>&nbsp;</p>
              <h3><font color="red"><strong>V této kategorii nebyl zatím přidán žádný script!</strong></font></h3>
            @endif
                              
            <table width="100%">
              @for ($i = 0; $i < count($scripty); $i+=2)
                <tr>
                  @include('scripty.script_polozka', ['script_info' => $scripty[$i]])
                  
                  @if ($i+1 < count($scripty))
                    @include('scripty.script_polozka', ['script_info' => $scripty[$i+1]]) 
                  @endif
                </tr>  
                
                <tr><td colspan="2">&nbsp;</td></tr>  
              @endfor
            </table>
            
            <p id="mezera_scripty">&nbsp;</p>
            
             <div id="scripty">         
               @for ($i = 1; $i <= $scr_stranek; $i++)
                <a href="/scripty/{{$kat_url}}/{{$i}}" class="vybrane">{{$i}}</a>
               @endfor
             </div>
          </div>
          
          <div class="cl">&nbsp;</div>
          <div class="info">&nbsp;</div>
          <div>&nbsp;</div>
        </div>
          
          <div class="obsah box-solutions left">&nbsp;</div>
      </div>
    </div>
@endsection