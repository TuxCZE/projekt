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
							<form>
								<div class="grid-contact">
									<div class="col-md-6 contact-grid">
										<p>Jméno</p>		
										<input type="text" value="" onfocus="this.value='';" onblur="if (this.value == '') {this.value ='';}">						
										</div>
                    
									<div class="col-md-6 contact-grid">
										<p>Příjmení</p>		
										<input type="text" value="" onfocus="this.value='';" onblur="if (this.value == '') {this.value ='';}">						
										</div>
                    
									<div class="clearfix"> </div>
								</div>
								<div class="grid-contact">
									<div class="col-md-6 contact-grid">
									<p>Email</p>						
										<input type="text" value="" onfocus="this.value='';" onblur="if (this.value == '') {this.value ='';}">							
									</div>
									<div class="col-md-6 contact-grid">						
									<p>Telefon</p>						
										<input type="text" value="" onfocus="this.value='';" onblur="if (this.value == '') {this.value ='';}">							
										</div>
									<div class="clearfix"> </div>
								</div>
									<p class="your-para">Zpráva</p>
									<textarea cols="77" rows="6" value=" " onfocus="this.value='';" onblur="if (this.value == '') {this.value = '';}"></textarea>
										<div class="send">
											<input type="submit" value="Odeslat">
										</div>
							</form>
						</div>
						<div class="col-md-5 contact-map">
							<h5>Umístění pobočky</h5>
							<div class="map">
								<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d59247.84555941436!2d-74.00101359585908!3d40.691888370076846!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sin!4v1440747755360" allowfullscreen=""></iframe>
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