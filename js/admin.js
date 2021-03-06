$('#btnRegistroUsuario').on('click',validarFormulario);
$('#btnRegistroProducto').on('click',validarFormulario);
$('#btnRegistroMarca').on('click',validarFormulario);
$('#btnRegistroCompra').on('click',validarFormulario2);
$('#txtmoneda').on('change',tipoMoneda);
$('#txttipocompra').on('change',facturaoboleta);
$('#btnAgregarCompra').on('click',listarCompra);
$('.btnDeshabilitar').on('click',deshabilitarMarca);

function validarFormulario(data){
    var idBtn = data.currentTarget.id;
    console.log(idBtn);
    var idForm = idBtn.replace('btn','form');
    console.log(idForm);
    var contador = 0;

    $('#'+idForm+' input').not(':button').not('.campos-dinamicos').each(function(){
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
function validarFormulario2(data){
    var idBtn = data.currentTarget.id;
    console.log(idBtn);
    var idForm = idBtn.replace('btn','form');
    console.log(idForm);
    var contador = 0;

    $('#'+idForm+' input').not(':button').not('.campos-dinamicos').each(function(){
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

    var productos = $('.totaltd').length;

    if(productos <= 0){
        $('#errornumproducto').show();
        contador++
    }
    else{
        $('#errornumproducto').hide();
    }

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
        url: "/tier_ebenezer/index.php/producto/obtener_marca_json",
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

    $('#marcaReal').val(idSub);
    $('#txtmarca').val(texto);
    //Hacemos desaparecer el resto de sugerencias
    $('#sugerencias').fadeOut(500);
});


//COMPRA
function facturaoboleta(){
    var id = $(this).val();
    console.log(id);
    if(id == 1){
        $('#trigv').show();
        $('#divGuia').show();
    }
    else{
        $('#trigv').hide();
        $('#divGuia').hide();
        $('#txtguia').val('0');
    }
}

function tipoMoneda(){
    var tipocambio = $('#txtmoneda').val();

    console.log(tipocambio);

    if(tipocambio == 1){
        $('#txtcambio').val('0');
    }
    else{
        $('#txtcambio').val('');
    }
}

function listarCompra(){


    var vmarca = $('#marcaRealp').val();
    var vproducto = $('#ProductoRealp').val();

    var marca = $('#txtmarcap').val();
    var producto = $('#txtproducto').val();
    var cantidad = $('#txtcantidad').val();
    var punitario = $('#txtpunitario').val();
    var total = cantidad*punitario;
    total = parseFloat(total).toFixed(4);

    if(is_int(cantidad) && producto != '' && punitario != '' && cantidad != '' && marca != ''){
        $('#errorlistadoproducto').hide();

        var campos = '<input type="hidden" value="'+vmarca+'" name="txtmarca[]">';
        campos += '<input type="hidden" value="'+vproducto+'" name="txtproducto[]">';
        campos += '<input type="hidden" value="'+cantidad+'" name="txtcantidad[]">';
        campos += '<input type="hidden" value="'+punitario+'" name="txtpunitario[]">';

        $('#appendCampos').append(campos);

        var html = '<tr>';
        html += '<td>'+producto+'</td>';
        html += '<td>'+cantidad+'</td>';
        html += '<td>'+punitario+'</td>';
        html += '<td class="totaltd">'+total+'</td>';
        html += '</tr>';

        $('#listadoCompras').append(html);

        $('.campos-dinamicos').val('');

        var subtotal = 0;

        $('.totaltd').each(function(index){
            subtotal = subtotal + parseFloat($('.totaltd')[index].innerText);
        });

        subtotal = parseFloat(subtotal).toFixed(4);
        $('#resultado-subtotal').html(subtotal);
        $('#txtresultadosubtotal').val(subtotal);

        var igv = subtotal*0.19;
        igv = parseFloat(igv).toFixed(4);
        $('#resultado-igv').html(igv);
        $('#txtresultadoigv').val(igv);

        var totalresultado = parseFloat(subtotal)+parseFloat(igv);
        totalresultado = totalresultado.toFixed(4);
        $('#resultado-total').html(totalresultado);
        $('#txtresultadototal').val(totalresultado);
    }
    else{
        $('#errorlistadoproducto').show();
    }
}

$('#txtmarcap').keyup(function(){
    var query = $(this).val();
    var dataString = 'marca='+query;
    $.ajax({
        type: "POST",
        url: "/tier_ebenezer/index.php/producto/obtener_marca_json",
        data: dataString,
        success: function(data) {
            var inicio;
            objetoJson = JSON.parse(data);
            longitud = objetoJson.length;

            var html = '';

            for (var inicio = 0; inicio < longitud; inicio++) {
                var id = objetoJson[inicio].id_subcategoria;
                var nombre = objetoJson[inicio].nombre;

                html += '<div id="idMarcap'+id+'" class="sugerenciaMarcap" >'+nombre;
                html += '</div>';
            };

            //Escribimos las sugerencias que nos manda la consulta
            $('#sugerenciasMarcap').fadeIn(500).html(html);
        }
    });
});

$('#sugerenciasMarcap').on('click','.sugerenciaMarcap',function(){
    var id = $(this).attr('id');
    var idSub = id.replace('idMarcap','');
    var texto = $(this).text();

    //Editamos el valor del input con data de la sugerencia pulsada
    $('#marcaRealp').val(idSub);
    $('#txtmarcap').val(texto);
    //Hacemos desaparecer el resto de sugerencias
    $('#sugerenciasMarcap').fadeOut(500);
});

$('#txtproducto').keyup(function(){
    var marca = $('#marcaRealp').val();
    var query = $(this).val();

    var dataString = 'marca='+marca+'&producto='+query;
    $.ajax({
        type: "POST",
        url: "/tier_ebenezer/index.php/compra/obtener_producto_marca_json",
        data: { marca: marca, producto: query },
        success: function(data) {
            var inicio;
            objetoJson = JSON.parse(data);
            longitud = objetoJson.length;

            var html = '';

            for (var inicio = 0; inicio < longitud; inicio++) {
                var id = objetoJson[inicio].id_producto;
                var medida = objetoJson[inicio].medida;
                var modelo = objetoJson[inicio].modelo;

                html += '<div id="idProductop'+id+'" class="sugerenciaProductop" >'+medida;
                html += '</div>';
            };

            //Escribimos las sugerencias que nos manda la consulta
            $('#sugerenciasProductop').fadeIn(500).html(html);
        }
    });
});

$('#sugerenciasProductop').on('click','.sugerenciaProductop',function(){
    var id = $(this).attr('id');

    var idSub = id.replace('idProductop','');
    var texto = $(this).text();

    //Editamos el valor del input con data de la sugerencia pulsada
    $('#ProductoRealp').val(idSub);
    $('#txtproducto').val(texto);
    //Hacemos desaparecer el resto de sugerencias
    $('#sugerenciasProductop').fadeOut(500);
});

function deshabilitarMarca(data){
    event.preventDefault();

    var txt;
    var r = confirm("Estás seguro que quieres deshabilitar esta marca?");
    if (r == true) {
        id = data.currentTarget.id
        id = id.replace('btnDeshabilitar','');
        document.location.href='http://localhost/tier_ebenezer/index.php/marca/deshabilitar_marca/' + id;
    } else {
        console.log('Cancelado, eres un buen muchacho.');
    }
}

$(function() {
    $("#txtfechacompra").datepicker({ dateFormat: 'dd/mm/yy' });
});

function is_int(value){ 
  if((parseFloat(value) == parseInt(value)) && !isNaN(value)){
      return true;
  } else { 
      return false;
  } 
}