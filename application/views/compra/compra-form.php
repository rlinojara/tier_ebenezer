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
		            <form id="formRegistroCompra" action="<?php echo site_url();?>" role="form" method="post">
		                <div class="box-body">
		                    <div class="form-group">
		                        <label for="txtfechacompra">Fecha de compra:</label>
		                        <input type="text" name="fechacompra" class="form-control" id="txtfechacompra" value="" placeholder="Fecha de compra">
		                    </div>
		                </div>
		                <div class="box-footer">
		                    <div id="btnRegistroCompra" class="btn btn-primary btnInactivo btnEnviar">Validar</div>
		                    <button value="asd" type="submit" id="btnRegistroCompra2" class="btn btn-primary btnActivo btnEnviar">Enviar</button>
		                </div>
		            </form>
		        </div>
		    </div>
		</div>
    </section>
</aside>