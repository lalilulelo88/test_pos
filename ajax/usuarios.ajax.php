<?php

require_once "../controladores/usuarios.controlador.php";
require_once "../modelos/usuarios.modelo.php";

class AjaxUsuarios{

    // EDITAR USUARIO

    public $idUsuario;

	 public function ajaxEditarUsuario(){

		$item = "id";
		$valor = $this -> idUsuario;

		$respuesta = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);

       echo json_encode($respuesta);

    }
    


    ///Acivar usuario

    public $activarId;
    public $activarUsuario;

     public function ajaxActivarUsuario(){

        $tabla ="usuarios";

        $item1 = "estado";
        $valor1 = $this -> activarUsuario;

        $item2 = "id";
        $valor2 = $this -> activarId;


        $respuesta = ModeloUsuarios::mdlActualizarUsuario($tabla,$item1,$valor1,$item2,$valor2);


    }


    /////Validar Usuario

    public $validarUsuario;

     public function ajaxValidarUsuario(){

        $item = "usuario";
		$valor = $this -> validarUsuario;

		$respuesta = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);

       echo json_encode($respuesta);

    }
}



if(isset($_POST["idUsuario"])){

    $editar = new AjaxUsuarios();
    $editar -> idUsuario = $_POST["idUsuario"];
    $editar -> ajaxEditarUsuario();
}


if(isset($_POST["activarUsuario"])){

    $editar = new AjaxUsuarios();
    $editar -> activarId = $_POST["activarId"];
    $editar -> activarUsuario = $_POST["activarUsuario"];
    $editar -> ajaxActivarUsuario();
}

if(isset($_POST["validarUsuario"])){

    $editar = new AjaxUsuarios();
    $editar -> validarUsuario = $_POST["validarUsuario"];

    $editar -> ajaxValidarUsuario();
    
}