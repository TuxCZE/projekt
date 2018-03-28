@extends('rozvrzeni.stranka')
@section('content')
<!-- banner-bottom -->
	<div class="banner-bottom">
		<!-- container -->
		<div class="container">
      @isset ($chyba)
        <div id="vrsek_chyba"><h3>{{ $chyba }}</h3></div>
      @endisset
      
			<div class="faqs-top-grids">
				<div class="book-grids">
					<div class="col-md-6 book-left">
						<div class="book-left-info">
							<h3>Přihlášení</h3>
						</div>
            
						<div class="book-left-form">
							{{ Form::open(array('url' => '/prihlaseni')) }}
								<p>Emailová adresa:</p>
								<input name="log_email" type="text" value="" onfocus="this.value='';" onblur="if (this.value == '') {this.value ='';}">
                
								<p>Heslo:</p>
								<input name="log_heslo" type="password" name="password" id="password">
                
								<input type="submit" id="login" value="Přihlásit">
							{{ Form::close() }}
						</div>
					</div>
          
					<div class="col-md-6 book-left book-right">
						<div class="book-left-info">
							<h3>Výhody účtu</h3>
						</div>

						<ul>
							<li>Přehled objednaných zájezdů</li>
							<li>Možnost jednoduchého stornování objednávky</li>
							<li>Vaše údaje stačí vyplnit pouze jednou, nemusí se vyplňovat znovu u každé objednávky</li>
							<li>Jako registrovaný uživatel se stáváte našim zákazníkem a můžete získat výhodné slevy.</li>
						</ul>
					</div>
					<div class="clearfix"> </div>
				</div>
			</div>
		</div>
		<!-- //container -->
	</div>
	<!-- //banner-bottom -->
  
@endsection