<?php

session_start();
// if (empty($_SESSION['active'])) {
// 	header('location:login.php');
// } else {
// 	// exit;
// }
include 'conexion/conexion.php';
$latitud = $_SESSION['latitud'];
$longitud  = $_SESSION['longitud'];

$servicios = $_SESSION['idServicios'];

include 'modalPago.php';
$_SESSION['codigo_id'] = 0;
?>
<!DOCTYPE html>
<html>

<head>
	<title>Resumen Pedido</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="theme-color" content="#1AC0EB">
	<link rel="icon" type="image/x-icon" href="https://is3-ssl.mzstatic.com/image/thumb/Purple113/v4/a3/b3/12/a3b31225-c29a-51e2-d985-30055dc41ece/source/512x512bb.jpg">
	<script src="js/jquery.js"></script>
	<script src="js/numscroller-1.0.js"></script>
	<script type="text/javascript" src="js/iziToast.js"></script>
	<!-- Compiled and minified CSS -->
	<link rel="stylesheet" type="text/css" href="css/materialize.css">
	<!-- Compiled and minified JavaScript -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Viga" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
	<link rel="stylesheet" type="text/css" href="css/iziToast.css">
	<link rel="stylesheet" href="css/animate.min.css">
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
</head>

<body>
	<?php include 'sidenav.php';  ?>
	<div class="container">

		<center>
			<h1 class="titulo-resumen-pedido white-black animated fadeInDown faster">Confirmar Pago</h1>
		</center>
		<div class="row">
			<div class="col  s12 m12">
				<div class="card" style="background-color:#5DBCD2;">
					<div class="card-content white-text">
						<span class="card-title yellow-text "><?php echo  $_SESSION['nombres']; ?> </span>
						<span class="card-title white-text ">Observacion: <?php echo  $_SESSION['observacion']; ?> </span>
					</div>
					<div class="card-content " style="background-color:#F7F7F7">
						<table class="fuente-tabla-resumen-pedido">
							<thead>

							</thead>

							<tbody>
								<tr>

									<td class="color-texto-tabla">
										<?php include 'componentes/obtenerModelo.php'; ?>
									</td>
									<td></td>
									<td style="float: right;">
										<span class="color-texto-tabla" style="font-size:20px;">Servicio:</span> <br>
										<?php

										$tamano_v = $_SESSION['tamano_auto'];
										$suma_total = 0;
										foreach ($servicios as $row => $value) {

											$idServicio = $servicios[$row];
											$consulta_servicio = "SELECT c.producto_id , p.nombre , c.monto  FROM costo c 
											join producto p 
											on p.id = c.producto_id 
											where p.id =$idServicio and c.auto_tamano_id = $tamano_v";
											$ejecutar =  mysqli_query($conexion, $consulta_servicio);
											$datos = mysqli_fetch_array($ejecutar);


											$mensaje = "<span style='color:#5DBCD2'>" . $datos['nombre'] . " $" . $datos['monto'] . "</span><br>";
											$producto_id_array[] = $datos['producto_id'];
											$descripcion_producto_array[]=$datos['nombre'];  
											$_SESSION['array_servicio'] = $producto_id_array;
											$_SESSION['servicio_correo']=$descripcion_producto_array;
											$suma_total += $datos['monto'];
											echo $mensaje;
										}
										$_SESSION['total_compra'] = $suma_total;

										?><br>

								</tr>

								<tr>
									<td class="color-texto-tabla">Dirección</td>
									<td></td>
									<td style="float: right;" class="color-texto-tabla"><?php echo $_SESSION['direccion_elegida']; ?></td>
								</tr>
								<tr>
									<td class="color-texto-tabla">Observación</td>
									<td></td>
									<td style="float: right;" class="color-texto-tabla"><?php echo $_SESSION['observacion']; ?></td>
								</tr>
								<tr>
									<td class="color-texto-tabla">Fecha Agendada</td>
									<td></td>
									<td style="float: right;" class="color-texto-tabla"><?php echo $_SESSION['dia_seleccionado'] . " - de " . $_SESSION['hora_inicio'] . " a " . $_SESSION['hora_fin']; ?></td>
								</tr>
								<tr>
									<td class="color-texto-tabla">Objetos de Valor </td>
									<td></td>
									<td style="float: right;" class="color-texto-tabla"><?php if($_SESSION['objetoValor'] == "") { echo "Ninguno" ; } else {echo $_SESSION['objetoValor']; }  ?></td>
								</tr>
								<tr>
									<td class="color-texto-tabla">TOTAL</td>
									<td></td>
									<td style="float: right;"><span class="color-texto-tabla" style="font-weight:bold; font-size: 30px;">$</span><span class='numscroller color-texto-tabla' style="font-weight:bold; font-size: 30px;" id="valor_sin_descuento" data-min='1' data-max='<?php echo $suma_total ?>' data-delay='5' data-increment='10000'></span></td>

								</tr>
								<tr>
									<td class="color-texto-tabla">Código de Descuento</td>
									<td></td>
									<td>
										<div id="mensaje_codigo"></div>
										<form class="col s12">
											<div class="row">
												<div class="input-field col s12">
													<i class="material-icons prefix">loyalty</i>
													<input name="codigo_descuento" id="txt_codigo" class="materialize-textarea"></input>
													<input type="text" hidden="" id="valor_descuento" name="">
													<button type="button" class="waves-effect waves-light btn" id="btn-aplicar"><span style="margin-right:10px;vertical-align: middle">Aplicar</span>
														<div id="preloader" style="display:none;vertical-align: middle;height:20px;
															width:20px;" class="preloader-wrapper small active">
															<div class="spinner-layer spinner-red-only">
																<div class="circle-clipper left">
																	<div class="circle"></div>
																</div>
																<div class="gap-patch">
																	<div class="circle"></div>
																</div>
																<div class="circle-clipper right">
																	<div class="circle"></div>
																</div>
															</div>
														</div>
													</button>
													<!-- <a  class="waves-effect waves-light btn">Aplicar </a> -->
												</div>
											</div>
										</form>


									</td>
								</tr>

							</tbody>
						</table>
					</div>
				</div>

			</div>
		</div>

		<div id="pago_tarjeta">
			<center><span class="titulo-mediopago">Medio de Pago</span></center>
			<center><i style="font-size: 40px;" class="far fa-money-bill-alt"></i></center>
			<div class="row">
				<div class="col s12 m4">
					<center><img src="img/webpay.png" width="120" height="60" alt="" srcset=""></center>
				</div>
				<div class="col s12 m4">
					<div style="margin-top:25px; text-align: center;">
						<span class="mediopago">Tarjeta de crédito WebPay / Tarjeta de débito RedCompra</span>
					</div>
				</div>

			</div>
			<center>
					<center>
					<a class="yellow btn-large white-text waves-effect waves-light btn modal-trigger" style="font-weight:bold;"  id="btnPagarModal" href="#pagarModal">Pagar</a>
					</center>
			</center>
		</div>
		<div style="display: none" id="pago_valor_cero">
			<div id="mensaje"></div>
			<center>


				<form id="servicio_valor_cero">
					<input type="" hidden="" id="valor_final_final" value="" name="">
					<a id="btn-servicio" class="waves-effect waves-light btn animated  tada delay-4s "><i class="material-icons left">local_car_wash</i>Agendar</a>
				</form>

			</center>
		</div>
	</div>
	<script type="text/javascript">
		$(document).ready(function() {
			$('.sidenav').sidenav();
			$('.modal').modal();


		});
		$('#btn-aplicar').click(function() {
			/* Funcion para validar codigo de descuento */
			var codigo = $('#txt_codigo').val();
			// console.log(codigo);
			$.ajax({
				type: "POST",
				url: "componentes/validarcodigo.php",
				data: {
					'codigo_descuento': codigo
				},
				beforeSend: function() {
					$("#preloader").css({
						"display": ""
					});
				},
				success: function(data) {
					$("#preloader").css({
						"display": "none"
					});
					// $("#mensaje_codigo").html(data);
					console.log(JSON.stringify(data));
					/* Condicion de respuesta JSON */
					console.log(data.codigo_id);
					/* Si el estado OK , significa de que el codigo ingresado existe en la BD y es apto para el uso */
					if (data.estado === "OK") {
						/* Si el descuento es 0 , entonces existe un multiplicador , el monto se obtiene multiplicando el valor por el monto */
						if (data.descuento == 0) {
							
							M.toast({
								html: 'Descuento Aplicado'
							});
							var x = $('#valor_descuento').val(data.valor);
							var valor_sin_descuento = $('#valor_sin_descuento').text();
							
							var valor_final = Math.round(valor_sin_descuento * data.valor);
							$("#valor_sin_descuento").text(valor_final);
							$("#valor_final_final").val(valor_final);
							$('#txt_codigo').attr("disabled", true);
							$('#btn-aplicar').attr("disabled", true);
						} else {
							/* Acá el descuento tiene un valor por ende se resta */
							console.log("Hay valor en el descuento");
							M.toast({
								html: 'Descuento Aplicado'
							});
							var valor_sin_descuento = $('#valor_sin_descuento').text();
							var valor_final = Math.round(valor_sin_descuento - data.descuento);


							if (valor_final < 0 || valor_final == 0) {
								/* Si el valor final da resultante como 0 (resultado que da la resta) , el valor es 0 , se cambiaria el div y se dejaria
								el boton para agendar */
								
								$("#valor_sin_descuento").text(0);
								$("#valor_final_final").val(0);
								$('#txt_codigo').attr("disabled", true);
								$('#btn-aplicar').attr("disabled", true);

								$("#pago_tarjeta").fadeOut(1000);
								// $('#pago_tarjeta').css({ display: "none" });
								// $('#pago_valor_cero').css({ display: "block" });
								$('#pago_valor_cero').fadeIn(3000);
							} else {
								$("#valor_sin_descuento").text(valor_final);
								$("#valor_final_final").val(valor_final);
								$('#txt_codigo').attr("disabled", true);
								$('#btn-aplicar').attr("disabled", true);
							}

						}
					} else {
						M.toast({
							html: 'Descuento No Aplicado'
						});
					}
				}
			});
		});
	</script>
		<script type="text/javascript">
		$('#btnPagarModal').click(function() {
			
			$.ajax({
				type: "POST",
				url: "componentes/insertarServicioNoPagado.php",
				success: function(r) {
				
					$('#mensajePagarServicio').html(r);
				}
			})
		});
	</script>
	<script type="text/javascript">
		$('#btn-servicio').click(function() {
			$.ajax({
				type: "POST",
				url: "componentes/agendar_servicio_sin_valor.php",
				success: function(r) {
					$("#mensaje").html(r); // Mostrar la respuestas del script PHP.
				}
			})
		});
	</script>
	<script type="text/javascript">
		$('#validate_pagar').click(function() {

			if ($('input[name="group1"]').is(':checked')) {
				document.pagar_formulario.submit();

			} else {
				iziToast.warning({
					title: 'Porfavor',
					message: 'Seleccione el método de pago.',
				});
			}
		});
	</script>
</body>

</html>