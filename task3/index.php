<?php

include_once 'libs/config.php';
include_once 'libs/fileoperations.php';


$fileObj = new FileOperatins(FILE_FOR_READ);
$file = $fileObj->getFile();

foreach ($file as $key => $data) {
    echo $key . "  ";
    var_dump(preg_split('/(?<!^)(?!$)/u', $data));
    echo "<br>";
}
