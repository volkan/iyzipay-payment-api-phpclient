<?php

namespace Iyzipay\Client;

class ResponseMapper
{
    public static function newInstance()
    {
        return new ResponseMapper();
    }

    /**
     * @param Response $response
     * @param $jsonResult
     */
    public function mapResponse($response, $jsonResult)
    {
        if (isset($jsonResult->status)) {
            $response->setStatus($jsonResult->status);
        }
        if (isset($jsonResult->conversationId)) {
            $response->setConversationId($jsonResult->conversationId);
        }
        if (isset($jsonResult->errorCode)) {
            $response->setErrorCode($jsonResult->errorCode);
        }
        if (isset($jsonResult->errorMessage)) {
            $response->setErrorMessage($jsonResult->errorMessage);
        }
        if (isset($jsonResult->errorGroup)) {
            $response->setErrorGroup($jsonResult->errorGroup);
        }
        if (isset($jsonResult->locale)) {
            $response->setLocale($jsonResult->locale);
        }
        if (isset($jsonResult->systemTime)) {
            $response->setSystemTime($jsonResult->systemTime);
        }
        if (isset($jsonResult->paymentPageUrl)) {
            $response->setPaymentPageUrl($jsonResult->paymentPageUrl);
        }
    }
}