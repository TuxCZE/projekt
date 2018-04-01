@extends('rozvrzeni.stranka')
@section('content')
  @include('rozvrzeni.banner')

	<!-- banner-bottom -->
	<div class="banner-bottom">
		<!-- container -->
    
		<div class="container">
      
      @if( ! empty($chyba))
      <div id="vrsek_chyba" class="chyba_ramecek">
				{{ $chyba }}
			</div>
      <p>&nbsp;</p>
      @endif
    
			<div class="banner-bottom-info">
				<h3>TOP Nabídka</h3>
			</div>
      
      @for ($sloupce = 0; $sloupce < 3; $sloupce++)
        @if (count($dovolene_top) > ($sloupce * 3))
          <div class="banner-bottom-grids">
            @for ($i = 0; $i < ($sloupce + 1) * 3; $i++)
              @if ($i > count($dovolene_top)-1)
                @break
              @endif
              
                @include('dovolene.top', ['dovolena' => $dovolene_top[$i]])
              
            @endfor
            
            <div class="clearfix"> </div>
          </div>
        @endif
      @endfor
      
		</div>
		<!-- //container -->
	</div>
	<!-- //banner-bottom -->
  
@endsection