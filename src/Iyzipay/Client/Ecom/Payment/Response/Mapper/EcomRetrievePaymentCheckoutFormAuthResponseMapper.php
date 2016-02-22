<?php

namespace Iyzipay\Client\Ecom\Payment\Response\Mapper;

use Iyzipay\Client\Ecom\Payment\Response\EcomRetrievePaymentCheckoutFormAuthResponse;

class EcomRetrievePaymentCheckoutFormAuthResponseMapper extends EcomPaymentAuthResponseMapper
{
    public static function newInstance()
    {
        return new EcomRetrievePaymentCheckoutFormAuthResponseMapper();
    }

    /**
     * @param EcomRetrievePaymentCheckoutFormAuthResponse $response
     * @param $jsonResult
     */
    public function mapResponse($response, $jsonResult)
    {
        parent::mapResponse($response, $jsonResult);

        if (isset($jsonResult->token)) {
            $response->setToken($jsonResult->token);
        }
        if (isset($jsonResult->callbackUrl)) {
            $response->setCallbackUrl($jsonResult->callbackUrl);
        }
        if (isset($jsonResult->paymentStatus)) {
            $response->setPaymentStatus($jsonResult->paymentStatus);
        }
    }
}