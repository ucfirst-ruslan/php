#!/bin/bash

dir_file=$(find ./tests -path *.php -type f)

for file in $dir_file
	do
		echo "======  START test file $file  ======" >> tests.log
		echo "start test $file"
		result=$(./phpunit-3.7.phar $file)
		echo "$result" >> tests.log
		echo "============= END test ==============" >> tests.log
		echo " " >> tests.log
		echo " " >> tests.log
		echo "$result"
	done
	
	
	
	echo "======  START test file $file  ======" >> tests.log
	echo "start test $file"
		result=$(./phpunit-3.7.phar $file)
	echo "$result" >> tests.log
	echo "============= END test ==============" >> tests.log
	echo " " >> tests.log
	echo " " >> tests.log
