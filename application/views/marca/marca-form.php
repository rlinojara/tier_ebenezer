<aside class="right-side">
    <section class="content-header">
    
        <h1>
            <?php echo $titulo?> de Marca
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </section>
    <section class="content">
<?php
if(isset($proceso_form)):
    if($proceso_form === FALSE):
?>  
<div class="display alert alert-danger alert-dismissable">
    <i class="fa fa-ban"></i>
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <b>El nombre de marca ya existe.</b>
</div>
<?php
    else:
?>
<div class="alert alert-success alert-dismissable">
    <i class="fa fa-check"></i>
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <b>La marca ha sido creado satisfactoriamente.</b>
</div>
<?php
    endif;
endif;
?>
<div id="errornombre" class="alert alert-danger alert-dismissable">
    <i class="fa fa-ban"></i>
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <b>El campo del nombre no puede estar vacio.</b>
</div>
<div class="row">
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-primary"><!-- /.box-header -->
            <!-- form start -->
            <form id="formRegistroMarca" action="<?php echo site_url($url_form);?>" 
            	  role="form" 
            	  method="post">
                <div class="box-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nombre:</label>
                        <input type="text" name="nombre" 
                        	   class="form-control" id="txtnombre" 
                        	   value="<?php if(isset($marca['nombre'])) echo $marca['nombre']?>" placeholder="">
                    </div>
                    
      
                    <?php if(isset($id)):?>
                    
                    <input type="hidden" name="id_marca" value="<?php echo $id?>">
                    
                    <?php endif;?>
                </div><!-- /.box-body -->

                <div class="box-footer">
                    <div id="btnRegistroMarca" class="btn btn-primary btnInactivo btnEnviar">Validar</div>
                    <button value="asd" type="submit" id="btnRegistroMarca2" class="btn btn-primary btnActivo btnEnviar">Enviar</button>
                </div>
            </form>
        </div>
    </div>
</div>
    </section>
</aside>