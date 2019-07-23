<?php
declare(strict_types=1);

namespace Application\Repository;

use Application\Collection\InstrumentCollection;
use Application\Entity\Instrument;
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
        $statement = $this->database->query('SELECT * FROM instrument;');
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
        $statement = $this->database->query('SELECT * FROM instrument WHERE name = :name;');
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

}