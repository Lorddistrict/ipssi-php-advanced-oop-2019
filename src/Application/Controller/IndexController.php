<?php
declare(strict_types=1);

namespace Application\Controller;

use Application\Entity\Classification;
use Application\Repository\ClassificationRepository;
use Application\Repository\ConcertRepository;
use Application\Repository\FamilyRepository;
use Application\Repository\GenreRepository;
use Application\Repository\GroupRepository;
use Application\Repository\InstrumentRepository;
use Application\Repository\MusicianRepository;
use Application\Repository\SubFamilyRepository;
use Application\Service\API\API;
use Application\Service\API\MusicAPI;
use Faker\Factory;

/**
 * Class IndexController
 * @package Application\Controller
 */
final class IndexController
{
    /** @var ClassificationRepository */
    private $classificationRepository;

    /** @var ConcertRepository */
    private $concertRepository;

    /** @var FamilyRepository */
    private $familyRepository;

    /** @var GenreRepository */
    private $genreRepository;

    /** @var GroupRepository */
    private $groupRepository;

    /** @var InstrumentRepository */
    private $instrumentRepository;

    /** @var API */
    private $musicAPI;

    /** @var MusicianRepository */
    private $musicianRepository;

    /** @var SubFamilyRepository */
    private $subFamily;

    /**
     * IndexController constructor.
     * @param ClassificationRepository $classificationRepository
     * @param ConcertRepository $concertRepository
     * @param FamilyRepository $familyRepository
     * @param GenreRepository $genreRepository
     * @param GroupRepository $groupRepository
     * @param InstrumentRepository $instrumentRepository
     * @param API $musicAPI
     * @param MusicianRepository $musicianRepository
     * @param SubFamilyRepository $subFamily
     */
    public function __construct(ClassificationRepository $classificationRepository,
                                ConcertRepository $concertRepository, FamilyRepository $familyRepository,
                                GenreRepository $genreRepository, GroupRepository $groupRepository,
                                InstrumentRepository $instrumentRepository, API $musicAPI,
                                MusicianRepository $musicianRepository, SubFamilyRepository $subfamilyRepository)
    {
        $this->classificationRepository = $classificationRepository;
        $this->concertRepository = $concertRepository;
        $this->familyRepository = $familyRepository;
        $this->genreRepository = $genreRepository;
        $this->groupRepository = $groupRepository;
        $this->instrumentRepository = $instrumentRepository;
        $this->musicAPI = $musicAPI;
        $this->musicianRepository = $musicianRepository;
        $this->subfamilyRepository = $subfamilyRepository;
    }

    /**
     * @return string
     */
    public function indexAction() : string
    {
        /** @var Factory $faker */
        $faker = Factory::create();

        $tables = [
            'genres',
            'classifications',
            'families',
            'sub_families',
            'instruments',
        ];

        foreach ($tables as $key => $table) {
            $jsonData = $this->musicAPI->callAPI('GET', 'http://51.77.221.45:8090/api/'.$table, false);
            $dataAPI = json_decode($jsonData, true)['hydra:member'];

            foreach ($dataAPI as $index => $data) {

                // remove plural with -ies syntax
                if (substr($table, -3) == 'ies') {
                    $dbTable = strtolower(str_replace('ies', 'y', $table));
                } else {
                    $dbTable = substr_replace($table ,"", -1);
                }

                $dbTable = str_replace('_' ,'', $dbTable);

                $currentRepository = $dbTable . 'Repository';

                //echo('Je taff sur : ' . $currentRepository . ' <===> ' . $data['name'] . '<br>');

                if ($dbTable == 'family') {
                    dd($this->familyRepository->fetchAll());
                }

                // Enter if not already in the database
                if (!$this->$currentRepository->findByName($data['name'])) {
                    $addMethod = 'add' . $dbTable;

                    switch ($dbTable) {
                        case 'classification':
                            $this->$currentRepository->$addMethod($data['name']);
                            break;
                        case 'family':
                            $id = $this->classificationRepository->findById((int)substr($data['classification'],-1))->getId();
                            $this->$currentRepository->$addMethod(
                                $data['name'],
                                $this->classificationRepository->findById($id),
                            );
                            break;
                        case 'genre':
                            $this->$currentRepository->$addMethod($data['name']);
                            break;
                        case 'subfamily':
                            $id = $this->familyRepository->findById((int)substr($data['family'],-1))->getId();
                            $this->$currentRepository->$addMethod(
                                $data['name'],
                                $this->familyRepository->findById($id),
                            );
                            break;
                        case 'instrument':
                            $c = $this->familyRepository->findById((int)substr($data['classification'],-1))->getId();
                            $f = $this->familyRepository->findById((int)substr($data['family'],-1))->getId();
                            $s = $this->familyRepository->findById((int)substr($data['subfamily'],-1))->getId();
                            $this->$currentRepository->$addMethod(
                                $data['name'],
                                $this->classificationRepository->findById($c),
                                $this->familyRepository->findById($f),
                                $this->subfamilyRepository->findById($s),
                            );
                            break;
                    }
                }
            }
        }

        ob_start();
        include __DIR__.'/../../../templates/index.phtml';
        return ob_get_clean();
    }
}