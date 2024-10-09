<?php

use BRI\CardlessCashWithdrawal\AuthToken;

require __DIR__ . '/../../briapi-sdk/autoload.php';

$providerId = 'client_credentials'; // customer key
$secretKey = 'PXXQKV0HYVCJAsriOPQ6WSwK4S2lLi5Z'; // customer secret

// url path values
$baseUrl = 'https://api.bridex.qore.page/mock'; //base url

$response = (new AuthToken())->authToken(
  $baseUrl,
  $providerId,
  $secretKey
);

echo $response;
