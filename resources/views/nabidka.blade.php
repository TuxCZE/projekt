@extends('rozvrzeni.stranka')
@section('content')

  <!-- banner-bottom -->
	<div class="banner-bottom">
		<!-- container -->
		<div class="container">
			<div class="faqs-top-grids">
				<div class="product-grids">
					<div class="col-md-3 product-left">
          {{ Form::open(array('url' => '/nabidka')) }}
            <div class="h-class">
							<h5>Destinace</h5>
              
              @foreach ($destinace as $polozka_dest)
                <div class="hotel-price">
								<label class="check">                          
                    <input type="radio" name="destinace_id" value="{{ $polozka_dest->ID }}" data-track="HOT:SR:Area"> 
									<span class="p-day-grid">{{ $polozka_dest->Nazev }}</span>
								</label>
							</div>
              @endforeach
						</div>
            
						<div class="h-class p-day">
							<h5>Minimální cena</h5>
							<div class="hotel-price">
								<label class="check">
									<input type="Text" name="cena_min" value="0">
									<span class="p-day-grid">Kč</span>
								</label>
							</div>
						</div>
            
            <div class="h-class p-day">
							<h5>Maximální cena</h5>
							<div class="hotel-price">
								<label class="check">
									<input type="Text" name="cena_max" value="-1">
									<span class="p-day-grid">Kč</span>
								</label>
							</div>
						</div>
            
						<div class="h-class p-day">
							<h5>Ostatní</h5>
							<div class="hotel-price">
								<label class="check">
									<input type="checkbox" name="akce" value="1">
									<span class="p-day-grid">Akce</span>
								</label>
							</div>
							<div class="hotel-price">
								<label class="check">
									<input type="checkbox" name="lm" value="1">
									<span class="p-day-grid">Last minute</span>
								</label>
							</div>
						</div>
            
            <div class="h-class p-day">
              	<div class="hotel-price">
								<span><input type="Submit" value="Vyhledat"></span>
							</div>
            </div>
            {{ Form::close() }}
					</div>
          
					<div class="col-md-9 product-right">
            @isset($dovolene)
              @foreach ($dovolene as $dovolena)
                <div class="product-right-grids">
  							<div class="product-right-top">
  								<div class="p-left">
  									<div class="p-right-img">
  										<a href="p-single.html"> </a>
  									</div>
  								</div>
  								<div class="p-right">
  									<div class="col-md-6 p-right-left">
  										<a href="p-single.html">{{ $dovolena->Titulek }}</a>
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
              <h3>{{ $chyba }}</h3>
            @endisset
            
            @if ($stranek >0)
              <div id="strankovani">
                @for ($i = 1; $i <= $stranek; $i++)
                  <a href="#">{{ $i }}</a>
                @endfor
              </div>
            @endif
					</div>
					<div class="clearfix"> </div>
				</div>
			</div>
		</div>
		<!-- //container -->
	</div>
	<!-- //banner-bottom -->
  
@endsection