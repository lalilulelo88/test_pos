<?php

class ControladorProductos{

    static public function ctrMostrarProductos($item,$valor){

    $tabla = "productos";

    $respuesta = ModeloProductos::mdlMostrarProducto($tabla,$item,$valor);

    return $respuesta;
    }




}

