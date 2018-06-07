<?php

/**
 * Функция загрузки файла. Возвращает сообщение пользователю
 * PS Код требует оптимизации по части ветвлений.
 * @return array
 */
function upload() 
{
    $error = '';
    $messForUser = array();

    if ($_FILES['file']['size'] > FILE_SIZE)
    {
        $error = UPLOAD_SIZE;
    } else 
    {
        $fileName = checkFileName ($_FILES['file']['name']);
        $newFileName = UPLOAD_DIR."/". $fileName;

        if (!move_uploaded_file($_FILES['file']['tmp_name'], $newFileName)) 
        {
            $error = UPLOAD_ERROR;
        } else 
        {
            if (!setChmodFile($newFileName))
            {
                $error = UPLOAD_CHMOD;
            }
            $messForUser['success'] = UPLOAD_SUCCES;
        }
    }

    $messForUser['error'] = $error;

    return $messForUser;
}

/**
 * Функция проверки имени. В случае наличия дубликата дописывает к имени _#
 * Несовершенна, требует доработки (проверка наличия двойных расширений)
 * Возвращает имя файла.
 * @param $filename
 * @return string
 */
function checkFileName ($filename)
{
    $dirFile = UPLOAD_DIR."/".$filename;

    if (file_exists($dirFile)) 
    {
        $file = explode(".", $filename);
        $fileTmp = explode("_", $file[0]);
        $countArray = count($fileTmp) -1;

        if (is_numeric($fileTmp[$countArray]))
        {
            $fileTmp[$countArray]++;
            $file[0] = implode("_", $fileTmp);

        } else 
        {
            $file[0] = $file[0] ."_1";
        }

        $filename = implode(".", $file);
    }

    if (file_exists(UPLOAD_DIR."/".$filename)) 
    {
        $filename = checkFileName ($filename);
    }
    return $filename;
}

/**
 * Устанавливает права на только что загруженный файл
 * Возвращает булевое значение.
 * @param $fileName
 * @return bool
 */
function setChmodFile($fileName)
{
    return @chmod($fileName, 0777);
}

/**
 * Проверка прав доступа к директории.
 * Права не изменяю, потому, что вероятен сценарий,
 * когда загрузку запретил администратор и понизил права.
 *
 * @return bool|string
 */
function chmodCheckDir()
{
    $dirChmod = substr(sprintf('%o', fileperms(UPLOAD_DIR)), -4);

    if ($dirChmod != '0777') 
    {echo 'test';
        $messForUser['error'] = CHMOD_DIR;

        return $messForUser;

    }
    return false;
}


/**
 * Функция удаления файла.
 *
 * @param $file
 * @return string
 */
function deleteFile ($file) 
{
    $fileDel = UPLOAD_DIR."/".$file;

    if (!($messForUser = chmodCheckDir())) 
    {
        if (file_exists($fileDel)) 
        {
            if (!unlink($fileDel)) 
            {
                $error = DELETE_FILE_ERROR;
            } else {
                $messForUser['success'] = DELETE_SUCCES;
            }

        } else 
        {
            $error = DELETE_FILE_NOT;
        }
    }

    if (empty($error)) 
    {
        return $messForUser;
    } else 
    {
        $messForUser['error'] = $error;

        return $messForUser;
    }
}

/**
 * Листинг директории. Возвращает массив fileName => fileSize
 * @return array
 */
function readDirr()
{
    $fileArray = array();
    if ($handle = opendir(UPLOAD_DIR))
    {
        while (false !== ($file = readdir($handle)))
        {
            if ($file != "." && $file != "..")
            {
                $fileSize = getSize($file);
                $fileArray[$file] = $fileSize;
            }
        }
        closedir($handle);
    }
    return $fileArray;
}


/**
 * Получение размера файла в человекопонятном формате
 * Для ГБ и т.д. не делал, потому, что это выходит за рамки ограничений сервера.
 * @param $file
 * @return string
 */
function getSize ($file)
{
    $fileDir = UPLOAD_DIR."/".$file;
    $size = filesize($fileDir);

    switch ($size)
    {
        case (1024 > $size):
            $returnSize = round($size, 2)." bytes";
            break;

        case (1024 < $size && 1048576 > $size):
            $returnSize = round($size/1024, 2)." kB";
            break;

        case (1048576 < $size):
            $returnSize = round($size/1048576, 2)." MB";
            break;
    }
    return $returnSize;

}
