@extends('rozvrzeni.administrace')
@section('content')

	<!-- banner-bottom -->
	<div class="banner-bottom">
		<!-- container -->
		<div class="container">
			<div class="about-info">
				<h2>Administrace - Objednávky</h2>
			</div>

			<div class="faqs-top-grids terms-grids">
				<table class="table table-bordered table-striped table-hover">
        	<thead>
        		<tr>
        			<th>ID</th>
        			<th>Objednavatel</th>
        			<th>Dospělí</th>
        			<th>Děti</th>
              <th>Celkem</th>
              <th>Zaplaceno</th>
              <th>Splatnost</th>
        			<th>Akce</th>
        		</tr>
        	</thead>

        	<tbody>
            @foreach ($objednavky as $objednavka)
              <tr>
                <td>{{ $objednavka->ID }}</td>
                <td>{{ $objednavka->Jmeno }} {{ $objednavka->Prijmeni }}</td>
                <td>{{ $objednavka->Pocet_dospelych }}</td>
                <td>{{ $objednavka->Pocet_deti }}</td>

                <td>{{ $objednavka->Cena_celkem }}</td>
                <td>{{ $objednavka->Zaplaceno }}</td>
                <td>{{ $objednavka->Splatnost }}</td>

                <td><a href="/administrace/objednavky/smaz/{{ $objednavka->ID }}">Smazat</a></td>
              </tr>
            @endforeach

            @if (count($objednavky) < 1)
              <tr>
                <td colspan="5" align="center">Zatím nebyla přijata žádná objednavka!</td>
              </tr>
            @endif
        	</tbody>
        </table>

        <div id="strankovani">
          @for ($i = 1; $i <= $max_stranek; $i++)
            <a href="/administrace/objednavky/{{ $i }}">{{ $i }}</a>
          @endfor
        </div>
			</div>
		</div>
		<!-- //container -->
	</div>
	<!-- //banner-bottom -->

@endsection
