<?php

namespace Omnipay\Interswitch\Message;


class PurchaseRequest extends AbstractRequest
{
    public function getData()
    {
        $this->validate('amount', 'currency');
        $data = [
            'product_id' => $this->getProductId(),
            'pay_item_id' => $this->getPayItemId(),
            'amount' => $this->getAmount() * 100, // convert to kobo or cent
            'currency' => $this->getCurrency(),
            'site_redirect_url' => $this->getReturnUrl(),
            'txn_ref' => $this->getTransactionId(),
            'testMode' => true
        ];

        $data = array_merge($data, ['hash' => $this->generateHash($data)]);

        return $data;
    }

    public function sendData($data)
    {
        return $this->createResponse($data, 200);
    }

    protected function createResponse($data, $statusCode)
    {
        return $this->response = new PurchaseResponse($this, $data, $statusCode);
    }

    /**
     * @param $data
     * @return string
     */
    protected function generateHash($data) {
        $str = $data['txn_ref']
            .$data['product_id']
            .$data['pay_item_id']
            .$data['amount']
            .$data['site_redirect_url']
            .$this->getMacKey();

        return hash('sha512', $str);
    }
}