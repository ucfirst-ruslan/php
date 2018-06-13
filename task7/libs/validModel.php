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
			return 	$email;
		else
			$this->error = true;
		return false;
    }
	
	public function checkName($name)
	{
        if (preg_match("/^[a-zA-Z0-9_]{3,30}$/",$name))
            return $name;
		else
			$this->error = true;
		return false;
	}
   
	public function checkDep($dep, $data)
	{
//		$options = array(
//			'department_1'  => DEPARTMENT_1,
//			'department_2'  => DEPARTMENT_2,
//			'department_3'  => DEPARTMENT_3
//		);

        if (array_key_exists($dep, $data))
            return $dep;
		else
			$this->error = true;
		return false;
	}

	public function checkMessade($message)
	{
        if ($message)
            return htmlspecialchars(trim($message));
		else
			$this->error = true;
		return false;
	}
}