<?php

include_once 'libs/config.php';
include_once 'libs/calculator.php';

$a = 5;
$b = 3;
$mem = 0; //Начальное число в памяти

$calc = new Calculator();
$calc->setDate($a, $b, $mem);

$datas = array(
    "$a + $b = " => $calc->summ(),
    "$a - $b = " => $calc->sub(),
    "$a * $b = " => $calc->multi(),
    "$a / $b = " => $calc->div(),
    "1/$a = " => $calc->divOne(),
    "$b% of $a = " => $calc->percent(),
    "Mem+ " => $calc->memAdd(4), // Введенное число в память
    "Mem- " => $calc->memSub(5), // Введенное число в память
    "Mem Show " => $calc->memShow(),
    "Mem Clean " => $calc->memClean(),
);

$error = $calc->getError();

$title = 'Калькулятор';

include_once 'templates/index.php';
