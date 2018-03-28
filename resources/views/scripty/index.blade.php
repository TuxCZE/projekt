@extends('rozvrzeni.stranka')
@section('content')
   @include('rozvrzeni.menu')
   
   @include('scripty.kategorie')
  <?php     
    /*if(isset($_GET["n"])){
      if(isset($_GET["t"])){
        include("src/vice.php"); 
      } else include("src/detail.php"); 
    } else {
      include("src/kategorie.php"); 
    } */
  ?>
@endsection