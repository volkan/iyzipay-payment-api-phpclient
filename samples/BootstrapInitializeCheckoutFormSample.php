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
$request = new \Iyzipay\Client\Ecom\Payment\Request\EcomPaymentCheckoutFormInitializeRequest();
$request->setLocale(\Iyzipay\Client\RequestLocaleType::TR);
$request->setConversationId("123456789");
$request->setPrice("1");
$request->setPaidPrice("1.2");
$request->setBasketId("B67832");
$request->setPaymentGroup(\Iyzipay\Client\Ecom\Payment\Enumtype\PaymentGroupRequestType::PRODUCT);
$request->setCallbackUrl("http://localhost/iyzipay/samples/callback.php");

# create payment buyer dto
$buyer = new \Iyzipay\Client\Ecom\Payment\Dto\EcomPaymentBuyerDto();
$buyer->setId("BY789");
$buyer->setName("Sabri Onur");
$buyer->setSurname("Tüzün");
$buyer->setGsmNumber("+905350000000");
$buyer->setEmail("onur.tuzun@iyzico.com");
$buyer->setIdentityNumber("74300864791");
$buyer->setLastLoginDate("2015-10-05 12:43:35");
$buyer->setRegistrationDate("2013-04-21 15:12:09");
$buyer->setRegistrationAddress("Nidakule Göztepe İş Merkezi Merdivenköy Mah. Bora Sok. No:1 Kat:19 Bağımsız 70/73 Göztepe Kadıköy");
$buyer->setIp("85.34.78.112");
$buyer->setCity("İstanbul");
$buyer->setCountry("Türkiye");
$buyer->setZipCode("34732");
$request->setBuyer($buyer);

# create billing address dto
$billingAddress = new \Iyzipay\Client\Ecom\Payment\Dto\EcomPaymentBillingAddressDto();
$billingAddress->setContactName("Hakan Erdoğan");
$billingAddress->setCity("İstanbul");
$billingAddress->setCountry("Türkiye");
$billingAddress->setAddress("19 Mayıs Mah. İnönü Cad. No:45 Kozyatağı");
$billingAddress->setZipCode("34742");
$request->setBillingAddress($billingAddress);

# create shipping address dto
$shippingAddress = new \Iyzipay\Client\Ecom\Payment\Dto\EcomPaymentShippingAddressDto();
$shippingAddress->setContactName("Hakan Erdoğan");
$shippingAddress->setCity("İstanbul");
$shippingAddress->setCountry("Türkiye");
$shippingAddress->setAddress("19 Mayıs Mah. İnönü Cad. No:45 Kozyatağı");
$shippingAddress->setZipCode("34742");
$request->setShippingAddress($shippingAddress);

# create payment basket items
$items = array();
$item1 = new \Iyzipay\Client\Ecom\Payment\Dto\EcomPaymentBasketItemDto();
$item1->setId("BI101");
$item1->setName("ABC Marka Kolye");
$item1->setCategory1("Giyim");
$item1->setCategory2("Aksesuar");
$item1->setItemType(\Iyzipay\Client\Ecom\Payment\Enumtype\BasketItemRequestType::PHYSICAL);
$item1->setPrice("0.3");
//$item1->setSubMerchantKey("sub merchant key");
//$item1->setSubMerchantPrice("0.27");
$items[0] = $item1;

$item2 = new \Iyzipay\Client\Ecom\Payment\Dto\EcomPaymentBasketItemDto();
$item2->setId("BI102");
$item2->setName("XYZ Oyun Kodu");
$item2->setCategory1("Oyun");
$item2->setCategory2("Online Oyun Kodları");
$item2->setItemType(\Iyzipay\Client\Ecom\Payment\Enumtype\BasketItemRequestType::VIRTUAL);
$item2->setPrice("0.5");
//$item2->setSubMerchantKey("sub merchant key");
//$item2->setSubMerchantPrice("0.42");
$items[1] = $item2;

$item3 = new \Iyzipay\Client\Ecom\Payment\Dto\EcomPaymentBasketItemDto();
$item3->setId("BI103");
$item3->setName("EDC Marka Usb");
$item3->setCategory1("Elektronik");
$item3->setCategory2("Usb / Cable");
$item3->setItemType(\Iyzipay\Client\Ecom\Payment\Enumtype\BasketItemRequestType::PHYSICAL);
$item3->setPrice("0.2");
//$item3->setSubMerchantKey("sub merchant key");
//$item3->setSubMerchantPrice("0.18");
$items[2] = $item3;
$request->setBasketItems($items);

# make request
$response = $client->initializeCheckoutForm($request);

# print response
print_r($response);