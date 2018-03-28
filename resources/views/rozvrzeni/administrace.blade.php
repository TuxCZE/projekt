<!DOCTYPE html>
<html>
<head>
  <title>@yield('title') {{ $site_title or '' }} - Administrace</title>
  <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
  <meta name="keywords" content="{{ $site_keywords or '' }}">
  <meta name="description" content="@yield('description') {{ $site_description or '' }}">
  <meta name="author" content="{{ $author or '' }}">
  <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

  @if(isset($site_css) && $site_css)
    <link href="{{ $site_css }}" rel="stylesheet">
  @else
    <link href="{{ elixir('css/style.css') }}" rel="stylesheet">
    <link href="{{ elixir('css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ elixir('css/flexslider.css') }}" rel="stylesheet">
    <link href="{{ elixir('css/JFFormStyle-1.css') }}" rel="stylesheet">
  @endif
  @yield('css')
  
  <!-- js -->
  <script src="{{ elixir('js/jquery.min.js') }}"></script>
  <script src="{{ elixir('js/modernizr.custom.js') }}"></script>
  <!-- //js -->
  <script type="text/javascript">
  		$(document).ready(function () {
  			$('#horizontalTab').easyResponsiveTabs({
  				type: 'default', //Types: default, vertical, accordion           
  				width: 'auto', //auto or any width like 600px
  				fit: true   // 100% fit in a container
  			});
  		});
  	</script>
  <!--pop-up-->
  <script src="{{ elixir('js/menu_jquery.js') }}"></script>
  <!--//pop-up-->	
</head>
  <body>  
    @include('rozvrzeni.admin_header')

    @yield('content')
    
    @include('rozvrzeni.admin_paticka')
                                                                               
    <script defer src="{{ elixir('js/jquery.flexslider.js') }}"></script>
  	<script src="{{ elixir('js/easyResponsiveTabs.js') }}" type="text/javascript"></script>
  	<script src="{{ elixir('js/jquery-ui.js') }}"></script>
  	<script type="text/javascript" src="{{ elixir('js/script.js') }}"></script>
  	<script type="text/javascript">
  		$(function(){
  			SyntaxHighlighter.all();
  			});
  			$(window).load(function(){
  			$('.flexslider').flexslider({
  			animation: "slide",
  			start: function(slider){
  			$('body').removeClass('loading');
  			}
  			});
  		});
  	</script>	
  </body>
</html>