<div class="col-md-4 weekend-grids">
					<div class="weekend-grid">
						<a href="/dovolena/{{ $dovolena->Seo_url }}">
							<img src="images/{{ $dovolena->Obrazek }}" alt="" />
							<div class="deals-info-grid">
								<div class="deals-grids">
									<div class="col-md-8 deals-rating">
										<h3>{{ $dovolena->Titulek }}</h3>
										<span class="glyphicon glyphicon-star" aria-hidden="true"></span>
										<span class="glyphicon glyphicon-star" aria-hidden="true"></span>
										<span class="glyphicon glyphicon-star" aria-hidden="true"></span>
										<span class="glyphicon glyphicon-star" aria-hidden="true"></span>
										<span class="glyphicon glyphicon-star" aria-hidden="true"></span>
									</div>
                  
									<div class="col-md-4 deals-price">
										<p class="now">{{ $dovolena->Cena_pred }} Kč</p>
										<p>{{ $dovolena->Cena }}</p>
									</div>
									<div class="clearfix"> </div>
								</div>
							</div>
						</a>
					</div>
				</div>