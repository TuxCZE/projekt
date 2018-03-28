<div id="main">
<div class="head">
       <div class="obsah box-solutions left">
        <div class="nastred">
          <h1>Scripty ke stažení</h1>
          <p>&nbsp;</p>
          
           <div class="cl cara">&nbsp;</div>
           
           <ul class="scripty_kategorie">
            @foreach ($scripty_kategorie as $script_kat)
              <li><a href="/scripty/{{$script_kat->Seo_url}}">{{$script_kat->Text}}</a></li>   
            @endforeach
           </ul>
        </div>
        
        <div class="cl">&nbsp;</div>
        <div class="info">&nbsp;</div>
        <div>&nbsp;</div>
      </div>
        
        <div class="obsah box-solutions left">&nbsp;</div>
    </div>
  </div>