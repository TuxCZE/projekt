@extends('rozvrzeni.stranka')
@section('content')

  <!-- banner-bottom -->
	<div class="banner-bottom">
		<!-- container -->
		<div class="container">
			<div class="about-info">
				<h2>Objednávka dovolené - {{ $dovolena_vybrana->Titulek }}</h2>
        <p>Termín: {{ \Carbon\Carbon::parse($dovolena_vybrana->Termin_od)->format('d. m. Y') }} - {{ \Carbon\Carbon::parse($dovolena_vybrana->Termin_do)->format('d. m. Y') }}</p>
			</div>
                                                   
      <div class="faqs-top-grids terms-grids">
        <div class="opinion">	
						{{ Form::open(array('url' => '/objednat/' . $dovolena_vybrana->ID, 'enctype' => 'multipart/form-data')) }}
								<p>Jméno</p>
								<input name="obj_jmeno" type="text" value="{{ $uziv_data[0] }}" onfocus="this.value='';" onblur="if (this.value == '') {this.value ='';}">
                
                <p>Příjmení</p>
								<input name="obj_prijmeni" type="text" value="{{ $uziv_data[1] }}" onfocus="this.value='';" onblur="if (this.value == '') {this.value ='';}">
                
                <p>Telefon</p>
								<input name="obj_telefon" type="text" value="{{ $uziv_data[3] }}" onfocus="this.value='';" onblur="if (this.value == '') {this.value ='';}">
                
                <p>Email</p>
								<input name="obj_email" type="text" value="{{ $uziv_data[2] }}" onfocus="this.value='';" onblur="if (this.value == '') {this.value ='';}">
                
              <h4>Adresa trvalého pobytu</h4>
              <p>Ulice</p>
							<input name="obj_ulice" type="text" value="" onfocus="this.value='';" onblur="if (this.value == '') {this.value ='';}">
              
              <p>Město</p>
							<input name="obj_mesto" type="text" value="" onfocus="this.value='';" onblur="if (this.value == '') {this.value ='';}">
              
              <p>PSČ</p>
							<input name="obj_psc" type="text" value="" onfocus="this.value='';" onblur="if (this.value == '') {this.value ='';}">
              
              <h4>Další osoby</h4>
              <p>Dospělí</p>
							<input name="obj_dospeli" type="text" value="" onfocus="this.value='';" onblur="if (this.value == '') {this.value ='';}">
              
              <p>Děti</p>
							<input name="obj_deti" type="text" value="" onfocus="this.value='';" onblur="if (this.value == '') {this.value ='';}">
              
              <p>Počet pokojů</p>
							<input name="obj_pokoje" type="text" value="" onfocus="this.value='';" onblur="if (this.value == '') {this.value ='';}">
                
              <div id="tlacitko_admin">
							 <input type="submit" id="pridani_dovolene" value="Odeslat objednávku">
              </div>
                
						  {{ Form::close() }}
            </div>
				</div>  
		</div>
		<!-- //container -->
	</div>
	<!-- //banner-bottom -->
  
@endsection