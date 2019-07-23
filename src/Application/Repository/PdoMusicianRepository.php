<?php
declare(strict_types=1);

namespace Application\Repository;

use Application\Collection\MusicianCollection;
use Application\Entity\Musician;
use PDO;

/**
 * Class PdoMusicianRepository
 * @package Application\Repository
 */
final class PdoMusicianRepository implements MusicianRepository
{
    /** @var PDO */
    private $database;

    /**
     * PdoMusicianRepository constructor.
     * @param PDO $database
     */
    public function __construct(PDO $database)
    {
        $this->database = $database;
    }

    /**
     * @return MusicianCollection
     */
    public function fetchAll(): MusicianCollection
    {
        $statement = $this->database->query('SELECT * FROM musician;');
        $statement->setFetchMode(
            PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, Musician::class, ['', '']
        );

        $musicians = $statement->fetchAll();

        return new MusicianCollection(...$musicians);
    }

    /**
     * @param string $name
     * @return Musician|null
     */
    public function findByEmail(string $email = ''): ?Musician
    {
        $statement = $this->database->query('SELECT * FROM musician WHERE email = :email;');
        $statement->setFetchMode(
            PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, Musician::class, ['', '']
        );

        $statement->execute([
            ':email' => $email,
        ]);

        if (!$musician = $statement->fetch()) {
            return null;
        }

        return $musician;
    }

}