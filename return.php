<?php
session_start();
require_once 'vendor/autoload.php';
include 'conexion/conexion.php';
// El SDK apunta por defecto al ambiente de pruebas, no es necesario configurar lo siguiente
// El SDK apunta por defecto al ambiente de pruebas, no es necesario configurar lo siguiente
Transbank\Webpay\WebpayPlus::setCommerceCode('597055555532');
Transbank\Webpay\WebpayPlus::setApiKey('579B532A7440BB0C9079DED94D31EA1615BACEB56610332264630D42D0A36B1C');
Transbank\Webpay\WebpayPlus::setIntegrationType('TEST');


use Transbank\Webpay\WebpayPlus\Transaction;


$token = $_POST['token_ws'];

try {

    $response = Transaction::commit($token);
    $response->getVci();
    $monto = $response->getAmount();
    $response->getStatus();
    $orden_compra = $response->getBuyOrder();
    $response->getSessionId();
    $response->getAccountingDate();
    $response->getTransactionDate();
    $codigoAutorizacion = $response->getAuthorizationCode();
    $response->getPaymentTypeCode();
    $response_code = $response->getResponseCode();
    $response->getInstallmentsAmount();
    $cuatroDigitos =  $response->getCardDetail();
    $response->getBalance();
    $cuatroDigitos = $cuatroDigitos['card_number'];
    $numeroCuotas = $response->getInstallmentsNumber();

    //Obtener datos del cliente

    $getDataCliente =  "SELECT ow.sessionId, s.cliente_id , c.nombres , c.apellido_paterno , c.email,s.latitud, s.longitud, s.direccion, s.informacion_adicional as 'observacion' ,s.monto_pagado from orders_web ow
    join servicio s 
    on s.id = ow.transaction_id 
    join cliente c 
    on c.id = s.cliente_id
    where ow.sessionId = $token";

    $dataCliente = mysqli_query($conexion, $getDataCliente);
    $dataCliente = mysqli_fetch_array($dataCliente);




    if ($response_code ==  0) {
        /* ACTUALIZAR ESTADOS DEL SERVICIO */

        $updateOrderWeb = "UPDATE orders_web SET sessionId = '$token', status='0' where  transaction_id = '$orden_compra'";
        $resultadoUpdate = mysqli_query($conexion, $updateOrderWeb);


        $consulta_get_agenda = "SELECT washerxhorario_horario_agenda_id, washerxhorario_washer_id FROM servicioxhorario_agenda WHERE servicio_id = " . $orden_compra;
        $consulta_get_agenda = mysqli_query($conexion, $consulta_get_agenda);
        $idAgenda = mysqli_fetch_array($consulta_get_agenda);
        $idWasher = $idAgenda['washerxhorario_washer_id'];
        $idAgenda = $idAgenda['washerxhorario_horario_agenda_id'];

        $update_horario_status = "UPDATE washerxhorario set ocupado = 1 , disponible = 0  WHERE washer_id = '$idWasher' AND horario_agenda_id = '$idAgenda' ";
        $ejecutar_update_horario_servicio = mysqli_query($conexion, $update_horario_status);


        /* Actualizar el estado del servicio a PAGADO */
        $updateServicio = "UPDATE servicio SET servicio_estatus_id = 10,pagado = 1 where id = '$orden_compra'  ";
        mysqli_query($conexion, $updateServicio);
        include('correo_comprobante.php');


        header("Location:http://localhost/webplay-rest/finish.php/?token=$token&digitos=$cuatroDigitos&autorizacion=$codigoAutorizacion&cuotas=$numeroCuotas");
        echo "Transaccion Realizada con exito";
    } else {
        $updateOrderWeb = "UPDATE orders_web SET sessionId = '$token', status='-1' where  transaction_id = '$orden_compra'";

        $resultadoUpdate = mysqli_query($conexion, $updateOrderWeb);


        /* Actualizar el estado del servicio a PAGADO */

        $updateServicio = "UPDATE servicio SET servicio_estatus_id = 8,pagado = 0 where id = '$orden_compra'  ";

        mysqli_query($conexion, $updateServicio);





        $_SESSION['codigo_id'] = 0;
        header("Location:http://localhost/webplay-rest/finish.php/?token=$token&digitos=$cuatroDigitos&autorizacion=$codigoAutorizacion&cuotas=$numeroCuotas");
        echo "Error al realizar transaccion";
    }
} catch (Exception $e) {
    // echo 'Excepción capturada: ',  $e->getMessage(), "\n";
    // header("Location:http://localhost/webplay-rest/finish.php/?token=$token");
    // $updateOrderWeb = "UPDATE orders_web SET sessionId = '$token', status='-1' where  transaction_id = '$orden_compra'";

    // $resultadoUpdate = mysqli_query($conexion, $updateOrderWeb);


    // /* Actualizar el estado del servicio a PAGADO */

    // $updateServicio = "UPDATE servicio SET servicio_estatus_id = 8,pagado = 0 where id = '$orden_compra'  ";

    // mysqli_query($conexion, $updateServicio);
    echo "Error al realizar transaccion";




    // $_SESSION['codigo_id'] = 0;
}
