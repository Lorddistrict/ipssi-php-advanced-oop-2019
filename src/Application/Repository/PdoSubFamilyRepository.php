<?php
declare(strict_types=1);

namespace Application\Repository;

use Application\Collection\SubFamilyCollection;
use Application\Entity\SubFamily;
use PDO;

/**
 * Class PdoSubFamilyRepository
 * @package Application\Repository
 */
final class PdoSubFamilyRepository implements SubFamilyRepository
{
    /** @var PDO */
    private $database;

    /**
     * PdoSubFamilyRepository constructor.
     * @param PDO $database
     */
    public function __construct(PDO $database)
    {
        $this->database = $database;
    }

    /**
     * @return SubFamilyCollection
     */
    public function fetchAll(): SubFamilyCollection
    {
        $statement = $this->database->query('SELECT * FROM subfamily;');
        $statement->setFetchMode(
            PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, SubFamily::class, ['', '']
        );

        $subFamilies = $statement->fetchAll();

        return new SubFamilyCollection(...$subFamilies);
    }

    /**
     * @param string $name
     * @return SubFamily|null
     */
    public function findByName(string $name = ''): ?SubFamily
    {
        $statement = $this->database->query('SELECT * FROM subfamily WHERE name = :name;');
        $statement->setFetchMode(
            PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, SubFamily::class, ['', '']
        );

        $statement->execute([
            ':name' => $name,
        ]);

        if (!$subFamily = $statement->fetch()) {
            return null;
        }

        return $subFamily;
    }

}