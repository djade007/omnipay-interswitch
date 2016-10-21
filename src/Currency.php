<?php

namespace Omnipay\Interswitch;


class Currency extends \Omnipay\Common\Currency
{
    public static function all() {
        return array_merge(parent::all(), [
            'NGN' => array('numeric' => '566', 'decimals' => 2)
        ]);
    }
}
