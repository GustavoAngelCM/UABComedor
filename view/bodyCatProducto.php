<?php
include '../model/conexion.php';
include '../model/categoria.php';
include '../model/consultasBasicas.php';
include '../controller/ctrCategoria.php';
$con = new Conexion();
$manage = new ManageCategoria($con);
$litaCat = $manage->listaCategoria();
?>
<div class="container">
        <div class="text-center well" style="opacity:0.6">
            <h1>Categorias Y Metricas</h1>
        </div>
        <div class="row">
            <div class="col-sm-1 col-md-1"></div>
            <div class="col-sm-4 col-md-4">

                <div class="panel panel-primary">
        					<div class="panel-heading">
        						<h2 class="panel-title">Acciones Posibles CATEGORIA</h2>
        						<div class="pull-right">
											<a href="#RegistroCat" data-toggle="modal" class="clickable filter btn btn-success"><i class="fa fa-plus" data-toggle="tooltip" title="Añadir nueva Categoria"></i></a>
        							<span class="clickable filter btn btn-info" data-toggle="tooltip" title="Click aqui para buscar una Categoria" data-container="body">
        								<i class="fa fa-search"></i>
        							</span>
        						</div><br><br>
                    <div class="table-responsive">
                      <table class="table">
                        <thead class="desk">
                          <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">Nombre</th>
                            <th class="text-center">Editar</th>
                          </tr>
                        </thead>
                      </table>
                    </div>

        					</div>
        					<div class="panel-body" style="display: none">
        						<input type="text" class="form-control" id="dev-table-filter" data-action="filter" data-filters="#dev-table" placeholder="Buscar Categoria" />
        					</div>
                  <div class="table-responsive" style="height:350px;overflow-y:scroll;;">
                    <table class="table table-hover" id="dev-table" >

                      <tbody class="text-center">
                        <?php foreach ($litaCat as $listaC): ?>
                          <tr>
                            <td><?php echo $listaC->IdCategoria; ?></td>
                            <td><?php echo $listaC->NombreCategoria; ?></td>
                            <td><a href="#editar<?php echo $listaC->IdCategoria; ?>" class="btn btn-primary" ><i class="fa fa-pencil"></i></a></td>
                          </tr>
                        <?php endforeach; ?>
                      </tbody>
                    </table>
                  </div>
                  </div>

            </div>
            <div class="col-sm-2 col-md-2"></div>
            <div class="col-sm-4 col-md-4">

              <div class="panel panel-primary">
                <div class="panel-heading">
                  <h2 class="panel-title">Acciones Posibles METRICA</h2>
                  <div class="pull-right">
                    <a href="#RegistroMet" data-toggle="modal" class="clickable filter btn btn-success"><i class="fa fa-plus" data-toggle="tooltip" title="Añadir nueva Metrica"></i></a>
                    <span class="clickable filter btn btn-info" data-toggle="tooltip" title="Click aqui para buscar una Metrica" data-container="body">
                      <i class="fa fa-search"></i>
                    </span>
                  </div><br><br>
                  <div class="table-responsive">
                    <table class="table">
                      <thead class="desk">
                        <tr>
                          <th class="text-center">#</th>
                          <th class="text-center">Nombre</th>
                          <th class="text-center">Abreviatura</th>
                          <th class="text-center">Editar</th>
                        </tr>
                      </thead>
                    </table>
                  </div>

                </div>
                <div class="panel-body" style="display: none">
                  <input type="text" class="form-control" id="dev-table-filter" data-action="filter" data-filters="#dev-table" placeholder="Buscar Metrica" />
                </div>
                <div class="table-responsive" style="height:350px;overflow-y:scroll;;">
                  <table class="table table-hover" id="dev-table" >

                    <tbody class="text-center">

                    </tbody>
                  </table>
                </div>
                </div>

            </div>
            <div class="col-sm-1 col-md-1"></div>
        </div>
</div>

<div class="modal fade" id="RegistroCat">
  <div class="modal-dialog">
    <div class="modal-content">
      <form action="menuAdmin.php?modo=rCat" method="post">
        <div class="modal-header">
          <button type="button" name="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h3 class="modal-title">Crear una Nueva <i class="fa fa-arrow-right"></i> Categoria</h3>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <div class="input-group">
              <span class="input-group-addon" id="sizing-addon2" style="background:red; color:white"><i class="fa fa-linode"></i></span>
              <input type="text" class="form-control" placeholder="Nombre Categoria: " maxlength="30" aria-describedby="sizing-addon2" name="nombre" required>
            </div>
          </div>
        </div>
        <input type="hidden" name="datos" value="1">
        <div class="modal-footer">
          <button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Cancelar <i class="fa fa-times-circle"></i></button>
          <button type="reset" value="Reset" name="reset" class="btn btn-default">Limpiar <span class="fa fa-refresh"></span></button>
          <button type="submit" class="btn btn-success">Guardar <i class="fa fa-check-circle"></i></button>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="RegistroMet">
  <div class="modal-dialog">
    <div class="modal-content">
      <form action="nenuAdmin.php?modo=rMet" method="post">
        <div class="modal-header">
          <button type="button" name="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h3 class="modal-title">Crear una Nueva <i class="fa fa-arrow-right"></i> Metrica</h3>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <div class="input-group">
              <span class="input-group-addon" id="sizing-addon2" style="background:red; color:white"><i class="fa fa-linode"></i></span>
              <input type="text" class="form-control" placeholder="Nombre Metrica: " aria-describedby="sizing-addon2" name="nombre" required>
            </div>
          </div>
          <div class="form-group">
            <div class="input-group">
              <span class="input-group-addon" id="sizing-addon2" style="background:red; color:white"><i class="fa fa-linode"></i></span>
              <input type="text" class="form-control" placeholder="Abreviatura Metrica: " aria-describedby="sizing-addon2" name="abrev" required>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Cancelar <i class="fa fa-times-circle"></i></button>
          <button type="reset" value="Reset" name="reset" class="btn btn-default">Limpiar <span class="fa fa-refresh"></span></button>
          <button type="submit" class="btn btn-success">Guardar <i class="fa fa-check-circle"></i></button>
        </div>
      </form>
    </div>
  </div>
</div>
