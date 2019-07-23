<?php
declare(strict_types=1);

namespace Application\Repository;

use Application\Collection\GroupCollection;
use Application\Entity\Group;
use PDO;

/**
 * Class PdoGroupRepository
 * @package Application\Repository
 */
final class PdoGroupRepository implements GroupRepository
{
    /** @var PDO */
    private $database;

    /**
     * PdoGroupRepository constructor.
     * @param PDO $database
     */
    public function __construct(PDO $database)
    {
        $this->database = $database;
    }

    /**
     * @return GroupCollection
     */
    public function fetchAll(): GroupCollection
    {
        $statement = $this->database->query('SELECT * FROM group;');
        $statement->setFetchMode(
            PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, Group::class, ['', '']
        );

        $groups = $statement->fetchAll();

        return new GroupCollection(...$groups);
    }

    /**
     * @param string $name
     * @return Group|null
     */
    public function findByName(string $name = ''): ?Group
    {
        $statement = $this->database->query('SELECT * FROM group WHERE name = :name;');
        $statement->setFetchMode(
            PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, Group::class, ['', '']
        );

        $statement->execute([
            ':name' => $name,
        ]);

        if (!$group = $statement->fetch()) {
            return null;
        }

        return $group;
    }

}