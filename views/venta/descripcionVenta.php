<?php
require_once 'views/layout/header.php';
require_once 'views/layout/navbar.php';
require_once 'views/layout/sidebar.php';
?>  

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>VENTA</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Inicio</a></li>
						<li class="breadcrumb-item active">Descripción de la venta</li>
					</ol>
				</div>
			</div>
		</div><!-- /.container-fluid -->
	</section>

	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-md-12 col-sm-12">

				<form name="formulario" id="formulario" method="POST">
					<div class="col-md-12">
						<!-- general form elements -->
						<div class="card card-primary">
							<div class="card-header">
								<h3 class="card-title">DESCRIPCIÓN DE LA VENTA</h3>
							</div>
							<!-- /.card-header -->
							<!-- form start -->
							<form id="formulario" name="formulario">
								<div class="card-body">

									<div class="row">
										<div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
											<label>CLIENTE(*):</label>
											<input type="hidden" name="idventa" id="idventa">
											<input type="text" class="form-control" readonly name="ver_cliente" value="<?= $rege->nombre_cli.' '.$rege->apellido_cli ?>">
										</div>
										<div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
											<label for="ver_fecha_hora">FECHA</label>
											<input type="date" readonly class="form-control" value="<?= $rege->fecha_venta ?>" id="fecha_hora" name="fecha_hora" >
										</div>
									</div>

									<div class='row'>
										<div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-12">
											<label for="tipo_comprobante">TIPO DE COMPROBANTE</label>
											<select name="tipo_comprobante" id="ver_tipo_comprobante" class="form-control selectpicker" disabled="true" required="">
												<option selected="true" value="Boleta">Boleta</option>
												<option value="Factura">Factura</option>
												<option value="Ticket">Ticket</option>
											</select>
										</div>
										<div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-12">
											<label for="num_comprobante">NUMERO DE COMPROBANTE</label>
											<input type="number" class="form-control" readonly id="ver_num_comprobante" name="num_comprobante" value="<?= $rege->num_venta ?>" placeholder="Numero de comprobante">
										</div>
										<div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-12">
											<label for="impuesto">IMPUESTO</label>
											<input type="number" readonly class="form-control" id="ver_impuesto" name="impuesto" <?= ($igvventa)? 'value='.$igvventa : '' ?> placeholder="Impuesto">
										</div>
									</div>

									<div class="card">
										<div class="card-header">
											<h3 class="card-title">DETALLE DE VENTA</h3>
										</div>
										<div class="col-sm-06">
											<!-- /.card-header -->
											<div class="card-body">
												<!-- BOTON AGREGAR ARTÍCULO (abre el modal) -->
												<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">

												</div>
												<div class="table-responsive">
													<table id="tabla_venta" class="table table-bordered table-striped table-condensed table-hover">
														<thead>
															<tr>
																<th></th>
																<th>ID</th>
																<th>Descripción</th>
																<th>Cantidad</th>
																<th>Precio venta</th>
																<th>Subtotal</th>
															</tr>
														</thead>
														<tfoot>
															<tr>
									                            <th>SUB-TOTAL</th>
									                            <th></th>
									                            <th> </th>
									                            <th></th>
									                            <th></th>
									                            <th><h4 id="ver_subtotal_calculado">S/. <?= $subtotalventa ?></h4><input type="hidden" name="ver_subtotal_venta" id="ver_subtotal_venta"></th>
									                          </tr>
									                          <tr>
									                            <th>IGV</th>
									                            <th></th>
									                            <th> </th>
									                            <th></th>
									                            <th></th>
									                            <th><h4 id="ver_igv_calculado">S/. <?= $igvcalc ?></h4><input type="hidden" name="igv_venta" id="ver_igv_venta"></th>
									                          </tr>
															<tr>
																<th>TOTAL</th>
																<th></th>
																<th></th>
																<th></th>
																<th></th>
																<th><h4 id="ver_total">S/. <?= $rege->total_venta ?></h4><input type="hidden" name="total_venta" id="ver_total_venta"></th>
															</tr>
														</tfoot>
														<tbody>
															<?php while($regd = $detalle->fetch_object()): ?>
																<tr>
																	<th></th>
																	<th><?= $regd->num_pro ?></th>
																	<th><?= $regd->descripcion_pro ?></th>
																	<th><?= $regd->cantidad ?></th>
																	<th><?= $regd->precio ?></th>
																	<th><?= $regd->subtotal ?></th>
																</tr>
															<?php endwhile; ?>
														</tbody>
													</table>
												</div>
											</div>
											<!-- /.card-body -->
										</div>

									</div>
								</div>

							</form>
						</div>
						<!-- /.col -->
					</div>
					<!-- /.row -->
				</section>
				<!-- /.content -->
			</div>


			<?php require_once 'views/layout/footer.php'; ?>