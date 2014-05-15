<aside class="right-side">
    <section class="content-header">
    
        <h1>
            titulo de Compra
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </section>
    <section class="content">
    <div id="errorfechacompra" class="alert alert-danger alert-dismissable">
	    <i class="fa fa-ban"></i>
	    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	    <b>Debes ingresar la fecha de compra.</b>
	</div>
    <div id="errornumerofb" class="alert alert-danger alert-dismissable">
	    <i class="fa fa-ban"></i>
	    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	    <b>Debes ingresar el número de factura.</b>
	</div>
    <div id="errorguia" class="alert alert-danger alert-dismissable">
	    <i class="fa fa-ban"></i>
	    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	    <b>Debes ingresar número de guía.</b>
	</div>
    <div id="errorproveedor" class="alert alert-danger alert-dismissable">
	    <i class="fa fa-ban"></i>
	    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	    <b>Debes ingresar el proveedor.</b>
	</div>
    <div id="errorcambio" class="alert alert-danger alert-dismissable">
	    <i class="fa fa-ban"></i>
	    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	    <b>Debes ingresar el tipo de cambio.</b>
	</div>
    <div id="errornumproducto" class="alert alert-danger alert-dismissable">
	    <i class="fa fa-ban"></i>
	    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	    <b>Debes registrar por lo menos un productos para realizar la compra.</b>
	</div>
		<div class="row">
		    <div class="col-md-12">
		        <!-- general form elements -->
		        <div class="box box-primary">
		            <form id="formRegistroCompra" action="<?php echo site_url('compra/set_registrar_compra');?>" role="form" method="post">
			        	<div class="row">
							<div class="col-md-12">
								<div class="box">
					                <div class="box-body" id="appendCampos">
					                    <div class="form-group col-lg-6 col-xs-6 relative">
					                    <label for="txtfechacompra">Fecha de compra:</label>
                                            <input type="text" name="fecha_compra" id="txtfechacompra" class="form-control">
					                    </div>
					                    <div class="form-group col-lg-6 col-xs-6">
					                        <label for="txttipocompra">Tipo de compra:</label>
					                        <select name="tipo_compra" id="txttipocompra" class="form-control">
					                        	<?php echo $tipo_compra?>	
					                        </select>
					                    </div>
					                    <div class="form-group col-lg-6 col-xs-6">
					                        <label for="txtnumerofb"># de factura o boleta:</label>
					                        <input type="text" name="numero_documento" class="form-control" id="txtnumerofb" value="" placeholder="Número de factura o boleta">
					                    </div>
					                    <div id="divGuia" class="form-group col-lg-6 col-xs-6">
					                        <label for="txtguia"># de guía:</label>
					                        <input type="text" name="numero_guia" class="form-control" id="txtguia" value="" placeholder="Número de guía">
					                    </div>
					                    <div class="form-group col-lg-12 col-xs-12">
					                        <label for="txtproveedor">Proveedor:</label>
					                        <input type="text" name="proveedor" class="form-control" id="txtproveedor" value="" placeholder="Proveedor">
					                    </div>
					                    <div class="form-group col-lg-6 col-xs-6">
					                        <label for="txttipocompra">Razón social:</label>
					                        <select name="razon_social" id="txttipocompra" class="form-control">
					                        	<option value="0">TIERS EBEN-EZER</option>
					                        	<option value="1">MARIA ELENA ENCIZO CHAVEZ</option>
					                        </select>
					                    </div>
					                    <div class="form-group col-lg-6 col-xs-6">
					                        <label for="txtmoneda">Moneda:</label>
					                        <select name="moneda" id="txtmoneda" class="form-control">
					                        	<?php echo $moneda;?>
					                        </select>
					                    </div>
					                    <div class="form-group col-lg-12 col-xs-12">
					                        <label for="txtcambio">Tipo de cambio:</label>
					                        <input type="text" name="tipo_cambio" class="form-control" id="txtcambio" value="0" placeholder="Tipo de cambio">
					                    </div>
					                    <div class="col-lg-12 col-xs-12" style="padding:0">
						                    <div class="form-group col-lg-6 col-xs-6">
						                        <label for="txttipopago">Tipo de pago:</label>
						                        <select name="tipo_pago" id="txttipopago" class="form-control">
						                        	<?php echo $tipo_pago;?>
						                        </select>
						                    </div>
					                    </div>
					                    <div class="form-group col-lg-12 col-xs-12">
									    <div id="errorlistadoproducto" class="alert alert-danger alert-dismissable">
										    <i class="fa fa-ban"></i>
										    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
										    <b>Debes ingresar todos los campos para agregar una compra.</b>
										</div>
										</div>
					                    <div class="form-group col-lg-3 col-xs-3">
					                        <label for="txtmarca">Marca:</label>
					                        <input type="text" class="campos-dinamicos form-control" id="txtmarcap" value="" placeholder="Nombre marca" autocomplete="off">
					                        <div id="sugerenciasMarcap"></div>
					                        <input type="hidden" id="marcaRealp">
					                    </div>
					                    <div class="form-group col-lg-3 col-xs-3">
					                        <label for="txtproducto">Producto:</label>
					                        <input type="text" class="campos-dinamicos form-control" id="txtproducto" value="" placeholder="nombre producto" autocomplete="off">
					                        <div id="sugerenciasProductop"></div>
					                        <input type="hidden" id="ProductoRealp">
					                    </div>
					                    <div class="form-group col-lg-3 col-xs-3">
					                        <label for="txtcantidad">Cantidad:</label>
					                        <input type="text" class="campos-dinamicos form-control" id="txtcantidad" value="" placeholder="Cantidad">
					                    </div>
					                    <div class="form-group col-lg-3 col-xs-3">
					                        <label for="txtpunitario">P. Unitario:</label>
					                        <input type="text" class="campos-dinamicos form-control" id="txtpunitario" value="" placeholder="Precio unitario">
					                    </div>
					                    <div class="col-lg-12 col-xs-12">
					                    	<div type="submit" id="btnAgregarCompra" class="btn btn-primary btnAgregar">Agregar</div>
					                    </div>
					                </div>
					                <br>
									<div class="row">
										<div class="col-md-12">
											<div class="box">
											    <div class="box-header">
											        <h3 class="box-title">Listado de compras</h3>
											    </div><!-- /.box-header -->
											    <div class="box-body">
											        <table class="table table-bordered">
											            <tbody id="listadoCompras">
											            <tr>
											                <th>Producto</th>
											                <th>Cantidad</th>
											                <th>P. Unitario</th>
											                <th>TOTAL</th>
											            </tr>
											        </tbody></table>
											    </div><!-- /.box-body -->
											</div>
										</div>
										<input type="hidden" name="resultadosubtotal" id="txtresultadosubtotal">
										<input type="hidden" name="resultadoigv" id="txtresultadoigv">
										<input type="hidden" name="resultadototal" id="txtresultadototal">
										<div class="col-md-4 text-right">
											<div class="box">
											    <div class="box-body">
							                        <table class="table table-bordered">
							                            <tbody>
							                            <tr>
							                           		<td>SUBTOTAL</td>
							                           		<td id="resultado-subtotal">
							                           			0
							                           		</td>
							                            </tr>							                            
							                             <tr id="trigv">
							                                <td>IGV</td>
							                                <td id="resultado-igv">
							                                    0
							                                </td>
							                             </tr>
							                             <tr>
							                             	<td>TOTAL</td>
							                                <td id="resultado-total">
							                                	0
							                                </td>
							                             </tr>
							                            </tbody>
							                        </table>
											    </div>
											</div>
										</div>
									</div>
									<div class="box-footer">
                    					<div id="btnRegistroCompra" class="btn btn-primary btnInactivo btnEnviar">Validar</div>
                    					<button value="asd" type="submit" id="btnRegistroCompra2" class="btn btn-primary btnActivo btnEnviar">Enviar</button>
               						 </div>
								</div>
							</div>
						</div>
		            </form>
		        </div>
		    </div>
		</div>
    </section>
</aside>