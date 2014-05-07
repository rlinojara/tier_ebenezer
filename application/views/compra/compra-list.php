<aside class="right-side">
    <section class="content-header">
        <h1>
            Listado de compras
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
                        <?php echo anchor('compra/registrar_compra','Agregar','class="btn btn-primary btn-flat"'); ?>
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
	                                <th>campo1</th>
	                                <th>campo2</th>
	                                <th>campo3</th>
                                    <th>campo4</th>
	                                <th style="width: 160px">Acciones</th>
                            	</tr>
	                            <tr>
	                             	<td>1</td>
	                                <td>dato1</td>
	                                <td>dato2</td>
	                                <td>dato3</td>
	                                <td>
	                                    <?php 
	                                        if(1 == 1):
	                                            echo '<span class="btn btn-success disabled">Activo</span>';
	                                        else:
	                                            echo '<span class="btn btn-danger disabled">Inactivo</span>';
	                                        endif;
	                                    ?>
	                                </td>
	                                <td>
	                                    <?php 
	                                    echo anchor('compra/editar_compra/'.'1','Editar','class="btn btn-info btn-sm"');
	                                    if(1 == 1):
	                                        echo anchor('compra/deshabilitar_compra/'.'1','Deshabilitar','class="btn btn-danger btn-sm"'); 
	                                    else:
	                                        echo anchor('compra/habilitar_compra/'.'1','Habilitar','class="btn btn-success btn-sm"');
	                                    endif;
	                                    ?>

	                                </td>
	                            </tr>
                        	</tbody>
                        </table>
                        
                        <?php echo $paginacion?>
                    </div><!-- /.box-body -->
                </div>
	        </div>
		</div>
    </section>
</aside>