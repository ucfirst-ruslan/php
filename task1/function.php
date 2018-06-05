<?php

function upload() 
{
    $newFileName = UPLOAD_DIR."/". checkFileName ($_FILES['file']['name']);

    if ($_FILES['file']['size'] > FILE_SIZE) {
            
        $fileSizeError = 'File size too large';
        addError('UPLOAD'.'_'.time(), $fileSizeError);
    }

    if (!move_uploaded_file($_FILES['file']['tmp_name'], $newFileName)) {
        
        $error = 'Файл не загружен' . $_FILES['file']['error'];
        addError('UPLOAD'.'_'.time(), $error);
    }

    header("Location: ".$_SERVER['HTTP_REFERER'], true, 301);
}

function checkFileName ($filename)
{
    $dirFile = UPLOAD_DIR."/".$filename;

    if (file_exists($dirFile)) {

        $file = explode(".", $filename);
        $fileTmp = @explode("_", $file[0]);

        if (!empty($fileTmp[1])){

            $fileTmp[1] = $fileTmp[1] + 1;
            $file[0] = implode("_", $fileTmp);

        } else {

            $file[0] = $file[0] ."_1";
        }

        $filename = implode(".", $file);

    }

    if (file_exists(UPLOAD_DIR."/".$filename)) {
        $filename = checkFileName ($filename);
    }
    return $filename;
}



function chmodCheckDir($item)
{
    $dirChmod = substr(sprintf('%o', fileperms("$item")), -4);

    $resp = true;

    if ($dirChmod != '0777') {

        $error = 'У вас нет прав доступа к директории';
        addError ('CHMOD_CHECK'.'_'.time(), $error);
        $resp = false;
    }

    return $resp;
    
}


function deleteFile ($file) 
{

    $fileDel = UPLOAD_DIR."/".$file;

    if (file_exists($fileDel)) {
        
        if (!unlink($fileDel)) {
    
            addError ('DELETE_FUNCTION'.'_'.time(), "$file: Файл не может быть удален");
        }
    
    } else {
        
        addError ('DELETE_FUNCTION'.'_'.time(), "$file: Этого файла не существует");
    }

    header("Location: ".$_SERVER['HTTP_REFERER'], true, 301);
}

function readDirr() 
{
    $fileArray = array();
    
    if ($handle = opendir(UPLOAD_DIR)) {
    
         while (false !== ($file = readdir($handle))) { 

            if ($file != "." && $file != "..") { 
                
                $fileSize = getSize($file);
                $fileArray[$file] = $fileSize;

            }
        }
    
        closedir($handle); 
    
    }
    
    return $fileArray;
}


function getSize ($file)
{
    $fileDir = UPLOAD_DIR."/".$file;
    
    $size = filesize($fileDir);
    
    if (1024 > $size) {
        
        $returnSize = round($size, 2) . " bytes";
        
    } else if ($size > 1024 &&  $size < 1048576) {
    
        $returnSize = round($size/1024, 2) . " kB";
    
    } else {
        
        $returnSize = round($size/1048576, 2) . " MB";
    }
    
    return $returnSize;
}





function addError ($errorName, $error)
{
    $addError = "\ndefine('".$errorName."', '".$error."');";
   
    file_put_contents("config.php", $addError, FILE_APPEND | LOCK_EX);
}


