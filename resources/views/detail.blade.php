@extends('rozvrzeni.stranka')
@section('content')

<!-- banner-bottom -->
	<div class="banner-bottom">
		<!-- container -->
		<div class="container">
			<div class="faqs-top-grids">
				<!--single-page-->
				<div class="single-page">
						<div class="col-md-8 single-gd-lt">
							<div class="single-pg-hdr">
								<h2>{{ $dovolena->Titulek }}</h2>
								<p>{{ $dovolena->Popisek_kratky }}</p>
							</div>
              
							<div class="flexslider">
											<ul class="slides">
												<li data-thumb="/images/p1.jpg">
													<img src="/images/p1.jpg" alt=""/>
												</li>
												<li data-thumb="/images/p2.jpg">
													<img src="/images/p2.jpg" alt=""/>
												</li>
												<li data-thumb="/images/p3.jpg">
													<img src="/images/p3.jpg" alt=""/>
												</li>
												<li data-thumb="/images/p4.jpg">
													<img src="/images/p4.jpg" alt=""/>
												</li>
												<li data-thumb="/images/p1.jpg">
													<img src="/images/p1.jpg" alt=""/>
												</li>
												<li data-thumb="/images/p2.jpg">
													<img src="/images/p2.jpg" alt=""/>
												</li>
												<li data-thumb="/images/p3.jpg">
													<img src="/images/p3.jpg" alt=""/>
												</li>
												<li data-thumb="/images/p4.jpg">
													<img src="/images/p4.jpg" alt=""/>
												</li>
												<li data-thumb="/images/p1.jpg">
													<img src="/images/p1.jpg" alt=""/>
												</li>
												<li data-thumb="/images/p2.jpg">
													<img src="/images/p2.jpg" alt=""/>
												</li>
												<li data-thumb="/images/p3.jpg">
													<img src="/images/p3.jpg" alt=""/>
												</li>
												<li data-thumb="/images/p4.jpg">
													<img src="/images/p4.jpg" alt=""/>
												</li>
												<li data-thumb="/images/p1.jpg">
													<img src="/images/p1.jpg" alt=""/>
												</li>
												<li data-thumb="/images/p2.jpg">
													<img src="/images/p2.jpg" alt=""/>
												</li>
												<li data-thumb="/images/p3.jpg">
													<img src="/images/p3.jpg" alt=""/>
												</li>
												<li data-thumb="/images/p4.jpg">
													<img src="/images/p4.jpg" alt=""/>
												</li>
												<li data-thumb="/images/p1.jpg">
													<img src="/images/p1.jpg" alt=""/>
												</li>
												<li data-thumb="/images/p2.jpg">
													<img src="/images/p2.jpg" alt=""/>
												</li>
												<li data-thumb="/images/p3.jpg">
													<img src="/images/p3.jpg" alt=""/>
												</li>
											</ul>
							</div>
										<!-- FlexSlider -->
									<script defer src="js/jquery.flexslider.js"></script>
										<script>
										// Can also be used with $(document).ready()
										$(window).load(function() {
										  $('.flexslider').flexslider({
											animation: "slide",
											controlNav: "thumbnails"
										  });
										});
										</script>

						</div>
						<div class="col-md-4 single-gd-rt">
							<div class="spl-btn">
								<div class="spl-btn-bor">
									<a href="#">
										<span class="glyphicon glyphicon-tag" aria-hidden="true"></span>											
									</a>
									<p>Objednávka</p>	
									<script>
										$(document).ready(function(){
										$('[data-toggle="tooltip"]').tooltip();   
										});
									</script>
								</div>
								<div class="sp-bor-btn text-right">
                  @if ($dovolena->Cena_pred > 0)
                    <h4><span>{{ $dovolena->Cena_pred }} Kč</span> {{ $dovolena->Cena }} Kč</h4>
                  @else
                    <h4>{{ $dovolena->Cena }} Kč</h4>
                  @endif
									<p class="best-pri">Nejlepší cena</p>
									<a class="best-btn" href="/objednat/{{ $dovolena->ID }}">Objednat</a>
								</div>
							</div>
              
							<div class="other-comments">
								<div class="comments-bot">
									<p>{!! $dovolena->Popisek !!}</p>
								</div>
							</div>
						</div>
						<div class="clearfix"></div>
				</div>
				<!--//single-page-->
			</div>
		</div>
		<!-- //container -->
	</div>
	<!-- //banner-bottom -->
  
@endsection