@extends('rozvrzeni.administrace')
@section('content')

	<!-- banner-bottom -->
	<div class="banner-bottom">
		<!-- container -->
		<div class="container">
			<div class="about-info">
				<h2>Administrace - Služby</h2>
			</div>

			<div class="faqs-top-grids terms-grids">
			 {{ Form::open(array('url' => '/administrace/sluzby')) }}

			 <textarea rows="18" cols="150" name="sluzby_text">{{ $sluzby_text }}</textarea>

			 <div id="nastred"><input class="ulozit_zmeny" type="Submit" value="Uložit změny"></div>

			 {{ Form::close() }}
			</div>
		</div>
		<!-- //container -->
	</div>
	<!-- //banner-bottom -->

@endsection
