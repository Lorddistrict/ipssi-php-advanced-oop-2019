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
        $statement = $this->database->query('
            SELECT classification.id as classification_id, 
                   classification.name as classification_name
            FROM classification');

        $statement->setFetchMode(PDO::FETCH_ASSOC);
        $classifications = $statement->fetchAll();

        return new ClassificationCollection(...$classifications);
    }

    /**
     * @param string $name
     * @return Classification|null
     */
    public function findByName(string $name = ''): ?Classification
    {
        $statement = $this->database->prepare('
            SELECT classification.id as classification_id, 
                   classification.name as classification_name
            FROM classification 
            WHERE name = :name');

        $statement->setFetchMode(PDO::FETCH_ASSOC);
        $statement->execute([
            ':name' => $name,
        ]);

        if (!$classification = $statement->fetch()) {
            return null;
        }

        $classificationObject = new Classification($classification['classification_name']);
        (function ($classification, $classificationArr) {
            $classification->setId((int)$classificationArr['classification_id']);
        })->bindTo($foo = $classificationObject, Classification::class)($foo, $classification);

        $classification = $classificationObject;

        return $classification;
    }

    /**
     * @param int $id
     * @return Classification|null
     */
    public function findById(int $id): ?Classification
    {
        $statement = $this->database->prepare('
            SELECT classification.id as classification_id, 
                   classification.name as classification_name 
            FROM classification 
            WHERE id = :id;');

        $statement->setFetchMode(PDO::FETCH_ASSOC);
        $statement->execute([
            ':id' => $id,
        ]);

        if (!$classification = $statement->fetch()) {
            return null;
        }

        $classificationObject = new Classification($classification['classification_name']);
        (function ($classification, $classificationArr) {
            $classification->setId((int)$classificationArr['classification_id']);
        })->bindTo($foo = $classificationObject, Classification::class)($foo, $classification);

        $classification = $classificationObject;

        return $classification;
    }

    /**
     * @param string $name
     * @return bool
     */
    public function addClassification(string $name): bool
    {
        $statement = $this->database->prepare('
            INSERT INTO classification (name) 
            VALUES(:name)');

        $statement->execute([
            ':name' => $name,
        ]);

        if (!$statement) {
            return false;
        }

        return true;
    }

}