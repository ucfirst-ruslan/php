<?php

include_once 'config.php';

include_once 'function.php';


var_dump($_FILES);
chmod('upload', 0777);

if (isset($_FILES)){
   echo "read"; 
       
       $nameFile = upload();
    
}
$title = 'File Uploads';
$arrDateDir = readDirr();
include_once 'template/index.php';

