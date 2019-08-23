


$(document).on("click",".btnEditarCategoria",function(){

    var idCategoria = $(this).attr("idCategoria");
   // console.log("idCategoria",idCategoria);

    var datos = new FormData();
    datos.append("idCategoria", idCategoria);
       //console.log(datos)
   

    $.ajax({

        url:"ajax/categorias.ajax.php",
		method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,              
		dataType: "json",
		success: function(respuesta){
            
            //console.log("respuesta OK",respuesta);
			$("#editarCategoria").val(respuesta["categoria"]);
			$("#idCategoria").val(respuesta["id"]);

        }
        

	});

})


////Control categoria existentes

$("#nuevaCategoria").change(function(){

    $(".alert").remove();
    var categoria = $(this).val();

    var datos = new FormData();
    datos.append("validarCategoria", categoria);


    $.ajax({
        url:"ajax/categorias.ajax.php",
		method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,              
		dataType: "json",
		success: function(respuesta){
            //console.log("respuesta",respuesta);

            if(respuesta){
                $("#nuevaCategoria").parent().after('<div class="alert alert-warning">Este categoria ya existe en la base de datos</div>')
                $("#nuevaCategoria").val("");
            }else{

            }

            


        }
    });

})


///eliminarUSUARIO


$(document).on("click",".btnEliminarCategoria",function(){

    var idCategoria = $(this).attr("idCategoria");
    

    Swal.fire({
        title:"¿Esta seguro de borrar la categoría?",
        text: "¡Si no lo esta puede cancelar la acción!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor:"#3085d6",
        cancelButtonColor:"#d33",
        cancelButtonText: "Cancelar",
        confirmButtonText: "Si, borrar categoría!"
    }).then((result)=>{

        if(result.value){
            window.location = "index.php?ruta=categorias&idCategoria="+idCategoria;
        }






    })
})
 
