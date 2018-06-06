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
     * @param array|bool $file
     */
    public function getString()
    {
        preg_split('/(?<!^)(?!$)/u', $data);
    }

}