<?php

include_once 'iworkdata.php';

class Cookies implements iWorkData
{

	public function getData($key)
	{
		if (!empty($_COOKIE[$key]))
			return $_COOKIE[$key];
		else
			return false;
	}

	public function saveData($key, $val)
	{
		setcookie($key, $val, time() + 3600);
		return true;
	}

	public function deleteData($key)
	{
		setcookie($key, '', time() - 3600);
		return true;
	}
}
