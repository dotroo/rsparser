<?php

if (isset($argv[1])) {
    $filename = $argv[1];
} else {
    die("Missing required parameter: file name\n");
}

if (is_readable($filename)) {
    $lines = explode("\n", file_get_contents($filename));

    $parsingResult = [
        'views' => 0,
        'urls' => 0,
        'traffic' => 0,
        'crawlers' => [
            'Google' => 0,
            'Bing' => 0,
            'Baidu' => 0,
            'Yandex' => 0
        ],
        'statusCodes' => []
    ];

    $uniqueUrls = [];

    if (!empty($lines)) {
        foreach ($lines as $line) {
            if (!empty($line)) {
                $parsingResult['views']++;
                
                $lineParts = explode('"', $line);

                //отделим метод запроса от uri
                $requestParts = explode(' ', $lineParts[1]);
                if (!in_array($requestParts[1], $uniqueUrls, true)) {
                    $uniqueUrls[] = $requestParts[1];
                }

                //отделим статус ответа и трафик
                $statusParts = explode(' ', $lineParts[2]);

                if (!isset($parsingResult['statusCodes'][$statusParts[1]])) {
                    $parsingResult['statusCodes'][$statusParts[1]] = 1;
                } else {
                    $parsingResult['statusCodes'][$statusParts[1]]++;
                }

                if ($statusParts[1] >= 200 && $statusParts[1] < 300) {
                    $parsingResult['traffic'] += (int)$statusParts[2];
                }

                //определим веб-краулеров из User-Agent запросов
                foreach($parsingResult['crawlers'] as $crawler => $count) {
                    if (strpos($lineParts[5], $crawler)) {
                        $parsingResult['crawlers'][$crawler]++;
                    }
                }
            }
        }
    }

    $parsingResult['urls'] = count($uniqueUrls);

    echo json_encode($parsingResult, JSON_PRETTY_PRINT);
}
