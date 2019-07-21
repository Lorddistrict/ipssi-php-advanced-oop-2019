<?php
declare(strict_types=1);

namespace Repository;

use Entity\Concert;
use Entity\Group;
use Faker\Factory;

class GroupRepository
{
    private $musicianRepository;
    private $groups = [];

    public function __construct (MusicianRepository $musicianRepository)
    {
        $this->musicianRepository = $musicianRepository;
        $faker = Factory::create ();

//        for($i = 1; $i < round (rand (21, 41) ); $i++){

        // Génère 4 Groupes
        for($i = 1; $i < 5; $i++){
            $this->groups[] = [
                'id' => $i,
                'name' => $faker->word,
                'musicians' => $this->musicianRepository->findForGroup ($i),
                'concert_id' => rand(1, 2),
            ];
        }
    }

    /**
     * @return Group[]
     */
    public function getAll (): array
    {
        return $this->groups;
    }

    /**
     * @param int $id
     * @return Concert[]
     */
    public function findForConcert (int $id): array
    {
        $result = [];

        foreach ($this->groups as $key => $group) {

            if ( $group['concert_id'] == $id ) {
                $result[] = $group;
            }
        }

        return $result;
    }
}