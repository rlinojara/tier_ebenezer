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
if(isset($proceso_form) and $proceso_form === FALSE){
	print_r($error);
}
?>
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
                        	   class="form-control" id="exampleInputEmail1" 
                        	   value="<?php if(isset($usuario['nombre'])) echo $usuario['nombre']?>" placeholder="">
                    </div>
                    
      
                    <?php if(isset($id)):?>
                    
                    <input type="hidden" name="id_Marca" value="<?php echo $id?>">
                    
                    <?php endif;?>
                </div><!-- /.box-body -->

                <div class="box-footer">
                    <button id="btnMarcaRegistro" type="submit" class="btn btn-primary">Enviar</button>
                </div>
            </form>
        </div>
    </div>
</div>
    </section>
</aside>