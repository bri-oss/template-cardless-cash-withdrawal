<?php

require 'utils.php';

// Enforce HTTPS with HSTS
header('Strict-Transport-Security: max-age=31536000; includeSubDomains; preload');

try {
  $clientId = filter_var('', FILTER_SANITIZE_STRING);

  // url path values
  $baseUrl = 'https://api.bridex.qore.page/mock'; //base url
  $providerId = filter_var('', FILTER_SANITIZE_STRING); // customer key
  $secretKey = filter_var('', FILTER_SANITIZE_STRING); // customer secret

  $validateInput = sanitizeInput([
    'clientId' => $clientId,
    'providerId' => $providerId,
    'secretKey' => $secretKey
  ]);

  $accessToken = getAccessToken($providerId, $secretKey, $baseUrl);

  $response = fetchCardlessReversal(
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
