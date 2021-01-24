<?php
session_start();

// $token_ws=$_POST['token_ws'];
// /* Aca se comprueba en la BD de que se haya insertado el token */

include 'conexion/conexion.php';


$token = $_GET['token'];
$digitos = $_GET['digitos'];
$autorizacion = $_GET['autorizacion'];
$numberCuotas = $_GET['cuotas'];

$consulta = "SELECT sessionId , status , amount , transaction_id from orders_web where sessionId='$token' and status=0";

$ejecutar = mysqli_query($conexion, $consulta);
/* Preguntamos si existe el token en Base de datos y response Code en BD */
$resultado = mysqli_num_rows($ejecutar);


// Datos de la Transaccion 

$dataTransaction = mysqli_fetch_array($ejecutar);

if ($resultado > 0) {
  // echo "Aprobada"; 
?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#1AC0EB">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Comprobante</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" type="text/css" href="css/materialize.css">
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Viga" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/estilos.css">
    <script src="js/sidenav.js"></script>
  </head>

  <body>
    <?php include 'sidenav.php'; ?>
    <center>
      <h1 style="  font-family:  'Montserrat', sans-serif;font-size: 25px;">Transacción Aprobada</h1>
    </center>




    <center>
      <div class="container">
        <div class="row">
          <div class="col s12 m12">
            <div class="card blue-grey darken-1">
              <div class="card-content white-text" style="background-color:#1AC0EB;">
                <span class="card-title">Detalles de la Transacción</span>
                <center><img src="img/icon_check.png" alt="" height="42" width="42"> </center>
                <table class="highlight">
                  <thead>
                    <tr>

                    </tr>
                  </thead>

                  <tbody style="color: yellow;font-family:  'Montserrat', sans-serif;">
                    <tr>
                      <td>Fecha : </td>
                      <td> <?php echo date("d/m/y"); ?></td>
                    </tr>
                    <tr>
                      <td>Monto : </td>
                      <td>$<?php echo $dataTransaction['amount']; ?></td>
                    </tr>
                    <tr>
                      <td>Orden de Compra : </td>
                      <td><?php echo $dataTransaction['transaction_id']; ?></td>
                    </tr>
                    <tr>
                      <td>N° de cuotas : </td>
                      <td><?php echo $numberCuotas; ?></td>
                    </tr>
                    <tr>
                      <td>Últimos 4 Digitos de la Tarjeta :</td>
                      <td><?php echo $digitos; ?></td>
                    </tr>
                    <tr>
                      <td>Código Autorizacion : </td>
                      <td><?php echo $autorizacion; ?></td>
                    </tr>
                    <tr>

                    </tr>
                  </tbody>
                </table>
                <center><a style="margin-top:10;" href="elegir_ubicacion.php" class="waves-effect waves-light btn">Aceptar</a></center>
              </div>

            </div>
          </div>
        </div>
      </div>
    </center>
  </body>

  </html>
<?php }
/* Comprobante Transaccion rechazada */ else {
  // echo "Rechazada"; 
?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#1AC0EB">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Comprobante</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" type="text/css" href="css/materialize.css">
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Viga" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/estilos.css">
    <script src="js/sidenav.js"></script>
  </head>

  <body>
    <?php include 'sidenav.php'; ?>
    <center>
      <h1 style="  font-family:  'Montserrat', sans-serif;font-size: 25px;">Transacción Rechazada</h1>
    </center>


    <center>

      <div class="container">
        <div class="row">
          <div class="col s12 m12">
            <div class="card blue-grey darken-1">
              <div class="card-content white-text" style="background-color:#1AC0EB;">
                <span class="card-title">Detalles de la Transacción</span>
                <center><img src="img/icon_error.png" alt="" height="42" width="42"> </center>
                <p>Las posibles causas de este rechazo son:</p>
                <ul class="collection" style="color:black;">
                  <li class="collection-item">Error en el ingreso de los datos de su tarjeta de Crédito o Débito (fecha y/o código de seguridad).</li>
                  <li class="collection-item">Su tarjeta de Crédito o Débito no cuenta con saldo suficiente.</li>
                  <li class="collection-item">Tarjeta aún no habilitada en el sistema financiero.</li>
                  <li class="collection-item">Si el problema persiste favor comunicarse con su Banco emisor.</li>
                </ul>
                <table class="highlight">
                  <thead>
                    <tr>

                    </tr>
                  </thead>

                  <tbody style="color: yellow;font-family:  'Montserrat', sans-serif;">
                    <tr>
                      <td>Fecha : </td>
                      <td> <?php echo date("d/m/y"); ?></td>
                    </tr>
                    <tr>
                      <td>Monto : </td>
                      <td>$<?php echo $dataTransaction['amount']; ?></td>
                    </tr>
                    <tr>
                      <td>Orden de Compra : </td>
                      <td><?php echo $dataTransaction['transaction_id']; ?></td>
                    </tr>
                    <tr>
                      <td>N° de cuotas : </td>
                      <td><?php echo $numberCuotas;  ?></td>
                    </tr>
                    <tr>
                      <td>Código Autorizacion : </td>
                      <td><?php echo $autorizacion; ?></td>
                    </tr>
                    <tr>

                    </tr>
                  </tbody>
                </table>
                <center><a style="margin-top:10;" href="elegir_ubicacion.php" class="waves-effect waves-light btn">Aceptar</a></center>
              </div>

            </div>
          </div>
        </div>
      </div>
    </center>
  </body>

  </html>

<?php } ?>