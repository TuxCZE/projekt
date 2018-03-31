@extends('rozvrzeni.stranka')
@section('content')
  
  <!-- banner-bottom -->
	<div class="banner-bottom">
		<!-- container -->
		<div class="container">
			<div class="about-info">
				<h2>Můj účet</h2>
			</div>
      
			<div class="faqs-top-grids terms-grids">
        <h4>Info o účtu</h4>	
				<strong>Jméno: </strong>{{ $uziv_data->Jmeno }}<br />
        <strong>Příjmení: </strong>{{ $uziv_data->Prijmeni }}<br />
        <strong>Email: </strong>{{ $uziv_data->Email }}<br />
        <strong>Telefon: </strong>{{ $uziv_data->Telefon }} <br />
        <strong>Datum registrace: </strong>{{ $uziv_data->Datum_registrace }}
                                        
        <p>&nbsp;</p>
        
        <h4>Přehled</h4>
        <strong>Počet objednávek: </strong>{{ $pocet_objednavek }}
        
         <p>&nbsp;</p>
        
        <h4>Akce</h4>		
        <a href="/ucet/editace">Editace účtu</a><br />    
        <a href="/ucet/smazat">Smazat účet</a>
			</div>
		</div>
		<!-- //container -->
	</div>
	<!-- //banner-bottom -->
  
@endsection