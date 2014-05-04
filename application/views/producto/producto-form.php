<aside class="right-side">
    <section class="content-header">
    
        <h1>
            <?php echo $titulo?> de Producto
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </section>
    <section class="content">
<?php
if(isset($proceso_form) and $proceso_form === FALSE){
	print_r($error);
}
?>
<div class="row">
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-primary"><!-- /.box-header -->
            <!-- form start -->
            <form id="formRegistroProducto" action="<?php echo site_url($url_form);?>" 
            	  role="form" 
            	  method="post">
                <div class="box-body">
                    <div class="form-group">
                        <label for="nombre">Marca:</label>
                        <input type="text" name="marca" 
                        	   class="form-control" id="txtMarca" 
                        	   value="<?php if(isset($producto['marca'])) echo $producto['marca']?>" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="medida">Medida:</label>
                        <input type="text" name="medida" 
                               class="form-control" id="txtMedida" 
                               value="<?php if(isset($producto['medida'])) echo $producto['medida']?>" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="modelo">Modelo:</label>
                        <input type="text" name="modelo" 
                               class="form-control" id="txtModelo" 
                               value="<?php if(isset($producto['modelo'])) echo $producto['modelo']?>" placeholder="">
                        <label for="sucursal">Tipo:</label>
                        <select name="modelo_tipo" class="form-control">
                        <?php for( $i = 0 ; $i < count($modelo_tipo) ; $i++):?>
                        
                         <option value="<?php $modelo_tipo[$i]['id_modelo_tipo']?>">
                         	<?php echo $modelo_tipo[$i]['nombre']?>
                         </option>
                        
                        <?php endfor;?>
                         
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="medida">Precio de lista:</label>
                        <input type="text" name="medida" 
                               class="form-control" id="txtPrecio" 
                               value="<?php if(isset($producto['precio'])) echo $producto['precio']?>" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="moneda">Moneda:</label>
                        <select name="moneda" class="form-control">
                            <?php for( $i = 0 ; $i < count($moneda) ; $i++):?>
                            
                            <option value="<?php echo $moneda[$i]['id_moneda']?>">
                            	<?php echo $moneda[$i]['nombre']?>
                            </option>
                            
                            <?php endfor?>
                        </select>
                    </div>
                    <?php if(isset($id)):?>
                    
                    <input type="hidden" name="id_Producto" value="<?php echo $id?>">
                    
                    <?php endif;?>
                </div><!-- /.box-body -->

                <div class="box box-info">
                    <br>
                        <table class="table table-bordered">
                            <tbody>
                            <?php for( $i = 0 ; $i < count($sucursales) ; $i++):?>
                            
                             <tr>
                                <td>
                                    <p class="text-light-blue"> <?php echo $sucursales[$i]['nombre']?> </p>
                                </td>
                                <td>
                                    <input class="form-control" type="text" 
                                    	   name="stock[<?php echo $sucursales[$i]['id_sucursal']?>]">
                                </td>
                            </tr>
                            
                            <?php endfor;?>
                            </tbody>
                        </table>
                    </div>
                    <br>
                </div>
                <div class="box-footer">
                    <button id="btnProductoRegistro" type="submit" class="btn btn-primary">Enviar</button>
                </div>
            </form>
        </div>
    </div>
</div>
    </section>
</aside>