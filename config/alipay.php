<?php

return [
    'server_url' => 'https://openapi.alipay.com',
    'app_id' => '2021000106614291',
    'private_key' => 'MIIEvwIBADANBgkqhkiG9w0BAQEFAASCBKkwggSlAgEAAoIBAQDjOJaTHioNJ1uuqsWPH+eBKOJ87uMReGl+3JN3zQWykEvXz/hvsiH8m7OthXkuOj7TjddN4AoZRfU5RBLjYsAKwBFeDSdwko2bNkN7tdXN+4ge/ksYiCv2ocn0lgcQ+ba272ztHkXvcFSMITax5WkhfnabiK+qTG3v9GC7oJCCgQkeE22pIwQqDoOUOgunK4QB5GHICsc8DZX8PYKJoLn7UdQM4zrsyyzTRo9LI8Qn/xkWRMamu2tMK03FfvfSSHSJm1jhv/hiKTBm3x4u+9nQ5qH0HkgXDLQLXEhkxCWkT6xP4N1B0X5AtEPvReVRv15RknnsYR/iynzJSw52GMVjAgMBAAECggEAB+QbNpjBlRtcz8AWhFXzUET/OJ+DO0QXRdSbOnngTMc+GwyZ8Ccbjw5JOyl7f+N98xLl+0pgj2gikA6RKVxwlu78q2uBhyNPz6gex9kUx8aIf6sNKJjyDeqofNoI/MnvUoMWIVX/z8Ty6rrsj1kMQaGGtPgWQa/N0ZuHEH0PB7kqu1lfXv0qpX2bBjhZGT3Ld4HysttXuUaj1fGYicozaKF5KV5YR6dAAIZ1u8KxJhC7QEIOGWKXDBPeLgG4/qe9fAmayrcZdHZNpXlClTO0g0ez7cg5OoROIuWYzyomcptxYoBwHRM0aDAUPeX2rLSv114Hg4jlMXp7+GQ6VOa5QQKBgQDyIMgf5cdeizS++1n4VDNiFQLQfWl1qzp53WjBFpo8if63e3gNewZrWiBFYfKW3lLQ2uJtSP3PJl/t34JMDRmWkUChMFK3r0P4D/Qh0rIy1o6Vuv7fTnDFF1erMdQb6LW8BMuseDmKELl4hJiE0xY8Ry04Qfu+NuO26ZKTyPguSwKBgQDwPSuBAy9fIqWFLd3nDc6pM87ffFc+JmEoM9Dgj/YoimunuJ3VCXEcYXorES+5kz9BXzrxDK3QfL/fdmt2MC3zl0aaaa2SLqX+xp5+jt7UiH3t6Xiaamerjl4t/CpYYdstQzqwZHClEjsVbgdLf6HfcpCS7Hyx8FMJ7+UqA9d2SQKBgQCJk6LirPcpe0OPONaYSY+grXuZ54iiuZZSZEH/ZM5ik65NpzRBxKOTH/SyN8NVgiHgVl7N5emBaLadPKCWgeMGMKZecEyv3kBqlPYMueFTDaKa5VOoorNk6ayAs6Fn8kRA/yCTcQSQtIwONJlM73v06CSDkMpv/FRLPFBy9IBAHQKBgQCMbATYxSbUYekD/npdSsnIRxsdsI1CK6bQm/D0wdEtgzNH9vZyhrFR2HxTXhlaTIJF0McgDLwwSCrTEGHh1GmXn43KRgkJkDDAyhHsgdAnxJxvCu/OunFcarwL/wA1ZwV44HoWjq71HcHhVc33yGOyu0FcT9TXIVU4UrvNoi832QKBgQDQqkCeDs8XK3aKpcFv5CxO7Vsa48qcmM9tWuyjT74C9MhDzme/f+y9Wu51sQSPbsNo2xCSmdKMl7vAlT0Tfi1FgEX1WqS10bY7dlKOjRDDOmZLx6VNDAGBX0PDO28IXb4OxtzBp91Ns+1fcDEsv0orCCTd6scwabN/5Nkr74SPLg==',
    'alipay_public_key' => 'MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAstEsB39rMqirftFq0YTnY3OTBcxczXpeutEW/24Kp54F/Lg2zFk58nNysSfWVFJIocRqvvDbQfpby4WerRKGqIEpM1Ptkyxb+K+c7durc0twd6rWhbvzO6A/czXUQj1/1M4zh+rqA9kdYOFUMkbAHAlbKw2wmVc+UI/IvN8EDniCWe5CFSKWrKKGVN7JPFUP0P4CiVHG4WZqvVtIU2IwDptNSFU3IV/6zQtpmdfzzxkBaKjmxyxVZNQlCqQc41zCHOGF92FsBqhZHYXs7UcXTOdmdUv2Lsf+1FHyGgl3/s59vDvVaXWWxeIIUwMNHk3ou5D1e7sedmF0kFTmbDKjRwIDAQAB',
    'transfer_user_id' => '2088942155447155',
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
