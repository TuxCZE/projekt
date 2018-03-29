@extends('rozvrzeni.administrace')
@section('content')

	<!-- banner-bottom -->
	<div class="banner-bottom">
		<!-- container -->
		<div class="container">
			<div class="about-info">
				<h2>Administrace - Přehled</h2>
			</div>
      
			<div class="faqs-top-grids terms-grids">	
				<strong>Celkem dovolených: </strong>{{ $info[0] }}<br />
        <strong>Registovaných uzivatelů: </strong>{{ $info[1] }}<br />
        <strong>Aktivovaných uzivatelů: </strong>{{ $info[2] }}<br />
        <strong>Počet objednávek: </strong>{{ $info[3] }}
			</div>
		</div>
		<!-- //container -->
	</div>
	<!-- //banner-bottom -->
  
@endsection