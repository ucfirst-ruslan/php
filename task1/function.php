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
            
        $error = 'Файл слишком большой для загрузки';
    } else 
    {
        $fileName = checkFileName ($_FILES['file']['name']);
        $newFileName = UPLOAD_DIR."/". $fileName;

        if (!move_uploaded_file($_FILES['file']['tmp_name'], $newFileName)) 
        {

            $error = 'Файл не загружен';
        } else 
        {

            if (!setChmodFile($newFileName)) 
            {
                $error = 'Не удалось установить права 777 на файл';
            }

            $messForUser['success'] = 'Файл с именем "' . $fileName . '" загружен!';
        }
    }

    $messForUser['error'] = $error;

    if (!empty($error)) 
    {
        addError('UPLOAD'.'_'.time(), $error);
    }
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

        echo $fileTmp[$countArray];

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
    {
        $error = 'У вас нет прав доступа к директории';
        addError ('CHMOD_CHECK'.'_'.time(), $error);

        $messForUser['error'] = $error;
        return $messForUser;

    } else 
    {
        return false;
    }
}


/**
 * Функция удаления файла.
 * Права на директорию не проверяю. В данном случае посчитал это лишним.
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
                $error = "$file: Файл не может быть удален";
            } else {
                $messForUser['success'] = 'Файл '.$file.' удален!';
            }

        } else 
        {
            $error = "$file: Этого файла не существует";
        }
    }

    if (empty($error)) 
    {
        return $messForUser;
    } else 
    {
        addError ('DELETE_'.time(), $error);
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
        case (1024 < $size && 1048576 > $size):
            $returnSize = round($size/1024, 2) . " kB";
            break;

        case (1048576 < $size):
            $returnSize = round($size/1048576, 2) . " MB";
            break;

        default:
            $returnSize = round($size, 2) . " bytes";
    }

    return $returnSize;
}

/**
 * Функция записи ошибок в конфиг.
 * @param $errorName, $error
 * @param $error
 */
function addError ($errorName, $error)
{
    $addError = "define('".$errorName."', '".$error."');\n";
   
    file_put_contents("config.php", $addError, FILE_APPEND | LOCK_EX);
}


