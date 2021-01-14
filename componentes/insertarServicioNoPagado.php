<?php

/* INSERTAR SERVICIO COMO NO PAGADO Y REDIRIGIR AL MEDIO DE PAGO */
session_start();

require_once '../vendor/autoload.php';
// El SDK apunta por defecto al ambiente de pruebas, no es necesario configurar lo siguiente

Transbank\Webpay\WebpayPlus::setCommerceCode('597055555532');
Transbank\Webpay\WebpayPlus::setApiKey('579B532A7440BB0C9079DED94D31EA1615BACEB56610332264630D42D0A36B1C');
Transbank\Webpay\WebpayPlus::setIntegrationType('TEST');




use Transbank\Webpay\WebpayPlus\Transaction;



include '../conexion/conexion.php';
$usuario_id = 1;
$fecha = date("Y-m-d G:i:s");
$nombre_cliente = "Nicolas";
$apellido = "Cisterna";
$email_cliente = "nicolas@gmail.com";

$latitud = "32423424234";
$longitud = "32423424234";
$direccion =  "TEST_DIRECCION";
$observacion =  "TEST_OBSERVACION";
$id_auto = 1;
$horario_seleccionado = 1;
$fecha_agendado = "10";
$monto_compra = "11111";
$auto_tamano = "1";
$horario_agenda =  "1";
$zona_id = 1;
$objetoValor = 1;
$total_compra = 1000;
$washerId = 1;

/*---------------------------- MODIFICAR CÓDIGO DE DESCUENTO Y RESTARLO DE LA BD ------------------------------*/

include 'aplicar_codigo.php';
$codigoxcliente = $_SESSION['codigo_id'];


try {

    // Se inserta Servicio 

    $consulta_servicio = "INSERT INTO `servicio` (`id`, `servicio_estatus_id`, `tipo_pago_id`, `cliente_id`, `washer_id`, `latitud`, `longitud`, `direccion`, 
    `t_solicitado`,  `pagado`, `codigo_id`, `monto_pagado`, `informacion_adicional`, 
    `tipo_solicitud`, `fecha_agendado`, `orden` , `objetos`)
    VALUES (NULL, '0', '2', '$usuario_id', $washerId ', '$latitud', '$longitud', '$direccion',  '$fecha','0', '$codigoxcliente', '$total_compra', '$observacion', 'web', '$fecha_agendado', '1' , '$objetoValor');";


    $resultadoInsertarServicio = mysqli_query($conexion, $consulta_servicio);



    // Ultima ID
    $numero = $conexion->insert_id;
    $_SESSION['numeroServicio'] =  $numero;

    $consulta = ("INSERT INTO `orders_web` (`id`, `created_at`, `updated_at`, `userId`, `email`, `nombre`, `apellido`, `amount`, `sessionId`, `status`, `zone_id`, `transaction_id`, `transaction_type_id`, `dispositivo`) 
    VALUES (NULL, '$fecha', '$fecha', '$usuario_id', '$email_cliente', '$nombre_cliente', '$apellido', '$total_compra ', '1', '-1', '1', '$numero', '1', NULL)");
    mysqli_query($conexion, $consulta);

    // // $_SESSION['codigo_id'] = 0;



    // Insertar Horario de Servicio
    $insertar_horario_servicio = "INSERT INTO `serdvicioxhorario_agenda` (`id`, `servicio_id`, `washerxhorario_washer_id`, `washerxhorario_horario_agenda_id`)
     VALUES (NULL, '$numero', '$washerId', '$horario_agenda');";
    $ejecutar_horario_servicio = mysqli_query($conexion, $insertar_horario_servicio);



    $tipo_servicio = array(1,2,3);
    foreach ($tipo_servicio as $serv) {

        $consulta_insertar = "INSERT INTO `costosxservicio` (`id`, `servicio_id`, `costo_pais_id`, `costo_zona_id`, `costo_auto_tamano_id`, `costo_producto_id`, `autoxcliente_id`, 
                `precio_compra`, `precio_material_compra`) 
                VALUES ('', '$numero', '1', '$zona_id', '$auto_tamano', '$serv', '$id_auto', '10', '20');";
        mysqli_query($conexion, $consulta_insertar);
    }


    /* Redirigir al Sistema de Pago */


    // $mensaje.= "<script>window.location = 'pagar.php';</script>";
    $return_url = 'http://localhost/webplay-rest/return.php';
    $amount = $total_compra;
    $session_id = 19929873;
    $buy_order = 8812871;
    $response = Transaction::create($buy_order, $session_id, $amount, $return_url);
?>

    <form method="post" action="<?php echo $response->url; ?>">
        <input name="token_ws" value="<?php echo $response->token; ?>" />
        <button type="submit">pagar</button>
    </form>

<?php


} catch (Exception $e) {
    echo 'Excepción capturada: ',  $e->getMessage(), "\n";
    echo "Error al realizar transacción, intente mas tarde.";
}

