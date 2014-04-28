<?php include('header.php'); ?>
<aside class="right-side">
    <section class="content-header">
        <h1>
            Dashboard
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
	        <div class="col-md-6">
				<div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Listado de usuarios</h3>
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
                                	<button class="btn btn-info btn-sm">Editar</button>
                                	<button class="btn btn-danger btn-sm">Deshabilitar</button>
                                </td>
                            </tr>
                            <tr>
                                <td>2.</td>
                                <td>usuario 2</td>
                                <td>nombre del usuario 2</td>
                                <td>apellido del usuario 2</td>
                                <td>estado del usuario 2</td>
                                <td>
                                	<button class="btn btn-info btn-sm">Editar</button>
                                	<button class="btn btn-danger btn-sm">Deshabilitar</button>
                                </td>
                            </tr>
                            <tr>
                                <td>3.</td>
                                <td>Usuario 3</td>
                                <td>nombre del usuario 3</td>
                                <td>apellido del usuario 3</td>
                                <td>estado del usuario 3</td>
                                <td>
                                	<button class="btn btn-info btn-sm">Editar</button>
                                	<button class="btn btn-danger btn-sm">Deshabilitar</button>
                                </td>
                            </tr>
                            <tr>
                                <td>4.</td>
                                <td>Usuario 4</td>
                                <td>nombre del usuario 4</td>
                                <td>apellido del usuario 4</td>
                                <td>estado del usuario 4</td>
                                <td>
                                	<button class="btn btn-info btn-sm">Editar</button>
                                	<button class="btn btn-danger btn-sm">Deshabilitar</button>
                                </td>
                            </tr>
                        </tbody></table>
                    </div><!-- /.box-body -->
                </div>
	        </div>
		</div>
    </section>
</aside>
<?php include('footer.php'); ?>