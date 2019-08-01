<?php
declare(strict_types=1);

namespace Application\Repository;

use Application\Collection\FamilyCollection;
use Application\Container;
use Application\Entity\Classification;
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
        $statement = $this->database->query('SELECT * FROM `family`;');
        $statement->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, Family::class, ['', '']);

        $families = $statement->fetchAll();

        return new FamilyCollection(...$families);
    }

    /**
     * @param string $name
     * @return Family|null
     */
    public function findByName(string $name = ''): ?Family
    {
        $statement = $this->database->prepare('SELECT * FROM `family` WHERE `name` = :name;');
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

    /**
     * @param int $id
     * @return Family|null
     */
    public function findById(int $id): ?Family
    {
        $statement = $this->database->prepare('SELECT * FROM `family` WHERE `id` = :id;');
        $statement->setFetchMode(
            PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, Family::class, ['', '']
        );

        $statement->execute([
            ':id' => $id,
        ]);

        if (!$family = $statement->fetch()) {
            return null;
        }

        return $family;
    }

    /**
     * @param string $name
     * @param Classification $classification
     * @return bool
     */
    public function addFamily(string $name, Classification $classification): bool
    {
        $statement = $this->database->prepare('INSERT INTO `family` (`name`, `classification_id`) VALUES(:name, :classification_id);');
        $statement->execute([
            ':name' => $name,
            ':classification_id' => $classification->getId(),
        ]);

        if (!$statement) {
            return false;
        }

        return true;
    }

}