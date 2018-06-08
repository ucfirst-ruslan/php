<?php

include_once 'config.php';
include_once 'function.php';


if(!empty($_POST['delete'])) 
{
    $messForUser = deleteFile ($_POST['delete']);
}

$chmodDir = chmodCheckDir();

if (empty($chmodDir))
{
    if (!empty($_FILES))
    {
        $messForUser = upload();
    }
	
	$arrDateDir = readDirr();
}
else
{
    $messForUser = $chmodDir;
}


$title = 'File Uploads';
$setIteration = 1;

include_once 'template/index.php';

