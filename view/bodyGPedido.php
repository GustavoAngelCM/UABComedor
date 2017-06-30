<?php
include '../model/conexion.php';
include '../model/Almacen.php';
include '../model/producto.php';
include '../model/ProductoModel.php';
include '../model/Plato.php';
include '../model/PlatoModel.php';
include '../controller/ctrProducto.php';
include '../controller/ctrPlato.php';
$conexion = new Conexion();
$productoManejador = new ManageProducto($conexion);
$listaProductos = $productoManejador->productosStock("");

$platoManejador = new PlatoControlador($conexion);
$listaPlatos = $platoManejador->listar();

?>
<div class="container">
  <div class="row">
    <div class="col-xs-1 col-sm-2 col-md-2"></div>
    <div class="col-xs-10 col-sm-8 col-md-8">
      <div class="text-center well">
        <h2>PEDIDOS</h2>
      </div>
      <div class="panel panel-primary">
        <div class="panel-heading">
          <h2 class="panel-title">Pedido De Platos/Productos</h2>
        </div>
        <div class="panel-body">
          <label>Platos</label>
          <select id="platoPedido" class="selectpicker form-control" name="plato">
            <option value="">Productos Independientes</option>
            <?php foreach ($listaPlatos as $listaP): ?>
              <option value="<?php echo $listaP->IdPlato ?>"><?php echo $listaP->NombrePlato ?></option>
            <?php endforeach; ?>
          </select>
          <hr>
          <div class="table-responsive" id="tablaRespuesta">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th class="text-center">Producto</th>
                  <th class="text-center">Cantidad Disponible</th>
                  <th>Cantidad a Pedir</th>
                </tr>
              </thead>
              <tbody>
                <div id="mensajeRespuesta"></div>
                <?php foreach ($listaProductos as $listaP): ?>
                  <tr>
                    <td class="text-center"><?php echo $listaP->C_Producto->NombreProducto ?></td>
                    <td class="text-center"><?php echo $listaP->Cantidad ?></td>
                    <td class="text-center">
                      <input type="text" name="cantidaPedido[]" class="form-control cantidaPedido" style="width: 100px">
                      <input type="hidden" name="idPedido[]" class="idPedido" value="<?php echo $listaP->C_Producto->IdProducto ?>">
                    </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
          <div class="pull-right">
            <button type="button" name="guardar" class="btn btn-success" id="guardarPedido">Guardar Pedido <i class="fa fa-paper-plane"></i></button>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xs-1 col-sm-2 col-md-2"></div>
  </div>
</div>
