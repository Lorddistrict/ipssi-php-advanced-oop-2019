<?php
declare(strict_types=1);

namespace Application\Repository;

use Application\Collection\FamilyCollection;
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
        $statement = $this->database->query('
            SELECT family.id as family_id, 
                   family.name as family_name, 
                   classification.id as classification_id, 
                   classification.name as classification_name 
            FROM family, classification 
            WHERE family.classification = classification.id');

        $statement->setFetchMode(PDO::FETCH_ASSOC);
        $dbFamilies = $statement->fetchAll();

        foreach ($dbFamilies as $key => $family) {
            $classificationObject = new Classification($family['classification_name']);

            (function ($classification, $familyArr) {
                $classification->setId((int)$familyArr['classification_id']);
            })->bindTo($foo = $classificationObject, Classification::class)($foo, $family);

            $familyObject = new Family($family['family_name'], $classificationObject);

            (function ($family, $familyArr) {
                $family->setId((int)$familyArr['family_id']);
            })->bindTo($foo = $familyObject, Family::class)($foo, $family);

            $families[] = $familyObject;
        }
        dd($families);

        if ($families === null) {
            return new FamilyCollection();
        }

        return new FamilyCollection(...$families);
    }

    /**
     * @param string $name
     * @return Family|null
     */
    public function findByName(string $name = ''): ?Family
    {
        $statement = $this->database->prepare('
            SELECT family.id as family_id, 
                   family.name as family_name, 
                   classification.id as classification_id, 
                   classification.name as classification_name 
            FROM family, classification 
            WHERE family.classification = classification.id 
              AND family.name = :name');

        $statement->setFetchMode(PDO::FETCH_ASSOC);
        $statement->execute([
            ':name' => $name,
        ]);

        if (!$family = $statement->fetch()) {
            return null;
        }

        $classificationObject = new Classification($family['classification_name']);
        (function ($classification, $familyArr) {
            $classification->setId((int)$familyArr['classification_id']);
        })->bindTo($foo = $classificationObject, Classification::class)($foo, $family);

        $familyObject = new Family($family['family_name'], $classificationObject);
        (function ($family, $familyArr) {
            $family->setId((int)$familyArr['family_id']);
        })->bindTo($foo = $familyObject, Family::class)($foo, $family);

        $family = $familyObject;

        return $family;
    }

    /**
     * @param int $id
     * @return Family|null
     */
    public function findById(int $id): ?Family
    {
        $statement = $this->database->prepare('
            SELECT family.id as family_id, 
                   family.name as family_name, 
                   classification.id as classification_id, 
                   classification.name as classification_name 
            FROM family, classification 
            WHERE family.classification = classification.id 
              AND family.id = :id');

        $statement->setFetchMode(PDO::FETCH_ASSOC);
        $statement->execute([
            ':id' => $id,
        ]);

        if (!$family = $statement->fetch()) {
            return null;
        }

        $classificationObject = new Classification($family['classification_name']);
        (function ($classification, $familyArr) {
            $classification->setId((int)$familyArr['classification_id']);
        })->bindTo($foo = $classificationObject, Classification::class)($foo, $family);

        $familyObject = new Family($family['family_name'], $classificationObject);
        (function ($family, $familyArr) {
            $family->setId((int)$familyArr['family_id']);
        })->bindTo($foo = $familyObject, Family::class)($foo, $family);

        $family = $familyObject;

        return $family;
    }

    /**
     * @param string $name
     * @param Classification $classification
     * @return bool
     */
    public function addFamily(string $name, Classification $classification): bool
    {
        $statement = $this->database->prepare('
            INSERT INTO family (name, classification) 
            VALUES(:name, :classification)');

        $statement->execute([
            ':name' => $name,
            ':classification' => $classification->getId(),
        ]);

        if (!$statement) {
            return false;
        }

        return true;
    }

}