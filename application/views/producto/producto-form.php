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
if(isset($proceso_form)){
    if($proceso_form === FALSE)
    {
        print_r($error);
    }
    else
    {
    ?>
    <div class="alert alert-success alert-dismissable">
        <i class="fa fa-check"></i>
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <b>Producto registrado satisfactoriamente.</b>
    </div>
    <?php
    }
}

?>
<div id="errormarca" class="alert alert-danger alert-dismissable">
    <i class="fa fa-ban"></i>
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <b>El campo de la marca no puede estar vacio.</b>
</div>
<div id="errormedida" class="alert alert-danger alert-dismissable">
    <i class="fa fa-ban"></i>
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <b>El campo de medida no puede estar vacio.</b>
</div>
<div id="errormodelo" class="alert alert-danger alert-dismissable">
    <i class="fa fa-ban"></i>
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <b>El formato del modelo correo no es el correcto.</b>
</div>
<div id="errormodelo_tipo" class="alert alert-danger alert-dismissable">
    <i class="fa fa-ban"></i>
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <b>El campo del tipo de modelo no puede estar vacio.</b>
</div>
<div id="errorprecio" class="alert alert-danger alert-dismissable">
    <i class="fa fa-ban"></i>
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <b>El campo del precio no puede estar vacio.</b>
</div>
<div id="errorpliegue" class="alert alert-danger alert-dismissable">
    <i class="fa fa-ban"></i>
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <b>El campo del pliegue no puede estar vacio.</b>
</div>
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
                               class="form-control" id="txtmarca" 
                               value="<?php if(isset($producto['nombre_marca'])) echo $producto['nombre_marca']?>" 
                               autocomplete="off" placeholder="">
                        <div id="sugerencias"></div>
                        <input id="marcaReal" name="marcaReal" type="hidden" value="<?php if(isset($producto['id_marca'])) echo $producto['id_marca'];?>">
                    </div>
                    <div class="form-group">
                        <label for="medida">Medida:</label>
                        <input type="text" name="medida" 
                               class="form-control" id="txtmedida" 
                               value="<?php if(isset($producto['medida'])) echo $producto['medida']?>" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="modelo">Modelo:</label>
                        <input type="text" name="modelo" 
                               class="form-control" id="txtmodelo" 
                               value="<?php if(isset($producto['modelo'])) echo $producto['modelo']?>" placeholder="">
                        <label for="sucursal">Tipo:</label>
                        <select name="modelo_tipo" class="form-control">
                        
                        <?php for( $i = 0 ; $i < count($modelo_tipo) ; $i++):?>
                        
                         <?php echo $modelo_tipo;?>
                        
                        <?php endfor;?>
                         
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="medida">Precio de lista:</label>
                        <input type="text" name="precio" 
                               class="form-control" id="txtprecio" 
                               value="<?php if(isset($producto['precio'])) echo $producto['precio']?>" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="moneda">Moneda:</label>
                        <select name="moneda" class="form-control">
                            <?php for( $i = 0 ; $i < count($moneda) ; $i++):?>
                            
                            <?php echo $moneda;?>
                            
                            <?php endfor?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="pliegue">Pliegue:</label>
                        <input type="text" name="pliegue" 
                               class="form-control" id="txtpliegue" 
                               value="<?php if(isset($producto['pliegue'])) echo $producto['pliegue']?>" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="tp">TP:</label>
                        <select name="tp" class="form-control">
                            <?php for( $i = 0 ; $i < count($tp) ; $i++):?>
                            
                            <?php echo $tp;?>
                            
                            <?php endfor?>
                        </select>
                    </div>
                    <?php if(isset($id)):?>
                    
                    <input type="hidden" name="id_producto" value="<?php echo $id?>">
                    
                    <?php endif;?>
                </div><!-- /.box-body -->

                <div class="box box-info">
                    <br>
                        <table class="table table-bordered">
                            <tbody>
                            <tr>
                                <th>Local</th>
                                <th>Stock</th>
                            </tr>
                            <?php for( $i = 0 ; $i < count($sucursales) ; $i++):?>
                            
                             <tr>
                                <td>
                                    <p class="text-light-blue"> <?php echo $sucursales[$i]['nombre']?> </p>
                                </td>
                                <td>
                                    <input class="stock form-control" type="text" 
                                           name="stock[<?php echo $sucursales[$i]['id_sucursal']?>]"
                                           value="<?php 
                                           if( isset($sucursal))
                                           {    
                                            for( $j = 0 ; $j < count($sucursal) ; $j++)
                                            {
                                                if( $sucursales[$i]['id_sucursal'] == $sucursal[$j]['id_sucursal'] )
                                                 {
                                                    echo $sucursal[$j]['stock'];
                                                 }  
                                            }
                                           }?>">
                                </td>
                             </tr>
                            
                            <?php endfor;?>
                            </tbody>
                        </table>
                    </div>
                    <br>
                </div>
                <div class="box-footer">
                    <div id="btnRegistroProducto" class="btn btn-primary btnInactivo btnEnviar">Validar</div>
                    <button value="asd" type="submit" id="btnRegistroProducto2" class="btn btn-primary btnActivo btnEnviar">Enviar</button>
                </div>
            </form>
        </div>
    </div>
</div>
    </section>
</aside>