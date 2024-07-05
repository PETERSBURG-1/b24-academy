<?php

use Bitrix\Main\Config\Option;
use Bitrix\Main\EventManager;

CopyDirFiles(
    dirname(__DIR__) . '/files/css',
    $_SERVER['DOCUMENT_ROOT'] . '/local/css',
    true,
    true
);

CopyDirFiles(
    dirname(__DIR__) . '/files/js',
    $_SERVER['DOCUMENT_ROOT'] . '/local/js',
    true,
    true
);

$eventManager = EventManager::getInstance();
$eventManager->registerEventHandler(
    'main',
    'OnEpilog',
    'b24.academy',
    '\B24\Academy\UI\Tasks\ListPageMutator',
    'handleOnEpilog'
);
Option::set('b24.academy', 'VERSION', 2024_07_04_11_00_00);
