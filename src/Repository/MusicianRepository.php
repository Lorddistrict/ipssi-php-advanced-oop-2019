<?php
declare(strict_types=1);

namespace Repository;

use Entity\Group;
use Entity\Musician;
use Faker\Factory;

class MusicianRepository
{
    private $instrumentRepository;
    private $musicians = [];

    public function __construct(InstrumentRepository $instrumentRepository)
    {
        $this->instrumentRepository = $instrumentRepository;
        $faker = Factory::create ();

//        for($i = 1; $i < round (rand (41, 81) ); $i++){

        // Génère 12 musiciens
        for($i = 1; $i < 13; $i++){
            $this->musicians[] = [
                'id' => $i,
                'name' => $faker->word,
                'instrument' => $this->instrumentRepository->getRandomInstrument (),
                'group_id' => rand(1, 4),
            ];
        }
    }

    /**
     * @return Musician[]
     */
    public function getAll (): array
    {
        return $this->musicians;
    }

    /**
     * @param int $id
     * @return Group[]
     */
    public function findForGroup(int $id): array
    {
        $result = [];

        foreach ($this->musicians as $index => $musician) {

            if ( $musician['group_id'] == $id ) {
                $result[] = $musician;
            }

        }

        return $result;
    }
}