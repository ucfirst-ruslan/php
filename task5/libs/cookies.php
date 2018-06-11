<?php

include_once 'iworkdata.php';

class Cookies implements iWorkData
{

	public function getData($key)
	{
		return $_COOKIE[$key];
	}

	public function saveData($key, $val)
	{
		return setcookie($key, $val, time() + 3600);
	}

	public function deleteData($key)
	{
		return setcookie($key, '', time() - 3600);
	}
}
