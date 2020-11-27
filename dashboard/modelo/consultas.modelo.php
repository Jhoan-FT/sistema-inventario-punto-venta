<?php 
	
require_once "conexion.php";

class ModeloConsultas{
		/**
		 *  MOSTRAR
		 */
		 static public function mdlMostrarInactivos($tabla){
					$stmt = conexion::conectar()->prepare("SELECT * FROM $tabla WHERE estado LIKE '0' AND rol != 'Master' AND rol != 'Aspirante'");
					$stmt -> execute();
				    return $stmt->fetchAll();
					$stmt ->close();
					$stmt=null;
		}	
		/**
		 *  MOSTRAR
		 */
		 static public function mdlMostrarUltimo2($tabla, $item){
					$stmt = conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY $item DESC LIMIT 1");
					$stmt -> execute();
				    return $stmt->fetch();
					$stmt ->close();
					$stmt=null;
		}	
		/**
		 *  MOSTRAR
		 */
		 static public function mdlMostrarUltimo($tabla, $item){
					$stmt = conexion::conectar()->prepare("SELECT * FROM $tabla WHERE rol LIKE '%Administrador%' OR rol LIKE '%Empleado%' ORDER BY $item DESC LIMIT 1");
					$stmt -> execute();
				    return $stmt->fetch();
					$stmt ->close();
					$stmt=null;
		}	

		/**
		 *  MOSTRAR
		 */
		 static public function mdlMostrarinfoSesion($item, $tabla){
					$stmt = conexion::conectar()->prepare("SELECT * FROM $tabla WHERE cedula = $item");
					$stmt -> execute();
				    return $stmt->fetch();
					$stmt ->close();
					$stmt=null;
		}	
		/**
		 *  MOSTRAR
		 */
		 static public function mdlMostrarInfoInicio($tabla, $valor){

					$stmt = conexion::conectar()->prepare("SELECT COUNT(*) FROM $tabla");
					$stmt -> execute();
				    return $stmt->fetchColumn();
					$stmt ->close();
					$stmt=null;
		}
		/**
		 *  MOSTRAR MAX
		 */
		 static public function mdlMostrarMax($item, $valor, $tabla){

					$stmt = conexion::conectar()->prepare("SELECT $valor, $item FROM $tabla WHERE $item = (SELECT MAX($item)FROM $tabla)");
					$stmt -> execute();
				    return $stmt->fetch();
					$stmt ->close();
					$stmt=null;
		}
		/**
		 *  MOSTRAR MIN
		 */
		 static public function mdlMostrarMin($item, $valor, $tabla){

					$stmt = conexion::conectar()->prepare("SELECT $valor, $item FROM $tabla WHERE $item = (SELECT MIN($item)FROM $tabla)");
					$stmt -> execute();
				    return $stmt->fetch();
					$stmt ->close();
					$stmt=null;
		}

}

 ?>