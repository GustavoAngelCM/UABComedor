<?php
include '../model/conexion.php';
include '../model/pedido.php';
include '../model/PedidoConsulta.php';
include '../model/detallePedido.php';
include '../model/DetallePedidoConsulta.php';
include '../controller/ctrPedido.php';

$conexion = new Conexion();

$pedidoManage = new ManagePedido($conexion);
$listaPedidos = $pedidoManage->listar();
$i = 0;
//var_dump($listaPedidos);

?>
<div class="container">
  <div class="row">

    <div class="text-center well" style="opacity:0.9">
        <h1>DESPACHOS</h1>
    </div>

    <div class="col-sm-1 col-md-1"></div>
    <div class="col-sm-10 col-md-10">

      <div class="" style="opacity: 0.93;">
        <ul class="nav nav-tabs" role="tablist">
          <li role="presentation" class="active"><a href="#pedidos" aria-controls="pedidos" role="tab" data-toggle="tab"><i class="fa fa-shopping-bag"></i>  <span>Pedios En Espera a ser Despachados</span></a></li>
          <li role="presentation"><a href="#despachosHoy" aria-controls="despachosHoy" role="tab" data-toggle="tab"><i class="fa fa-shopping-basket"></i>  <span>Pedidos Despachados Hoy</span></a></li>
          <li role="presentation"><a href="#despachos" aria-controls="despachos" role="tab" data-toggle="tab"><i class="fa fa-shopping-cart"></i>  <span>Despachos Realizados</span></a></li>

        </ul>

        <!-- Tab panes -->
        <div class="tab-content card">
          <div role="tabpanel" class="tab-pane active" id="pedidos">
            <button type="button" name="despachar" class="btn btn-success btn-lg" id="despacharPedidos">Despachar Pedidos</button>
            <br><div id="mensaje"></div><br>
            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

              <?php foreach ($listaPedidos as $listaP): $i++;?>

                <div class="panel panel-warning">
                  <div class="panel-heading" role="tab" id="headingTwo">
                    <h4 class="panel-title">
                      <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#<?php echo $listaP->IdPedido ?>" aria-expanded="false" aria-controls="<?php echo $listaP->IdPedido ?>">
                        <i>Pedido <?php echo $i ?>: </i><?php echo $listaP->CantidadPlato." platos de ".$listaP->C_Plato ?>
                      </a>
                    </h4>
                  </div>
                  <div id="<?php echo $listaP->IdPedido ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                    <div class="panel-body">

                      <div class="table-responsive">
                        <table class="table table-hover">
                          <thead>
                            <tr>
                              <th>Producto</th>
                              <th>Cantidad</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php foreach ($listaP->getListaDetallePedido() as $listaDP): ?>
                              <tr>
                                <td><?php echo $listaDP->C_Almacen; ?></td>
                                <td><?php echo $listaDP->Cantidad; ?></td>
                              </tr>
                            <?php endforeach; ?>
                          </tbody>
                        </table>

                      </div>

                    </div>
                  </div>
                </div>

              <?php endforeach; ?>

            </div>

          </div>
          <div role="tabpanel" class="tab-pane" id="despachosHoy">

          </div>
          <div role="tabpanel" class="tab-pane" id="despachos"></div>

        </div>
      </div>

    </div>
    <div class="col-sm-1 col-md-1"></div>

  </div>
</div>
