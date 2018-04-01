function NaSEOUrl(text, ulozeni)
{
  var pred = "áäčďéěíĺľňóôőöŕšťúůűüýřžÁÄČĎÉĚÍĹĽŇÓÔŐÖŔŠŤÚŮŰÜÝŘŽ";
  var po = "aacdeeillnoooorstuuuuyrzAACDEEILLNOOOORSTUUUUYRZ";
  
  var text_stary = text.replace(/ /g, "-");
  var text_novy = "";
  
  for(i=0; i<text_stary.length; i++){
    var pozice = pred.indexOf(text_stary.charAt(i))
      
    if (pozice != -1){
      text_novy += po.charAt(pozice);
    } else text_novy += text_stary.charAt(i); 
  }
  
  ulozeni.value = text_novy; 
}