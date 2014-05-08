$('#btnRegistroUsuario').on('click',validarFormulario);
$('#btnRegistroProducto').on('click',validarFormulario);
$('#btnRegistroMarca').on('click',validarFormulario);
$('#txttipocompra').on('change',facturaoboleta);
$('#btnAgregarCompra').on('click',listarCompra);

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

$(function(){

    $('#txtmarcap').typeahead({

        source: function (query, process) {
            return $.getJSON(
                '/tier_ebenezer/index.php/producto/obtener_marca_json',
                { query: query },
                function (data) {
                    return process(data);
                });
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

function facturaoboleta(){
    var id = $(this).val();
    if(id == 0){
        $('#divGuia').show();
    }
    else{
        $('#divGuia').hide();
    }
}

function listarCompra(){
    var producto = $('#txtproducto').val();
    var cantidad = $('#txtcantidad').val();
    var punitario = $('#txtpunitario').val();
    var total = cantidad*punitario;

    var html = '<tr>';
    html += '<td>'+producto+'</td>';
    html += '<td>'+cantidad+'</td>';
    html += '<td>'+punitario+'</td>';
    html += '<td>'+total+'</td>';
    html += '</tr>';

    $('#listadoCompras').append(html);

    $('#formRegistroCompra input').val('');
}