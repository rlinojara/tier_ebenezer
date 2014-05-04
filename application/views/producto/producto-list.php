<aside class="right-side">
    <section class="content-header">
        <h1>
            Listado de productos
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
                        <?php echo anchor('producto/registrar_producto','Agregar','class="btn btn-primary btn-flat"'); ?>
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
	                                <th>Marca</th>
	                                <th>Medida</th>
	                                <th>Modelo</th>
                                    <th>Estado</th>
	                                <th style="width: 160px">Acciones</th>
                            	</tr>
                            <?php for($i = 0 ; $i < count($productos); $i++):?>
                            <tr>
                             	<td>1.</td>
                                <td><?php echo $productos[$i]['nombre_marca']?></td>
                                <td><?php echo $productos[$i]['medida']?></td>
                                <td><?php echo $productos[$i]['modelo']?></td>
                                <td>
                                    <?php 
                                        if($productos[$i]['estado'] == 1):
                                            echo '<span class="btn btn-success disabled">Activo</span>';
                                        else:
                                            echo '<span class="btn btn-danger disabled">Inactivo</span>';
                                        endif;
                                    ?>
                                </td>
                                <td>
                                    <?php 
                                    echo anchor('producto/registrar_producto/'.$productos[$i]['id_producto'],'Editar','class="btn btn-info btn-sm"');
                                    if($productos[$i]['estado'] == 1):
                                        echo anchor('producto/deshabilitar_producto/'.$productos[$i]['id_producto'],'Deshabilitar','class="btn btn-danger btn-sm"'); 
                                    else:
                                        echo anchor('producto/habilitar_producto/'.$productos[$i]['id_producto'],'Habilitar','class="btn btn-success btn-sm"');
                                    endif;
                                    ?>

                                </td>
                            </tr>
                            
                            <?php endfor;?>
                        </tbody></table>
                        
                        <?php echo $paginacion?>
                    </div><!-- /.box-body -->
                </div>
	        </div>
		</div>
    </section>
</aside>