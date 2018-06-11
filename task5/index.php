<?php ini_set('display_errors', 1);

include_once 'libs/cookies.php';
include_once 'libs/session.php';
include_once 'libs/db.php';


$key = 'userid';
$val = 'user10';

$cookies = new Cookies();

$cookies->saveData($key, $val);
$cookies->getData($key);
$cookies->deleteData($key);
$cookiesWork = 'ok';

$session = new Session();
$saveSession = $session->saveData($key, $val);
$getSession = $session->getData($key);
if(!$session->deleteData($key))
{
	$deleteSession = 'ok';
}

$sql = new DB();
$saveDB = $sql->saveData($key, $val);
$getDB =  $sql->getData($key);
$sql->setVal($val);
$deleteDB = $sql->deleteData($key);


$title = 'Cookies, Sessions, DB';

include_once 'templates/index.php';

