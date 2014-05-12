<aside class="right-side">
    <section class="content-header">
        <h1>
            Listado de marcas
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </section>
    <section class="content">
   
   <form action="<?php echo site_url('marca/buscar')?>" method="post">
        <div class="row">
            <div class="col-md-6">
                <div class="col-md-10">         	
                        <div class="input-group input-group">
                            <div class="input-group-btn">
                                <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown">Filtros <span class="fa fa-caret-down"></span></button>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Habilitados</a></li>
                                    <li class="divider"></li>
                                    <li><a href="#">Deshabilitados</a></li>
                                </ul>
                            </div><!-- /btn-group -->
                            <input type="text" name="txtbusqueda" class="form-control"
                            value="<?php if(isset($busqueda['nombre'])) echo $busqueda['nombre']?>">
                        </div>
                      
                    
                </div>
                <div class="col-md-2">
                     <button  type="submit" class="btn btn-primary">Buscar</button>
                </div>
            </div>
        </div> 
    </form>       
        <div class="row">
	        <div class="col-md-12">
                <div id="superiorList">
                    <div class="btn-group-vertical">
                        <?php echo anchor('marca/registrar_marca','Agregar','class="btn btn-primary btn-flat"'); ?>
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
	                                <th>marca</th>
	                                <th>Estado</th>
	                                <th style="width: 160px">Acciones</th>
                            	</tr>
                            <?php for($i = 0 ; $i < count($marcas); $i++):?>
                            <tr>
                             	<td><?php echo ($i+1)?></td>
                                <td><?php echo $marcas[$i]['nombre']?></td>
                                <td>
                                    <?php 
                                        if($marcas[$i]['estado'] == 1):
                                            echo '<span class="btn btn-success disabled">Activo</span>';
                                        else:
                                            echo '<span class="btn btn-danger disabled">Inactivo</span>';
                                        endif;
                                    ?>
                                </td>
                                <td>
                                    <?php 
                                    echo anchor('marca/editar_marca/'.
												 $marcas[$i]['id_subcategoria'].'/'.
												 $pagina,'Editar','class="btn btn-info btn-sm"');
                                    if($marcas[$i]['estado'] == 1):
                                        echo anchor('#','Deshabilitar','class="btnDeshabilitar btn btn-danger btn-sm" id="btnDeshabilitar'.$marcas[$i]['id_subcategoria'].'"'); 
                                    else:
                                        echo anchor('marca/habilitar_marca/'.$marcas[$i]['id_subcategoria'].'/'.$pagina,'Habilitar','class="btn btn-success btn-sm"');
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