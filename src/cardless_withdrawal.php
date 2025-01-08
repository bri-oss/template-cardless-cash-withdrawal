<?php

require 'utils.php';

// Enforce HTTPS with HSTS
header('Strict-Transport-Security: max-age=31536000; includeSubDomains; preload');

require __DIR__ . '/../../briapi-sdk/autoload.php';

try {
  $clientId = '';

  // url path values
  $baseUrl = 'https://api.bridex.qore.page/mock'; //base url
  $providerId = ''; // customer key
  $secretKey = ''; // customer secret

  $validateInput = sanitizeInput([
    'clientId' => $clientId,
    'providerId' => $providerId,
    'secretKey' => $secretKey
  ]);

  $accessToken = getAccessToken($providerId, $secretKey, $baseUrl);

  $response = fetchCardlessWithDrawal(
    $baseUrl,
    $validateInput['clientId'],
    $validateInput['secretKey'],
    $accessToken
  );

  echo $response;
} catch (InvalidArgumentException $e) {
  echo 'Invalid argument: ' . htmlspecialchars($e->getMessage(), ENT_QUOTES, 'UTF-8');
} catch (RuntimeException $e) {
  error_log($e->getMessage());

  exit(1);
}
