<?php
ini_set('display_errors', 1);

include_once 'config.php';
include_once 'function.php';


if(!empty($_POST['delete'])) {
    $messForUser = deleteFile ($_POST['delete']);
}

if (chmodCheckDir()) {
    $messForUser = $chmodDir;
}

if (!empty($_FILES)){

    if (empty($chmodDir)) {
        $messForUser = upload();
    }
}

$title = 'File Uploads';


if (empty($chmodDir)) {
    $arrDateDir = readDirr();
}



include_once 'template/index.php';

