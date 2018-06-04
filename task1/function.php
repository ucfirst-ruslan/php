<?php

function upload() 
{
    $uploadfile = UPLOAD_DIR. basename($_FILES['userfile']['name']);

    $fileSizeError;
    
    if ($_FILES['userfile']['size'] > FILE_SIZE) {
            
            $fileSizeError = 'File size too large' ;
            
            addError ($_FILES['userfile']['name'], $fileSizeError);
    }
    
    
    if (!move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
        
        $error = 'File not upload' . $_FILES['userfile']['error'];
        
        addError ($_FILES['userfile']['name'], $error);
        
    }

    return $_FILES['userfile']['name'];
}


function chmodCheckDir($item)
{
    
    if (!chmod($item, 0777)) {
        
        $error = 'File not upload';
        
        addError ($_FILES['userfile']['name'], $error);
        
        $error = true;
    }

    return $error;
    
}


function deleteFile ($file) 
{

    $fileDel = UPLOAD_DIR."/".$file;

    if (file_exists($fileDel)) {
        
        if (!unlink('$fileDel')) {
    
            addError ($file, 'File not delete');
        }
    
    } else {
        
        addError ($file, 'The file does not exist');
    }

}

function readDirr() 
{
    $fileArray = array();
    
    if ($handle = @opendir(UPLOAD_DIR)) {
    
         while (false !== ($file = readdir($handle))) { 

            if ($file != "." && $file != "..") { 
                
                $fileSize = getSize($file);
                
                $fileArray .= array($file => $fileSize); 
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
    
    if ($size < 1024) {
        
        $returnSize = $size . " bytes";
        
    } else if ($file > 1024 &&  $file < 1048576) {
    
        $returnSize = $size/1024 . " kB";
    
    } else {
        
        $returnSize = $size/1048576 . " MB";
    }
    
    return $returnSize;
}





function addError ($fileName, $error)
{
    $addError = 'define("'.$fileName.'", "'.$error.'")'. "\n\n";
   
    file_put_contents(ERROR_FILE, $addError, FILE_APPEND | LOCK_EX);
}


