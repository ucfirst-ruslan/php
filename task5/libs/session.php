<?php

class Session implements iWorkData
{
	public function __construct()
	{
		session_start();
	}

	public function getData($key)
	{
		return $_SESSION[$key];
	}

	public function saveData($key, $val)
	{
		$_SESSION[$key] = $val;
		return $_SESSION[$key];
	}

	public function deleteData($key)
	{
		$_SESSION[$key] = '';
		return $_SESSION[$key];
	}
}

