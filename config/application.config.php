<?php
declare(strict_types=1);

use Application\Controller\ClassificationController;
use Application\Controller\ConcertController;
use Application\Controller\FamilyController;
use Application\Controller\GenreController;
use Application\Controller\GroupController;
use Application\Controller\IndexController;
use Application\Controller\InstrumentController;
use Application\Controller\MusicianController;
use Application\Controller\SubFamilyController;

use Application\Provider\DbConfigProvider;

use Application\Repository\ClassificationRepository;
use Application\Repository\ConcertRepository;
use Application\Repository\FamilyRepository;
use Application\Repository\GenreRepository;
use Application\Repository\GroupRepository;
use Application\Repository\InstrumentRepository;
use Application\Repository\MusicianRepository;
use Application\Repository\SubFamilyRepository;