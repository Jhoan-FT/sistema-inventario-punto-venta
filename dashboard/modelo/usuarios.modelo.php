<?php

require_once "conexion.php";

class ModeloUsuarios{

		/**
		 * ACTUALIZAR USUARIO
		 */
		static public function mdlActualizarUsuario($tabla,$item1,$valor1,$item2,$valor2){
					$stmt = conexion::conectar()->prepare("UPDATE $tabla SET $item1 = :$item1 WHERE $item2 = :$item2");
					$stmt -> bindParam(":".$item1,$valor1,PDO::PARAM_STR);
					$stmt -> bindParam(":".$item2,$valor2,PDO::PARAM_STR);
					if($stmt->execute()){
						return "ok";
					}else{
						return "error";
					}
					$stmt ->close();
					$stmt = null;

				}

		/**
		 * MOSTRAR INGRESAR
		 */
		static public function mdlMostrarUsuarios($tabla,$item,$valor){

					if($item!=null){
						$stmt = conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
						$stmt -> bindParam(":".$item,$valor,PDO::PARAM_STR);
						$stmt -> execute();
						return $stmt->fetch();
					}else{
						$stmt = conexion::conectar()->prepare("SELECT * FROM $tabla WHERE rol LIKE '%Administrador%' OR rol LIKE '%Empleado%'");
						$stmt -> execute();
						return $stmt->fetchAll();
					}
					
					$stmt ->close();
					$stmt=null;
		}
		/**
		 * MOSTRAR INGRESAR
		 */
		static public function mdlMostrarUsuariosAdmin($tabla,$item,$valor){

					if($item!=null){
						$stmt = conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
						$stmt -> bindParam(":".$item,$valor,PDO::PARAM_STR);
						$stmt -> execute();
						return $stmt->fetch();
					}else{
						$stmt = conexion::conectar()->prepare("SELECT * FROM `usuarios` WHERE rol LIKE '%Administrador%' OR rol LIKE '%Master%'  OR rol LIKE '%Aspirante%'");

						$stmt -> execute();
						return $stmt->fetchAll();
					}
					
					$stmt ->close();
					$stmt=null;
		}		

		/**
		 * MOSTRAR 
		 */

		/**
		 * MOSTRAR TIPO DE DOCUMENTO
		 */
		 static public function mdlMostrarTipDoc($tabla,$item,$valor){

		                $stmt = conexion::conectar()->prepare("SELECT * FROM $tabla");
		                $stmt ->bindParam(":".$item,$valor, PDO::PARAM_STR);
		                $stmt->execute();
		                return $stmt->fetchAll();
		                $stmt->close;
		                $stmt = null;

		            }

        	   	
		/**
		 *  CREAR USUARIOS
		 */

		 static public function mdlIngresarUsuarios($tabla, $datos){

			$stmt = conexion::conectar()->prepare("INSERT INTO $tabla(cedula, nombre, apellido, correo, rol, clave, ruta_imagen, fecha) VALUES (:cedula, :nombre, :apellido, :correo, :rol, :clave, :ruta_imagen, now())");

			$stmt -> bindParam(":cedula",$datos["cedula"],                           PDO::PARAM_STR);
			$stmt -> bindParam(":nombre",$datos["nombre"],                           PDO::PARAM_STR);
			$stmt -> bindParam(":apellido",$datos["apellido"],                       PDO::PARAM_STR);
			$stmt -> bindParam(":correo",$datos["correo"],                           PDO::PARAM_STR);
			$stmt -> bindParam(":rol",$datos["rol"],                                 PDO::PARAM_STR);
			$stmt -> bindParam(":clave",$datos["clave"],                             PDO::PARAM_STR);
			$stmt -> bindParam(":ruta_imagen",$datos["ruta_imagen"],                 PDO::PARAM_STR);

			if ($stmt->execute()) {
				return "ok";
			}else{
				return "error";
			}

			$stmt -> close();
			$stmt = null;

		  }	


		/**
		 *  EDITAR USUARIOS
		 */
		 static public function mdlEditarUsuarios($tabla, $datos){

			$stmt = conexion::conectar()->prepare("UPDATE $tabla SET nombre=:nombre, apellido=:apellido, correo=:correo, rol=:rol, clave=:clave, ruta_imagen=:ruta_imagen WHERE cedula=:cedula");

			$stmt -> bindParam(":cedula",$datos["cedula"],               PDO::PARAM_STR);
			$stmt -> bindParam(":nombre",$datos["nombre"],               PDO::PARAM_STR);
			$stmt -> bindParam(":apellido",$datos["apellido"],           PDO::PARAM_STR);
			$stmt -> bindParam(":correo",$datos["correo"],               PDO::PARAM_STR);
			$stmt -> bindParam(":rol",$datos["rol"],                     PDO::PARAM_STR);
			$stmt -> bindParam(":clave",$datos["clave"],                 PDO::PARAM_STR);
			$stmt -> bindParam(":ruta_imagen",$datos["ruta_imagen"],     PDO::PARAM_STR);
							

			if ($stmt->execute()) {
				return "ok";
			}else{
				return "error";
			}

			$stmt -> close();
			$stmt = null;

		  }

		/**
		 *  BORRAR USUARIOS
		 */
			static public function mdlBorrarUsuario($tabla,$datos){
			$stmt = conexion::conectar()->prepare("DELETE FROM $tabla WHERE cedula = :idUsuario");
			$stmt -> bindParam(":idUsuario",$datos,PDO::PARAM_STR);
			if($stmt->execute()){
				return "ok";
			}else{
				return "error";
			}
			$stmt -> close();
			$stmt = null;

		}

}

?>


        