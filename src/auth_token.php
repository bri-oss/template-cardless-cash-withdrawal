<?php

use BRI\CardlessCashWithdrawal\AuthToken;

require __DIR__ . '/../../briapi-sdk/autoload.php';

$providerId = ''; // customer key
$secretKey = ''; // customer secret

// url path values
$baseUrl = 'https://api.bridex.qore.page/mock'; //base url

$response = (new AuthToken())->authToken(
  $baseUrl,
  $providerId,
  $secretKey
);

echo $response;
