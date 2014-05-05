$('#btnRegistroUsuario').on('click',validarFormulario);
$('#btnRegistroProducto').on('click',validarFormulario);
$('#btnRegistroMarca').on('click',validarFormulario);

function enviarFormularioUsuario(){

    $("#formRegistroUsuario").submit(function(event) {

        event.preventDefault();

        var $form = $( this ),
            nombre = $form.find( 'input[name="nombre"]' ).val(),
            apellido = $form.find( 'input[name="apellido"]' ).val(),
            mail = $form.find( 'input[name="email"]' ).val(),
            user = $form.find( 'input[name="usuario"]' ).val(),
            pass1 = $form.find( 'input[name="password"]' ).val(),
            pass2 = $form.find( 'input[name="confirm_password"]' ).val(),
            url = $form.attr( 'action' );

        var contador = 0;

        if(nombre == ''){
            $form.find( 'input[name="nombre"]' ).css('box-shadow','0 0 1px 1px #F45');
            contador++
            $('#errorNombre').show();
        }
        else{
            $form.find( 'input[name="nombre"]' ).css('box-shadow','0 0 2px 1px #aaa');
            $('#errorNombre').hide();
        }
        
        if(apellido == ''){
            $form.find( 'input[name="apellido"]' ).css('box-shadow','0 0 1px 1px #F45');
            contador++
            $('#errorApellido').show();
        }
        else{
            $form.find( 'input[name="apellido"]' ).css('box-shadow','0 0 2px 1px #aaa');
            $('#errorApellido').hide();
        }

        if(mail == '' || !ValidaMail(mail)){
            $form.find( 'input[name="email"]' ).css('box-shadow','0 0 1px 1px #F45');
            contador++
            $('#errorCorreo').show();
        }
        else{
            $form.find( 'input[name="email"]' ).css('box-shadow','0 0 2px 1px #aaa');
            $('#errorCorreo').hide();
        }

        if(user == ''){
            $form.find( 'input[name="usuario"]' ).css('box-shadow','0 0 1px 1px #F45');
            contador++
            $('#errorUsuario').show();
        }
        else{
            $form.find( 'input[name="usuario"]' ).css('box-shadow','0 0 2px 1px #aaa');
            $('#errorUsuario').hide();
        }

        if(pass1 == ''){
            $form.find( 'input[name="password"]' ).css('box-shadow','0 0 1px 1px #F45');
            contador++
            $('#errorPass1').show();
        }
        else{
            $form.find( 'input[name="password"]' ).css('box-shadow','0 0 2px 1px #aaa');
            $('#errorPass1').hide();
        }

        if(pass2 == '' || pass1 != pass2){
            $form.find( 'input[name="confirm_password"]' ).css('box-shadow','0 0 1px 1px #F45');
            contador++
            $('#errorPass2').show();
        }
        else{
            $form.find( 'input[name="confirm_password"]' ).css('box-shadow','0 0 2px 1px #aaa');
            $('#errorPass2').hide();
        }

        if(contador <= 0){
			$("#formRegistroUsuario").unbind('submit'); 
			console.log('bien');
        }
        else{
            console.log('Error');
        }
    });
}

/*
function enviarFormularioProducto(){

    $("#formRegistroProducto").submit(function(event) {

        event.preventDefault();

        var $form = $( this ),
            marca = $form.find( 'input[name="marca"]' ).val(),
            medida = $form.find( 'input[name="medida"]' ).val(),
            modelo = $form.find( 'input[name="modelo"]' ).val(),
            modelo_tipo = $form.find( 'input[name="modelo_tipo"]' ).val(),
            precio = $form.find( 'input[name="precio"]' ).val(),
            moneda = $form.find( 'input[name="moneda"]' ).val(),
            url = $form.attr( 'action' );

        var contador = 0;

        if(marca == ''){
            $form.find( 'input[name="marca"]' ).css('box-shadow','0 0 1px 1px #F45');
            contador++
            $('#errormarca').show();
        }
        else{
            $form.find( 'input[name="marca"]' ).css('box-shadow','0 0 2px 1px #aaa');
            $('#errormarca').hide();
        }
        
        if(medida == ''){
            $form.find( 'input[name="medida"]' ).css('box-shadow','0 0 1px 1px #F45');
            contador++
            $('#errormedida').show();
        }
        else{
            $form.find( 'input[name="medida"]' ).css('box-shadow','0 0 2px 1px #aaa');
            $('#errormedida').hide();
        }

        if(modelo == ''){
            $form.find( 'input[name="modelo"]' ).css('box-shadow','0 0 1px 1px #F45');
            contador++
            $('#errormodelo').show();
        }
        else{
            $form.find( 'input[name="modelo"]' ).css('box-shadow','0 0 2px 1px #aaa');
            $('#errormodelo').hide();
        }

        if(modelo_tipo == ''){
            $form.find( 'input[name="modelo_tipo"]' ).css('box-shadow','0 0 1px 1px #F45');
            contador++
            $('#errormodelo_tipo').show();
        }
        else{
            $form.find( 'input[name="modelo_tipo"]' ).css('box-shadow','0 0 2px 1px #aaa');
            $('#errormodelo_tipo').hide();
        }

        if(precio == ''){
            $form.find( 'input[name="precio"]' ).css('box-shadow','0 0 1px 1px #F45');
            contador++
            $('#errorprecio').show();
        }
        else{
            $form.find( 'input[name="precio"]' ).css('box-shadow','0 0 2px 1px #aaa');
            $('#errorprecio').hide();
        }

        if(moneda == ''){
            $form.find( 'input[name="moneda"]' ).css('box-shadow','0 0 1px 1px #F45');
            contador++
            $('#errormoneda').show();
        }
        else{
            $form.find( 'input[name="moneda"]' ).css('box-shadow','0 0 2px 1px #aaa');
            $('#errormoneda').hide();
        }

        if(contador <= 0){
            $("#formRegistroProducto").unbind('submit'); 
            console.log('bien');
        }
        else{
            console.log('Error');
        }
    });
}
*/

        

        function validarFormulario(data){
            var idBtn = data.currentTarget.id;
            console.log(idBtn);
            var idForm = idBtn.replace('btn','form');
            console.log(idForm);
            var contador = 0;

            $('#'+idForm+' input').not(':button').each(function(){
                var idCampo = $(this).attr('id');

                if(idCampo != undefined){
                    var idBase = idCampo.replace('txt','');
                    var valorCampo = $(this).val();

                    if(valorCampo == ''){
                        $(this).css('box-shadow','0 0 1px 1px #F45');
                        $('#error'+idBase).show();
                        contador++
                    }
                    else{
                        $(this).css('box-shadow','0 0 2px 1px #aaa');
                        $('#error'+idBase).hide();
                    }
                }
            });

            if(contador <= 0){
                $('.btnInactivo').hide();
                $('.btnActivo').show();
            }
        }



function ValidaMail(mail) {
	var er = /^[0-9a-z_\-\.]+@([a-z0-9\-]+\.?)*[a-z0-9]+\.([a-z]{2,4}|travel)$/i;
	return er.test(mail);
}

$('#txtmarca').keyup(function(){
    var query = $(this).val();
    var dataString = 'marca='+query;
    $.ajax({
        type: "POST",
        url: "obtener_marca_json",
        data: dataString,
        success: function(data) {
            var inicio;
            objetoJson = JSON.parse(data);
            longitud = objetoJson.length;

            var html = '';

            for (var inicio = 0; inicio < longitud; inicio++) {
                var id = objetoJson[inicio].id_subcategoria;
                var nombre = objetoJson[inicio].nombre;

                html += '<div id="idMarca'+id+'" class="sugerenciaMarca" >'+nombre;
                html += '</div>';
            };

            //Escribimos las sugerencias que nos manda la consulta
            $('#sugerencias').fadeIn(500).html(html);
        }
    });
});

$('#sugerencias').on('click','.sugerenciaMarca',function(){
    var id = $(this).attr('id');
    console.log(id);
    var idSub = id.replace('idMarca','');
    var texto = $(this).text();

    //Editamos el valor del input con data de la sugerencia pulsada
    $('#marcaReal').val(idSub);
    $('#txtmarca').val(texto);
    //Hacemos desaparecer el resto de sugerencias
    $('#sugerencias').fadeOut(500);
});