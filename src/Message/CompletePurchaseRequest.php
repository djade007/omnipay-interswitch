<?php

namespace Omnipay\Interswitch\Message;


class CompletePurchaseRequest extends AbstractRequest
{

    /**
     * Get the raw data array for this message. The format of this varies from gateway to
     * gateway, but will usually be either an associative array, or a SimpleXMLElement.
     *
     * @return mixed
     */
    public function getData()
    {
        $data = [
            'productid' => $this->getProductId(),
            'transactionreference' => $this->getTransactionReference(),
            'amount' => $this->getAmount()
        ];

        return $data;
    }

    public function setTxnRef($value) {
        $this->setTransactionReference($value);
    }

    public function sendData($data)
    {
        $httpRequest = $this->httpClient->get($this->getQueryEndpoint(), [
            'Hash' => $this->generateHash($data)
        ],
            ['query' => $data]
        );

        $httpResponse = $httpRequest->send();

        return $this->response = $this->createResponse($httpResponse->json(), $httpResponse->getStatusCode());
    }

    protected function createResponse($data, $statusCode)
    {
        return $this->response = new CompletePurchaseResponse($this, $data, $statusCode);
    }

    /**
     * @param $data
     * @return string
     */
    protected function generateHash($data) {
        $str = $data['productid']
            .$data['transactionreference']
            .$this->getMacKey();
        return hash('sha512', $str);
    }
}