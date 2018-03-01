<?php 
class BD{
	public static function conection(){
		return new PDO('mysql:host=localhost; dbname=admin', 'root', '', array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''));
	}
}
?>