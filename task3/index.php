<?php

include_once 'libs/config.php';
include_once 'libs/fileoperations.php';


$fileObj = new FileOperations();

$getLine = $fileObj->getData(5);

$getSymbol = $fileObj->getData(5, 1);

$replaceLine = $fileObj->setData("DTHdssegfsdegasdgfDHTS", 5);

$replaceSymbol = $fileObj->setData("R", 4,4);

$errors = $fileObj->getError();

$title = 'Работа с файлом';

include_once 'template/index.php';