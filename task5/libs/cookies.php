<?php

include_once 'iworkdata.php';

class Cookies implements iWorkData
{

	public function getData($key)
	{
		if (isset($_COOKIE[$key]))
			return $_COOKIE[$key];
		else
			return false;
	}

	public function saveData($key, $val)
	{
		setcookie($key, $val, time() + 3600);
		$_COOKIE[$key] = $val;
		return $_COOKIE[$key];
	}

	public function deleteData($key)
	{
		setcookie($key, '', time() - 3600);
		unset ($_COOKIE[$key]);
		return true;
	}
}
