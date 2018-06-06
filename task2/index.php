<?php

include_once 'libs/calculator.php';

$calc = new Calculator();

$a = 7;
$b = 3;
$mem = 0;

$calc->setDate($a, $b, $mem);

$datas = array(
    "$a + $b = " => $calc->summ(),
    "$a - $b = " => $calc->sub(),
    "$a * $b = " => $calc->multi(),
    "$a / $b = " => $calc->div(),
    "1/$a = " => $calc->divOne(),
    "$b% of $b = " => $calc->percent(),
    "Mem + $mem " => $calc->memAdd(4),
    "Mem - $mem " => $calc->memSub(5),
    "Mem Show " => $calc->memShow(),
    "Mem Clean " => $calc->memClean(),
);


include_once 'templates/index.php';
