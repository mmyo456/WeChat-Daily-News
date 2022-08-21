<?php

require_once("./Gaode.php");
require_once("./WeiChat.php");
require_once("./Curl.php");

ini_set("display_errors", "On");

main();

function main()
{
    $weather = Levi_Gaode::getBaseWeather();
    $togetherDays = getTogetherDays();
    $birthDays = getBirthDays();
    $week = getWeek();
    $hua = getHua();

    $userList = [
        'o984S57Rq5FLmT0D6oxRcybaBRW0',
        'ojKlj6q-t9TNkIBh659v0Tp_URI4'
    ];

    foreach ($userList as $touser) {
        send($touser, $weather, $togetherDays, $birthDays, $week, $hua);
    }
}

function send($touser, $weather, $togetherDays, $birthDays, $week, $hua)
{
    $content = [
        'touser' => $touser,
        'template_id' => 'RFteUzQCw2HH_lsfEfV3lBvm7f03pdaaPHxEwn3yfMU',
        'url' => 'https://www.mmfo.top',
        'topcolor' => '#FF0000',
        'data' => [
            'date' => [
                'value' => date('Y年n月j日'),
            ],
            'province' => [
                'value' => $weather['province'],
            ],
            'city' => [
                'value' => $weather['city'],
            ],
            'weather' => [
                'value' => $weather['weather'],
            ],
            'temperature' => [
                'value' => $weather['temperature'],
                'color' => '#4d79ff',
            ],
            'humidity' => [
                'value' => $weather['humidity'],
                'color' => '#4d79ff',
            ],
            'winddirection' => [
                'value' => $weather['winddirection'],
            ],
            'windpower' => [
                'value' => $weather['windpower'],
            ],
            'togetherDays' => [
                'value' => $togetherDays,
                'color' => '#ff4dff'
            ],
            'birthDays' => [
                'value' => $birthDays,
                'color' => '#ff4dff'
            ],
            'week' => [
                'value' => $week,
            ],
            'hua' => [
                'value' => $hua,
                'color' => '#b3ff66',
            ]
        ],
    ];
    Levi_WeiChat::sendTemplateMessage(json_encode($content));
}

function getWeek()
{
    $w = date('w');
    $week = array(
        "0" => "日",
        "1" => "一",
        "2" => "二",
        "3" => "三",
        "4" => "四",
        "5" => "五",
        "6" => "六"
    );
    return $week[$w];
}

function getBirthDays()
{
    $diff_days = (strtotime('2023-03-08') - time());
    $days = (int)($diff_days / 86400);
    return $days;
}

function getTogetherDays()
{
    $earlier = new DateTime("2022-01-30");
    $later = new DateTime(date('Y-m-d'));
    $diff = $later->diff($earlier)->format("%a");
    return $diff + 1;
}

function getHua()
{
    $qingHua = Util_Curl::httpGet('https://yuxinghe.top/api/love.php', ['type' => 'json']);
    $hua = $qingHua['ishan'];
    return $hua;
}


