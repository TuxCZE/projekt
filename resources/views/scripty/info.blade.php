@extends('rozvrzeni.stranka')
@section('content')
   @include('rozvrzeni.menu')
   <div id="main">
      <div class="head">
       <div class="obsah box-solutions left">
        <div class="nastred">
          <h1>{{$script->Nazev}}</h1>
          <p>&nbsp;</p>
          
           <div class="cl cara">&nbsp;</div>
            <p>&nbsp;</p>
            
            {!!$script->Popisek!!}
            
            <p>&nbsp;</p>
            <div class="cl cara">&nbsp;</div>
            <p>&nbsp;</p>
            
            <h3 class="stazeni_odsazeni"><a href="/stazeni/{{$script->Soubor}}">Stáhnout</a></h3> 
        </div>
        
        <div class="cl">&nbsp;</div>
        <div class="info">&nbsp;</div>
        <div>&nbsp;</div>
      </div>
        
        <div class="obsah box-solutions left">&nbsp;</div>
    </div>
  </div>
@endsection