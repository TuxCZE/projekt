@extends('rozvrzeni.stranka')
@section('content')

  <!-- banner-bottom -->
	<div class="banner-bottom">
		<!-- container -->
		<div class="container">
      <h3>Hledání - výsledky</h3>
    
			<div class="faqs-top-grids terms-grids">
				 <div class="opinion">	
            @if (count($nalezene) > 0)
              @foreach ($nalezene as $dovolena)   
                <div class="product-right-grids">
  							<div class="product-right-top">
  								<div class="p-left">
  									<div class="p-right-obrazek">
  										<a href="/dovolena/{{ $dovolena->Seo_url }}"><img src="/images/{{ $dovolena->Obrazek }}" width="234px" height="155px"></a>
  									</div>
  								</div>
                  
  								<div class="p-right">
  									<div class="col-md-6 p-right-left">
  										<a href="/dovolena/{{ $dovolena->Seo_url }}">{{ $dovolena->Titulek }}</a>
  										<div class="p-right-price">
  											<span class="glyphicon glyphicon-star" aria-hidden="true"></span>
  											<span class="glyphicon glyphicon-star" aria-hidden="true"></span>
  											<span class="glyphicon glyphicon-star" aria-hidden="true"></span>
  											<span class="glyphicon glyphicon-star" aria-hidden="true"></span>
  										</div>
  										<p>{{ $dovolena->Popisek_kratky }}</p>
  									</div>
                    
  									<div class="col-md-6 p-right-right">
  										<h6>Cena : {{ $dovolena->Cena }} Kč</h6>
  										@if ($dovolena->Cena_pred > 0)
                        <span class="p-last-price">{{ $dovolena->Cena_pred }} Kč</span>
                      @endif
  									</div>
  									<div class="clearfix"> </div>
  								</div>
  								<div class="clearfix"> </div>
  							</div>	
               </div>  
              @endforeach
            @else
              <div id="vrsek_chyba">Nebyly nalezeny žádné dovolené odpovídající zvoleným kritériím!</div>
            @endif
            
            @if ($max_stranek > 0)
              <div id="strankovani">
                @for ($i = 1; $i <= $max_stranek; $i++)
                  <a href="#">{{ $i }}</a>
                @endfor
              </div>
            @endif
					<div class="clearfix"> </div>
				</div>
			</div>
		</div>
		<!-- //container -->
	</div>
	<!-- //banner-bottom -->
  
@endsection