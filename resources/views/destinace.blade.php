@extends('rozvrzeni.stranka')
@section('content')
  
  <!-- banner-bottom -->
	<div class="banner-bottom">
		<!-- container -->
		<div class="container">
			<div class="banner-bottom-info">
				<h3>Destinace</h3>
			</div>
			<div class="banner-bottom-grids">
				<div class="col-md-4 banner-bottom-grid">
					<div class="top-destinations-grids">
						<div class="top-destinations-info">
							<h4>Náhodné nabídky</h4>
						</div>
            
						<div class="top-destinations-bottom">
              @foreach ($dovolene_rand as $dov_polozka)
                <div class="td-grids">
  								<div class="col-xs-3 td-left"><img src="images/t1.jpg" alt=""></div>
                  
  								<div class="col-xs-7 td-middle">
  									<a href="/dovolena/{{ $dov_polozka->Seo_url }}">{{ $dov_polozka->Titulek }}</a>
  									<p>{{ $dov_polozka->Popisek_kratky }}</p>
  									<span class="glyphicon glyphicon-star" aria-hidden="true"></span> <span class="glyphicon glyphicon-star" aria-hidden="true"></span> <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
  								</div>
                  
  								<div class="clearfix"> </div>
							 </div>
              @endforeach
						</div>
					</div>
				</div>
        
				<div class="col-md-8 banner-bottom-grid holidays-bottom-grid">
					<div class="holidays-grids">
						<div class="holidays-info">
							<h4>Místa, kam se s námi můžete podívat</h4>
						</div>
            
						<div class="holidays-grid">
							<a href="products.html"><img src="images/h5.jpg" alt="" /></a>
						</div>
					</div>
          
					<div class="holidays-top-grids">
						<div class="col-md-6 holidays-top-grid">
							<a href="products.html"><img src="images/h2.jpg" alt="" /></a>
						</div>
            
						<div class="col-md-6 holidays-top-grid">
							<a href="products.html"><img src="images/a4.jpg" alt="" /></a>
						</div>
						<div class="clearfix"> </div>
					</div>
          
					<div class="holidays-top-grids">
						<div class="col-md-6 holidays-top-grid">
							<a href="products.html"><img src="images/a2.jpg" alt="" /></a>
						</div>
						<div class="col-md-6 holidays-top-grid">
							<a href="products.html"><img src="images/h1.jpg" alt="" /></a>
						</div>
						<div class="clearfix"> </div>
					</div>
          
					<div class="holidays-grid">
						<a href="products.html"><img src="images/h5.jpg" alt="" /></a>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
		<!-- //container -->
	</div>
	<!-- //banner-bottom -->
  
@endsection