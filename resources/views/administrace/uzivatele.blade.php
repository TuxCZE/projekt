@extends('rozvrzeni.administrace')
@section('content')

	<!-- banner-bottom -->
	<div class="banner-bottom">
		<!-- container -->
		<div class="container">
			<div class="about-info">
				<h2>Administrace - Uživatelé</h2>
			</div>
      
			<div class="faqs-top-grids terms-grids">	
				<table class="table table-bordered table-striped table-hover">
        	<thead>
        		<tr>
        			<th>ID</th>
        			<th>Email</th>
        			<th>Práva</th>
        			<th>Datum registrace</th>
        			<th>Akce</th>
        		</tr>
        	</thead>
          
        	<tbody>
            @foreach ($uzivatele as $uziv)
              <tr>
                <td>{{ $uziv->ID }}</td>
                <td>{{ $uziv->Email }}</td>
                <td>{{ $uziv->Prava }}</td>
                <td>{{ $uziv->Datum_registrace }}</td>
                <td><a hred="#">Upravit</a> | <a hred="#">Smazat</a></td>
              </tr>
            @endforeach
            
            @if (count($uzivatele) < 1)
              <tr>
                <td colspan="5" align="center">Nebyl nalezen žádný uživatel!</td>
              </tr>
            @endif
        	</tbody>
        </table>
        
        <div id="strankovani">
          @for ($i = 1; $i <= $max_stranek; $i++)
            <a href="/administrace/uzivatele/{{ $i }}">{{ $i }}</a>    
          @endfor
        </div>
			</div>
		</div>
		<!-- //container -->
	</div>
	<!-- //banner-bottom -->
  
@endsection