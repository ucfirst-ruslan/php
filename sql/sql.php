<?php ini_set('display_errors', 1);

$servernameM = "127.0.0.1";
$usernameM = "root";
$passwordM = "root";
$dbnameM = "MY_TEST";

$servername = "localhost";
$username = "ruslan";
$password = "'";
$dbname = "user1";

try {
	$pdoMy  = new PDO("mysql:host=$servernameM;dbname=$dbnameM", $usernameM, $passwordM);
	$pdoMy->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$pdoPg  = new PDO("pgsql:host=$servername;dbname=$dbname", $username, $password);
	$pdoPg->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


	$lorem = '_sum odio molestie ipsum pharetra sed rutrum at eu at duis enim non mauris cursus massa ipsu.';

	$start = 1;
	$step = 1000;
	for ($r=1; $r <= 1000; $r++) {

		$end = $step * $r;

		while ($start <= $end)
		{
			echo $start ."<br>";

			$loremRes = $start . $lorem;
			$loremRes = str_pad($loremRes, 100, "0", STR_PAD_LEFT);
			$array[] = "('" . $start . "', '" . $loremRes . "', '" . $loremRes . $loremRes . $loremRes.$loremRes.$loremRes."')";

			$start++;
		}

		$val = implode(",", $array);

		$sqlMy = 'INSERT INTO test (`id`, `name`, `description`) VALUES '.$val;
		$sqlPg = 'INSERT INTO test ("id", "name", "description") VALUES '.$val;

		unset ($array);
		unset ($val);
		$pdoMy->exec($sqlMy);
		$pdoPg->exec($sqlPg);


		if ($start == 1000000)
			break;
	}
	echo "<br><br>New record created successfully";
}
catch(PDOException $e)
{
	echo "MySQL: ".$sqlMy . "<br>" . $e->getMessage();
	echo "PgSQL: ".$sqlPg . "<br>" . $e->getMessage();
}

$conn = null;

/*\copy zip_codes(ZIP,CITY,STATE) FROM '/path/to/csv/ZIP_CODES.txt' DELIMITER ',' CSV


CREATE TABLE "public"."test" (
"id" integer,
    "name" character varying(255),
    "description" text
);*/

