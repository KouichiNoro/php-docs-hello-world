<?php

require_once './vendor/autoload.php';

require_once './paypaytest/classes/OrderItems.php';
require_once './paypaytest/classes/Config.php';
require_once './paypaytest/classes/PayPayAdapter.php';

$orderItems = new \Paypaytest\Classes\OrderItems();
// $orderItems->add('商品A', 1, 500);
// $orderItems->add('商品B', 3, 1000);
// $orderItems->add('商品C', 2, 900);
$orderItems->add('商品B', 1, 1000);

$config = new \Paypaytest\Classes\Config([
    'merchantId'      => '737466058778624000',
    'apiKey'          => 'a_FA9nHR6ChK_OpaD',
    'apiSecret'       => 'nSr6RRfvJ2LWWrg8hQBbKvJ5hL2xEOMuyufC2rIzf2k=',
    'redirectUrl'     => 'https://localhost/paypay3/response.php',
    'isAuthorization' => false,
    'production'      => false,
]);

$paypay = new \Paypaytest\Classes\PayPayAdapter($config);
$result = $paypay->createCode($orderItems, '商品B x 1');

$url = $result['data']['url'];
print "redirect-url: <a href='$url'>$url</a> </br>\n";

print "<a href=\"javascript: window.open('$url', '_blank');\">Click</a> </br>\n";


var_dump($result);die();
