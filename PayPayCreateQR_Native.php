<?php

require_once './vendor/autoload.php';

require_once './paypaytest/classes/OrderItems.php';
require_once './paypaytest/classes/Config.php';
require_once './paypaytest/classes/PayPayAdapterNativeConnect.php';


$orderItems = new \Paypaytest\Classes\OrderItems();
$orderItems->add('商品B(Native)', 2, 1000);

$config = new \Paypaytest\Classes\Config([
    'merchantId'      => '737466058778624000',
    'apiKey'          => 'a_FA9nHR6ChK_OpaD',
    'apiSecret'       => 'nSr6RRfvJ2LWWrg8hQBbKvJ5hL2xEOMuyufC2rIzf2k=',
    'redirectUrl'     => 'paypaytest02api://paypaytest02api.com/homePage',
    'isAuthorization' => false,
    'production'      => false,
]);

$paypay = new \Paypaytest\Classes\PayPayAdapterNativeConnect($config);
$result = $paypay->createCode($orderItems, '商品B x 1');

var_dump($result['resultInfo']['code']);

// $url = $result['data']['url'];
// $codeId = $result['data']['codeId'];

// $returnJSON = [
//     'paypayURL' => $url,
//     'QRCodeID' => $codeId,
//     'redirectURL' => 'paypaytest02api://paypaytest02api.com/homePage'
// ];

// header("Access-Control-Allow-Origin: *");

// echo json_encode($returnJSON);
