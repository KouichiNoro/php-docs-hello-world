<?php

require_once './vendor/autoload.php';

require_once './paypaytest/classes/OrderItems.php';
require_once './paypaytest/classes/Config.php';
require_once './paypaytest/classes/PayPayAdapter.php';
require_once './paypaytest/classes/PayPayAdapter2.php';


$config = new \Paypaytest\Classes\Config([
    'merchantId'      => '737466058778624000',
    'apiKey'          => 'a_FA9nHR6ChK_OpaD',
    'apiSecret'       => 'nSr6RRfvJ2LWWrg8hQBbKvJ5hL2xEOMuyufC2rIzf2k=',
    'redirectUrl'     => 'https://localhost/paypay3/response.php',
    'isAuthorization' => false,
    'production'      => false,
]);

$paypay2 = new \Paypaytest\Classes\PayPayAdapter2($config);
$result = $paypay2->userAuth();
var_dump($result);die();

