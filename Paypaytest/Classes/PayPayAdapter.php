<?php

namespace Paypaytest\Classes;

use PayPay\OpenPaymentAPI\Client;
use PayPay\OpenPaymentAPI\Models\CreateQrCodePayload;
// use PayPay\OpenPaymentAPI\Controller\String;

class PayPayAdapter
{
    private Config $config;

    /**
     * PayPayAdapter constructor.
     * @param Config $config
     */
    public function __construct(Config $config)
    {
        $this->config = $config;
    }

    /**
     * @param OrderItems $orderItems
     * @param string     $paymentId
     * @return mixed
     * @throws \Exception
     */
    public function createCode(OrderItems $orderItems, string $paymentId)
    {
        $client = new Client([
            'API_KEY'     => $this->config->apiKey(),
            'API_SECRET'  => $this->config->apiSecret(),
            'MERCHANT_ID' => $this->config->merchantId(),
        ], $this->config->isProduction());

        $payload = new CreateQrCodePayload();
        $payload->setMerchantPaymentId($paymentId);

        $payload->setRequestedAt();
        $payload->setCodeType("ORDER_QR");

        $payload->setOrderItems($orderItems->items());
        $payload->setAmount(['amount' => $orderItems->total(), 'currency' => 'JPY']);
        
        $payload->setRedirectType('WEB_LINK');
        $payload->setIsAuthorization($this->config->isAuthorization());
        $payload->setRedirectUrl($this->config->redirectUrl());

        return $client->code->createQRCode($payload);
    }

    public function deleteCode(string $codeId)
    {
        $client = new Client([
            'API_KEY'     => $this->config->apiKey(),
            'API_SECRET'  => $this->config->apiSecret(),
            'MERCHANT_ID' => $this->config->merchantId(),
        ], $this->config->isProduction());

        return $client->code->deleteQRCode($codeId);
    }
}