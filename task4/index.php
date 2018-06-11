<?php //ini_set('display_errors', 1);


include_once 'libs/db_config.php';
include_once 'libs/error_config.php';

include_once 'libs/mysql.php';
include_once 'libs/pgsql.php';


$mysql = new MySQL();

$mysqlInsert = $mysql->insert(DB_TABLE_MYSQL, [
	'userid'=> 'user10',
    'userdata'=>'Some text'
]);

$mysql->where('userid', 'user10');
$mysqlSelect = $mysql->select(DB_TABLE_MYSQL, ['userdata']);

$mysql->where('userid', 'user10');
$mysqlUpdate = $mysql->update(DB_TABLE_MYSQL, [
	'userid'=> 'user10',
	'userdata'=>'Some anoter text'
]);

$mysql->where('userid', 'user10');
$mysqlDelete = $mysql->delete(DB_TABLE_MYSQL); 


$pgsql = new PgSQL();

$pgsqlInsert = $pgsql->insert(DB_TABLE_PGSQL, [
	'userid'=> 'user10',
    'userdata'=>'Some text'
]);


$pgsql->where('userid', 'user10');
$pgsqlSelect = $pgsql->select(DB_TABLE_PGSQL, ['userdata']);


$pgsql->where('userid', 'user10');
$pgsqlUpdate = $pgsql->update(DB_TABLE_PGSQL, [
	'userid'=> 'user10',
	'userdata'=>'Some anoter text'
]);


$pgsql->where('userid', 'user10');
$pgsqlDelete = $pgsql->delete(DB_TABLE_PGSQL);


$errorMysql = $mysql->getErrorMessage();
$errorPgsql = $pgsql->getErrorMessage();

$title = "DataBase Class";

include_once 'templates/index.php';
