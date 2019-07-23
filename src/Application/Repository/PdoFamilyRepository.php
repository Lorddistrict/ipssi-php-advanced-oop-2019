<?php
declare(strict_types=1);

namespace Application\Repository;

use Application\Collection\FamilyCollection;
use Application\Entity\Family;
use PDO;

/**
 * Class PdoFamilyRepository
 * @package Application\Repository
 */
final class PdoFamilyRepository implements FamilyRepository
{
    /** @var PDO */
    private $database;

    /**
     * PdoFamilyRepository constructor.
     * @param PDO $database
     */
    public function __construct(PDO $database)
    {
        $this->database = $database;
    }

    /**
     * @return FamilyCollection
     */
    public function fetchAll(): FamilyCollection
    {
        $statement = $this->database->query('SELECT * FROM family;');
        $statement->setFetchMode(
            PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, Family::class, ['', '']
        );

        $families = $statement->fetchAll();

        return new FamilyCollection(...$families);
    }

    /**
     * @param string $name
     * @return Family|null
     */
    public function findByName(string $name = ''): ?Family
    {
        $statement = $this->database->query('SELECT * FROM family WHERE name = :name;');
        $statement->setFetchMode(
            PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, Family::class, ['', '']
        );

        $statement->execute([
            ':name' => $name,
        ]);

        if (!$family = $statement->fetch()) {
            return null;
        }

        return $family;
    }

}