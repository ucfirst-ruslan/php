<?php
ini_set('display_errors', 1);

include_once 'config.php';
include_once 'function.php';

if(!empty($_POST['delete'])) {
    deleteFile ($_POST['delete']);
}

if (!empty($_FILES)){

    if (chmodCheckDir(UPLOAD_DIR)) {
        $fileName = upload();
    }
}

$title = 'File Uploads';

$arrDateDir = readDirr();

include_once 'template/index.php';

