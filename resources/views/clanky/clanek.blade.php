@extends('rozvrzeni.stranka')
@section('content')
  @include('rozvrzeni.menu')
  
<div id="main">
    <div class="head">
      <div class="obsah box-solutions left">
        <div class="nastred">
          <h1>{{$clanek->Titulek}}</h1>
          <p>&nbsp;</p>
        </div>
        
        <div class="cl cara">&nbsp;</div>
      </div>
        
        <div class="obsah box-solutions left">&nbsp;</div>
        
        <div class="obsah box-solutions left">
        <div class="nastred">
          {!!$clanek->Text!!}
        </div>
        
        <div class="obsah box-solutions left">&nbsp;</div>
        
        <div class="info">&nbsp;</div>
        <div>&nbsp;</div>
      </div>
    </div>
    
    <p>&nbsp;</p>
  </div>
@endsection