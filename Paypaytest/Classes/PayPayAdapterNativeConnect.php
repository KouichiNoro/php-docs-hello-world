<?php

namespace Paypaytest\Classes;

use PayPay\OpenPaymentAPI\Client;
use PayPay\OpenPaymentAPI\Models\AccountLinkPayload;


class PayPayAdapterNativeConnect
{
    private Config $config;

    public function __construct(Config $config)
    {
        $this->config = $config;
    }

    public function createCode()
    {
        $client = new Client([
            'API_KEY'     => $this->config->apiKey(),
            'API_SECRET'  => $this->config->apiSecret(),
            'MERCHANT_ID' => $this->config->merchantId(),
        ], $this->config->isProduction());


        $payload = new AccountLinkPayload();
        $payload->setScopes(["direct_debit"]);
        $payload->setRedirectUrl($this->config->redirectUrl());
        $payload->setReferenceId(uniqid("TEST123"));

        $resp = $client->user->createAccountLinkQrCode($payload);

        // $response =  $client->user->getUserAuthorizationStatus('userAuthorizationId');

        return $resp;

    }
}