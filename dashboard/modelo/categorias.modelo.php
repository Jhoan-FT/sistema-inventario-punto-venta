<?php

require_once "conexion.php";

class ModeloCategorias{

		 /**
		 *  BORRAR CATEGORÍAS
		 */
			static public function mdlBorrarCategoria($tabla,$datos){
			$stmt = conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_categoria = :idCate");
			$stmt -> bindParam(":idCate",$datos,PDO::PARAM_STR);
			if($stmt->execute()){
				return "ok";
			}else{
				return "error";
			}
			$stmt -> close();
			$stmt = null;

		}
		/**
		 *  EDITAR CATEGORIAS
		 */
		static public function mdlEditarCategorias($tabla,$datos){
					$stmt = conexion::conectar()->prepare("UPDATE $tabla SET nombre_categoria=:nombre_categoria, observaciones=:observaciones WHERE id_categoria =:id_categoria");

					$stmt -> bindParam(":id_categoria",$datos['id_categoria'],              PDO::PARAM_STR);
					$stmt -> bindParam(":nombre_categoria",$datos['nombre_categoria'],      PDO::PARAM_STR);
					$stmt -> bindParam(":observaciones",$datos['observaciones'],            PDO::PARAM_STR);


					if($stmt->execute()){
						return "ok";
					}else{
						return "error";
					}
					$stmt ->close();
					$stmt = null;
				}
		 /**
		 * MOSTRAR CATEGORIAS
		 */

		 static public function mdlMostrarCategorias($tabla,$item,$valor){

					if($item!=null){
						$stmt = conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
						$stmt -> bindParam(":".$item,$valor,PDO::PARAM_STR);
						$stmt -> execute();
						return $stmt->fetch();
					}else{
						$stmt = conexion::conectar()->prepare("SELECT * FROM $tabla");
						$stmt -> execute();
						return $stmt->fetchAll();
					}
					
					$stmt ->close();
					$stmt=null;
		}
		/**
		 *  CREAR CATEGORIAS
		 */

		static public function mdlIngresarCategoria($tabla, $datos){

			$stmt = conexion::conectar()->prepare("INSERT INTO $tabla(nombre_categoria, observaciones) VALUES (:nombre_categoria, :observaciones)");

			$stmt -> bindParam(":nombre_categoria",$datos["nombre_categoria"],    PDO::PARAM_STR);
			$stmt -> bindParam(":observaciones",$datos["observaciones"],          PDO::PARAM_STR);


			if ($stmt->execute()) {
				return "ok";
			}else{
				return "error";
			}

			$stmt -> close();
			$stmt = null;

		  }

}

?>