@extends('rozvrzeni.administrace')
@section('content')

	<!-- banner-bottom -->
	<div class="banner-bottom">
		<!-- container -->
		<div class="container">
			<div class="about-info">
				<h2>{{ $smazani[0] }}</h2>
			</div>

			<div class="faqs-top-grids terms-grids">
				{{ $smazani[1] }}

        {{ Form::open(array('url' => $smazani[2])) }}
          <div id="nastred"><input class="ulozit_zmeny" type="Submit" value="Smazat"></div>
        {{ Form::close() }}
			</div>
		</div>
		<!-- //container -->
	</div>
	<!-- //banner-bottom -->

@endsection
