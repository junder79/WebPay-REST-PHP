<?php

//Conexion a la base de datos 
$host="localhost";
$user="root";
$password="";
$database="lavameapp_2";

$conexion =mysqli_connect($host , $user , $password , $database);

mysqli_set_charset($conexion,"utf8");
//Comprobar que la conexion sea correcta

if(mysqli_connect_errno()) 
{
	die('Error de conexión: ' . mysqli_connect_error());
}
else 
{
	
}

// Consulta para configurar la codificacion de caracteres 
mysqli_query($conexion,"SET NAMES 'utf-8'");



?>