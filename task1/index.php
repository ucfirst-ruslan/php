<?php
ini_set('display_errors', 1);

include_once 'config.php';
include_once 'function.php';


if(!empty($_POST['delete'])) 
{
    $messForUser = deleteFile ($_POST['delete']);
}

$chmodDir = chmodCheckDir();

if (!empty($_FILES))
{
    if (empty($chmodDir))
    {
        $messForUser = upload();
    }
}

if (empty($chmodDir))
{
    $arrDateDir = readDirr();
}

$title = 'File Uploads';
$setIteration = 1;

include_once 'template/index.php';

