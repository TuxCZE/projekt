<!--header-->
	<div class="header">
		<div class="container">
			<div class="header-grids">
				<div class="logo">
					<h1><a  href="index.html"><span>Název</span>Cestovky</a> - Administrace</h1>
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
						<div id="loginContainer"><a href="#" id="loginButton"><span>Přihlášen</span></a>
							<div id="loginBox">                
                {{ Form::open(array('url' => '/administrace/uvod', 'id' => 'loginForm')) }}
									<div class="login-grids">
										<div class="login-grid-left">
                      <div id="administrace_menu">
                        <span><a href="#">Editace účtu</a></span>
                        <span><a href="/odhlaseni">Odhlásit se</a></span>
                        
                        <hr />
                        
                        <span><a href="/">Přejít na web</a></span>
                      </div>
										</div>
									</div>
								{{ Form::close() }}
							</div>
						</div>
				</div>
        
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	<!--//header-->