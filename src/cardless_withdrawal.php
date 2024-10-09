<?php

use BRI\CardlessCashWithdrawal\CardlessWithdrawal;

require __DIR__ . '/../../briapi-sdk/autoload.php';

$secretKey = 'super_secret';
$clientId = 'your_client_id';

// url path values
$baseUrl = 'https://api.bridex.qore.page/mock'; //base url

$cardlessWithDrawal = new CardlessWithdrawal();

$response = $cardlessWithDrawal->cardlessWithdrawal(
  $baseUrl,
  $clientId,
  $secretKey
);

echo $response;
