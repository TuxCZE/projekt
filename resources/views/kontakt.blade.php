@extends('rozvrzeni.stranka')
@section('content')

  <!-- banner-bottom -->
	<div class="banner-bottom">
		<!-- container -->
		<div class="container">
			<div class="about-info">
				<h2>Kontaktuje nás</h2>
			</div>
			<div class="faqs-top-grids">
					<div class="contact-info">
						<h4>Informace</h4>
						<p>Kontaktovat nás můžete telefonicky, přes fomulář níže, nebo můžete navštívit přímo naši pobočku. Přesná adresa pobočky je označená na mapě vpravo od formuláře.</p>
					</div>
          
					<div class="contact-grids">
						<div class="col-md-7 contact-para">
							<h5>Kontaktní formulář</h5>
							{{ Form::open(array('url' => '/kontakt')) }}
								<div class="grid-contact">
									<div class="col-md-6 contact-grid">
										<p>Jméno</p>		
										<input type="text" name="kontakt_jmeno" value="" onfocus="this.value='';" onblur="if (this.value == '') {this.value ='';}">						
										</div>
                    
									<div class="col-md-6 contact-grid">
										<p>Příjmení</p>		
										<input type="text" name="kontakt_prijmeni" value="" onfocus="this.value='';" onblur="if (this.value == '') {this.value ='';}">						
										</div>
                    
									<div class="clearfix"> </div>
								</div>
                
								<div class="grid-contact">
									<div class="col-md-6 contact-grid">
									<p>Email</p>						
										<input type="text" name="kontakt_email" value="" onfocus="this.value='';" onblur="if (this.value == '') {this.value ='';}">							
									</div>
                  
									<div class="col-md-6 contact-grid">						
									 <p>Telefon</p>						
										<input type="text" name="kontakt_telefon" value="" onfocus="this.value='';" onblur="if (this.value == '') {this.value ='';}">							
									</div>
									<div class="clearfix"> </div>
								</div>
									<p class="your-para">Zpráva</p>
									<textarea name="kontakt_zprava" cols="77" rows="6" value=" " onfocus="this.value='';" onblur="if (this.value == '') {this.value = '';}"></textarea>
										<div class="send">
											<input type="submit" value="Odeslat">
										</div>
							{{ Form::close() }}
						</div>
            
						<div class="col-md-5 contact-map">
							<h5>Umístění pobočky</h5>
							<div class="map">
							<iframe width="720" height="420" src="https://maps.google.com/maps?width=720&amp;height=420&amp;hl=en&amp;q=Brno%2C%20b%C4%9Blorusk%C3%A1+(Cestovka)&amp;ie=UTF8&amp;t=&amp;z=14&amp;iwloc=B&amp;output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"><a href="https://www.maps.ie/create-google-map/">Embed Google Map</a></iframe>
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