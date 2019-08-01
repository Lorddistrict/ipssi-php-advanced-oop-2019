<?php
declare(strict_types=1);

namespace Application\Repository;

use Application\Collection\ClassificationCollection;
use Application\Entity\Classification;
use PDO;

/**
 * Class PdoClassificationRepository
 * @package Application\Repository
 */
final class PdoClassificationRepository implements ClassificationRepository
{
    /** @var PDO */
    private $database;

    /**
     * PdoClassificationRepository constructor.
     * @param PDO $database
     */
    public function __construct(PDO $database)
    {
        $this->database = $database;
    }

    /**
     * @return ClassificationCollection
     */
    public function fetchAll(): ClassificationCollection
    {
        $statement = $this->database->query('SELECT * FROM `classification`;');
        $statement->setFetchMode(
            PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, Classification::class, ['', '']
        );
        $classifications = $statement->fetchAll();

        return new ClassificationCollection(...$classifications);
    }

    /**
     * @param string $name
     * @return Classification|null
     */
    public function findByName(string $name = ''): ?Classification
    {
        $statement = $this->database->prepare('SELECT * FROM `classification` WHERE `name` = :name;');
        $statement->setFetchMode(
            PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, Classification::class, ['', '']
        );

        $statement->execute([
            ':name' => $name,
        ]);

        if (!$classification = $statement->fetch()) {
            return null;
        }

        return $classification;
    }

    /**
     * @param int $id
     * @return Classification|null
     */
    public function findById(int $id): ?Classification
    {
        $statement = $this->database->prepare('SELECT * FROM `classification` WHERE `id` = :id;');
        $statement->setFetchMode(
            PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, Classification::class, ['', '']
        );

        $statement->execute([
            ':id' => $id,
        ]);

        if (!$classification = $statement->fetch()) {
            return null;
        }

        return $classification;
    }

    /**
     * @param string $name
     * @return bool
     */
    public function addClassification(string $name): bool
    {
        $statement = $this->database->prepare('INSERT INTO `classification` (`name`) VALUES(:name);');
        $statement->execute([
            ':name' => $name,
        ]);

        if (!$statement) {
            return false;
        }

        return true;
    }

}