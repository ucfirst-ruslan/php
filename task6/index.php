<?php ini_set('display_errors', 1);

include_once 'libs/Instrument.php';

$guitar = new Instrument();
$guitar->setName('Guitar');
$guitar->setCategory('String instrument');

$guitarBass = new Instrument();
$guitarBass->setName('Bass Guitar');
$guitarBass->setCategory('String instrument');

$Drums = new Instrument();
$Drums->setName('Drums');
$Drums->setCategory('Drumkit instrument');



$myz = new Musician();

$myz->addInstrument($guitar);





$test = [];
array_push($test[], $guitar);

var_dump($test);