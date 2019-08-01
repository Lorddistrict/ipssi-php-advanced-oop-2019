<?php
declare(strict_types=1);

namespace Application\Repository;

use Application\Collection\InstrumentCollection;
use Application\Entity\Classification;
use Application\Entity\Family;
use Application\Entity\Instrument;
use Application\Entity\SubFamily;
use PDO;

/**
 * Class PdoInstrumentRepository
 * @package Application\Repository
 */
final class PdoInstrumentRepository implements InstrumentRepository
{
    /** @var PDO */
    private $database;

    /**
     * PdoInstrumentRepository constructor.
     * @param PDO $database
     */
    public function __construct(PDO $database)
    {
        $this->database = $database;
    }

    /**
     * @return InstrumentCollection
     */
    public function fetchAll(): InstrumentCollection
    {
        $statement = $this->database->query('SELECT * FROM `instrument`;');
        $statement->setFetchMode(
            PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, Instrument::class, ['', '']
        );

        $instruments = $statement->fetchAll();

        return new InstrumentCollection(...$instruments);
    }

    /**
     * @param string $name
     * @return Instrument|null
     */
    public function findByName(string $name = ''): ?Instrument
    {
        $statement = $this->database->query('SELECT * FROM `instrument` WHERE `name` = :name;');
        $statement->setFetchMode(
            PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, Instrument::class, ['', '']
        );

        $statement->execute([
            ':name' => $name,
        ]);

        if (!$instrument = $statement->fetch()) {
            return null;
        }

        return $instrument;
    }

    public function findById(int $id): ?Instrument
    {
        $statement = $this->database->query('SELECT * FROM `instrument` WHERE `id` = :id;');
        $statement->setFetchMode(
            PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, Instrument::class, ['', '']
        );

        $statement->execute([
            ':id' => $id,
        ]);

        if (!$instrument = $statement->fetch()) {
            return null;
        }

        return $instrument;
    }

    /**
     * @param string $name
     * @param Classification $classification
     * @param Family $family
     * @param SubFamily $subFamily
     * @return bool
     */
    public function addInstrument(string $name, Classification $classification, Family $family, SubFamily $subFamily): bool
    {
        $statement = $this->database->prepare(
            'INSERT INTO `instrument` (`name`, `classification_id`, `family_id`, `subfamily_id`) 
                        VALUES(:name, :classification, :family, :subfamily);');
        $statement->execute([
            ':name' => $name,
            ':classification_id' => $classification->getId(),
            ':family_id' => $family->getId(),
            ':subfamily_id' => $subFamily->getId(),
        ]);

        if (!$statement) {
            return false;
        }

        return true;
    }

}