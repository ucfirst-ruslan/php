<?php

class FileOperatins
{
    private $file;


    /**
     * FileOperatins constructor.
     *
     * @param $pathFile
     */
    public function __construct($pathFile)
    {
        $this->file = @file ($pathFile);
    }

    /**
     * Возвращает файл в виде массива
     * @return array|bool
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * Функция разбиения строки на массив.
     * От операции типа $file[1][5] отказался из-за ее
     * специфики работы с многобайтными кодировками
     *
     * @param
     * return array
     */
    public function getString()
    {
        preg_split('/(?<!^)(?!$)/u', $data);
    }

}