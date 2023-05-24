<?php
use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;

require './autoload.php';

// For test payments we want to enable the sandbox mode. If you want to put live
// payments through then this setting needs changing to `false`.
$enableSandbox = true;

// PayPal settings. Change these to your account details and the relevant URLs
// for your site.
$paypalConfig = [
    'client_id' => 'AcO2vLT0yh4l6HIfeuFZcpN0qh1ApUrCQDIWwKeGmvtI5j-PAbW2eIEhkzYeZyDjg7x_pgHDmbOCMl7h',
    'client_secret' => 'EJy4QNxsn4Oj7cPk7k0lvs1mDKIhOeEDr-qzSTmUAct14UD3idScwwsy8z4uv9slme6nNj5dWuJZMprU',
    'return_url' => 'http://localhost/paypal/response.php',
    'cancel_url' => 'http://localhost/paypal/payment-cancelled.html'
];

// Database settings. Change these for your database configuration.
$dbConfig = [
    'host' => 'localhost',
    'username' => 'root',
    'password' => '',
    'name' => 'codeat21'
];

$apiContext = getApiContext($paypalConfig['client_id'], $paypalConfig['client_secret'], $enableSandbox);

/**
 * Set up a connection to the API
 *
 * @param string $clientId
 * @param string $clientSecret
 * @param bool   $enableSandbox Sandbox mode toggle, true for test payments
 * @return \PayPal\Rest\ApiContext
 */
function getApiContext($clientId, $clientSecret, $enableSandbox = false)
{
    $apiContext = new ApiContext(
        new OAuthTokenCredential($clientId, $clientSecret)
    );

    $apiContext->setConfig([
        'mode' => $enableSandbox ? 'sandbox' : 'live'
    ]);

    return $apiContext;
}
