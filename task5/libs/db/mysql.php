<?php

include_once 'LibSQL.php';

class MySQL extends LibSQL
{
	protected $dbType;
	protected $pass;
	protected $user;

	public function __construct()
    {
        try {
	        $this->db = DB;
        	$this->dbType = DB_TYPE_MYSQL;
            $this->pass = DB_PASSWORD;
            $this->user = DB_USER;

            parent::__construct();
        }
        catch(PDOException $e)
        {
            $this->errorMessage = DB_NOT_CONNECT .$e->getMessage();
        }
    }

	/**
	 * 'Limit' method for mysql
	 *
	 * @param bool $start
	 * @param bool $end
	 * @return bool|string
	 */
	public function limit($start = false, $end = false)
	{
		if (is_numeric($start) && is_numeric($end))
			$result = ' LIMIT ' . (int)$start.','. (int)$end;
		else if (is_numeric($start))
			$result = ' LIMIT ' . (int)$start;

		$this->limit = $result;
		return true;
	}

	/**
	 * Add Quotes and slashes in fields
	 *
	 * @param $forQuotes
	 * @return string
	 */
	protected function fieldQuotes($forQuotes)
	{
		return '`'.addslashes($forQuotes).'`';
	}

}
