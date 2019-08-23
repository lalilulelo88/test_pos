<?php

require_once "../controladores/categorias.controlador.php";
require_once "../modelos/categorias.modelo.php";

class AjaxCategorias{

    //EDITAR USUARIO

    public $idCategoria;

	 public function ajaxEditarCategoria(){

		$item = "id";
		$valor = $this -> idCategoria;

		$respuesta = ControladorCategorias::ctrMostrarCategorias($item, $valor);

       echo json_encode($respuesta);

    }
    


    
    /////Validar Usuario

    public $validarCategoria;

     public function ajaxValidarCategoria(){

        $item = "categoria";
		$valor = $this -> validarCategoria;

		$respuesta = ControladorCategorias::ctrMostrarCategorias($item, $valor);

       echo json_encode($respuesta);

    }
}



if(isset($_POST["idCategoria"])){

    $editar = new AjaxCategorias();
    $editar -> idCategoria = $_POST["idCategoria"];
    $editar -> ajaxEditarCategoria();
}




if(isset($_POST["validarCategoria"])){

    $editar = new AjaxCategorias();
    $editar -> validarCategoria = $_POST["validarCategoria"];

    $editar -> ajaxValidarCategoria();
    
}