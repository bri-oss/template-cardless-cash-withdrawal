<?php
// Enforce HTTPS with HSTS
header('Strict-Transport-Security: max-age=31536000; includeSubDomains; preload');

use BRI\CardlessCashWithdrawal\AuthToken;

require __DIR__ . '/../../briapi-sdk/autoload.php';


try {
  $providerId = filter_var('', FILTER_SANITIZE_STRING); // customer key
  $secretKey = filter_var('', FILTER_SANITIZE_STRING); // customer secret

  if (empty($providerId) || empty($secretKey)) {
    throw new Exception('Invalid input parameter variables');
  }

  // url path values
  $baseUrl = 'https://api.bridex.qore.page/mock'; //base url

  $response = (new AuthToken())->authToken(
    $baseUrl,
    $providerId,
    $secretKey
  );

  echo $response;
} catch (Exception $e) {
  echo 'Error: ' . $e->getMessage();
  exit(1);
}
