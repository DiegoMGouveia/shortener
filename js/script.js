// função para copiar texto automaticamente através do ID link
function copiarShort() {
    var textoCopiado = document.getElementById("link");
    textoCopiado.select();
    document.execCommand("Copy");
    alert("Texto Copiado: " + textoCopiado.value);
  }

  // função para copiar texto automaticamente atraves do IDlink2
function copiarManage() {
  var textoCopiado = document.getElementById("link2");
  textoCopiado.select();
  document.execCommand("Copy");
  alert("Texto Copiado: " + textoCopiado.value);
}