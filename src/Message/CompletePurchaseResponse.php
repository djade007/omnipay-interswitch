<?php

namespace Omnipay\Interswitch\Message;

use Omnipay\Common\Message\AbstractResponse;

class CompletePurchaseResponse extends AbstractResponse
{

    /**
     * Is the response successful?
     *
     * @return boolean
     */
    public function isSuccessful()
    {
        return $this->getData()['ResponseCode'] == '00';
    }

    public function getMessage()
    {
        return $this->getData()['ResponseDescription'];
    }
}