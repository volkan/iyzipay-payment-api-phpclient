<?php

require_once __DIR__ . '/../IyzipayBootstrap.php';

IyzipayBootstrap::init();

# create client configuration class
$configuration = new \Iyzipay\Client\Configuration\ClientConfiguration();
$configuration->setApiKey("api key");
$configuration->setSecretKey("secret key");
$configuration->setBaseUrl("https://api.iyzipay.com");

# create client class
$client = \Iyzipay\Client\Service\EcomCheckoutFormServiceClient::fromConfiguration($configuration);

# create request class
$request = new \Iyzipay\Client\Ecom\Payment\Request\EcomRetrievePaymentCheckoutFormAuthRequest();
$request->setLocale(\Iyzipay\Client\RequestLocaleType::TR);
$request->setConversationId("123456789");
$request->setToken("371bfbaa-95d8-49ac-ad61-a634c56b5545");

# make request
$response = $client->getAuthResponse($request);

# print response
print_r($response);