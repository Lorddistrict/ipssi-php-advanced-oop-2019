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

use Application\Factory\ClassificationControllerFactory;
use Application\Factory\ClassificationRepositoryFactory;
use Application\Factory\ConcertControllerFactory;
use Application\Factory\ConcertRepositoryFactory;
use Application\Factory\DateTimeImmutableFactory;
use Application\Factory\DbConfigProviderFactory;
use Application\Factory\FamilyControllerFactory;
use Application\Factory\FamilyRepositoryFactory;
use Application\Factory\GenreControllerFactory;
use Application\Factory\GenreRepositoryFactory;
use Application\Factory\GroupControllerFactory;
use Application\Factory\GroupRepositoryFactory;
use Application\Factory\IndexControllerFactory;
use Application\Factory\InstrumentControllerFactory;
use Application\Factory\InstrumentRepositoryFactory;
use Application\Factory\MusicianControllerFactory;
use Application\Factory\MusicianRepositoryFactory;
use Application\Factory\ParseUriHelperFactory;
use Application\Factory\PdoConnectionFactory;
use Application\Factory\RouterFactory;
use Application\Factory\SubFamilyControllerFactory;
use Application\Factory\SubFamilyRepositoryFactory;

use Application\Provider\DbConfigProvider;

use Application\Repository\ClassificationRepository;
use Application\Repository\ConcertRepository;
use Application\Repository\FamilyRepository;
use Application\Repository\GenreRepository;
use Application\Repository\GroupRepository;
use Application\Repository\InstrumentRepository;
use Application\Repository\MusicianRepository;
use Application\Repository\SubFamilyRepository;

use Application\Router\ParseUriHelper;
use Application\Router\Router;

return [
    'factories' => [
        // Configuration du "framework applicatif"
        ParseUriHelper::class   => ParseUriHelperFactory::class,
        Router::class           => RouterFactory::class,
        PDO::class              => PdoConnectionFactory::class,
        DbConfigProvider::class => DbConfigProviderFactory::class,

        // Default (maybe not required)
        IndexController::class      => IndexControllerFactory::class,
        DateTimeInterface::class    => DateTimeImmutableFactory::class,

        // Classifications
        ClassificationController::class => ClassificationControllerFactory::class,
        ClassificationRepository::class => ClassificationRepositoryFactory::class,

        // Concerts
        ConcertController::class => ConcertControllerFactory::class,
        ConcertRepository::class => ConcertRepositoryFactory::class,

        // Families
        FamilyController::class => FamilyControllerFactory::class,
        FamilyRepository::class => FamilyRepositoryFactory::class,

        // Genres
        GenreController::class => GenreControllerFactory::class,
        GenreRepository::class => GenreRepositoryFactory::class,

        // Groups
        GroupController::class => GroupControllerFactory::class,
        GroupRepository::class =>GroupRepositoryFactory::class,

        // Instruments
        InstrumentController::class => InstrumentControllerFactory::class,
        InstrumentRepository::class => InstrumentRepositoryFactory::class,

        // Musicians
        MusicianController::class => MusicianControllerFactory::class,
        MusicianRepository::class => MusicianRepositoryFactory::class,

        // SubFamilies
        SubFamilyController::class => SubFamilyControllerFactory::class,
        SubFamilyRepository::class => SubFamilyRepositoryFactory::class,
    ],
];