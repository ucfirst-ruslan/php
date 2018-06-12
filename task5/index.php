<?php //ini_set('display_errors', 1);
include_once 'libs/config.php';
include_once 'libs/cookies.php';
include_once 'libs/session.php';
include_once 'libs/db.php';


$key = 'userid';
$val = 'user10';

$cookies = new Cookies();

if (!$cookiesSet = $cookies->saveData($key, $val))
	$cookiesSet = SET_ERROR;
else
	$cookiesDel = 'Deleted';

$cookiesGet = $cookies->getData($key);

if($cookies->deleteData($key))
	$cookiesDel = DELETED;


$session = new Session();

if (!$sessionSet = $session->saveData($key, $val))
	$sessionSet = SET_ERROR;

$sessionGet = $session->getData($key);

if($session->deleteData($key))
	$sessionDel = DELETED;


$sql = new DB();

$saveDB = $sql->saveData($key, $val);
$getDB =  $sql->getData($key);
$sql->setVal($val);
$deleteDB = $sql->deleteData($key);


$title = 'Cookies, Sessions, DB';

include_once TEMPLATE_DIR.TEMPLATE_FILE;

