<?php
declare(strict_types=1);

use Classes\CallAPI;
use Classes\RandomGroupName;
use Controller\Concert\AddConcertController;
use Controller\Instrument\GetAllInstrumentsController;
use Controller\Instrument\GetOneInstrumentController;
use Controller\Musician\AddMusicianController;
use Entity\Concert;

require 'Classes/Autoloader.php';
Autoloader::register();

/** @var CallAPI $callAPI */
$callAPI = new CallAPI();

// First get all instruments from the API

/** @var GetAllInstrumentsController $getInstruments */
$instrumentController = new GetAllInstrumentsController();
/** @var array $allInstruments */
$allInstruments = $instrumentController->getAllInstruments($callAPI);

// Then create a Concert

$randomGroupName = new RandomGroupName();
/** @var AddConcertController $concertController */
$concertController = new AddConcertController();
$concert = $concertController->addConcert($randomGroupName);



$instrumentController = new GetOneInstrumentController();
$instrumentController->getOneInstrument($allInstruments);


/** @var AddMusicianController $musicianController */
$musicianController = new AddMusicianController();
$musician = $musicianController->addMusician();

//var_dump($allInstruments);