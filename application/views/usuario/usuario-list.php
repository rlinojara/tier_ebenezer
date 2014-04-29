<aside class="right-side">
    <section class="content-header">
        <h1>
            Listado de usuarios
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
                <div id="superiorList">
                    <div class="btn-group-vertical">
                        <?php echo anchor('usuario/registrar_usuario','Agregar','class="btn btn-primary btn-flat"'); ?>
                    </div>
                </div>
				<div class="box">
                    <div class="box-header">
                    </div><!-- /.box-header -->
                    <div class="box-body no-padding">
                        <table class="table table-striped">
                            <tbody>
                            	<tr>
	                                <th style="width: 10px">#</th>
	                                <th>Usuario</th>
	                                <th>Nombres</th>
	                                <th>Apellidos</th>
	                                <th>Estados</th>
	                                <th style="width: 160px">Acciones</th>
                            	</tr>
                            <tr>
                             	<td>1.</td>
                                <td>usuario 1</td>
                                <td>nombre del usuario 1</td>
                                <td>apellido del usuario 1</td>
                                <td>estado del usuario 1</td>
                                <td>
                                    <?php echo anchor('usuario/registrar_usuario','Editar','class="btn btn-info btn-sm"'); ?>
                                    <?php echo anchor('usuario/deshabilitar_usuario','Deshabilitar','class="btn btn-danger btn-sm"'); ?>
                                </td>
                            </tr>
                            <tr>
                                <td>2.</td>
                                <td>usuario 2</td>
                                <td>nombre del usuario 2</td>
                                <td>apellido del usuario 2</td>
                                <td>estado del usuario 2</td>
                                <td>
                                    <?php echo anchor('usuario/registrar_usuario','Editar','class="btn btn-info btn-sm"'); ?>
                                    <?php echo anchor('usuario/deshabilitar_usuario','Deshabilitar','class="btn btn-danger btn-sm"'); ?>
                                </td>
                            </tr>
                            <tr>
                                <td>3.</td>
                                <td>Usuario 3</td>
                                <td>nombre del usuario 3</td>
                                <td>apellido del usuario 3</td>
                                <td>estado del usuario 3</td>
                                <td>
                                    <?php echo anchor('usuario/registrar_usuario','Editar','class="btn btn-info btn-sm"'); ?>
                                    <?php echo anchor('usuario/deshabilitar_usuario','Deshabilitar','class="btn btn-danger btn-sm"'); ?>
                                </td>
                            </tr>
                            <tr>
                                <td>4.</td>
                                <td>Usuario 4</td>
                                <td>nombre del usuario 4</td>
                                <td>apellido del usuario 4</td>
                                <td>estado del usuario 4</td>
                                <td>
                                    <?php echo anchor('usuario/registrar_usuario','Editar','class="btn btn-info btn-sm"'); ?>
                                    <?php echo anchor('usuario/deshabilitar_usuario','Deshabilitar','class="btn btn-danger btn-sm"'); ?>
                                </td>
                            </tr>
                        </tbody></table>
                    </div><!-- /.box-body -->
                </div>
	        </div>
		</div>
    </section>
</aside>