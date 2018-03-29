@extends('rozvrzeni.administrace')
@section('content')

	<!-- banner-bottom -->
	<div class="banner-bottom">
		<!-- container -->
		<div class="container">
			<div class="about-info">
				<h2>Administrace - Dovolené</h2>
			</div>
      
			<div class="faqs-top-grids terms-grids">	
				<table class="table table-bordered table-striped table-hover">
        	<thead>
        		<tr>
        			<th>ID</th>
        			<th>Titulek</th>
        			<th>Cena</th>
        			<th>Termín</th>
        			<th>Akce</th>
        		</tr>
        	</thead>
          
        	<tbody>
            @foreach ($dovolene as $dovolena)
              <tr>
                <td>{{ $dovolena->ID }}</td>
                <td>{{ $dovolena->Titulek }}</td>
                <td>{{ $dovolena->Cena }}</td>
                <td>{{ $dovolena->Termin_od }} - {{ $dovolena->Termin_do }}</td>
                <td><a href="#">Upravit</a> | <a href="#">Smazat</a></td>
              </tr>
            @endforeach
            
            @if (count($dovolene) < 1)
              <tr>
                <td colspan="5" align="center">Zatím nebyla přidaná žádná dovolená!</td>
              </tr>
            @endif
        	</tbody>
        </table>
        
        <div id="strankovani">
          @for ($i = 1; $i <= $max_stranek; $i++)
            <a href="/administrace/dovolene/{{ $i }}">{{ $i }}</a>    
          @endfor
        </div>
			</div>
		</div>
		<!-- //container -->
	</div>
	<!-- //banner-bottom -->
  
@endsection