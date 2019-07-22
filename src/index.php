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

$concerts = $concertsR->getAll();
echo(json_encode($concerts, JSON_UNESCAPED_UNICODE));