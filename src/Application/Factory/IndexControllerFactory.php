<?php
declare(strict_types=1);

namespace Application\Factory;

use Application\Controller\IndexController;
use Application\Repository\ClassificationRepository;
use Application\Repository\ConcertRepository;
use Application\Repository\FamilyRepository;
use Application\Repository\GenreRepository;
use Application\Repository\GroupRepository;
use Application\Repository\InstrumentRepository;
use Application\Repository\MusicianRepository;
use Application\Repository\SubFamilyRepository;
use Application\Service\API\MusicAPI;
use Psr\Container\ContainerInterface;

/**
 * Class IndexControllerFactory
 * @package Application\Factory
 */
final class IndexControllerFactory
{
    /**
     * @param ContainerInterface $container
     * @return IndexController
     */
    public function __invoke(ContainerInterface $container) : IndexController
    {
        $classificationRepository = $container->get(ClassificationRepository::class);
        $concertRepository = $container->get(ConcertRepository::class);
        $familyRepository = $container->get(FamilyRepository::class);
        $genreRepository = $container->get(GenreRepository::class);
        $groupRepository = $container->get(GroupRepository::class);
        $instrumentRepository = $container->get(InstrumentRepository::class);
        $musicAPI = $container->get(MusicAPI::class);
        $musicianRepository = $container->get(MusicianRepository::class);
        $subFamily = $container->get(SubFamilyRepository::class);

        return new IndexController($classificationRepository, $concertRepository, $familyRepository,
            $genreRepository, $groupRepository, $instrumentRepository, $musicAPI, $musicianRepository, $subFamily);
    }
}