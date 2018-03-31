@extends('rozvrzeni.stranka')
@section('content')
  
  <!-- banner-bottom -->
	<div class="banner-bottom">
		<!-- container -->
		<div class="container">
			<div class="about-info">
				<h2>Můj účet - Přehled objednávek</h2>
			</div>
      
				<div class="faqs-top-grids terms-grids">	
				<table class="table table-bordered table-striped table-hover">
        	<thead>
        		<tr>
        			<th>ID</th>
        			<th>ID dovolené</th>
        			<th>Dospělí</th>
        			<th>Děti</th>
        			<th>Cena</th>
              <th>Splatnost</th>
              <th>Stav</th>
              <th>Akce</th>
        		</tr>
        	</thead>
          
        	<tbody>     
            @foreach ($uziv_objednavky as $uziv_objednavka)
              <tr>
                <td>{{ $uziv_objednavka->ID }}</td>
                <td>{{ $uziv_objednavka->ID_dovolene }}</td>
                
                <td>{{ $uziv_objednavka->Pocet_dospelych }}</td>
                <td>{{ $uziv_objednavka->Pocet_deti }}</td>
                
                <td>{{ $uziv_objednavka->Cena_celkem }}</td>
                <td>{{ $uziv_objednavka->Splatnost }}</td>
                <td>{{ $uziv_objednavka->Zaplaceno }}</td>
                
                <td><a href="#">Upravit</a> | <a href="#">Zrušit</a></td>
              </tr>
            @endforeach      
            
            @if (count($uziv_objednavky) < 1)
              <tr>
                <td colspan="8" align="center">Zatím neevidujeme žádnou objednávku!</td>
              </tr>
            @endif
        	</tbody>
        </table>
        
        <div id="strankovani">
          @for ($i = 1; $i <= $max_stranek; $i++)
            <a href="/ucet/objednavky/{{ $i }}">{{ $i }}</a>    
          @endfor
        </div>
			</div>
		</div>
		<!-- //container -->
	</div>
	<!-- //banner-bottom -->
  
@endsection