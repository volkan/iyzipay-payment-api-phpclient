<?php

namespace Iyzipay\Client\Ecom\Payment\Response\Mapper;

use Iyzipay\Client\Ecom\Payment\Response\EcomPaymentAuthResponse;

class EcomPaymentAuthResponseMapper extends EcomPaymentResponseMapper
{
    public static function newInstance()
    {
        return new EcomPaymentAuthResponseMapper();
    }

    /**
     * @param EcomPaymentAuthResponse $response
     * @param $jsonResult
     */
    public function mapResponse($response, $jsonResult)
    {
        parent::mapResponse($response, $jsonResult);
    }
}