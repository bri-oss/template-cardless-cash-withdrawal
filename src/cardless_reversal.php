<?php

use BRI\CardlessCashWithdrawal\AuthToken;
use BRI\CardlessCashWithdrawal\CardlessReversal;

require __DIR__ . '/../../briapi-sdk/autoload.php';

try {
  $clientId = filter_var('', FILTER_SANITIZE_STRING);

  // url path values
  $baseUrl = 'https://api.bridex.qore.page/mock'; //base url
  $providerId = filter_var('', FILTER_SANITIZE_STRING); // customer key
  $secretKey = filter_var('', FILTER_SANITIZE_STRING); // customer secret

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

  $cardlessReversal = new CardlessReversal();

  $response = $cardlessReversal->cardlessReversal(
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
