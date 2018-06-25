@extends('rozvrzeni.administrace')
@section('content')

	<!-- banner-bottom -->
	<div class="banner-bottom">
		<!-- container -->
		<div class="container">
			<div class="about-info">
				<h2>Administrace - Kontakt</h2>
			</div>

			<div class="faqs-top-grids terms-grids">
				<strong>Odeslal: </strong>{{ $kontakt->Jmeno }} {{ $kontakt->Prijmeni }}<br />
        <strong>Telefon: </strong>{{ $kontakt->Telefon }}<br />
        <strong>Datum: </strong>{{ $kontakt->Odeslano }}<br />
				<strong>IP: </strong>{{ $kontakt->IP }}<br />
				<strong>Email: </strong>{{ $kontakt->Email }}

				<p>&nbsp;</p>

				<strong>Text:</strong>
			 <textarea rows="9" cols="150" name="kontakt_text" readonly>{{ $kontakt->Text }}</textarea>

			</div>
		</div>
		<!-- //container -->
	</div>
	<!-- //banner-bottom -->

@endsection
