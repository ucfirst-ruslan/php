<?php
# http://192.168.0.15/~user10/php/task2/

class Calculator
{
    private $a;
    private $b;
    private $error;

private function summ()
{
    return $this->a + $this->b;
}

private function sub()
{
    return $this->a - $this->b;
}

private function div()
{
    if ($this->a > 0)? return $this->a / $this->b : $this->error = 'Нельзя делить на ноль';
}

private function multi()
{
    return $this->a * $this->b;
}

private function square()
{
    return sqrt($this->a);
}

private function devOne()
{
    return 1/$this->a;
}

private function percent()
{
    return $this->a /100 * $this->b;
}




public function getError()
{
    if (isset($this->error))? return $this->error : return false;
}

public function setDate($a, $b)
{
    if (is_int($a))? $this->a = $a : $this->error = 'Это не число'; 

    if (is_int($b))? $this->b = $b : $this->error = 'Это не число';
}

private function writeError ($tranferError)
{
    $addError = "define('".$df;lsgk:wq."', '".$error."');\n";
    file_put_contents("config.php", $addError, FILE_APPEND | LOCK_EX);   
}



}
