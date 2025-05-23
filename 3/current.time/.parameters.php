<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

$arComponentParameters = [
    'PARAMETERS' => [
        'TIME_FORMAT' => [
            'NAME' => 'Формат времени',
            'TYPE' => 'STRING',
            'DEFAULT' => 'H:i:s',
            'COLS' => 25
        ],
        'CACHE_TIME' => [
            'DEFAULT' => 0
        ]
    ]
];
?>