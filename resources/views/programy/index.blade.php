@extends('rozvrzeni.stranka')
@section('content')
  @include('rozvrzeni.menu')

<div id="main">
    <div class="head">
      <div class="obsah box-solutions left">
        <div class="nastred">
          <h1>Programy ke stažení</h1>
          <p>&nbsp;</p>
        
          <table width="100%">
            <tr>
              @foreach ($programy as $program)
                <td width="49%" style="border-right: 1px solid #414141;">
                  <h2>{{$program->nazev}}</h2>
                  <span><img src="http://naprogramujeme.eu/obrazky/{{$program->obrazek}}" height="190px" width="351px"></span>
                  <span>&nbsp;</span>
                  
                  <p>{{$program->kratky_popis}}</p>
                  <p>&nbsp;</p>
                  
                  <h3><a href="/program/{{$program->furl}}">Více informací</a> / <a href="/stazeni/{{$program->soubor}}">Stáhnout</a></h3>
                </td>
              @endforeach 
            </tr>
          </table>
        </div>
        
        <div class="cl cara">&nbsp;</div>
        <div class="info">&nbsp;</div>
        <div>&nbsp;</div>
      </div>
        
        <div class="obsah box-solutions left">&nbsp;</div>
        
        <div class="obsah box-solutions left">
        <div class="nastred">
          <table width="100%">
            <tr>
             @foreach ($programy2 as $program)
                <td width="49%" style="border-right: 1px solid #414141;">
                  <h2>{{$program->nazev}}</h2>
                  <span><img src="http://naprogramujeme.eu/obrazky/{{$program->obrazek}}" height="190px" width="351px"></span>
                  <span>&nbsp;</span>
                  
                  <p>{{$program->kratky_popis}}</p>
                  <p>&nbsp;</p>
                  
                  <h3><a href="/program/{{$program->furl}}">Více informací</a> / <a href="/stazeni/{{$program->soubor}}">Stáhnout</a></h3>
                </td>
              @endforeach 
            </tr>
          </table>
        </div>
        
        <div class="cl cara">&nbsp;</div>
        <div class="info">&nbsp;</div>
        <div>&nbsp;</div>
      </div>
    </div>
    
    <p>&nbsp;</p>
    
    <div id="strankovani">  
      @for ($i = 1; $i <= $stranek; $i++)
        <a href="{{ $i }}" class="vybrane">{{ $i }}</a>
      @endfor
    </div>
    
  </div>
@endsection