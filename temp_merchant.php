<?php
// 临时商户信息查询 - 使用后请立即删除此文件
$password = 'temp123';

if (!isset($_GET['pwd']) || $_GET['pwd'] !== $password) {
    http_response_code(403);
    die('Access denied');
}

require_once 'vendor/autoload.php';
use AliMPay\Core\CodePay;

header('Content-Type: application/json');

try {
    $codePay = new CodePay();
    $merchantInfo = $codePay->getMerchantInfo();
    
    echo json_encode([
        'merchant_id' => $merchantInfo['id'],
        'merchant_key' => $merchantInfo['key']
    ], JSON_PRETTY_PRINT);
} catch (Exception $e) {
    echo json_encode(['error' => $e->getMessage()]);
}
