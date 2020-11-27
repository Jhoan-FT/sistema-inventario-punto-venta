<?php 

require_once "conexion.php";

class ModeloNotas{
		/**
		 *  BORRAR NOTAS
		 */
				static public function mdlBorrarNota($tabla,$datos){
			$stmt = conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_nota = :idNota");
			$stmt -> bindParam(":idNota",$datos,PDO::PARAM_STR);
			if($stmt->execute()){
				return "ok";
			}else{
				return "error";
			}
			$stmt -> close();
			$stmt = null;

		}
		/**
		 *  EDITAR NOTAS
		 */
		static public function mdlEditarNotas($tabla,$datos){
					$stmt = conexion::conectar()->prepare("UPDATE $tabla SET titulo=:titulo, contenido=:contenido WHERE id_nota=:id_nota");

					$stmt -> bindParam(":id_nota",$datos['id_nota'],    PDO::PARAM_STR);
					$stmt -> bindParam(":titulo",$datos['titulo'],      PDO::PARAM_STR);
					$stmt -> bindParam(":contenido",$datos['contenido'],PDO::PARAM_STR);


					if($stmt->execute()){
						return "ok";
					}else{
						return "error";
					}
					$stmt ->close();
					$stmt = null;
				}
		/**
		 *  MOSTRAR NOTA
		 */

		static public function mdlMostrarNotas($tabla,$item,$valor){

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
		 static public function mdlMostrarNotas2($tabla,$item,$valor){

						$stmt = conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
						$stmt -> bindParam(":".$item,$valor,PDO::PARAM_STR);
						$stmt -> execute();
						return $stmt->fetchAll();
						$stmt ->close();
						$stmt=null;
		}   

		/**
		 *  CREAR NOTA
		 */

		static public function mdlIngresarNota($tabla, $datos){

			$stmt = conexion::conectar()->prepare("INSERT INTO $tabla(titulo, contenido, id_usuario, fecha_n) VALUES (:titulo, :contenido, :id_usuario, now())");

			$stmt -> bindParam(":titulo",$datos["titulo"],                PDO::PARAM_STR);
			$stmt -> bindParam(":contenido",$datos["contenido"],          PDO::PARAM_STR);
			$stmt -> bindParam(":id_usuario",$datos["id_usuario"],          PDO::PARAM_STR);


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