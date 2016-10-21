<?php

namespace Omnipay\Interswitch\Message;

use Omnipay\Common\Message\AbstractResponse;
use Omnipay\Common\Message\RedirectResponseInterface;


/**
 * InterSwitch Purchase Response
 */
class PurchaseResponse extends AbstractResponse implements RedirectResponseInterface
{
    /**
     * Does the response require a redirect?
     *
     * @return boolean
     */
    public function isRedirect()
    {
        return true;
    }


    /**
     * Gets the redirect target url.
     *
     * @return string
     */
    public function getRedirectUrl()
    {
        return $this->getRequest()->getEndpoint();
    }

    /**
     * Get the required redirect method (either GET or POST).
     *
     * @return string
     */
    public function getRedirectMethod()
    {
        return 'POST';
    }

    /**
     * Gets the redirect form data array, if the redirect method is POST.
     *
     * @return array
     */
    public function getRedirectData()
    {
        return $this->getData();
    }

    /**
     * Is the response successful?
     *
     * @return boolean
     */
    public function isSuccessful()
    {
        return false;
    }
}