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
		<div class="row">
		    <div class="col-md-12">
		        <!-- general form elements -->
		        <div class="box box-primary"><!-- /.box-header -->
		            <!-- form start -->
		            <form id="formRegistroCompra" action="<?php echo site_url('set_registrar_compra');?>" role="form" method="post">
		                <div class="box-body">
		                    <div class="form-group col-lg-6 col-xs-6">
		                        <label for="txtfechacompra">Fecha de compra:</label>
		                        <input type="text" name="fechacompra" class="form-control" id="txtfechacompra" value="" placeholder="Fecha de compra">
		                    </div>
		                    <div class="form-group col-lg-6 col-xs-6">
		                        <label for="txttipocompra">Tipo de compra:</label>
		                        <select name="tipocompra" id="txttipocompra" class="form-control">
		                        	<option value="0">Boleta</option>
		                        	<option value="1">Factura</option>
		                        </select>
		                    </div>
		                    <div class="form-group col-lg-6 col-xs-6">
		                        <label for="txtnumerofb"># de factura o boleta:</label>
		                        <input type="text" name="numerofb" class="form-control" id="txtnumerofb" value="" placeholder="Número de factura o boleta">
		                    </div>
		                    <div id="divGuia" class="form-group col-lg-6 col-xs-6">
		                        <label for="txtguia"># de guía:</label>
		                        <input type="text" name="guia" class="form-control" id="txtguia" value="" placeholder="Número de guía">
		                    </div>
		                    <div class="form-group col-lg-12 col-xs-12">
		                        <label for="txtproveedor">Proveedor:</label>
		                        <input type="text" name="proveedor" class="form-control" id="txtproveedor" value="" placeholder="Número de guía">
		                    </div>
		                    <div class="form-group col-lg-6 col-xs-6">
		                        <label for="txttipocompra">Razón social:</label>
		                        <select name="tipocompra" id="txttipocompra" class="form-control">
		                        	<option value="0">TIERS EBEN-EZER</option>
		                        	<option value="1">MARIA ELENA ENCIZO CHAVEZ</option>
		                        </select>
		                    </div>
		                    <div class="form-group col-lg-6 col-xs-6">
		                        <label for="txtmoneda">Moneda:</label>
		                        <select name="moneda" id="txtmoneda" class="form-control">
		                        	<option value="0">moneda1</option>
		                        	<option value="1">moneda2</option>
		                        </select>
		                    </div>
		                    <div class="form-group col-lg-12 col-xs-12">
		                        <label for="txtcambio">Tipo de cambio:</label>
		                        <input type="text" name="cambio" class="form-control" id="txtcambio" value="" placeholder="Número de guía">
		                    </div>
		                    <div class="col-lg-12 col-xs-12" style="padding:0">
			                    <div class="form-group col-lg-6 col-xs-6">
			                        <label for="txttipopago">Tipo de pago:</label>
			                        <select name="tipopago" id="txttipopago" class="form-control">
			                        	<option value="0">tipopago1</option>
			                        	<option value="1">tipopago2</option>
			                        </select>
			                    </div>
		                    </div>
		                    <div class="form-group col-lg-3 col-xs-3">
		                        <label for="txtmarca">Marca:</label>
		                        <input type="text" name="marca" class="form-control" id="txtmarcap" value="" placeholder="Nombre marca" autocomplete="off">
		                    </div>
		                    <div class="form-group col-lg-3 col-xs-3">
		                        <label for="txtproducto">Producto:</label>
		                        <input type="text" name="producto" class="form-control" id="txtproducto" value="" placeholder="nombre producto" autocomplete="off">
		                    </div>
		                    <div class="form-group col-lg-3 col-xs-3">
		                        <label for="txtcantidad">Cantidad:</label>
		                        <input type="text" name="cantidad" class="form-control" id="txtcantidad" value="" placeholder="Cantidad">
		                    </div>
		                    <div class="form-group col-lg-3 col-xs-3">
		                        <label for="txtpunitario">P. Unitario:</label>
		                        <input type="text" name="punitario" class="form-control" id="txtpunitario" value="" placeholder="Precio unitario">
		                    </div>
		                    <div class="col-lg-12 col-xs-12">
		                    	<div id="btnAgregarCompra" class="btn btn-primary btnAgregar">Agregar</div>
		                    </div>
		                </div>
		                <div class="box-footer col-lg-12 col-xs-12">
		                    <div id="btnRegistroCompra" class="btn btn-primary btnInactivo btnEnviar">Validar</div>
		                    <button value="asd" type="submit" id="btnRegistroCompra2" class="btn btn-primary btnActivo btnEnviar">Enviar</button>
		                </div>
		            </form>
		        </div>
		    </div>
		</div>
    </section>
</aside>