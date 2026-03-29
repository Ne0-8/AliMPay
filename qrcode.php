<?php
header('Content-Type: image/png');
header('Cache-Control: public, max-age=3600');

$config = require __DIR__ . '/config/alipay.php';

$type = $_GET['type'] ?? 'business';
$token = $_GET['token'] ?? '';

$expectedToken = md5('qrcode_access_' . date('Y-m-d'));
if ($token !== $expectedToken) {
    header('HTTP/1.1 403 Forbidden');
    echo 'Invalid token';
    exit;
}

try {
    switch ($type) {
        case 'business':
            $qrCodePath = $config['payment']['business_qr_mode']['qr_code_path'];
            
            if (filter_var($qrCodePath, FILTER_VALIDATE_URL)) {
                $imageData = file_get_contents($qrCodePath);
            } else {
                $imageData = file_get_contents($qrCodePath);
            }
            
            if ($imageData === false) {
                header('HTTP/1.1 404 Not Found');
                echo 'QR code not found';
                exit;
            }
            
            $imageInfo = getimagesizefromstring($imageData);
            if ($imageInfo) {
                header('Content-Type: ' . $imageInfo['mime']);
            }
            
            echo $imageData;
            break;
            
        default:
            header('HTTP/1.1 400 Bad Request');
            echo 'Invalid QR code type';
            break;
    }
    
} catch (Exception $e) {
    header('HTTP/1.1 500 Internal Server Error');
    echo 'Error loading QR code: ' . $e->getMessage();
}
?>