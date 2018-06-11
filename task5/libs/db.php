<?php

include_once 'db/db_config.php';
include_once 'db/error_config.php';
include_once 'iworkdata.php';
include_once 'db/mysql.php';


class DB implements iWorkData
{
	private $mysql;
	private $val;

	public function __construct()
	{
		$this->mysql = new MySQL();
	}

	public function setVal($val)
	{
		$this->val = $val;
	}

	public function saveData($key, $val)
	{
		return $this->mysql->insert(DB_TABLE_MYSQL, [
			$key => $val
		]);
	}

	public function getData($key)
	{
		$get = $this->mysql->select(DB_TABLE_MYSQL, [$key]);
		return $get[$key];
	}

	public function deleteData($key)
	{
		$this->mysql->where($key, $this->val);
		return $this->mysql->delete(DB_TABLE_MYSQL);
	}
}
