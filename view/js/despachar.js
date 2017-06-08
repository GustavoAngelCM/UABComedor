$(document).ready(function () {
  despachar();
});

function despachar() {
  $("#despacharPedidos").click(function() {
    
    $.ajax({
      "method" : "POST",
      "url" : "menuAdmin.php?modo=despacharPedidos",
      "data" : 1
    }).done( function(info) {

    $('#mensaje').html(info);

    });

  });
}
