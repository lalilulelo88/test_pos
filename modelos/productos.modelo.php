<?php

require_once "conexion.php";

class ModeloProductos{

    static public function mdlMostrarProducto($tabla,$item,$valor){

        if($item != null){
            $stmt = Conexion::conectar()-> prepare("SELECT * FROM $tabla WHERE $item = :$item");
            
            $stmt -> bindParam(":".$item, $valor,PDO::PARAM_STR);

            $stmt-> execute();

            return $stmt-> fetch();
        }else{
            $stmt = Conexion::conectar()-> prepare("SELECT * FROM $tabla");
            
            $stmt-> execute();

            return $stmt-> fetchAll();
        }
        
        $stmt -> close();
        $stmt -> null;

    }

    static public function mdlIngresarProducto($tabla,$datos){

        $stmt = Conexion::conectar()-> prepare("INSERT INTO $tabla(producto) VALUES (:producto)");
         
        $stmt -> bindParam(":producto", $datos,PDO::PARAM_STR);

            if($stmt-> execute()){
                return "ok";
            }else {
                return "error";

            }

       
        $stmt -> close();
        $stmt -> null;
    }

    static public function mdlEditarProducto($tabla,$datos){

        $stmt = Conexion::conectar()-> prepare("UPDATE $tabla SET producto = :categoria WHERE id = :id");
         
        $stmt -> bindParam(":categoria", $datos["categoria"],PDO::PARAM_STR);
        $stmt -> bindParam(":id", $datos["id"],PDO::PARAM_STR);


            if($stmt-> execute()){
                return "ok";
            }else {
                return "error";

            }

       
        $stmt -> close();
        $stmt -> null;


    }

    static public function mdlBorrarProducto($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla  WHERE id = :id");

		$stmt -> bindParam(":id", $datos, PDO::PARAM_STR);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

    }


}
