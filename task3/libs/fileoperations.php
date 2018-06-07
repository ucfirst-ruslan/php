<?php

class FileOperations
{
    /**
     * Variable for file
     * @var array|bool
     */
    private $file;
    private $error;

    /**
     * FileOperatins constructor.
     *
     * @param $pathFile
     */
    public function __construct($pathFile)
    {
        $this->file = file ($pathFile, FILE_IGNORE_NEW_LINES);
        $this->error = array();
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
     * Get string
     *
     * @param $numPosition int
     * @return mixed|string
     */
    public function getString($numLine)
    {
        echo $numLine . "<br>";
        $getNumLines = $this->getCountItem($this->file);
        echo $getNumLines . "<br>";

        if ($getNumLines > $numLine && is_numeric($numLine))
        {
            echo "<pre>";
            $data = explode(PHP_EOL, $this->file);
            echo $data[1];
            $result = $this->file()[4];
            echo $result;

            echo "</pre>";
        }
        else
        {
            $this->error = ['Get String' => ERROR_NUM_STRING];
            $result = false;
        }
        return $result;
    }

    /**
     * Get symbol
     * @param $numLine
     * @param $numSymbol
     * @return bool
     */
    public function getSymbol($numLine, $numSymbol)
    {
        $string = $this->getString(4);
        $numSymbolLine = $this->getCountItem($string) -1;

        if ($string && $numSymbol < $numSymbolLine )
        {
            $result = $string[$numSymbolLine];
        }
        else
        {
            $this->error = ['Get Symbol' => ERROR_NUM_SYMBOL];
            $result = false;
        }
        return $result;
    }


    /**
     * Return error
     *
     * @return array
     */
    public function getError()
    {
        return $this->error;
    }

    /**
     * Get num string|symbol
     *
     * @param $item
     * @return int
     */
    private function getCountItem($item)
    {
        return count($item);
    }

    /**
     * Unset file variable
     */
    private function __destruct()
    {
        unset($this->file);
    }
}
