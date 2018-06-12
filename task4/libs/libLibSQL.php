<?php

include_once 'iSQL.php';
include_once 'error_config.php';


class libSQL implements iSQL
{
    protected $db;  //user1
    protected $dsn;
    protected $pdo;

	protected $where;
	protected $limit;

    public $errorMessage;
    public $errorMessageDB;
	
	public function __construct()
	{
		$this->limit = ' LIMIT ' . 1;
		$this->where = [];

		$this->pdo = null;
		$opt = [
			PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
			PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
			PDO::ATTR_EMULATE_PREPARES   => false
		];
		$dsn = $this->dbType.":host=".DB_HOST.";dbname=".$this->db;
		$this->pdo = new PDO($dsn, $this->user, $this->pass, $opt);
	}

	/**
	 * $column = [Author, book]
	 *
	 * @param $table
	 * @param $columns
	 * @return mixed
	 */
	public function select($table, $columns)
	{
		try
		{
			//$tableVerif = $this->verifedTable($table);

			if (is_array($columns))
			{
				$column = [];
				foreach ($columns as $val)
				{
					$column[] = $this->fieldQuotes($val);
				}

				$fields = implode(",", $column);
			}
			else
			{
				$fields = '*';
			}

			$cond = '';
			$value = array();
			$where = '';
			if ($this->where)
			{
				foreach ($this->where as $key=>$val)
				{
					$cond .= $key;
					$value[] = $val;
				}
				$where = ' WHERE '.$cond;
			}

			$sql = 'SELECT '.$fields.' FROM '.$table.$where.$this->limit;

			$stm = $this->pdo->prepare($sql);
			$stm->execute($value);
			return $stm->fetch();
		}
		catch(PDOException $e)
		{
			$this->errorMessage = ERROR_SELECT;
		}
		catch (Exception $e)
		{
			$this->errorMessage = '<br />' . $e->getMessage();
		}
	}

	/**
	 * @param $table
	 * @param array $updateArray
	 * @return int
	 */
	public function update($table, array$updateArray)
	{
		try
		{
			//$tableVerif = $this->verifedTable($table);
			$value = [];
			$column = [];
			if ($updateArray)
			{
				foreach ($updateArray as $key=>$val)
				{
					$column[] = $this->fieldQuotes($key).'=?';
					$value[] = $val;
				}
			}

			$cond = '';
			if ($this->where)
			{
				foreach ($this->where as $key=>$val)
				{
					$cond .= $key;
					$value[] = $val;
				}
			}

			$fields = implode(",", $column);
			$sql = 'UPDATE '.$table.' SET '.$fields.' WHERE '.$cond;

			$stm = $this->pdo->prepare($sql);
			$stm->execute($value);

			return $stm->rowCount();
		}
		catch(PDOException $e)
		{
			$this->errorMessage = ERROR_UPDATE;
		}
		catch (Exception $e)
		{
			$this->errorMessage = '<br />' . $e->getMessage();
		}
	}

	/**
	 * $insertArray = (column => value)
	 *
	 * @param $table
	 * @param array $insertArray
	 * @return string
	 */
	public function insert($table, array$insertArray)
	{
		try
		{
			//$tableVerif = $this->verifedTable($table);
			$column = array();
			$plholder = array();
			$value = array();
			if ($insertArray)
			{
				foreach ($insertArray as $key=>$val)
				{
					$column[] = $this->fieldQuotes($key);
					$plholder[] = '?';
					$value[] = $val;
				}
			}

			$fields = implode(", ", $column);
			$plaseholder = implode(", ", $plholder);

			$sql = 'INSERT INTO '.$table.' ('.$fields.') VALUES ('.$plaseholder.')';
			$stm = $this->pdo->prepare($sql);
			
			return $stm->execute($value);
			//return $this->pdo->lastInsertId();
		}
		catch(PDOException $e)
		{
			$this->errorMessage = ERROR_INSERT;
		}
		catch (Exception $e)
		{
			$this->errorMessage = '<br />' . $e->getMessage();
		}
	}

	/**
	 * @param $table
	 * @return int
	 */
	public function delete($table)
	{
		try
		{
			//$tableVerif = $this->verifedTable($table);

			$cond = '';
			$value = [];
			if ($this->where)
			{
				foreach ($this->where as $key=>$val)
				{
					$cond .= $key;
					$value[] = $val;
				}
			}

			$sql = 'DELETE FROM '.$table.' WHERE '.$cond;

			$stm = $this->pdo->prepare($sql);
			$stm->execute($value);
			return $stm->rowCount();
		}
		catch(PDOException $e)
		{
			$this->errorMessage = ERROR_DELETE;
		}
		catch (Exception $e)
		{
			$this->errorMessage = '<br />' . $e->getMessage();
		}
	}


	/**
	 * @param $field
	 * @param $value
	 * @param string $operator
	 * @return array
	 * @throws Exception
	 */
	public function where($field, $value, $operator = '=')
	{//TODO
		try
		{
			if ($value && $field)
			{
				$arrayOperators = ['=', '<>', '>', '<', '<=', '>='];
				if (!in_array($operator, $arrayOperators))
				{
					$operator = '=';
				}

				$field = $this->fieldQuotes($field);
				$this->where = array($field.$operator.'?' => $value);
				return $this->where;
			}
		}
		catch(PDOException $e)
		{
			$this->errorMessage = ERROR_WHERE_FIELD;
		}
		catch (Exception $e)
		{
			$this->errorMessage = '<br />' . $e->getMessage();
		}
	}

	/**
	 * @param $table
	 * @return mixed
	 * @throws Exception
	 */
	private function verifedTable($table)
	{
		if (!empty($table))
		{
			return $this->fieldQuotes($table);
		}

		throw new Exception(ERROR_FIELD_TABLE.' '.$table);
	}

	/**
	 * @return mixed
	 */
	public function getErrorMessage()
	{
		return $this->errorMessage;
	}
}

//TODO
// В контексте задания код не нужен (, $combined = 'AND')
//		if ($this->where)
//		{
//			$arrayComb = ['AND', 'OR', 'NOT'];
//
//			if (!in_array($combined, $arrayComb))
//			{
//				$combined = 'AND';
//			}
//			$combined = ' '.$combined.' ';
//		}
//		else
//		{
//			$combined = '';
//		}