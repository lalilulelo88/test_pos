<?php

require_once "../controladores/productos.controlador.php";
require_once "../modelos/productos.modelo.php";

class AjaxProductos{

    public $idCategoria;
    
    public function ajaxCrearCodigoProducto(){

        $item = "id_categoria";
        $valor = $this -> idCategoria;

        $respuesta = ControladorProductos::ctrMostrarProductos($item,$valor);

        echo json_encode($respuesta);

    }
}

////Activar

if(isset($_POST["idCategoria"])){

    $codigoProductos = new AjaxProductos();
    $codigoProductos -> idCategoria = $_POST["idCategoria"];
    $codigoProductos -> ajaxCrearCodigoProducto();

}
