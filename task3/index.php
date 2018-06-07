<?php

include_once 'libs/config.php';
include_once 'libs/fileoperations.php';


$fileObj = new FileOperations(FILE_FOR_READ);
$file = $fileObj->getFile();

echo $fileObj->getString(4);

$errors = $fileObj->getError();


foreach ($errors as $key => $data) {
    echo $key . "  ";
echo $data;
    echo "<br>";
}
