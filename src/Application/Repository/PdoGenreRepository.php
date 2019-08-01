<?php
declare(strict_types=1);

namespace Application\Repository;

use Application\Collection\GenreCollection;
use Application\Entity\Genre;
use PDO;

/**
 * Class PdoGenreRepository
 * @package Application\Repository
 */
final class PdoGenreRepository implements GenreRepository
{
    /** @var PDO */
    private $database;

    /**
     * PdoGenreRepository constructor.
     * @param PDO $database
     */
    public function __construct(PDO $database)
    {
        $this->database = $database;
    }

    /**
     * @return GenreCollection
     */
    public function fetchAll(): GenreCollection
    {
        $statement = $this->database->query('SELECT * FROM `genre`;');
        $statement->setFetchMode(
            PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, Genre::class, ['', '']
        );

        $genres = $statement->fetchAll();

        return new GenreCollection(...$genres);
    }

    /**
     * @param string $name
     * @return Genre|null
     */
    public function findByName(string $name = ''): ?Genre
    {
        $statement = $this->database->prepare('SELECT * FROM `genre` WHERE `name` = :name;');
        $statement->setFetchMode(
            PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, Genre::class, ['', '']
        );

        $statement->execute([
            ':name' => $name,
        ]);

        if (!$genre = $statement->fetch()) {
            return null;
        }

        return $genre;
    }

    /**
     * @param string $name
     * @return bool
     */
    public function addGenre(string $name): bool
    {
        $statement = $this->database->prepare('INSERT INTO `genre` (`name`) VALUES(:name);');
        $statement->execute([
            ':name' => $name,
        ]);

        if (!$statement) {
            return false;
        }

        return true;
    }

}