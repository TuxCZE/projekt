@extends('rozvrzeni.stranka')
@section('content')
  @include('rozvrzeni.menu')

 <div id="main">
    <div class="head">
       <div class="obsah box-solutions left">
        <div class="nastred">
          <h1>{{$program_info[0]->nazev}}</h1>
          <p>&nbsp;</p>
          @if ($nazev_url === "remote-control")
            <img src="/obrazky/rc_vetsi.png">
          @else
            <img src="/obrazky/{{$program_info[0]->obrazek}}" width="350px">
          @endif
          <p>&nbsp;</p>
        
          <p>
          @if ($nazev_url === "remote-control")
            @include('programy.rc')
          @else
            {!!$program_info[0]->cely_popis!!}  
          @endif
          </p>
        </div>
        
        <div class="cl">&nbsp;</div>
        <div class="info">&nbsp;</div>
        <div>&nbsp;</div>
      </div>
        
        <div class="obsah box-solutions left">&nbsp;</div>
    </div>
  </div>
@endsection