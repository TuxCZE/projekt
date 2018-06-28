@extends('rozvrzeni.administrace')
@section('content')

	<!-- banner-bottom -->
	<div class="banner-bottom">
		<!-- container -->
		<div class="container">
			<div class="about-info">
				<h2>{{ $zprava[0] }}</h2>
			</div>

			<div class="faqs-top-grids terms-grids">
				{{ $zprava[1] }}
			</div>
		</div>
		<!-- //container -->
	</div>
	<!-- //banner-bottom -->

@endsection
