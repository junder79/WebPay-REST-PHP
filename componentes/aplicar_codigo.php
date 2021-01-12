<?php 
// include 'conexion.php';
$usuario_id=1;
$codigo_descuento_id=$_SESSION['codigo_id'];
$fecha_actual=date('Y-m-d H:i:s');
if ($codigo_descuento_id!==0)
{	


	// Descontando Aumentar en BD 

	$consulta_aumento_cant_uso="UPDATE codigo set  usos=usos+1 where id = '$codigo_descuento_id' ";
	mysqli_query($conexion , $consulta_aumento_cant_uso);
	


	$query="INSERT INTO `codigoxcliente` (`cliente_id`, `codigo_id`, `usos`, `fecha_registro`) VALUES ('$usuario_id', '$codigo_descuento_id', '1', '$fecha_actual');";

	/* Ejecutar la Aplicación del código */

	$ejecutar=mysqli_query($conexion ,  $query);


	
	/* Obtener la ID del Codigo Insertado , en la Tabla CODIGOXCLIENTE*/

	$consulta_id_codigo_x_cliente="SELECT max(codigoxcliente_id) as 'codigoxcliente_id' from codigoxcliente";
	$ejecutar_id_codigo_x_cliente=mysqli_query($conexion , $consulta_id_codigo_x_cliente);
	$resultado_codigo_x_cliente=mysqli_fetch_array($ejecutar_id_codigo_x_cliente);
	
	$codigoxcliente_id=$_SESSION['codigo_x_cliente']=$resultado_codigo_x_cliente['codigoxcliente_id'];
	
	$_SESSION['codigo_x_cliente'];
	$codigoxcliente_id=$_SESSION['codigo_id'];


	
}
else 
{
	 // No es Hace nada  
	 $codigoxcliente_id=$_SESSION['codigo_id']=0;
}

?>