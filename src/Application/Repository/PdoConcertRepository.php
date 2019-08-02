<?php
declare(strict_types=1);

namespace Application\Repository;

use Application\Collection\ConcertCollection;
use Application\Entity\Concert;
use Application\Entity\Genre;
use PDO;

/**
 * Class PdoConcertRepository
 * @package Application\Repository
 */
final class PdoConcertRepository implements ConcertRepository
{
    /** @var PDO */
    private $database;

    /**
     * PdoConcertRepository constructor.
     * @param PDO $database
     */
    public function __construct(PDO $database)
    {
        $this->database = $database;
    }

    /**
     * @return ConcertCollection
     */
    public function fetchAll(): ConcertCollection
    {
        $statement = $this->database->query('SELECT * FROM `concert`;');
        $statement->setFetchMode(
            PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, Concert::class, ['', '']
        );

        $concerts = $statement->fetchAll();

        return new ConcertCollection(...$concerts);
    }

    /**
     * @param string $name
     * @return Concert|null
     */
    public function findByName(string $name = ''): ?Concert
    {
        $statement = $this->database->query('SELECT * FROM `concert` WHERE `name` = :name;');
        $statement->setFetchMode(
            PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, Concert::class, ['', '']
        );

        $statement->execute([
            ':name' => $name,
        ]);

        if (!$concert = $statement->fetch()) {
            return null;
        }

        return $concert;
    }

    /**
     * @param string $name
     * @return bool
     */
    public function addConcert(string $name, Genre $genre): bool
    {
        $statement = $this->database->prepare('INSERT INTO `concert` (`name`, `genre`) VALUES(:name, :genre);');
        $statement->execute([
            ':name' => $name,
            ':genre' => $genre->getId(),
        ]);

        if (!$statement) {
            return false;
        }

        return true;
    }

}