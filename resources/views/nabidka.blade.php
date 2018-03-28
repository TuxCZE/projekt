@extends('rozvrzeni.stranka')
@section('content')

  <!-- banner-bottom -->
	<div class="banner-bottom">
		<!-- container -->
		<div class="container">
			<div class="faqs-top-grids">
				<div class="product-grids">
					<div class="col-md-3 product-left">
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
									<input type="checkbox" data-track="HOT:SR:StarRating:5Star">
									<span class="p-day-grid">Akce</span>
								</label>
							</div>
							<div class="hotel-price">
								<label class="check">
									<input type="checkbox">
									<span class="p-day-grid">Last minute</span>
								</label>
							</div>
						</div>
            
            <div class="h-class p-day">
              	<div class="hotel-price">
								<span><input type="Submit" value="Vyhledat"></span>
							</div>
            </div>
					</div>
          
					<div class="col-md-9 product-right">
						<div class="product-right-grids">
							<div class="product-right-top">
								<div class="p-left">
									<div class="p-right-img">
										<a href="p-single.html"> </a>
									</div>
								</div>
								<div class="p-right">
									<div class="col-md-6 p-right-left">
										<a href="p-single.html">Lorem ipsum dolor sit amet</a>
										<div class="p-right-price">
											<span class="glyphicon glyphicon-star" aria-hidden="true"></span>
											<span class="glyphicon glyphicon-star" aria-hidden="true"></span>
											<span class="glyphicon glyphicon-star" aria-hidden="true"></span>
											<span class="glyphicon glyphicon-star" aria-hidden="true"></span>
										</div>
										<p>Vestibulum molestie id orci eget vulputate</p>
										<p class="p-call">+1 234 567 890</p>
									</div>
									<div class="col-md-6 p-right-right">
										<h6>Rating : 4.1/5</h6>
										<p>(123) Views</p>
										<span class="p-offer">$140</span><span class="p-last-price">$230</span>
									</div>
									<div class="clearfix"> </div>
								</div>
								<div class="clearfix"> </div>
							</div>	
						</div><div class="product-right-grids">
							<div class="product-right-top">
								<div class="p-left">
									<div class="p-right-img p-right-img1">
										<a href="p-single.html"> </a>
									</div>
								</div>
								<div class="p-right">
									<div class="col-md-6 p-right-left">
										<a href="p-single.html">Lorem ipsum dolor sit amet</a>
										<div class="p-right-price">
											<span class="glyphicon glyphicon-star" aria-hidden="true"></span>
											<span class="glyphicon glyphicon-star" aria-hidden="true"></span>
											<span class="glyphicon glyphicon-star" aria-hidden="true"></span>
											<span class="glyphicon glyphicon-star" aria-hidden="true"></span>
										</div>
										<p>Vestibulum molestie id orci eget vulputate</p>
										<p class="p-call">+1 234 567 890</p>
									</div>
									<div class="col-md-6 p-right-right">
										<h6>Rating : 4.1/5</h6>
										<p>(123) Views</p>
										<span class="p-offer">$240</span><span class="p-last-price">$430</span>
									</div>
									<div class="clearfix"> </div>
								</div>
								<div class="clearfix"> </div>
							</div>	
						</div>
            
						<div class="product-right-grids">
							<div class="product-right-top">
								<div class="p-left">
									<div class="p-right-img p-right-img2">
										<a href="p-single.html"> </a>
									</div>
								</div>
								<div class="p-right">
									<div class="col-md-6 p-right-left">
										<a href="p-single.html">Lorem ipsum dolor sit amet</a>
										<div class="p-right-price">
											<span class="glyphicon glyphicon-star" aria-hidden="true"></span>
											<span class="glyphicon glyphicon-star" aria-hidden="true"></span>
											<span class="glyphicon glyphicon-star" aria-hidden="true"></span>
											<span class="glyphicon glyphicon-star" aria-hidden="true"></span>
										</div>
										<p>Vestibulum molestie id orci eget vulputate</p>
										<p class="p-call">+1 234 567 890</p>
									</div>
									<div class="col-md-6 p-right-right">
										<h6>Rating : 4.1/5</h6>
										<p>(123) Views</p>
										<span class="p-offer">$120</span><span class="p-last-price">$310</span>
									</div>
									<div class="clearfix"> </div>
								</div>
								<div class="clearfix"> </div>
							</div>	
						</div>
            
						<div class="product-right-grids">
							<div class="product-right-top">
								<div class="p-left">
									<div class="p-right-img p-right-img3">
										<a href="p-single.html"> </a>
									</div>
								</div>
								<div class="p-right">
									<div class="col-md-6 p-right-left">
										<a href="p-single.html">Lorem ipsum dolor sit amet</a>
										<div class="p-right-price">
											<span class="glyphicon glyphicon-star" aria-hidden="true"></span>
											<span class="glyphicon glyphicon-star" aria-hidden="true"></span>
											<span class="glyphicon glyphicon-star" aria-hidden="true"></span>
											<span class="glyphicon glyphicon-star" aria-hidden="true"></span>
										</div>
										<p>Vestibulum molestie id orci eget vulputate</p>
										<p class="p-call">+1 234 567 890</p>
									</div>
									<div class="col-md-6 p-right-right">
										<h6>Rating : 4.1/5</h6>
										<p>(123) Views</p>
										<span class="p-offer">$140</span><span class="p-last-price">$230</span>
									</div>
									<div class="clearfix"> </div>
								</div>
								<div class="clearfix"> </div>
							</div>	
						</div>
            
						<div class="product-right-grids">
							<div class="product-right-top">
								<div class="p-left">
									<div class="p-right-img p-right-img1">
										<a href="p-single.html"> </a>
									</div>
								</div>
								<div class="p-right">
									<div class="col-md-6 p-right-left">
										<a href="p-single.html">Lorem ipsum dolor sit amet</a>
										<div class="p-right-price">
											<span class="glyphicon glyphicon-star" aria-hidden="true"></span>
											<span class="glyphicon glyphicon-star" aria-hidden="true"></span>
											<span class="glyphicon glyphicon-star" aria-hidden="true"></span>
											<span class="glyphicon glyphicon-star" aria-hidden="true"></span>
										</div>
										<p>Vestibulum molestie id orci eget vulputate</p>
										<p class="p-call">+1 234 567 890</p>
									</div>
									<div class="col-md-6 p-right-right">
										<h6>Rating : 4.1/5</h6>
										<p>(123) Views</p>
										<span class="p-offer">$380</span><span class="p-last-price">$540</span>
									</div>
									<div class="clearfix"> </div>
								</div>
								<div class="clearfix"> </div>
							</div>	
						</div>
            
						<div class="product-right-grids">
							<div class="product-right-top">
								<div class="p-left">
									<div class="p-right-img p-right-img2">
										<a href="p-single.html"> </a>
									</div>
								</div>
								<div class="p-right">
									<div class="col-md-6 p-right-left">
										<a href="p-single.html">Lorem ipsum dolor sit amet</a>
										<div class="p-right-price">
											<span class="glyphicon glyphicon-star" aria-hidden="true"></span>
											<span class="glyphicon glyphicon-star" aria-hidden="true"></span>
											<span class="glyphicon glyphicon-star" aria-hidden="true"></span>
											<span class="glyphicon glyphicon-star" aria-hidden="true"></span>
										</div>
										<p>Vestibulum molestie id orci eget vulputate</p>
										<p class="p-call">+1 234 567 890</p>
									</div>
									<div class="col-md-6 p-right-right">
										<h6>Rating : 4.1/5</h6>
										<p>(123) Views</p>
										<span class="p-offer">$360</span><span class="p-last-price">$750</span>
									</div>
									<div class="clearfix"> </div>
								</div>
								<div class="clearfix"> </div>
							</div>	
						</div>
					</div>
					<div class="clearfix"> </div>
				</div>
			</div>
		</div>
		<!-- //container -->
	</div>
	<!-- //banner-bottom -->
  
@endsection