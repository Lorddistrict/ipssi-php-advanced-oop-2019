<?php
declare(strict_types=1);

namespace Repository;

use Entity\Concert;
use Faker\Factory;

class ConcertRepository
{
    /** @var GroupRepository $groupRepository */
    private $groupRepository;

    /** @var array $concert */
    private $concert = [];

    /**
     * ConcertRepository constructor.
     * @param GroupRepository $groupRepository
     */
    public function __construct(GroupRepository $groupRepository)
    {
        $this->groupRepository = $groupRepository;
        $faker = Factory::create();

//        for($i = 1; $i < round(rand(6, 11)); $i++){

        // Génère 2 Concerts
        for($i = 1; $i < 3; $i++){
            $this->concert[] = [
                'id' => $i,
                'name' => $faker->word,
                'groups' => $this->groupRepository->findForConcert($i),
            ];
        }
    }

    /**
     * @return Concert[]
     */
    public function getAll (): array
    {
        return $this->concert;
    }
}