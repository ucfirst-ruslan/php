<?php

include_once 'libs/config.php';
include_once 'libs/fileoperations.php';


$fileObj = new FileOperations();

$getStringNum = 5;
$getSymbolNum = 1;
$repStringNum = 5;
$repStrData = 'DTHdssegfsdegasdgfDHTS';
$repSumbolNum = 4;
$repSumbolData = 'U';

//Весь файл
$getFile = $fileObj->getFile();

// Получить строку (начиная с 0)
$getLine = $fileObj->getData($getStringNum);

//Получить символ (начиная с 0)
$getSymbol = $fileObj->getData($getStringNum, $getSymbolNum);

//замена строки
$replaceLine = $fileObj->setData($repStrData, $repSumbolNum);

//Замена символа
$replaceSymbol = $fileObj->setData($repSumbolData, $repStringNum,$repSumbolNum);

// Вывод ошибок
$errors = $fileObj->getError();

$title = 'Работа с файлом';

include_once 'template/index.php';