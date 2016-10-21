<?php

namespace Omnipay\Interswitch;

use Omnipay\Common\AbstractGateway;

/**
 * Interswitch Gateway
 *
 * @link https://connect.interswitchng.com/documentation/integration-overview
 * @method \Omnipay\Common\Message\ResponseInterface authorize(array $options = array())
 * @method \Omnipay\Common\Message\ResponseInterface completeAuthorize(array $options = array())
 * @method \Omnipay\Common\Message\ResponseInterface capture(array $options = array())
 * @method \Omnipay\Common\Message\ResponseInterface refund(array $options = array())
 * @method \Omnipay\Common\Message\ResponseInterface void(array $options = array())
 * @method \Omnipay\Common\Message\ResponseInterface createCard(array $options = array())
 * @method \Omnipay\Common\Message\ResponseInterface updateCard(array $options = array())
 * @method \Omnipay\Common\Message\ResponseInterface deleteCard(array $options = array())
 */

class Gateway extends AbstractGateway
{
    public function getName()
    {
        return 'Interswitch';
    }

    public function getDefaultParameters()
    {
        return [
            'macKey' => 'D3D1D05AFE42AD50818167EAC73C109168A0F108F32645C8B59E897FA930DA44F9230910DAC9E20641823799A107A02068F7BC0F4CC41D2952E249552255710F',
            'productId' => 6205,
            'payItemId' => 101,
            'currency' => 'NGN',
            'testMode' => true
        ];
    }

    public function getMacKey()
    {
        return $this->getParameter('macKey');
    }

    public function setMacKey($value)
    {
        return $this->setParameter('macKey', $value);
    }

    public function setPayItemId($value) {
        return $this->setParameter('pay_item_id', $value);
    }

    public function getPayItemId() {
        return $this->getParameter('pay_item_id');
    }

    public function setProductId($value) {
        return $this->setParameter('product_id', $value);
    }

    public function getProductId() {
        return $this->getParameter('product_id');
    }

    public function purchase(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Interswitch\Message\PurchaseRequest', $parameters);
    }

    public function completePurchase(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Interswitch\Message\CompletePurchaseRequest', $parameters);
    }

    function __call($name, $arguments)
    {
        // TODO: Implement @method \Omnipay\Common\Message\ResponseInterface authorize(array $options = array())
        // TODO: Implement @method \Omnipay\Common\Message\ResponseInterface completeAuthorize(array $options = array())
        // TODO: Implement @method \Omnipay\Common\Message\ResponseInterface capture(array $options = array())
        // TODO: Implement @method \Omnipay\Common\Message\ResponseInterface completePurchase(array $options = array())
        // TODO: Implement @method \Omnipay\Common\Message\ResponseInterface refund(array $options = array())
        // TODO: Implement @method \Omnipay\Common\Message\ResponseInterface void(array $options = array())
        // TODO: Implement @method \Omnipay\Common\Message\ResponseInterface createCard(array $options = array())
        // TODO: Implement @method \Omnipay\Common\Message\ResponseInterface updateCard(array $options = array())
        // TODO: Implement @method \Omnipay\Common\Message\ResponseInterface deleteCard(array $options = array())
    }
}
