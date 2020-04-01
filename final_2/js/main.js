$(function() {
    let input_busqueda=$('#txt_busqueda');
    listar('');
    listar_2();
    tipoListdo(input_busqueda)
    crearPaginacion();
    ejecutarAccion();
    
});

var quitarAlerta=()=>{
    $('#alerta').html('');
}

var desbloquearBoton=()=>{
    $('btn_guardar_cambios').removeAttr('disabled');
}



var alerta=(opcion,respuesta)=>{
   let mensaje='';
   switch (opcion) {
    case 'insertar':
        mensaje = 'Concepto insertado correctamente.';
        break;
    case 'editar':
        mensaje = 'Información del concepto modificada con exito.';
        break;
    case 'eliminar':
        mensaje = 'Concepto eliminado exitosamente.';
        break;
    
   }


    switch (respuesta) {
        case 'BIEN':
            $('#alerta').html('<div class="alert alert-success text-center"><strong>¡BIEN! </strong>' + mensaje + '</div>');
            break;
        case 'ERROR':
            $('#alerta').html('<div class="alert alert-danger text-center"><strong>¡ERROR! </strong>Solicitud no procesada.</div>');
            break;
        case 'IGUAL':
            $('#alerta').html('<div class="alert alert-info text-center"><strong>¡ADVERTENCIA! </strong>Ha enviado los mismos datos.</div>');
            break;
        case 'VACIO':
            $('#alerta').html('<div class="alert alert-danger text-center"><strong>¡ERROR! </strong>No puede enviar datos vacíos.</div>');
            break;
    }
}

/**Depositos */

    $('#btn_guardar_deposito').on('click',function () {
        var txt_deposito_nombre=$('#txt_deposito_nombre').val();
        $.ajax({
            url:'controllers/controllerDeposito.php',
            method:'POST',
            data: {
                txt_deposito_nombre:txt_deposito_nombre
            }
            
        });
    });



/**Insertar Grupos */

$('#grupo').on('click',function () {
    var txt_grupo=$('#txt_grupo_text').val();
    $.ajax({
        url:'controllers/controllerGrupo.php',
        method:'POST',
        data: {
            txt_grupo:txt_grupo
        }
        
    });
});


/**Insertar MARCAS */
    $('#btn_guardar_marca').on('click',function () {
        var txt_marca_nombre=$('#txt_nombre_marca').val();
        $.ajax({
            url:'controllers/controllerMarca.php',
            method:'POST',
            data: {
                txt_marca_nombre:txt_marca_nombre
            }
            
        });
    });

/**Insertar Subgrupos */
$('#subgrupo').on('click',function () {
   var txt_subgrupo_nombre=$('#txt_subgrupo_nombre').val();
   var txt_grupo_id=$('#txt_grupo_id').val();
   $.ajax({
       url:'controllers/controllerSubgrupo.php',
       method:'POST',
       data:{
        txt_subgrupo_nombre:txt_subgrupo_nombre,
        txt_grupo_id:txt_grupo_id
       }
   }) 
});



var ejecutarAccion = () => {
    $('#btn_guardar_cambios').on('click', function() {
        let opcion= $('#opcion').val();
        let concepto_id= $('#concepto_id').val();
        let sku= $('#txt_sku').val();
        let nombre= $('#txt_nombre').val();
        let codigo= $('#txt_codigo').val();
        let referencia= $('#txt_referencia').val();
        let descripcion= $('#txt_descripcion').val();
        let precio= $('#txt_precio').val();
        let costo= $('#txt_costo').val();
        let ultimo_costo= $('#txt_ultimocosto').val();
        let utilidad= $('#txt_utilidad').val();
        let grupo_id= $('#txt_grupo').val();
        let subgrupo_id= $('#txt_subgrupo').val();
        let marca_id= $('#txt_marca').val();
        let unidad_id=$('#txt_unidad').val();
    
        $.ajax({
            beforeSend:function () {
                $('#gif').toggleClass('d-none');  
            },
            url: 'controllers/controllerActions.php',
            method: 'POST',
            data: {
                opcion:opcion,
                concepto_id:concepto_id,
                sku:sku,
                nombre:nombre,
                codigo:codigo,
                referencia:referencia,
                descripcion:descripcion,
                precio:precio,
                costo:costo,
                ultimo_costo:ultimo_costo,
                utilidad:utilidad,
                grupo_id:grupo_id,
                subgrupo_id:subgrupo_id,
                marca_id:marca_id,
                unidad_id:unidad_id
            },
        }).done(function(data) {
           //console.log(data);
           $('#gif').toggleClass('d-none');
           alerta(opcion,data);
           listar('');
           crearPaginacion();
           if (opcion=='eliminar' && data=='BIEN') {
               $('#btn_guardar_cambios').attr('disabled',true);
           }
           if(opcion =='insertar' && data=='BIEN'){
                $('#concepto_id').val();
                $('#txt_sku').val();
                $('#txt_nombre').val();
                $('#txt_codigo').val();
                $('#txt_referencia').val();
                $('#txt_descripcion').val();
                $('#txt_precio').val();
                $('#txt_costo').val();
                $('#txt_ultimocosto').val();
                $('#txt_utilidad').val();
                $('#txt_grupo').val();
                $('#txt_subgrupo').val();
                $('#txt_marca').val();
                $('#txt_unidad').val();
           }
        });
        });
}


let listar =(param)=>{
    $.ajax({
        url:'controllers/controllerList.php',
        method:'POST',
        data:{
            termino:param
        }
    })
    .done(function (data) {
        $('#div_tabla').html(data);
        prepararDatos();
    });
}

let listar_2=(param)=>{
    $.ajax({
        url:'controllers/controllerList_2.php',
        method:'POST',
    })
    .done(function (data) {
        $('#div_tabla_depositos').html(data);
    });
}


let prepararDatos=()=>{
    let values = [];
    // Evento botón editar
    $('#table .editar').on('click', function() {
        values = ciclo($(this));
        $('#opcion').val('editar');
        $('#concepto_id').val(values[0]);
        $('#txt_sku').val(values[1]).removeAttr('disabled');
        $('#txt_nombre').val(values[2]).removeAttr('disabled');
        $('#txt_codigo').val(values[3]).removeAttr('disabled');
        $('#txt_referencia').val(values[4]).removeAttr('disabled');
        $('#txt_descripcion').val(values[5]).removeAttr('disabled');
        $('#txt_precio').val(values[6]).removeAttr('disabled');
        $('#txt_costo').val(values[7]).removeAttr('disabled');
        $('#txt_ultimocosto').val(values[8]).removeAttr('disabled');
        $('#txt_utilidad').val(values[9]).removeAttr('disabled');
        $('#txt_grupo').val(values[10]).removeAttr('disabled');
        $('#txt_subgrupo').val(values[11]).removeAttr('disabled');
        $('#txt_marca').val(values[12]).removeAttr('disabled');
        $('#txt_unidad').val(values[13]).removeAttr('disabled');
        cambiarTitulo("Editar concepto");
        quitarAlerta();
        desbloquearBoton();
    });
    //Evento botón eliminar
    $('#table .eliminar').on('click', function() {
        values = ciclo($(this));
        $('#opcion').val('eliminar');
        $('#concepto_id').val(values[0]);
        $('#txt_sku').val(values[1]).attr('disabled',true);
        $('#txt_nombre').val(values[2]).attr('disabled',true);
        $('#txt_codigo').val(values[3]).attr('disabled',true);
        $('#txt_referencia').val(values[4]).attr('disabled',true);
        $('#txt_descripcion').val(values[5]).attr('disabled',true);
        $('#txt_precio').val(values[6]).attr('disabled',true);
        $('#txt_costo').val(values[7]).attr('disabled',true);
        $('#txt_ultimocosto').val(values[8]).attr('disabled',true);
        $('#txt_utilidad').val(values[9]).attr('disabled',true);
        $('#txt_grupo').val(values[10]).attr('disabled',true);
        $('#txt_subgrupo').val(values[11]).attr('disabled',true);
        $('#txt_marca').val(values[12]).attr('disabled',true);
        $('#txt_unidad').val(values[13]).attr('disabled',true);
        cambiarTitulo("Eliminar concepto");
        quitarAlerta();
        desbloquearBoton();
    });
    //Evento para insertar
    $('#btn_insertar').on('click', function() {
        $('#opcion').val('insertar');
        $('#concepto_id').val('');
        $('#txt_sku').val('').removeAttr('disabled');
        $('#txt_nombre').val('').removeAttr('disabled');
        $('#txt_codigo').val('').removeAttr('disabled');
        $('#txt_referencia').val('').removeAttr('disabled');
        $('#txt_descripcion').val('').removeAttr('disabled');
        $('#txt_precio').val('').removeAttr('disabled');
        $('#txt_costo').val('').removeAttr('disabled');
        $('#txt_ultimocosto').val('').removeAttr('disabled');
        $('#txt_utilidad').val('').removeAttr('disabled');
        $('#txt_grupo').val('').removeAttr('disabled');
        $('#txt_subgrupo').val('').removeAttr('disabled');
        $('#txt_marca').val('').removeAttr('disabled');
        $('#txt_unidad').val('').removeAttr('disabled');
        cambiarTitulo("Agregar concepto");
        quitarAlerta();
        desbloquearBoton();
    });
}

var ciclo = (selector) => {
    let datos = [];
    $(selector).parents('tr').find('td').each(function(i) {
        if (i < 14) {
            datos[i] = $(this).text();
        } else {
            return false;
        }
    });
    return datos;
}

let cambiarTitulo=(titulo)=>{
    $('.modal-header .modal-title').text(titulo);
}


//Paginación

let CambiarPagina=()=>{
    $('.page-item>.page-link').on('click',function () {
        $.ajax({
            url:'controllers/controllerList.php',
            method:'POST',
            data:{
                pagina:$(this).text()
            },
        }).done(function (data) {
            $('#div_tabla').html(data);
            prepararDatos();
        });
        
    });

   
}



let crearPaginacion =()=>{
    $.ajax({
        url:'controllers/controllerPagination.php',
        method:'POST'
    })
    .done(function (data) {
        $('#pagination li').remove();
        for (let i = 1; i <= data; i++) {
            $('#pagination').append('<li class="page-item"><a class="page-link text-muted href="">'+i+'</a></li>');
        }
        CambiarPagina();
    });
}


let tipoListdo=(input)=>{
    $(input).on('keyup',function(){
        let termino='';
        if ($(this).val()!='') {
            termino=$(this).val();

        }
        listar(termino);
    });
}



/********LOGIN */
$(document).on("submit",".form-registro", function (event) {
    event.preventDefault();
    let $form = $(this);
    let data_form={
        nombre: $("#nombre").val(),
        correo: $("#correo").val(),
        contrasena: $("#contrasena").val(),
        nivel: $("#nivel_usuario_id").val(),
    }
    
    let url_php='http://localhost/final_2/ajax/procesar_registro.php';

    $.ajax({
        type:'POST',
        url:url_php,
        data:data_form,
        dataType:'json',
        async:true,
    })
    .done(function ajaxDone(res) {
        console.log(res);
        if (res.error !== undefined) {
            alert('Correo ya existe');
            return false;
        }

        if(res.redirect !== undefined){
            window.location=res.redirect;
        }
    })
    .fail(function ajaxError(e) {
        console.log(e);
    })
    .always(function ajaxSiempre() {
        console.log('Final Ajax');

    })
    return false;

});

$(document).on("submit",".form-login", function (event) {
    event.preventDefault();
    let $form = $(this);
    let data_form={
        nombre: $("#nombre").val(),
        correo: $("#correo").val(),
        contrasena: $("#contrasena").val(),
        nivel: $("#nivel_usuario_id").val(),
    }
    
    let url_php='http://localhost/final_2/ajax/procesar_login.php';

    $.ajax({
        type:'POST',
        url:url_php,
        data:data_form,
        dataType:'json',
        async:true,
    })
    .done(function ajaxDone(res) {
        console.log(res);
        if (res.error !== undefined) {
            alert('Correo ya existe');
        }
        if(res.redirect !== undefined){
            window.location=res.redirect;
        }
    })
    .fail(function ajaxError(e) {
        console.log(e);
    })
    .always(function ajaxSiempre() {
        console.log('Final Ajax');

    })
    return false;

});
