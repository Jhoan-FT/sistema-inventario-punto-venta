<?php 

require_once "conexion.php";

class ModeloClientes{
		/**
		 * ACTUALIZAR CLIENTE
		 */

		static public function mdlActualizarCliente($tabla, $item1, $valor1, $valor){
					$stmt = conexion::conectar()->prepare("UPDATE $tabla SET $item1 = :$item1 WHERE num_doc_cli = :num_doc_cli");
					$stmt -> bindParam(":".$item1,$valor1,PDO::PARAM_STR);
					$stmt -> bindParam(":num_doc_cli", $valor,PDO::PARAM_STR);
					if($stmt->execute()){
						return "ok";
					}else{
						return "error";
					}
					$stmt ->close();
					$stmt = null;

				}	
	     /**
		 *  BORRAR CLIENTES
		 */
			static public function mdlBorrarCliente($tabla,$datos){
			$stmt = conexion::conectar()->prepare("DELETE FROM $tabla WHERE num_doc_cli = :idCliente");
			$stmt -> bindParam(":idCliente",$datos,PDO::PARAM_STR);
			if($stmt->execute()){
				return "ok";
			}else{
				return "error";
			}
			$stmt -> close();
			$stmt = null;

		}

	    /**
		 *  EDITAR CLIENTE
		 */
		static public function mdlEditarClientes($tabla, $datos){

			$stmt = conexion::conectar()->prepare("UPDATE $tabla SET tipo_documento=:tipo_documento, nombres=:nombres, apellidos=:apellidos, correo=:correo, telefono=:telefono, direccion=:direccion, compras=:compras WHERE num_doc_cli=:num_doc_cli");

			$stmt -> bindParam(":num_doc_cli",$datos["num_doc_cli"],         PDO::PARAM_STR);
			$stmt -> bindParam(":tipo_documento",$datos["tipo_documento"],   PDO::PARAM_STR);
			$stmt -> bindParam(":nombres",$datos["nombres"],                 PDO::PARAM_STR);
			$stmt -> bindParam(":apellidos",$datos["apellidos"],             PDO::PARAM_STR);
			$stmt -> bindParam(":correo",$datos["correo"],                   PDO::PARAM_STR);
			$stmt -> bindParam(":telefono",$datos["telefono"],               PDO::PARAM_STR);
			$stmt -> bindParam(":compras",$datos["compras"],                 PDO::PARAM_STR);
			$stmt -> bindParam(":direccion",$datos["direccion"],             PDO::PARAM_STR);

			if ($stmt->execute()) {
				return "ok";
			}else{
				return "error";
			}

			$stmt -> close();
			$stmt = null;

		  }
		 /**
		 * MOSTRAR CLIENTES
		 */
		 static public function mdlMostrarClientes($tabla,$item,$valor){

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
		 *  CREAR CLIENTE
		 */
		static public function mdlIngresarClientes($tabla, $datos){

			$stmt = conexion::conectar()->prepare("INSERT INTO $tabla(num_doc_cli, tipo_documento, nombres, apellidos, correo, telefono, direccion, fecha) VALUES (:num_doc_cli, :tipo_documento, :nombres, :apellidos, :correo, :telefono, :direccion, now())");

			$stmt -> bindParam(":num_doc_cli",$datos["num_doc_cli"],         PDO::PARAM_STR);
			$stmt -> bindParam(":tipo_documento",$datos["tipo_documento"],   PDO::PARAM_STR);
			$stmt -> bindParam(":nombres",$datos["nombres"],                 PDO::PARAM_STR);
			$stmt -> bindParam(":apellidos",$datos["apellidos"],             PDO::PARAM_STR);
			$stmt -> bindParam(":correo",$datos["correo"],                   PDO::PARAM_STR);
			$stmt -> bindParam(":telefono",$datos["telefono"],               PDO::PARAM_STR);
			$stmt -> bindParam(":direccion",$datos["direccion"],             PDO::PARAM_STR);
			

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