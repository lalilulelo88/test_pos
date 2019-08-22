

///SUBIR FOTO USUARIOS


$(".nuevaFoto").change(function(){

    var imagen = this.files[0];
   // console.log("imagen",imagen);

     if(imagen["type"] != "image/jpeg" && imagen["type"] != "image/png"){

         $(".nuevaFoto").val("");

         Swal.fire({
             type: "error",
             title: "La imagen debe estar en formato JPG o PNG.",
             confirmButtonText: "Cerrar"
         });
     }else if(imagen["size"] > 2000000){

        $(".nuevaFoto").val("");
        Swal.fire({
            type: "error",
            title: "La imagen debe estar no debe superar los 2 MB.",
            confirmButtonText: "Cerrar"
        });

     }else{

        var datosImagen = new FileReader;
        datosImagen.readAsDataURL(imagen);

        $(datosImagen).on("load", function(event){
            
            var rutaImagen = event.target.result;

            $(".previsualizar").attr("src",rutaImagen);

        })
     }


})


///SUBIR FOTO USUARIOS


$(document).on("click",".btnEditarUsuario",function(){

    var idUsuario = $(this).attr("idUsuario");
   // console.log("idUsuario",idUsuario);

    var datos = new FormData();
    datos.append("idUsuario", idUsuario);
       //console.log(datos)
   

    $.ajax({

        url:"ajax/usuarios.ajax.php",
		method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,              
		dataType: "json",
		success: function(respuesta){
            
            //console.log("respuesta OK",respuesta);
			$("#editarNombre").val(respuesta["nombre"]);
			$("#editarUsuario").val(respuesta["usuario"]);
			$("#editarPerfil").html(respuesta["perfil"]);
			$("#editarPerfil").val(respuesta["perfil"]);
			$("#fotoActual").val(respuesta["foto"]);

			 $("#passwordActual").val(respuesta["password"]);

			 if(respuesta["foto"] != ""){

			 	$(".previsualizar").attr("src", respuesta["foto"]);

              }

        }
        

	});

})

$(document).on("click",".btnActivar",function(){

    var idUsuario  = $(this).attr("idUsuario");
    var estadoUsuario  = $(this).attr("estadoUsuario");

    var datos = new FormData();
    datos.append("activarId", idUsuario);
    datos.append("activarUsuario", estadoUsuario);
       //console.log(datos)
   
//console.log(datos);

    $.ajax({
        url:"ajax/usuarios.ajax.php",
		method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
		dataType: "json",
		success: function(respuesta){
            console.log(respuesta);
            if(window.matchMedia("(max-width:450px)").matches){

                Swal.fire({
                    type: "success",
                    title: "El usuario ha sido actualizado",
                    confirmButtonText: "Cerrar"
                }).then(function(result){
                    
                    if(result.value){

                        window.location = "usuarios";
                    }
                });
            }
        }
             
    });

    if(estadoUsuario == 0){

        $(this).removeClass('btn-success');
        $(this).addClass('btn-danger');
        $(this).html('Desactivado');
        $(this).attr('estadoUsuario',1);
    }else{
        $(this).removeClass('btn-danger');
        $(this).addClass('btn-success');
        $(this).html('Activado');
        $(this).attr('estadoUsuario',0);
    }


})



////Control usuarios existentes

$("#nuevoUsuario").change(function(){

    $(".alert").remove();
    var usuario = $(this).val();

    var datos = new FormData();
    datos.append("validarUsuario", usuario);


    $.ajax({
        url:"ajax/usuarios.ajax.php",
		method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,              
		dataType: "json",
		success: function(respuesta){
            //console.log("respuesta",respuesta);

            if(respuesta){
                $("#nuevoUsuario").parent().after('<div class="alert alert-warning">Este usuario ya esxiste en la base de datos</div>')
                $("#nuevoUsuario").val("");
            }else{

            }

            


        }
    });

})


///eliminarUSUARIO


$(document).on("click",".btnEliminarUsuario",function(){

    var idUsuario = $(this).attr("idUsuario");
    var fotoUsuario = $(this).attr("fotoUsuario");
    var usuario = $(this).attr("usuario");

    Swal.fire({
        title:"¿Esta seguro de borrar el usuario?",
        text: "¡Si no lo esta puede cancelar la acción!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor:"#3085d6",
        cancelButtonColor:"#d33",
        cancelButtonText: "Cancelar",
        confirmButtonText: "Si, borrar usuario!"
    }).then((result)=>{

        if(result.value){
            window.location = "index.php?ruta=usuarios&idUsuario="+idUsuario+"&usuario="+usuario+"&fotoUsuario="+fotoUsuario;
        }






    })
})
 
