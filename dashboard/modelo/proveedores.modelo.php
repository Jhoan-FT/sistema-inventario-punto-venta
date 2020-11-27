<?php 

require_once "conexion.php";

class ModeloProveedores{
				/**
		 *  BORRAR PROVEEDORES
		 */
			static public function mdlBorrarProveedor($tabla,$datos){
			$stmt = conexion::conectar()->prepare("DELETE FROM $tabla WHERE doc_proveedor = :idProov");
			$stmt -> bindParam(":idProov",$datos,PDO::PARAM_STR);
			if($stmt->execute()){
				return "ok";
			}else{
				return "error";
			}
			$stmt -> close();
			$stmt = null;

		}
/**
		 * EDITAR PROVEEDOR
		 */
		static public function mdlEditarProveedores($tabla, $datos){

			$stmt = conexion::conectar()->prepare("UPDATE $tabla SET nombre_proveedor=:nombre_proveedor, nombre_proveedor=:nombre_proveedor, tipo_documento_prov=:tipo_documento_prov, telefono_proveedor=:telefono_proveedor, correo_proveedor=:correo_proveedor, direccion_proveedor=:direccion_proveedor WHERE doc_proveedor=:doc_proveedor");
			

			$stmt -> bindParam(":doc_proveedor",$datos["doc_proveedor"],                          PDO::PARAM_STR);
			$stmt -> bindParam(":nombre_proveedor",$datos["nombre_proveedor"],                    PDO::PARAM_STR);
			$stmt -> bindParam(":tipo_documento_prov",$datos["tipo_documento_prov"],              PDO::PARAM_STR);
			$stmt -> bindParam(":telefono_proveedor",$datos["telefono_proveedor"],                PDO::PARAM_STR);
			$stmt -> bindParam(":correo_proveedor",$datos["correo_proveedor"],                    PDO::PARAM_STR);
			$stmt -> bindParam(":direccion_proveedor",$datos["direccion_proveedor"],              PDO::PARAM_STR);

			if ($stmt->execute()) {
				return "ok";
			}else{
				return "error";
				echo error;
			}

			$stmt -> close();
			$stmt = null;

		  }	            
		  /**
		 * MOSTRAR PROVEEDORES
		 */
		 static public function mdlMostrarProveedores($tabla,$item,$valor){

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
//Crear Proveedor
static public function mdlIngresarProveedor($tabla, $datos){

	$stmt = conexion::conectar()->prepare("INSERT INTO $tabla(doc_proveedor, nombre_proveedor, tipo_documento_prov, telefono_proveedor, correo_proveedor, direccion_proveedor) VALUES (:doc_proveedor, :nombre_proveedor, :tipo_documento_prov, :telefono_proveedor, :correo_proveedor, :direccion_proveedor)");
	
	$stmt -> bindParam(":doc_proveedor",$datos["doc_proveedor"],                          PDO::PARAM_STR);
	$stmt -> bindParam(":nombre_proveedor",$datos["nombre_proveedor"],                    PDO::PARAM_STR);
	$stmt -> bindParam(":tipo_documento_prov",$datos["tipo_documento_prov"],              PDO::PARAM_STR);
	$stmt -> bindParam(":telefono_proveedor",$datos["telefono_proveedor"],                PDO::PARAM_STR);
	$stmt -> bindParam(":correo_proveedor",$datos["correo_proveedor"],                    PDO::PARAM_STR);
	$stmt -> bindParam(":direccion_proveedor",$datos["direccion_proveedor"],              PDO::PARAM_STR);

	if ($stmt->execute()) {
		return "ok";
	}else{
		return "error";
		echo error;
	}

	$stmt -> close();
	$stmt = null;

  }	    
}

 ?>