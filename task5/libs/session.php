<?php

class Session implements iWorkData
{
	public function __construct()
	{
		session_start();
	}

	public function getData($key)
	{
		if (isset($_SESSION[$key]))
			return $_SESSION[$key];
		else
			return false;
	}

	public function saveData($key, $val)
	{
		$_SESSION[$key] = $val;
		return $_SESSION[$key];
	}

	public function deleteData($key)
	{
		if (isset($_SESSION[$key]))
			unset ($_SESSION[$key]);
		return true;
	}
}

