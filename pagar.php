<?php
require_once 'vendor/autoload.php';
// El SDK apunta por defecto al ambiente de pruebas, no es necesario configurar lo siguiente
// El SDK apunta por defecto al ambiente de pruebas, no es necesario configurar lo siguiente
Transbank\Webpay\WebpayPlus::setCommerceCode('597055555532');
Transbank\Webpay\WebpayPlus::setApiKey('579B532A7440BB0C9079DED94D31EA1615BACEB56610332264630D42D0A36B1C');
Transbank\Webpay\WebpayPlus::setIntegrationType('TEST');


use Transbank\Webpay\WebpayPlus\Transaction;

$return_url = 'http://localhost/webplay-rest/return.php';
$amount = 10000;
$session_id = 19929873;
$buy_order = 8812871;
$response = Transaction::create($buy_order, $session_id, $amount, $return_url);

?>

<form method="post" action="<?php echo $response->url; ?>">
  <input name="token_ws" value="<?php echo $response->token; ?>" />
  <button type="submit">pagar</button>
</form>