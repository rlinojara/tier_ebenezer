<aside class="right-side">
    <section class="content-header">
        <h1>
            Registro de usuario
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
	                <form action="<?php echo base_url();?>/usuario/set_registrar_usuario" role="form">
	                    <div class="box-body">
	                        <div class="form-group">
	                            <label for="exampleInputEmail1">Nombre:</label>
	                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="">
	                        </div>
	                        <div class="form-group">
	                            <label for="exampleInputEmail1">Apellidos:</label>
	                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="">
	                        </div>
	                        <div class="form-group">
	                            <label for="exampleInputEmail1">Correo electrónico:</label>
	                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="">
	                        </div>
	                        <div class="form-group">
	                            <label for="exampleInputPassword1">Contraseña</label>
	                            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="">
	                        </div>
	                        <div class="form-group">
	                            <label for="exampleInputPassword1">Confirmar contraseña</label>
	                            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="">
	                        </div>
	                    </div><!-- /.box-body -->

	                    <div class="box-footer">
	                        <button type="submit" class="btn btn-primary">Submit</button>
	                    </div>
	                </form>
	            </div>
	        </div>
		</div>
    </section>
</aside>