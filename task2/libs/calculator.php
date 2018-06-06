<?php

class Calculator
{
    private $a;
    private $b;
    private $mem;
    private $error;

    public function setDate($a = 0, $b = 0, $mem = 0)
    {
        if (is_int($a) && is_int($b) && is_int($mem)) {
            $this->a = $a;
            $this->b = $b;
            $this->mem = $mem;

        } else {
            $this->error = 'Это не число';
            $this->writeError('SET_NUM_');
        }
    }

    public function getError()
    {
        if (!empty($this->error))
            return $this->error;
        else
            return false;
    }


    public function summ()
    {
        return $this->a + $this->b;
    }

    public function sub()
    {
        return ($this->a - $this->b);
    }

    public function div()
    {
        if (0 < $this->a) {
            return $this->a / $this->b;
        } else {
            $this->error = 'Нельзя делить на ноль';
            $this->writeError('DIV_');
            return $this->error;
        }
    }

    public function multi()
    {
        return $this->a * $this->b;
    }

    public function square()
    {
        return sqrt($this->a);
    }

    public function divOne()
    {
        if (0 < $this->a) {
            return 1 / $this->a;
        } else {
            $this->error = 'Операция невозможна';
            $this->writeError('DIVONE_');
            return $this->error;
        }
    }

    public function percent()
    {
        return $this->a / 100 * $this->b;
    }

    public function memAdd($mem = 0)
    {
        return $this->mem += $mem;
    }

    public function memSub($mem = 0)
    {
        return $this->mem -= $mem;
    }

    public function memShow()
    {
        return $this->mem;
    }

    public function memClean()
    {
        return $this->mem = 0;
    }






    public function writeError($func)
    { echo "error";
        $addError = "define('".$func.time()."', '".$this->error."');\n";

        file_put_contents("config.php", $addError, FILE_APPEND | LOCK_EX);
    }


}
