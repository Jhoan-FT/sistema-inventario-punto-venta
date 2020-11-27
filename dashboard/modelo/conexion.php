		<?php 

		class conexion{

			static public function conectar(){

				$link = new PDO("mysql:host=localhost;dbname=bd_g-pymes","root","");
				// $link = new PDO("mysql:host=localhost;dbname=speakcof_jhoan","speakcof_adsi1834948","Adsi1834948");
				$link ->exec("set names utf8");
				return $link;
			}
		}

 ?>