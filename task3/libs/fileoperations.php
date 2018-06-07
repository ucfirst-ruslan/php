<?php

class FileOperations
{
    private $file;
    private $newFile;
    private $error;


    /**
     * FileOperatins constructor.
     *
     * @param $pathFile
     */
    public function __construct()
    {
        $this->error = array();
        $this->file = file(FILE_FOR_READ);
        $this->newFile = $this->file;
    }

    public function getData($numLine, $numSymbol = NULL)
    {
//        var_dump($numSymbol);
        if ($numSymbol === NULL)
            return $this->getLine($numLine);
        else
            return $this->getSymbol($numLine, $numSymbol);
    }

    public function setData($replace, $numLine, $numSymbol = NULL)
    {
        if ($numSymbol === NULL)
            return $this->lineReplace($replace, $numLine);
        else
            return $this->symbolReplace($replace, $numLine, $numSymbol);
    }

    /**
     * Get string
     *
     * @param $numPosition int
     * @return mixed|string
     */
    private function getLine($numLine)
    {
        if (!empty($this->file[$numLine]))
        {
            $result = $this->file[$numLine];
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
     *
     * @param $numLine
     * @param $numSymbol
     * @return bool
     */
    private function getSymbol($numLine, $numSymbol)
    {
        $line = $this->getLine($numLine);

        if (!empty($line[$numSymbol]))
        {
            $result = $line[$numSymbol];
        }
        else
        {
            $this->error = ['Get Symbol' => ERROR_NUM_SYMBOL];
            $result = false;
        }
        return $result;
    }

    /**
     * Replase line
     *
     * @param $numLine
     * @param $lineReplace
     * @return array|bool
     */
    private function lineReplace($lineReplace, $numLine)
    {
        $lineReplace = trim($lineReplace);

        if (!empty($this->file[$numLine]))
        {
            $this->newFile[$numLine] = $lineReplace.PHP_EOL;
            $this->writeFile();
            $result = $this->newFile;
        }
        else
        {
            $this->error = ['Line Replace' => ERROR_LINE_REPLACE];
            $result = false;
        }
        return $result;
    }


    /**
     * Replace Symbol
     *
     * @param $numLine
     * @param $numSymbol
     * @param $symbolReplace
     * @return array|bool
     */
    private function symbolReplace($symbolReplace, $numLine, $numSymbol)
    {
        if (!empty($this->file[$numLine][$numSymbol]))
        {
            $this->newFile[$numLine][$numSymbol] = $symbolReplace;
            $this->writeFile();
            $result = $this->newFile;
        }
        else
        {
            $this->error = ['Symbol Replace' => ERROR_SYMBOL_REPLACE];
            $result = false;
        }
        return $result;
    }

    /**
     * Write new file
     */
    private function writeFile()
    {
        file_put_contents(NEW_FILE, $this->newFile,LOCK_EX);
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
}
