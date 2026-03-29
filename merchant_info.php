<?php
require_once 'vendor/autoload.php';

use AliMPay\Core\CodePay;

header('Content-Type: application/json; charset=utf-8');

try {
    $codePay = new CodePay();
    $merchantInfo = $codePay->getMerchantInfo();
    
    echo json_encode([
        'success' => true,
        'merchant_id' => $merchantInfo['id'],
        'merchant_key' => $merchantInfo['key'],
        'created_at' => $merchantInfo['created_at'] ?? 'unknown'
    ], JSON_PRETTY_PRINT);
    
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode([
        'success' => false,
        'error' => $e->getMessage()
    ], JSON_PRETTY_PRINT);
}
