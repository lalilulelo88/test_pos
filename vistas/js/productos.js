
///CARGAR TABLA DINAMICA DE PRODUCTOS

$("#nuevaCategoria").change(function(){

    var idCategoria = $(this).val();

    var datos = new FormData();
    datos.append("idCategoria", idCategoria);

    $.ajax({
        url:"ajax/productos.ajax.php",
		method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,              
		dataType: "json",
		success:function(respuesta){

            console.log("respuesta",respuesta);

        }
    })
})

