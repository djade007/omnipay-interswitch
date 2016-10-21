<?php

namespace Omnipay\Interswitch\Message;


use Omnipay\Interswitch\Currency;

abstract class AbstractRequest extends \Omnipay\Common\Message\AbstractRequest
{
    protected $testEndpoint = 'https://sandbox.interswitchng.com/webpay/pay';
    protected $liveEndpoint = 'https://webpay.interswitchng.com/paydirect/pay';

    protected $testQueryEndpoint = 'https://sandbox.interswitchng.com/webpay/api/v1/gettransaction.json';
    protected $liveQueryEndpoint = 'https://webpay.interswitchng.com/paydirect/api/v1/gettransaction.json';


    protected function getHttpMethod()
    {
        return 'POST';
    }

    public function getMacKey()
    {
        return $this->getParameter('macKey');
    }

    public function setMacKey($value)
    {
        return $this->setParameter('macKey', $value);
    }

    public function setProductId($value) {
        return $this->setParameter('product_id', $value);
    }

    public function getProductId() {
        return $this->getParameter('product_id');
    }

    public function setPayItemId($value) {
        return $this->setParameter('pay_item_id', $value);
    }

    public function getPayItemId() {
        return $this->getParameter('pay_item_id');
    }

    public function setAmount($value) {
        return $this->setParameter('amount', $value);
    }

    public function getAmount() {
        return $this->getParameter('amount');
    }

    public function getQueryEndpoint() {
        return $this->getTestMode() ? $this->testQueryEndpoint : $this->liveQueryEndpoint;
    }

    public function getEndpoint()
    {
        return $this->getTestMode() ? $this->testEndpoint : $this->liveEndpoint;
    }

    /**
     * Get the payment currency number.
     *
     * @return integer
     */
    public function getCurrencyNumeric()
    {
        if ($currency = Currency::find($this->getCurrency())) {
            return $currency->getNumeric();
        }
    }
}
