<?php 

	require_once "conexion.php";

	class ModeloVentas{

		/**
		 * 	RANGO DE FECHAS
		 */

		static public function mdlRangoFechasVentas($tabla, $fechaInicial, $fechaFinal){
					
			if ($fechaInicial == null) {

				$stmt = conexion::conectar()->prepare("SELECT * FROM $tabla");

				$stmt -> execute();

				return $stmt->fetchAll();				
				
			}else if ($fechaInicial == $fechaFinal) {

				$stmt = conexion::conectar()->prepare("SELECT * FROM venta WHERE fecha LIKE '%$fechaInicial%'");

				$stmt -> bindParam(":fecha", $fechaInicial, PDO::PARAM_STR);


				$stmt -> execute();

				return $stmt->fetchAll();

			}else{

				$fechaActual = new DateTime();
				$fechaActual ->add(new DateInterval("P1D"));
				$fechaActualMasUno = $fechaActual->format("Y-m-d");

				$fechaFinal2 = new DateTime($fechaFinal);
				$fechaFinal2 ->add(new DateInterval("P1D"));
				$fechaFinalMasUno = $fechaFinal2->format("Y-m-d");

				if ($fechaFinalMasUno == $fechaActualMasUno) {
						$stmt = conexion::conectar()->prepare("SELECT * FROM venta WHERE fecha BETWEEN '$fechaInicial' AND '$fechaFinalMasUno'");
					}else{

				$stmt = conexion::conectar()->prepare("SELECT * FROM venta WHERE fecha BETWEEN '$fechaInicial' AND '$fechaFinal'"); 		
					}

				$stmt -> execute();

				return $stmt->fetchAll();				
			}
		}		
		

		/**
		 * 	 BORRAR VENTA
		 */
			static public function mdlEliminarVentas($tabla,$datos){
			$stmt = conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_venta = :idVenta");
			$stmt -> bindParam(":idVenta",$datos,PDO::PARAM_STR);
			if($stmt->execute()){
				return "ok";
			}else{
				return "error";
			}
			$stmt -> close();
			$stmt = null;

		}		

		/**
		 *  EDITAR VENTA
		 */
		static public function mdlEditarVentas($tabla, $datos){

			$stmt = conexion::conectar()->prepare("UPDATE $tabla SET codigo_venta=:codigo_venta, id_cliente=:id_cliente, id_usuario=:id_usuario, productos=:productos, impuesto=:impuesto, neto=:neto, total=total, metodo_pago=:metodo_pago WHERE codigo_venta=:codigo_venta");
			
			$stmt -> bindParam(":codigo_venta",$datos["codigo_venta"], PDO::PARAM_STR);
			$stmt -> bindParam(":id_cliente",$datos["id_cliente"],     PDO::PARAM_STR);
			$stmt -> bindParam(":id_usuario",$datos["id_usuario"],     PDO::PARAM_STR);
			$stmt -> bindParam(":productos",$datos["productos"],       PDO::PARAM_STR);
			$stmt -> bindParam(":impuesto",$datos["impuesto"],         PDO::PARAM_STR);
			$stmt -> bindParam(":neto",$datos["neto"],                 PDO::PARAM_STR);
			$stmt -> bindParam(":total",$datos["total"],               PDO::PARAM_STR);
			$stmt -> bindParam(":metodo_pago",$datos["metodo_pago"],   PDO::PARAM_STR);

			if ($stmt->execute()) {
				return "ok";
			}else{
				return "error";
			}

			$stmt -> close();
			$stmt = null;

		  }		

	

		/**
		 * 	MOSTRAR VENTAS Y TODO
		 */
		 static public function mdlMostrarVentasyTodo($tabla, $item,$valor){

					if($item!=null){
						$stmt = conexion::conectar()->prepare("SELECT id_venta, codigo_venta, c.num_doc_cli, c.nombres, c.apellidos, u.cedula, u.nombre, productos, impuesto, neto, total, metodo_pago, v.fecha FROM venta AS v  INNER JOIN clientes AS c ON c.num_doc_cli = v.id_cliente INNER JOIN usuarios AS u ON u.cedula = v.id_usuario WHERE $item = :$item");
						$stmt -> bindParam(":".$item,$valor,PDO::PARAM_STR);
						$stmt -> execute();
						return $stmt->fetch();
					}else{
						$stmt = conexion::conectar()->prepare("SELECT id_venta, codigo_venta, c.num_doc_cli, c.nombres, c.apellidos, u.cedula, u.nombre, productos, impuesto, neto, total, metodo_pago, v.fecha FROM venta AS v  INNER JOIN clientes AS c ON c.num_doc_cli = v.id_cliente INNER JOIN usuarios AS u ON u.cedula = v.id_usuario");
						$stmt -> execute();
						return $stmt->fetchAll();
					}
					
					$stmt ->close();
					$stmt=null;
		}		

		/**
		 *  MOSTRAR VENTAS
		 */

		static public function mdlMostrarVentas($tabla, $item, $valor){

					if($item!=null){

						$stmt = conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item ORDER BY id_venta ASC");

						$stmt -> bindParam(":".$item,$valor,PDO::PARAM_STR);
						$stmt -> execute();
						return $stmt->fetch();
					}else{
						$stmt = conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY id_venta ASC");
						$stmt -> execute();
						return $stmt->fetchAll();
					}
					
					$stmt ->close();
					$stmt=null;
		}

		/**
		 *  MOSTRAR VENTAS
		 */

		static public function mdlMostrarVentasExcel(){
						$stmt = conexion::conectar()->prepare("SELECT * FROM venta ORDER BY id_venta ASC");
						$stmt -> execute();
						return $stmt->fetchAll();
					
					$stmt ->close();
					$stmt=null;
		}


		/**
		 *  MOSTRAR VENTAS
		 */

		static public function mdlMostrarVentasFormatear($tabla, $item, $valor){

					$stmt = conexion::conectar()->prepare("SELECT * FROM $tabla WHERE codigo_venta = :$item");

						$stmt -> bindParam(":".$item,$valor,PDO::PARAM_STR);
						$stmt -> execute();
						return $stmt->fetch();
			
		}		

		/**
		 *  CREAR VENTA
		 */

		static public function mdlIngresarVenta($tabla, $datos){

			$stmt = conexion::conectar()->prepare("INSERT INTO $tabla(codigo_venta, id_cliente, id_usuario, productos, impuesto, neto, total, metodo_pago) VALUES (:codigo_venta, :id_cliente, :id_usuario, :productos, :impuesto, :neto, :total, :metodo_pago)");

			$stmt -> bindParam(":codigo_venta",$datos["codigo_venta"], PDO::PARAM_STR);
			$stmt -> bindParam(":id_cliente",$datos["id_cliente"],     PDO::PARAM_STR);
			$stmt -> bindParam(":id_usuario",$datos["id_usuario"],     PDO::PARAM_STR);
			$stmt -> bindParam(":productos",$datos["productos"],       PDO::PARAM_STR);
			$stmt -> bindParam(":impuesto",$datos["impuesto"],         PDO::PARAM_STR);
			$stmt -> bindParam(":neto",$datos["neto"],                 PDO::PARAM_STR);
			$stmt -> bindParam(":total",$datos["total"],               PDO::PARAM_STR);
			$stmt -> bindParam(":metodo_pago",$datos["metodo_pago"],   PDO::PARAM_STR);


			if ($stmt->execute()) {
				return "ok";
			}else{
				return "error";
			}

			$stmt -> close();
			$stmt = null;

		  }		

	/**
	 * 	SUMA VENTAS
	 */
	
	static public function mdlMostrarSumaVentas($tabla){

		$stmt = conexion::conectar()->prepare("SELECT SUM(neto) AS total FROM $tabla");
		$stmt -> execute();
		return $stmt->fetch();
		$stmt -> close();
		$stmt = null;		
		

	}

}




 ?>