<?php
declare(strict_types=1);

namespace App;

use App\Classes\Autoloader;
use Classes\DependencyInjectionContainer;
use Repository\ConcertRepository;
use Repository\GroupRepository;
use Repository\InstrumentRepository;
use Repository\MusicianRepository;

require '../vendor/autoload.php';
require 'Classes/Autoloader.php';
Autoloader::register();

$container = new DependencyInjectionContainer();
$callAPI = $container->getCallAPI();

$instrumentsR = new InstrumentRepository($callAPI);
$musiciansR = new MusicianRepository($instrumentsR);
$groupsR = new GroupRepository($musiciansR);
$concertsR = new ConcertRepository($groupsR);

//var_dump($concertsR->getAll());
//var_dump($groupsR->getAll());
var_dump($musiciansR->getAll());
//var_dump($instrumentsR->getAll());