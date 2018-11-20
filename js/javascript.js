function mascara1(src, mask){
  var i = src.value.lenght;
  var saida = mask.substring(0,1);
  var texto = mask.substring(i);

  if (texto.substring(0,1) != saida) {
    src.value += texto.substring(0,1);
  }
}

function mascara(){
  $("#telefone, #celular").mask("(00) 0000-0000");
  $("#matricula").mask("00.000-0000");
   $("#sigla").mask("AA");
   $('#periodo').mask("00")
}
