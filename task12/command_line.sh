#!/bin/bash

for (( i=1; i <= 65; i++ ))
do
	echo "======  START test file $i.php  ======" >> tests.log
	echo "start test #$i"
		result=$(./phpunit-3.7.phar ./tests/$i.php)
	echo "$result" >> tests.log
	echo "================ END =================" >> tests.log
	echo " " >> tests.log
	echo " " >> tests.log

echo "File is $i.php"
done