<?php

include_once 'iSQL.php';
include_once 'error_config.php';


class libSQL implements iLibSQL
{
    protected $db;  //user1
    protected $dsn;
    protected $pdo;

	protected $select;
	protected $selectDistinct;
	protected $where;
	protected $bind;
	protected $limit;
	protected $joinQuery;
	protected $leftJoin;
	protected $joinIndex;

    public $errorMessage;
    public $errorMessageDB;
	
	public function __construct()
	{
		$this->select = '';
		$this->selectDistinct = '';
		$this->limit = '';
		$this->where = '';
		$this->bind = array();
		$this->joinQuery = array();
		$this->leftJoin = array();
		$this->joinIndex = 1;
		
		
		$this->pdo = null;
		$opt = [
			PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
			PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
			PDO::ATTR_EMULATE_PREPARES   => false
		];
		$dsn = $this->dbType.":host=".DB_HOST.";dbname=".$this->db;
		$this->pdo = new PDO($dsn, $this->user, $this->pass, $opt);
	}


	public function select($columns = '*')
	{
		if ($columns == '*')
		{
			$columns = '*';
		}
		else if (is_array($columns))
		{
			$col[0] = $this->stQuotes($col[0]);
			
			if (strpos($col[1], 'count(') === false)
				$col[1] = $this->stQuotes($col[1]);
			
			$columns = implode(',', $col);
		}
		else
		{ 	// SELECT /`tbl_user`.`id`/, `username` AS `name`
			//select('tbl_user.id, username as name')
			$colArr = explode(",", $columns);
			$col = explode(".", $colArr[0]);
			if (isset($col[1]))
			{	//`tbl_user`.`id`
				$col[0] = $this->stQuotes($col[0]);
				$col[1] = $this->stQuotes($col[1]);
				$colArr[0] = implode('.', $col);
				//`username` AS `name`
				$col = explode(" ", $colArr[1]);
				$col[0] = $this->stQuotes($col[0]);
				$col[2] = $this->stQuotes($col[2]);
				$colArr[1] = implode('.', $col);
				$columns = implode(",", $colArr);
			}
			else
			{	//`id`, `username`
				$colArr = explode(",", $columns);
				$colArr[0] = $this->stQuotes($colArr[0]);
				$colArr[1] = $this->stQuotes($colArr[1]);
				$columns = implode(",", $colArr);
			}
		}
		$this->select = 'SELECT '. $columns;
		return $this;
	}
	
	public function selectDistinct($columns = '*')
	{
		if ($columns == '*')
		{
			$columns = '*';
		}
		else if (is_array($columns))
		{
			$col[0] = $this->stQuotes($col[0]);
			
			if (strpos($col[1], 'count(') === false)
				$col[1] = $this->stQuotes($col[1]);
			
			$columns = implode(',', $col);
		}
		else
		{ 	// SELECT /`tbl_user`.`id`/, `username` AS `name`
			//select('tbl_user.id, username as name')
			$colArr = explode(",", $columns);
			$col = explode(".", $colArr[0]);
			if (isset($col[1]))
			{	//`tbl_user`.`id`
				$col[0] = $this->stQuotes($col[0]);
				$col[1] = $this->stQuotes($col[1]);
				$colArr[0] = implode('.', $col);
				//`username` AS `name`
				$col = explode(" ", $colArr[1]);
				$col[0] = $this->stQuotes($col[0]);
				$col[2] = $this->stQuotes($col[2]);
				$colArr[1] = implode('.', $col);
				$columns = implode(",", $colArr);
			}
			else
			{	//`id`, `username`
				$colArr = explode(",", $columns);
				$colArr[0] = $this->stQuotes($colArr[0]);
				$colArr[1] = $this->stQuotes($colArr[1]);
				$columns = implode(",", $colArr);
			}
		}
		$this->selectDistinct = 'SELECT DISTINCT '. $columns;
		return $this;
	}
	
	public function where($condition, $bind)
	{// WHERE id=:id1 or id=:id2
	//where('id=:id1 or id=:id2', array(':id1'=>1, ':id2'=>2))
		$this->where = $condition;
		$this-bind['where'] = $bind;
		return $this;
	}
	
	
	// JOIN `tbl_profile` ON user_id=id
	// join('tbl_profile', 'user_id=id')
	
	// LEFT JOIN `pub`.`tbl_profile` `p` ON p.user_id=id AND type=1
	// leftJoin('pub.tbl_profile p', 'p.user_id=id AND type=:type', array(':type'=>1))
	public function join($table, $conditions, $params=array())
	{
		$tab = explode(".", $table);
		$tab[0] = $this->stQuotes($tab[0]);
		
		if ($tab[1])
		{
			$tabt = explode(" ", $tab[1]);
			$tabt[0] = $this->stQuotes($tabt[0]);
			if ($tabt[1])
				$tabt[1] = $this->stQuotes($tabt[1]);
			$tab[1] = implode(" ", $tabt);
		}
		// `pub`.`tbl_profile` `p`
		$table = implode(".", $tab);
		
		$this->joinQuery[$this->joinIndex] = ' JOIN '.$table.' '.$conditions;
		$this-bind['join'][$this->joinIndex] = $params;
		
		$this->joinIndex += 1;
		
		return $this;
	}
	
	public function leftJoin($table, $conditions, $params=array())
	{
		$tab = explode(".", $table);
		$tab[0] = $this->stQuotes($tab[0]);
		
		if ($tab[1])
		{
			$tabt = explode(" ", $tab[1]);
			$tabt[0] = $this->stQuotes($tabt[0]);
			if ($tabt[1])
				$tabt[1] = $this->stQuotes($tabt[1]);
			$tab[1] = implode(" ", $tabt);
		}
		// `pub`.`tbl_profile` `p`
		$table = implode(".", $tab);
		
		$this->leftJoin[$this->joinIndex] = ' LEFT JOIN '.$table.' '.$conditions;
		$this-bind['leftJoin'][$this->joinIndex] = $params;
		
		$this->joinIndex += 1;
		
		return $this;
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
	/* public function where($field, $value, $operator = '=')
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
 */
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