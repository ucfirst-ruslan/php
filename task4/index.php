<?php ini_set('display_errors', 1);


include_once 'libs/db_config.php';
include_once 'libs/error_config.php';

include_once 'libs/mysql.php';
include_once 'libs/pgsql.php';

$mysql = new MySQL();

$mysql->where('userid', 'user11');
$mysqlSelect = $mysql->select(DB_TABLE_MYSQL, ['userdata']);

$mysqlInsert = $mysql->insert(DB_TABLE_MYSQL, [
	'userid'=> 'user10',
     'userdata'=>'Some text'
]);


$mysql->where('id', '16');
$mysqlUpdate = $mysql->update(DB_TABLE_MYSQL, [
	'userid'=> 'user10',
	'userdata'=>'Some anoter text'
]);


$mysql->where('id', '14');
$mysqlDelete = $mysql->delete(DB_TABLE_MYSQL);


//$pgsql = new PgSQL();
//
//$pgsql->where('userid', 'user11');
//$pgsqlSelect = $pgsql->select(DB_TABLE_PGSQL, ['userdata']);
//
//$pgsqlInsert = $pgsql->insert(DB_TABLE_PGSQL, [
//	'userid'=> 'user10',
//	'userdata'=>'Some text'
//]);
//
//
//$pgsql->where('id', '16');
//$pgsqlUpdate = $pgsql->update(DB_TABLE_PGSQL, [
//	'userid'=> 'user10',
//	'userdata'=>'Some anoter text'
//]);
//
//
//$pgsql->where('id', '14');
//$pgsqlDelete = $pgsql->delete(DB_TABLE_PGSQL);




$errorMysql = $mysql->getErrorMessage();
//$errorPgsql = $pgsql->getErrorMessage();

$title = "DataBase Class";

include_once 'templates/index.php';
