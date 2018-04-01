<!-- banner -->
	<div class="banner holidays-banner">
		<!-- container -->
		<div class="container">
			<div class="col-md-4 banner-left">
				<section class="slider2">
					<div class="flexslider">
						<ul class="slides">
							<li>
								<div class="slider-info">
									<img src="/images/5.jpg" alt="">
								</div>
							</li>
							<li>
								<div class="slider-info">
									<img src="/images/6.jpg" alt="">
								</div>
							</li>
							<li>	
								<div class="slider-info">
									<img src="/images/7.jpg" alt="">
								</div>
							</li>
							<li>	
								<div class="slider-info">
									<img src="/images/8.jpg" alt="">
								</div>
							</li>
							<li>	
								<div class="slider-info">
									<img src="/images/6.jpg" alt="">
								</div>
							</li>
						</ul>
					</div>
				</section>
				<!--FlexSlider-->
			</div>
      
			<div class="col-md-8 banner-right">
				<div class="sap_tabs">	
					<div class="booking-info about-booking-info">
						<h2>Vyhledat dovolenou</h2>
					</div>
					<div id="horizontalTab" style="display: block; width: 100%; margin: 0px;">	
						  <!---->		  	 
									<div class="facts weekend-facts">
										<div class="booking-form train-form">
										<link rel="stylesheet" href="css/jquery-ui.css" />
											<!---strat-date-piker---->
											<script>
												$(function() {
													$( "#datepicker,#datepicker1" ).datepicker();
												});
											</script>
											<!---/End-date-piker---->
											<!-- Set here the key for your domain in order to hide the watermark on the web server -->
											
											<div class="online_reservation">
													<div class="b_room">
														<div class="booking_room">
															<div class="reservation">
                              {{ Form::open(array('url' => '/hledat')) }}
																<ul>		
																	<li  class="span1_of_1 desti about-desti">
																		 <h5>Destinace</h5>
																		 <div class="book_date">
																				<span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span>
																				<input type="text" name="hledat_zem" placeholder="Země" class="typeahead1 input-md form-control tt-input" required="" list="destinace_seznam">
                                        
                                        <datalist id="destinace_seznam">
                                          @foreach ($destinance_vse as $polozka)
                                            <option value="{{ $polozka->Nazev }}"">
                                          @endforeach
                                        </datalist>
																		 </div>					
																	 </li>
																</ul>
															</div>
                              
															<div class="reservation">
																<ul>	
																	 <li  class="span1_of_1">
																		 <h5>Termín OD</h5>
																		 <div class="book_date">
																			<span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
																			<input type="date" name="hledat_od" value="{{ $datum[1] }}">
																		 </div>		
																	 </li>
                                   
																	 <li  class="span1_of_1 left">
																		 <h5>Termín DO</h5>
																		 <div class="book_date">              
																				<span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
																				<input type="date" name="hledat_do"  value="{{ $datum[0] }}">
																		 </div>					
																	 </li>
                                   
																	 <li class="span1_of_1 left w-adult">
																		 <h5>Dospělí (18+)</h5>
																		 <!----------start section_room----------->
																		 <div class="section_room">
																			  <select id="country" name="hledat_dospeli" onchange="change_country(this.value)" class="frm-field required">
																					<option value="1">1</option>
																					<option value="2">2</option>         
																					<option value="3">3</option>
																					<option value="4">4</option>
																					<option value="5">5</option>
																					<option value="6">6</option>
																			  </select>
																		 </div>	
																	</li>
                                  
																	<li class="span1_of_1 left w-child">
																		 <h5>Děti (0-17)</h5>
																		 <!----------start section_room----------->
																		 <div class="section_room">
																			  <select id="country" name="hledat_deti" onchange="change_country(this.value)" class="frm-field required">
																					<option value="1">1</option>
																					<option value="2">2</option>         
																					<option value="3">3</option>
																					<option value="4">4</option>
																					<option value="5">5</option>
																					<option value="6">6</option>
																			  </select>
																		 </div>	
																	</li>
                                  
																	<li class="span1_of_1 w-rooms">
																		 <h5>Pokojů</h5>
																		 <!----------start section_room----------->
																		 <div class="section_room">
																			  <select id="country" name="hledat_pokoju" onchange="change_country(this.value)" class="frm-field required">
																					<option value="1">1</option>
																					<option value="2">2</option>         
																					<option value="3">3</option>
																					<option value="4">4</option>
																					<option value="5">5</option>
																					<option value="6">6</option>
																			  </select>
																		 </div>	
																	</li>
																	 <div class="clearfix"></div>
																</ul>
															</div>
															<div class="reservation">
																<ul>	
																	 <li class="span1_of_3">
																			<div class="date_btn">
																					<input class="hledat_tl" type="submit" value="Vyhledat" />
																			</div>
																	 </li>
																	 <div class="clearfix"></div>
																</ul>
                              {{ Form::close() }}
															</div>
														</div>
														<div class="clearfix"></div>
													</div>
											</div>
											<!---->
										</div>	
									</div>
					</div>	
				</div>
			</div>
			<div class="clearfix"> </div>
		</div>
		<!-- //container -->
	</div>
	<!-- //banner -->