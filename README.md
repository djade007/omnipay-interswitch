# Omnipay: Interswitch

**Interswitch driver for the Omnipay payment processing library**


[Omnipay](https://github.com/omnipay/omnipay) is a framework agnostic, multi-gateway payment
processing library for PHP 5.3+. This package implements Interswitch support for Omnipay.

## Installation

Omnipay is installed via [Composer](http://getcomposer.org/). To install, simply add it
to your `composer.json` file:

```json
{
    "require": {
        "djade007/omnipay-interswitch": "dev-master"
    }
}
```

And run composer to update your dependencies:

    $ curl -s http://getcomposer.org/installer | php
    $ php composer.phar update


## Basic Usage

For general usage instructions, please see the main [Omnipay](https://github.com/omnipay/omnipay)
repository.
```
$gateway = Omnipay::create('Interswitch');

$gateway->initialize([
    'macKey' => 'D3D1D05AFE42AD50818167EAC73C109168A0F108F32645C8B59E897FA930DA44F9230910DAC9E20641823799A107A02068F7BC0F4CC41D2952E249552255710F',
    'productId' => 6205,
    'payItemId' => 101,
    'currency' => 'NGN',
]);


$transaction = $gateway->purchase([
    'returnUrl' => '{URL}',
    'amount' => 100000,
    'transactionId' => {RANDOM_DIGITS}
]);

$response = $transaction->send();

if ($response->isSuccessful()) {
    echo('success');
} elseif ($response->isRedirect()) {
    return $response->redirect(); // this will automatically forward the customer to interswitch
} else {
    echo('fail');
}
```

**On Redirect Route {URL}**
```
$gateway = Omnipay::create('Interswitch');
// same initialize values 
$gateway->initialize([
    'macKey' => 'D3D1D05AFE42AD50818167EAC73C109168A0F108F32645C8B59E897FA930DA44F9230910DAC9E20641823799A107A02068F7BC0F4CC41D2952E249552255710F',
    'productId' => 6205,
    'payItemId' => 101,
    'currency' => 'NGN'
]);

$response = $gateway->completePurchase(['txnref' => $_POST['txnref']])->send();

if ($response->isSuccessful()) {
    echo('success');
} else {
    echo "failed\n";
    echo $response->getMessage();
}
```


## Support

If you are having general issues with Omnipay, we suggest posting on
[Stack Overflow](http://stackoverflow.com/). Be sure to add the
[omnipay tag](http://stackoverflow.com/questions/tagged/omnipay) so it can be easily found.

If you want to keep up to date with release anouncements, discuss ideas for the project,
or ask more detailed questions, there is also a [mailing list](https://groups.google.com/forum/#!forum/omnipay) which
you can subscribe to.

If you believe you have found a bug, please report it using the [GitHub issue tracker](https://github.com/djade007/omnipay-interswitch/issues),
or better yet, fork the library and submit a pull request.
