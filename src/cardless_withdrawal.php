<?php

use BRI\CardlessCashWithdrawal\AuthToken;
use BRI\CardlessCashWithdrawal\CardlessWithdrawal;

require __DIR__ . '/../../briapi-sdk/autoload.php';

try {
  $clientId = '';

  // url path values
  $baseUrl = 'https://api.bridex.qore.page/mock'; //base url
  $providerId = ''; // customer key
  $secretKey = ''; // customer secret

  if (empty($clientId) || empty($providerId) || empty($secretKey)) {
    throw new Exception('Invalid input parameter variables');
  }

  $getToken = (new AuthToken())->authToken(
    $baseUrl,
    $providerId,
    $secretKey
  );

  $data = json_decode($getToken, true);
  $accessToken = $data['access_token'] ?? null;

  if (!$accessToken) {
    throw new Exception('Failed to retrieve access token.');
  }

  $cardlessWithDrawal = new CardlessWithdrawal();

  $response = $cardlessWithDrawal->cardlessWithdrawal(
    $baseUrl,
    $clientId,
    $secretKey,
    $accessToken
  );

  echo $response;
} catch (Exception $e) {
  echo 'Error: ' . $e->getMessage();
  exit(1);
}
