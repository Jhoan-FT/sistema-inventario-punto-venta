<?php

	require_once "conexion.php";

class ModeloProductos{

		/**
		 * ACTUALIZAR PRODUCTO
		 */
		static public function mdlActualizarProducto($tabla, $item1, $valor1, $valor){
					$stmt = conexion::conectar()->prepare("UPDATE $tabla SET $item1 = :$item1 WHERE id_producto = :id_producto");
					$stmt -> bindParam(":".$item1,$valor1,PDO::PARAM_STR);
					$stmt -> bindParam(":id_producto", $valor,PDO::PARAM_STR);
					if($stmt->execute()){
						return "ok";
					}else{
						return "error";
					}
					$stmt ->close();
					$stmt = null;

				}
		 /**
		 *  BORRAR PRODUCTOS
		 */
			static public function mdlBorrarProducto($tabla,$datos){
			$stmt = conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_producto = :idProducto");
			$stmt -> bindParam(":idProducto",$datos,PDO::PARAM_STR);
			if($stmt->execute()){
				return "ok";
			}else{
				return "error";
			}
			$stmt -> close();
			$stmt = null;

		}

		/**
		 *  EDITAR PRODUCTOS
		 */

		 static public function mdlEditarProductos($tabla, $datos){

			$stmt = conexion::conectar()->prepare("UPDATE $tabla SET codigo=:codigo,
			 descripcion_producto=:descripcion_producto, id_categoria=:id_categoria, id_bodega=:id_bodega, 
			 cantidad_producto=:cantidad_producto, precio_compra=:precio_compra, precio_venta=:precio_venta, ventas=:ventas,
			 id_proveedor=:id_proveedor, ruta_imagen =:ruta_imagen WHERE id_producto=:id_producto");

			$stmt -> bindParam(":id_producto",$datos["id_producto"],                  PDO::PARAM_STR);
			$stmt -> bindParam(":codigo",$datos["codigo"],                            PDO::PARAM_STR);
			$stmt -> bindParam(":descripcion_producto",$datos["descripcion_producto"],PDO::PARAM_STR);
			$stmt -> bindParam(":id_categoria",$datos["id_categoria"],                PDO::PARAM_STR);
			$stmt -> bindParam(":id_bodega",$datos["id_bodega"],                  	  PDO::PARAM_STR);
			$stmt -> bindParam(":cantidad_producto",$datos["cantidad_producto"],      PDO::PARAM_STR);
			$stmt -> bindParam(":precio_compra",$datos["precio_compra"],              PDO::PARAM_STR);
			$stmt -> bindParam(":precio_venta",$datos["precio_venta"],                PDO::PARAM_STR);
			$stmt -> bindParam(":ventas",$datos["ventas"],                			  PDO::PARAM_STR);
			$stmt -> bindParam(":id_proveedor",$datos["id_proveedor"],                PDO::PARAM_STR);
			$stmt -> bindParam(":ruta_imagen",$datos["ruta_imagen"],                  PDO::PARAM_STR);
							

			if ($stmt->execute()) {
				return "ok";
			}else{
				return "error";
			}

			$stmt -> close();
			$stmt = null;

		  }

		/**
		 * CREAR PRODUCTOS
		 */

		 static public function mdlIngresarProductos($tabla, $datos){

			$stmt = conexion::conectar()->prepare("INSERT INTO $tabla(codigo, descripcion_producto, id_categoria, id_bodega, cantidad_producto, precio_compra, precio_venta, id_proveedor, ruta_imagen, fecha) VALUES (:codigo, :descripcion_producto, :id_categoria, :id_bodega, :cantidad_producto, :precio_compra, :precio_venta, :id_proveedor, :ruta_imagen, now())");

			$stmt -> bindParam(":codigo",$datos["codigo"],                            PDO::PARAM_STR);
			$stmt -> bindParam(":descripcion_producto",$datos["descripcion_producto"],PDO::PARAM_STR);
			$stmt -> bindParam(":id_categoria",$datos["id_categoria"],                PDO::PARAM_STR);
			$stmt -> bindParam(":id_bodega",$datos["id_bodega"],                  	  PDO::PARAM_STR);
			$stmt -> bindParam(":cantidad_producto",$datos["cantidad_producto"],      PDO::PARAM_STR);
			$stmt -> bindParam(":precio_compra",$datos["precio_compra"],              PDO::PARAM_STR);
			$stmt -> bindParam(":precio_venta",$datos["precio_venta"],                PDO::PARAM_STR);
			$stmt -> bindParam(":id_proveedor",$datos["id_proveedor"],                PDO::PARAM_STR);
			$stmt -> bindParam(":ruta_imagen",$datos["ruta_imagen"],                  PDO::PARAM_STR);
							

			if ($stmt->execute()) {
				return "ok";
			}else{
				return "error";
			}

			$stmt -> close();
			$stmt = null;

		  }

		/**
		 *  MOSTRAR PRODUCTOS
		 */

		 static public function mdlMostrarProductos($tabla, $item, $valor){

					if($item!=null){
						$stmt = conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
						$stmt -> bindParam(":".$item,$valor,PDO::PARAM_STR);
						$stmt -> execute();
						return $stmt->fetch();
					}else{
						$stmt = conexion::conectar()->prepare("SELECT * FROM productos");
						$stmt -> execute();
						return $stmt->fetchAll();
					}
					
					$stmt ->close();
					$stmt=null;
		}
		/**
		 *  MOSTRAR PRODUCTOS2
		 */

		 static public function mdlMostrarProductos2($item, $valor){

					if($item!=null){
						$stmt = conexion::conectar()->prepare("SELECT * FROM productos WHERE $item = :$item");
						$stmt -> bindParam(":".$item,$valor,PDO::PARAM_STR);
						$stmt -> execute();
						return $stmt->fetch();
					}else{
						$stmt = conexion::conectar()->prepare("SELECT * FROM productos");
						$stmt -> execute();
						return $stmt->fetchAll();
					}
					
					$stmt ->close();
					$stmt=null;
		}

						/**
		 *  MOSTRAR PRODUCTOS2
		 */

		 static public function mdlMostrarProductos3($tabla, $item, $valor, $orden){

					if($item!=null){
						$stmt = conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
						$stmt -> bindParam(":".$item,$valor,PDO::PARAM_STR);
						$stmt -> execute();
						return $stmt->fetch();
					}else{
						$stmt = conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY $orden DESC");
						$stmt -> execute();
						return $stmt->fetchAll();
					}
					
					$stmt ->close();
					$stmt=null;
		}
		/**
		 * MOSTRAR SUMA VENTA
		 */
		static public function mdlMostrarSumaVentas($tabla){

			$stmt = conexion::conectar()->prepare("SELECT SUM(ventas) AS total FROM $tabla");
				$stmt -> execute();
				return $stmt->fetch();
				$stmt ->close();
				$stmt=null;

		}
	}

?>