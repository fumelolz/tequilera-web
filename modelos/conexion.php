<?php 

class Conexion {

	static public function conectar(){
		$link = new PDO("mysql:host=35.235.119.220;dbname=tequilera_web","magadan","magadan");
		$link->exec("set names utf8");
		return $link;
	}

}