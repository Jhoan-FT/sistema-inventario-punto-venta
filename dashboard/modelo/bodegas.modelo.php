<?php 

require_once "conexion.php";

class ModeloBodegas{

		
		 /**
		 *  BORRAR BODEGAS
		 */
			static public function mdlBorrarBodega($tabla,$datos){
			$stmt = conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_bodega = :idBog");
			$stmt -> bindParam(":idBog",$datos,PDO::PARAM_STR);
			if($stmt->execute()){
				return "ok";
			}else{
				return "error";
			}
			$stmt -> close();
			$stmt = null;

		}
		/**
		 *  EDITAR BODEGAS
		 */
		static public function mdlEditarBodegas($tabla, $datos){

					$stmt = conexion::conectar()->prepare("UPDATE $tabla SET nombre_bodega=:nombre_bodega, observaciones=:observaciones  WHERE id_bodega=:id_bodega");

					$stmt -> bindParam(":id_bodega",$datos['id_bodega'],              PDO::PARAM_STR);
					$stmt -> bindParam(":nombre_bodega",$datos['nombre_bodega'],      PDO::PARAM_STR);
					$stmt -> bindParam(":observaciones",$datos['observaciones'],       PDO::PARAM_STR);


					if($stmt->execute()){
						return "ok";
					}else{
						return "error";
					}
					$stmt ->close();
					$stmt = null;
				}
		/**
		 * MOSTRAR BODEGA
		 */
		 static public function mdlMostrarBodegas($tabla,$item,$valor){

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
		 *  CREAR BODEGA
		 */
		 
		static public function mdlIngresarBodega($tabla, $datos){

			$stmt = conexion::conectar()->prepare("INSERT INTO $tabla(nombre_bodega, observaciones) VALUES (:nombre_bodega, :observaciones)");

			$stmt -> bindParam(":nombre_bodega",$datos["nombre_bodega"],    PDO::PARAM_STR);
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