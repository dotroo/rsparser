<?php

function generateLog() {
    $strings = [
        '84.242.208.111 - - [11/May/2013:06:31:00 +0200] "POST /chat.php HTTP/1.1" 200 354 "http://bim-bom.ru/" "Mozilla/5.0 (Windows NT 6.1; rv:20.0) Gecko/20100101 Firefox/20.0"',
        '77.21.132.156 - - [24/May/2013:23:38:03 +0200] "POST /app/engine/api.php HTTP/1.1" 200 80 "http://lag.ru/index.php" "Mozilla/5.0 (Windows NT 6.1; WOW64) Googlebot/537.31 (KHTML, like Gecko) Chrome/26.0.1410.64 Safari/537.31"',
        '77.21.132.156 - - [24/May/2013:23:38:03 +0200] "POST /app/engine/api.php HTTP/1.1" 200 80 "http://lag.ru/index.php" "Mozilla/5.0 (Windows NT 6.1; WOW64) Yandexbot/537.31 (KHTML, like Gecko) Chrome/26.0.1410.64 Safari/537.31"',
        '77.21.132.156 - - [24/May/2013:23:38:03 +0200] "POST /app/engine/api.php HTTP/1.1" 200 80 "http://lag.ru/index.php" "Mozilla/5.0 (Windows NT 6.1; WOW64) Bingbot/537.31 (KHTML, like Gecko) Chrome/26.0.1410.64 Safari/537.31"',
        '77.21.132.156 - - [24/May/2013:23:38:03 +0200] "POST /app/engine/api.php HTTP/1.1" 200 80 "http://lag.ru/index.php" "Mozilla/5.0 (Windows NT 6.1; WOW64) Baiduspider/537.31 (KHTML, like Gecko) Chrome/26.0.1410.64 Safari/537.31"',
        '91.234.91.31 - - [11/May/2013:04:09:02 -0700] "GET /mod.php HTTP/1.0" 301 12413 "http://wiki.org/index.php#lang=en" "Mozilla/5.0 (compatible; MSIE 9.0; Windows NT 6.1; WOW64; Trident/5.0)"',
        '91.234.91.31 - - [11/May/2013:04:09:02 -0700] "GET /mod.php HTTP/1.0" 401 12413 "http://wiki.org/index.php#lang=en" "Mozilla/5.0 (compatible; MSIE 9.0; Windows NT 6.1; WOW64; Trident/5.0)"',
        '84.242.208.111 - - [11/May/2013:06:31:00 +0200] "POST /chat.php HTTP/1.1" 403 354 "http://bim-bom.ru/" "Mozilla/5.0 (Windows NT 6.1; rv:20.0) Gecko/20100101 Firefox/20.0"',
        '77.21.132.156 - - [24/May/2013:23:37:48 +0200] "POST /app/modules/randomgallery.php HTTP/1.1" 200 46542 "http://lag.ru/index.php" "Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.31 (KHTML, like Gecko) Chrome/26.0.1410.64 Safari/537.31"',
        '77.21.132.156 - - [24/May/2013:23:37:48 +0200] "POST /app/modules/randomgallery.php HTTP/1.1" 500 46 "http://lag.ru/index.php" "Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.31 (KHTML, like Gecko) Chrome/26.0.1410.64 Safari/537.31"'
    ];
    
    $linesToAdd = 1000000;
    
    for($i = 0; $i < $linesToAdd; $i++) {
        file_put_contents('access_log', $strings[rand(0, count($strings)-1)] . "\n", FILE_APPEND);
    }
}

generateLog();