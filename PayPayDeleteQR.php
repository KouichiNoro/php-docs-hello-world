<?php

require_once './vendor/autoload.php';

require_once './paypaytest/classes/OrderItems.php';
require_once './paypaytest/classes/Config.php';
require_once './paypaytest/classes/PayPayAdapter.php';


$config = new \Paypaytest\Classes\Config([
    'merchantId'      => '737466058778624000',
    'apiKey'          => 'a_FA9nHR6ChK_OpaD',
    'apiSecret'       => 'nSr6RRfvJ2LWWrg8hQBbKvJ5hL2xEOMuyufC2rIzf2k=',
    'redirectUrl'     => 'paypaytest://paypaytest.com/homePage',
    'isAuthorization' => false,
    'production'      => false,
]);

$codeId = $_GET["codeId"];
$paypay = new \Paypaytest\Classes\PayPayAdapter($config);
$result = $paypay->deleteCode($codeId);


var_dump($result);die();
