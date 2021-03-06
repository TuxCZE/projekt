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
				<table class="table table-bordered table-striped table-hover">
        	<thead>
        		<tr>
        			<th>ID</th>
        			<th>Email</th>
        			<th>Text</th>
        			<th>Datum odeslání</th>
        			<th>Akce</th>
        		</tr>
        	</thead>

        	<tbody>
            @foreach ($kontakt_zpravy as $zprava)
              <tr>
                <td>{{ $zprava->ID }}</td>
                <td>{{ $zprava->Email }}</td>
                <td>{{ $zprava->Text }}</td>
                <td>{{ $zprava->Odeslano }}</td>
                <td><a href="/administrace/kontakt/zobraz/{{ $zprava->ID }}">Zobrazit</a> | <a href="/administrace/kontakt/smaz/{{ $zprava->ID }}">Smazat</a></td>
              </tr>
            @endforeach

            @if (count($kontakt_zpravy) < 1)
              <tr>
                <td colspan="5" align="center">Nebyla nalezena žádná zpráva!</td>
              </tr>
            @endif
        	</tbody>
        </table>

        <div id="strankovani">
          @for ($i = 1; $i <= $max_stranek; $i++)
            <a href="/administrace/kontakt/{{ $i }}">{{ $i }}</a>
          @endfor
        </div>
			</div>
		</div>
		<!-- //container -->
	</div>
	<!-- //banner-bottom -->

@endsection
