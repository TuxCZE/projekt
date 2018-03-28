<!--header-->
	<div class="header">
		<div class="container">
			<div class="header-grids">
				<div class="logo">
					<h1><a  href="/"><span>Název</span>Cestovky</a></h1>
				</div>
				<!--navbar-header-->
				<div class="header-dropdown">
					<div class="emergency-grid">
						<ul>
							<li>Telefon: </li>
							<li class="call">+420 777 666 555</li>
						</ul>
					</div>
					<div class="clearfix"> </div>
				</div>
				<div class="clearfix"> </div>
			</div>
      
			<div class="nav-top">
				<div class="top-nav">
					<span class="menu"><img src="images/menu.png" alt="" /></span>
					<ul class="nav1">
            @foreach ($menu as $indexKey => $polozka)
              @if ($indexKey == $menu_vybrane)
                <li class="active"><a href="{{ $polozka->Url }}">{{ $polozka->Nazev }}</a></li>
              @else
                <li><a href="{{ $polozka->Url }}">{{ $polozka->Nazev }}</a></li>
              @endif
            @endforeach
					</ul>
					<div class="clearfix"> </div>
					<!-- script-for-menu -->
							 <script> 
							   $( "span.menu" ).click(function() {
								 $( "ul.nav1" ).slideToggle( 300, function() {
								 // Animation complete.
								  });
								 });
							
							</script>
						<!-- /script-for-menu -->
				</div>
        
				<div class="dropdown-grids">
						<div id="loginContainer">
              @if (session("email") == "")
                <a href="#" id="loginButton"><span>Přihlášení</span></a>
              @else
                <a href="#" id="loginButton"><span>Můj účet</span></a>
              @endif
              
							<div id="loginBox">                
                {{ Form::open(array('url' => '/prihlaseni', 'id' => 'loginForm')) }}
                  @if (session("email") == "")
									<div class="login-grids">
										<div class="login-grid-left">
											<fieldset id="body">
												<fieldset>
													<label for="email">Emailová adresa</label>
													<input type="text" name="log_email" id="email">
												</fieldset>
                        
												<fieldset>
													<label for="password">Heslo</label>
													<input type="password" name="log_heslo" id="password">
												</fieldset>
                        
												<input type="submit" id="login" value="Přihlásit se">
												<label for="checkbox"><input type="checkbox" id="checkbox"> <i>Zapamatovat</i></label>
											</fieldset>
                      
											<span><a href="#">Zapomenuté heslo?</a></span>
										</div>
									</div>
                 @else
                  <div class="login-grids">
										<div class="login-grid-left">
                      <div id="administrace_menu">
                        <span><a href="#">Přehled objednávek</a></span>
                        <span><a href="#">Editace účtu</a></span>
                        <span><a href="/odhlaseni">Odhlásit se</a></span>
                        
                         @if (session("prava") > 2)
                          <hr />
                          <span><a href="/administrace">Administrace</a></span>
                         @endif
                      </div>
										</div>
									</div>
                 @endif
								{{ Form::close() }}
							</div>
						</div>
				</div>
        
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	<!--//header-->