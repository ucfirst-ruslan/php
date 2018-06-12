<?php //ini_set('display_errors', 1);

include_once 'libs/config.php';
include_once 'libs/Instrument.php';
include_once 'libs/Musician.php';
include_once 'libs/Band.php';


$guitar = new Instrument();
$guitar->setName('Гитара');
$guitar->setCategory('Струнный инструмент');

$guitarBass = new Instrument();
$guitarBass->setName('Басс гитара');
$guitarBass->setCategory('Струнный инструмент');

$drums = new Instrument();
$drums->setName('Барабаны');
$drums->setCategory('Ударный инструмент');

$sintez = new Instrument();
$sintez->setName('Синтезатор');
$sintez->setCategory('Клавишный инструмент');

$myz = new Musician();
$myz->setMusicianName('Тарас Тополя');
$myz->setMusicianType('вокал, тексты');

$myz2 = new Musician();
$myz2->addInstrument($sintez);
$myz2->setMusicianName('Сергей Вусык');
$myz2->setMusicianType('директор, клавишные, аранжировка');

$myz3 = new Musician();
$myz3->addInstrument($guitarBass);
$myz3->setMusicianName('Михаил Чирко');
$myz3->setMusicianType('музыкант');

$myz4 = new Musician();
$myz4->addInstrument($guitar);
$myz4->setMusicianName('Дмитрий Жолудь');
$myz4->setMusicianType('музыкант');

$myz5 = new Musician();
$myz5->addInstrument($drums);
$myz5->setMusicianName('Дмитрий Водовозов');
$myz5->setMusicianType('музыкант');

$band = new Band();
$band->setName('Антитела');
$band->setGenre('поп-рок, альтернативный рок, инди-рок');
$band->addMusician($myz);
$band->addMusician($myz2);
$band->addMusician($myz3);
$band->addMusician($myz4);
$band->addMusician($myz5);


$title = "Паттерн \"Composite\"";
include_once TEMPLATE_DIR.TEMPLATE_FILE;