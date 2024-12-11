<?php

use BRI\CardlessCashWithdrawal\AuthToken;
use BRI\CardlessCashWithdrawal\CardlessWithdrawal;

require __DIR__ . '/../../briapi-sdk/autoload.php';

$clientId = 'your_client_id';

// url path values
$baseUrl = 'https://api.bridex.qore.page/mock'; //base url
$providerId = 'client_credentials'; // customer key
$secretKey = 'S7zgRMA0rUMf4ddkagpreoECgYEAxRkh'; // customer secret

$getToken = (new AuthToken())->authToken(
  $baseUrl,
  $providerId,
  $secretKey
);

$accessToken = json_decode($getToken, true)['access_token'];

$cardlessWithDrawal = new CardlessWithdrawal();

$response = $cardlessWithDrawal->cardlessWithdrawal(
  $baseUrl,
  $clientId,
  $secretKey,
  $accessToken
);

echo $response;
