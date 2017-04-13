<div class="container">
	<div class="row">
		<div class="col-sm-2 col-md-3"></div>
		<div class="col-sm-8 col-md-6">
			<div class="text-center">
				<div class="well" style="background-color: black; color: white; opacity: 0.7">
      				<h4>Productos</h4>
    			</div>
			</div>
			<div class="lisProd">
				<div class="panel panel-default">
					<div class="panel-body">
						<div class="table-responsive">
							<table class="table table-hover">
							<thead style="background: rgba(140, 110, 65, 0.81)">
								<tr>
									<th>#</th>
									<th>Nombre</th>
									<th>Ver</th>
									<th>Editar</th>
									<th>Dar de Baja</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>1</td>
									<td>papa</td>
									<td ><a style="color: green" href="#verPapa" data-toggle="modal"><i class="fa fa-address-card"></i></a></td>
									<td ><a style="color: blue" href="#editarPapa" data-toggle="modal"><i class="fa fa-pencil"></i></a></td>
									<td ><a style="color: red" href="#"><i class="fa fa-remove"></i></a></td>
								</tr>
								<tr>
									<td>1</td>
									<td>papa</td>
									<td style="color: green"><i class="fa fa-address-card"></i></td>
									<td style="color: blue"><i class="fa fa-pencil"></i></td>
									<td style="color: red"><i class="fa fa-remove"></i></td>
								</tr>
								<tr>
									<td>1</td>
									<td>papa</td>
									<td style="color: green"><i class="fa fa-address-card"></i></td>
									<td style="color: blue"><i class="fa fa-pencil"></i></td>
									<td style="color: red"><i class="fa fa-remove"></i></td>
								</tr>
								<tr>
									<td>1</td>
									<td>papa</td>
									<td style="color: green"><i class="fa fa-address-card"></i></td>
									<td style="color: blue"><i class="fa fa-pencil"></i></td>
									<td style="color: red"><i class="fa fa-remove"></i></td>
								</tr>
								<tr>
									<td>1</td>
									<td>papa</td>
									<td style="color: green"><i class="fa fa-address-card"></i></td>
									<td style="color: blue"><i class="fa fa-pencil"></i></td>
									<td style="color: red"><i class="fa fa-remove"></i></td>
								</tr>
							</tbody>
						</table>
						</div>
						
					</div>
				</div>
			</div>
			<div class="modal fade" id="verPapa">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" name="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                			<h3 class="modal-title">Detalle</h3>
						</div>
						<div class="modal-body">
							<div class="text-center">
								<h3>Papa</h3>
								<center><img src="multimedia/img/papa.jpg" class="img-responsive img-circle" height="250" width="250"></center>
								<p>Categoria: Tuberculos</p>
								<p>Unidad Medida: Kilogramos</p>
							</div>

						</div>
						<div class="modal-footer">
							<button class="btn btn-success">VOLVER</button>
						</div>

					</div>
				</div>
			</div>
			<div class="modal fade" id="editarPapa">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" name="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                			<h3 class="modal-title">Editar datos Papa</h3>
						</div>
						<div class="modal-body">
							<div class="text-center">
								<input class="form-control" type="text" name="nom" placeholder="Nombre : Papa"><br>
								<input class="form-control" type="text" name="nom" placeholder="Categoria : Tuberculos"><br>
								<input class="form-control" type="text" name="nom" placeholder="Unidad de Medida : Kilogramos">
								<br>
								<center><img src="multimedia/img/papa.jpg" class="img-responsive img-circle" height="100" width="100"><button class="btn btn-primary"><i class="fa fa-pencil"></i></button></center>
							</div>

						</div>
						<div class="modal-footer">
							<button class="btn btn-danger">CANCELAR</button>
							<button class="btn btn-success">EDITAR</button>
						</div>
					</div>
				</div>
			</div>
				<!--<div class="registro">


                    <div class="panel panel-default">

	                    <form action="control/registro.php" method="POST">
		                    <div class="panel-body">

		                        <div class="form-group">
		                            <div class="input-group">
		                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
		                                <input type="text" name="pName" placeholder="Primer Nombre" class="form-control" required>
		                            </div>
		                        </div>

		                        <div class="form-group">
		                            <div class="input-group">
		                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
		                                <input type="text" name="sName" placeholder="Segundo Nombre" class="form-control">
		                            </div>
		                        </div>

		                        <div class="form-group">
		                            <div class="input-group">
		                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
		                                <input type="text" name="aPaterno" placeholder="Apellido Paterno" class="form-control" required>
		                            </div>
		                        </div>

														<div class="form-group">
		                            <div class="input-group">
		                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
		                                <input type="text" name="aMaterno" placeholder="Apellido Materno" class="form-control" required>
		                            </div>
		                        </div>

														<div class="form-group">
															<div class="input-group">
																	<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
															    <input type="text" class="form-control" id="dateNac" name="dateNac" placeholder="Fecha de Nacimiento">
						    								</div>
														</div>

														<div class="form-group">
								                <div class="input-group">
								                    <span class="input-group-addon"><i class="fa fa-phone"></i></span>
								                    <input type="number" name="telefono" placeholder="Numero de Telefono" class="form-control">
								                </div>
								           </div>

													 <div class="form-group">
															 <div class="input-group">
																	 <span class="input-group-addon"><i class="fa fa-user"></i></span>
																	 <input type="number" name="edad" placeholder="Edad" class="form-control">
															 </div>
													</div>

													<div class="btn-group" data-toggle="buttons">
														  <label class="btn btn-primary">
														    <input type="radio" name="sexo" id="M" autocomplete="off" value="M"><i class="fa fa-male">Masculino</i>
														  </label>
														  <label class="btn btn-primary">
														    <input type="radio" name="sexo" id="F" autocomplete="off" value="F"><i class="fa fa-female">Femenino</i>
														  </label>
												 </div><hr>

												 <div class="form-group">
				 		                <div class="input-group">
				 		                    <span class="input-group-addon"><i class="fa fa-address-card"></i></span>
				 		                    <textarea name="oracion" rows="4" placeholder="Pedido de Oracion" class="form-control" type="text"></textarea>
				 		                </div>
				 		            </div>


												<input type="hidden" name="datos" value="1">
												<hr>
		                    <div class="">
		                    		<button type="submit" class="btn btn-success pull-right">Guardar <span class="fa fa-paper-plane"></span></button>
		                        <button type="reset" value="Reset" name="reset" class="btn">Limpiar <span class="fa fa-refresh"></span></button>
		                    </div>
		                    </div>
	                    </form>

                	</div>

  				</div>-->
		</div>
		<div class="col-sm-2 col-md-3"></div>
	</div>
</div>