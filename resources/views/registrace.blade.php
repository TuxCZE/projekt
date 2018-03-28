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
							<h3>Vytvoření účtu</h3>
						</div>
            
						<div class="book-left-form">
							{{ Form::open(array('url' => '/registrace')) }}
								<p>Jméno</p>
								<input name="reg_jmeno" type="text" value="" onfocus="this.value='';" onblur="if (this.value == '') {this.value ='';}">
								<p>Příjmení</p>
								<input name="reg_prijmeni" type="text" value="" onfocus="this.value='';" onblur="if (this.value == '') {this.value ='';}">
                
								<p>Telefon</p>
								<input name="reg_telefon" type="text" value="+420 777 666 555" onfocus="this.value='';" onblur="if (this.value == '') {this.value ='+420 777 666 555';}">
                
								<p>Emailová adresa:</p>
								<input name="reg_email" type="text" value="" onfocus="this.value='';" onblur="if (this.value == '') {this.value ='';}">
                
								<p>Heslo:</p>
								<input name="reg_heslo" type="password" name="password" id="password">
                
								<p>Heslo znovu:</p>
								<input name="reg_heslo2" type="password" name="password" id="password">
                
								<input type="submit" id="login" value="Registrovat">
							{{ Form::close() }}
						</div>
					</div>
					<div class="col-md-6 book-left book-right">
						<div class="book-left-info">
							<h3>Výhody</h3>
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