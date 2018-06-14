<?php

class ValidModel
{
	private $error;

	public function __construct()
	{
		$this->error = false;
	}

	public function getError()
	{
		return $this->error;
	}

	public function checkEmail($email)
    {	    
		if (preg_match( '/^[-0-9a-z_\.]+@[-0-9a-z^\.]+\.[a-z]{2,4}$/i',$email))
			return true;
		else
			$this->error = true;
		return false;
    }
	
	public function checkName($name)
	{
        if (preg_match("/^[a-zA-Z0-9_]{3,30}$/",$name))
            return true;
		else
			$this->error = true;
		return false;
	}
   
	public function checkDep($dep, $data)
	{
        if (array_key_exists($dep, $data))
            return true;
		else
			$this->error = true;
		return false;
	}

	public function checkMessade($message)
	{
		if ($this->checkLength($message, 10, 1000))
            return true;
		else
			$this->error = true;
		return false;
	}

	public function checkDate($date)
	{
		if ($this->checkLength($date, 30, 50))
			return true;
		else
			$this->error = true;
		return false;
	}



	private function checkLength($value = "", $min, $max)
	{
		if (mb_strlen($value) >= $min && mb_strlen($value) <= $max)
			return true;
		else
			return false;
	}
}