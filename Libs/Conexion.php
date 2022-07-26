<?php
	class Conexion {
		public function get_conexion(){
			$user = "id19291509_serrano";
			$pass = "{^Avr2vv\)Lo/Fc4";
			$host = "localhost";
			$db = "id19291509_admin";

			/*$user = "root";
			$pass = "";
			$host = "localhost";
			$db = "admin";*/

			try {
				$connection = new PDO("mysql:host=$host; dbname=$db", $user, $pass);
				$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            	$connection->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
				
			} catch (Exception $e) {
				print_r($e);
			}
			return $connection;
		}
	}
?>