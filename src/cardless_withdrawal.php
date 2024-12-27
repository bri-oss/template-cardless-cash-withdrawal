<?php

use BRI\CardlessCashWithdrawal\AuthToken;
use BRI\CardlessCashWithdrawal\CardlessWithdrawal;

require __DIR__ . '/../../briapi-sdk/autoload.php';

$clientId = '';

// url path values
$baseUrl = 'https://api.bridex.qore.page/mock'; //base url
$providerId = ''; // customer key
$secretKey = ''; // customer secret

$getToken = (new AuthToken())->authToken(
  $baseUrl,
  $providerId,
  $secretKey
);

$data = json_decode($getToken, true);
$accessToken = $data['access_token'] ?? null;

$cardlessWithDrawal = new CardlessWithdrawal();

$response = $cardlessWithDrawal->cardlessWithdrawal(
  $baseUrl,
  $clientId,
  $secretKey,
  $accessToken
);

echo $response;
