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
	                                <th>Fecha</th>
	                                <th>Tipo Doc.</th>
	                                <th>N&uacute;m Doc.</th>
                                    <th>Estado</th>
	                                <th style="width: 160px">Acciones</th>
                            	</tr>
                            	<?php for( $i = 0 ; $i < count($compras) ; $i++):?>
	                            <tr>
	                                <td><?php echo $compras[$i]['fecha_compra']?></td>
	                                <td><?php echo $compras[$i]['nombre_tipo_doc']?></td>
	                                <td><?php echo $compras[$i]['numero_documento']?></td>
	                                <td><?php echo $compras[$i]['nombre_estado']?></td>
	                                <td>
	                                    <?php 
	                                    if( $compras[$i]['id_compra_estado'] == 2):
	                                    	
	                                    echo anchor('compra/editar_compra/'.$compras[$i]['id_compra'],'Copiar','class="btn btn-info btn-sm"');
	                                    
	                                    endif;
	                                    
	                                    if($compras[$i]['id_compra_estado'] == 1):
	                                        echo anchor('compra/anular_compra/'.$compras[$i]['id_compra'],'Anular','class="btn btn-danger btn-sm"');
	                                    endif;
	                                    ?>
	                                </td>
	                            </tr>
	                            <?php endfor;?>
                        	</tbody>
                        </table>
                        
                        <?php echo $paginacion?>
                    </div><!-- /.box-body -->
                </div>
	        </div>
		</div>
    </section>
</aside>