<?php

use BRI\CardlessCashWithdrawal\CardlessReversal;

require __DIR__ . '/../../briapi-sdk/autoload.php';

$secretKey = 'super_secret';
$clientId = 'your_client_id';

// url path values
$baseUrl = 'https://api.bridex.qore.page/mock'; //base url

$cardlessReversal = new CardlessReversal();

$response = $cardlessReversal->cardlessReversal(
  $baseUrl,
  $clientId,
  $secretKey
);

echo $response;
