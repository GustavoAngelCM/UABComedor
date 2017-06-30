$(document).ready(function () {
  enviarPedidoRegistro();
});

function enviarPedidoRegistro() {
  $('#guardarPedido').click(function (e) {
    e.preventDefault();
    var cantidades = $('.cantidaPedido').serialize();
    var idProducto = $('.idPedido').serialize();
    var idPlato = $('#platoPedido').serialize();
    var data = cantidades + "&" + idPlato + "&" + idProducto;
    console.log(data);
    $.ajax({
      "method" : "POST",
      "url" : "menuNutricionista.php?modo=registrarPedido",
      "data" : data
    }).done(function (info) {
      $('#mensajeRespuesta').html(info);
    });
  });
}
