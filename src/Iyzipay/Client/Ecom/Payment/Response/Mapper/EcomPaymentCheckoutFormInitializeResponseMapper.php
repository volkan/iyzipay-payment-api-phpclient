<?php

namespace Iyzipay\Client\Ecom\Payment\Response\Mapper;

use Iyzipay\Client\Ecom\Payment\Response\EcomPaymentCheckoutFormInitializeResponse;
use Iyzipay\Client\ResponseMapper;

class EcomPaymentCheckoutFormInitializeResponseMapper extends ResponseMapper
{
    public static function newInstance()
    {
        return new EcomPaymentCheckoutFormInitializeResponseMapper();
    }

    /**
     * @param EcomPaymentCheckoutFormInitializeResponse $response
     * @param $jsonResult
     */
    public function mapResponse($response, $jsonResult)
    {
        parent::mapResponse($response, $jsonResult);

        if (isset($jsonResult->token)) {
            $response->setToken($jsonResult->token);
        }
        if (isset($jsonResult->checkoutFormContent)) {
            $response->setCheckoutFormContent($jsonResult->checkoutFormContent);
        }
        if (isset($jsonResult->tokenExpireTime)) {
            $response->setTokenExpireTime($jsonResult->tokenExpireTime);
        }
    }
}