@extends('rozvrzeni.administrace')
@section('content')

	<!-- banner-bottom -->
	<div class="banner-bottom">
		<!-- container -->
		<div class="container">
			<div class="about-info">
				<h2>Administrace - Přidat dovolenou</h2>
			</div>
                                                   
      <div class="faqs-top-grids terms-grids">
        <div class="opinion">	
						{{ Form::open(array('url' => '/administrace/dovolena/pridat', 'enctype' => 'multipart/form-data')) }}
								<p>Destinace</p>
                <select name="dov_destinace" style="width: 100%; border: 1px solid #D5D4D4;">
                  @foreach ($destinace as $lokace)
                    <option value="{{ $lokace->ID }}">{{ $lokace->Nazev }}</option>
                  @endforeach
                </select>
                
								<p>Titulek</p>
								<input name="dov_titulek" type="text" value="" onblur="NaSEOUrl(this.value, document.getElementsByName('dov_seourl')[0]);">
                
                <p>Seo URL:</p>
								<input name="dov_seourl" type="text" value=""">
                
								<p>Obrázek (náhled):</p>
								<input type="file" name="dov_nahled" id="dov_nahled">
                
								<p>Krátký popisek:</p>
								<input name="dov_kpopisek" type="text" value="" onfocus="this.value='';" onblur="if (this.value == '') {this.value ='';}">
                
								<p>Popisek:</p>
								<textarea name="dov_popisek"></textarea>
                
								<p>Další fotky (při nevybrání budou použité výchozí):</p>
								<input type="file" name="dov_foto" id="dov_foto">
                <input type="file" name="dov_foto2" id="dov_foto2">
                <input type="file" name="dov_foto3" id="dov_foto3">
                <input type="file" name="dov_foto4" id="dov_foto4">
                <input type="file" name="dov_foto5" id="dov_foto5">
                
                <p>Cena:</p>
								<input name="dov_cena" type="text" value="" onfocus="this.value='';" onblur="if (this.value == '') {this.value ='';}">
                
                <p>Cena před: (Vyplňuje se pouze pokud je zájezd v akci)</p>
								<input name="dov_cenapred" type="text" value="" onfocus="this.value='';" onblur="if (this.value == '') {this.value ='';}">
                
                <p>Termín od:</p>
								<input name="dov_od" type="date" value="{{ $termin[0] }}">
                
                <p>Termín do:</p>
								<input name="dov_do" type="date" value={{ $termin[1] }}>
                
                <p>Max. počet lidí na pokoji:</p>
								<input name="dov_maxpokoj" type="text" value="2">
                
                <p>Jedná se o Last Minute nabídku? &nbsp; <input type="checkbox" name="dov_lastmin" value="1"></p>
                
              <div id="tlacitko_admin">
							 <input type="submit" id="pridani_dovolene" value="Přidat">
              </div>
                
						  {{ Form::close() }}
            </div>
				</div>  
		</div>
		<!-- //container -->
	</div>
	<!-- //banner-bottom -->
  
@endsection