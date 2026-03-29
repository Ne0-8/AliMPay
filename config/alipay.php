<?php

return [
    'server_url' => 'https://openapi.alipay.com',
    'app_id' => '',
    'private_key' => '',
    'alipay_public_key' => '',
    'transfer_user_id' => '',
    'sign_type' => 'RSA2',
    'charset' => 'UTF-8',
    'format' => 'json',
    
    'log' => [
        'file' => __DIR__ . '/../logs/alipay.log',
        'level' => 'info',
        'type' => 'single',
        'max_file' => 30,
    ],
    
    'bill_query' => [
        'default_page_size' => 2000,
        'max_page_size' => 2000,
        'date_format' => 'Y-m-d H:i:s',
    ],
    
    'payment' => [
        'max_wait_time' => 300,
        'check_interval' => 3,
        'query_minutes_back' => 30,
        'order_timeout' => 300,
        'auto_cleanup' => true,
        'qr_code_size' => 300,
        'qr_code_margin' => 10,
        
        'business_qr_mode' => [
            'enabled' => true,
            'qr_code_path' => __DIR__ . '/../qrcode/business_qr.png',
            'amount_offset' => 0.01,
            'match_tolerance' => 300,
            'payment_timeout' => 300,
            'description' => '经营码收款模式'
        ],
        
        'anti_risk_url' => [
            'enabled' => true,
            'outer_app_id' => '20000218',
            'inner_app_id' => '20000116',
            'base_urls' => [
                'mdeduct_landing' => 'https://render.alipay.com/p/c/mdeduct-landing',
                'render_scheme' => 'https://render.alipay.com/p/s/i'
            ]
        ]
    ],
];
