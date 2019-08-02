<?php
declare(strict_types=1);

namespace Application\Repository;

use Application\Collection\SubFamilyCollection;
use Application\Controller\ErrorController;
use Application\Entity\Classification;
use Application\Entity\Family;
use Application\Entity\SubFamily;
use Application\Exception\FamilyNotFoundException;
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
        $statement = $this->database->query('
            SELECT subfamily.id as subfamily_id, 
                   subfamily.name as subfamily_name, 
                   family.id as family_id, 
                   family.name as family_name, 
                   classification.id as classification_id, 
                   classification.name as classification_name 
            FROM subfamily, family, classification 
            WHERE subfamily.family = family.id 
              AND family.classification = classification.id');

        $statement->setFetchMode(PDO::FETCH_ASSOC);
        $dbSubFamilies = $statement->fetchAll();

        foreach ($dbSubFamilies as $key => $subFamily) {

            /** @var Classification $classificationObject */
            $classificationObject = new Classification($subFamily['classification_name']);
            (function ($classification, $subFamilyArr) {
                $classification->setId((int)$subFamilyArr['classification_id']);
            })->bindTo($foo = $classificationObject, Classification::class)($foo, $subFamily);

            /** @var Family $familyObject */
            $familyObject = new Family($subFamily['family_name'], $classificationObject);
            (function ($family, $subFamilyArr) {
                $family->setId((int)$subFamilyArr['family_id']);
            })->bindTo($foo = $classificationObject, Classification::class)($foo, $subFamily);

            /** @var SubFamily $subFamilyObject */
            $subFamilyObject = new SubFamily($subFamily['subfamily_name'], $familyObject);
            (function ($subfamily, $subFamilyArr) {
                $subfamily->setId((int)$subFamilyArr['subfamily_id']);
            })->bindTo($foo = $classificationObject, Classification::class)($foo, $subFamily);

            $subFamilies[] = $subFamilyObject;
        }

        if ($subFamilies === null) {
            return new SubFamilyCollection();
        }

        return new SubFamilyCollection(...$subFamilies);
    }

    /**
     * @param string $name
     * @return SubFamily|null
     */
    public function findByName(string $name = ''): ?SubFamily
    {
        $statement = $this->database->prepare('
            SELECT subfamily.id as subfamily_id, 
                   subfamily.name as subfamily_name, 
                   family.id as family_id, 
                   family.name as family_name, 
                   classification.id as classification_id, 
                   classification.name as classification_name 
            FROM subfamily, family, classification 
            WHERE subfamily.family = family.id 
              AND family.classification = classification.id 
              AND subfamily.name = :name');

        $statement->setFetchMode(PDO::FETCH_ASSOC);
        $statement->execute([
            ':name' => $name,
        ]);

        if (!$subFamily = $statement->fetch()) {
            return null;
        }

        /** @var Classification $classificationObject */
        $classificationObject = new Classification($subFamily['classification_name']);
        (function ($classification, $subFamilyArr) {
            $classification->setId((int)$subFamilyArr['classification_id']);
        })->bindTo($foo = $classificationObject, Classification::class)($foo, $subFamily);

        /** @var Family $familyObject */
        $familyObject = new Family($subFamily['family_name'], $classificationObject);
        (function ($family, $subFamilyArr) {
            $family->setId((int)$subFamilyArr['family_id']);
        })->bindTo($foo = $classificationObject, Classification::class)($foo, $subFamily);

        /** @var SubFamily $subFamilyObject */
        $subFamilyObject = new SubFamily($subFamily['subfamily_name'], $familyObject);
        (function ($subfamily, $subFamilyArr) {
            $subfamily->setId((int)$subFamilyArr['subfamily_id']);
        })->bindTo($foo = $classificationObject, Classification::class)($foo, $subFamily);

        $subFamily = $subFamilyObject;

        return $subFamily;
    }

    /**
     * @param int $id
     * @return SubFamily|null
     */
    public function findById(int $id): ?SubFamily
    {
        $statement = $this->database->prepare('
            SELECT subfamily.id as subfamily_id, 
                   subfamily.name as subfamily_name, 
                   family.id as family_id, 
                   family.name as family_name, 
                   classification.id as classification_id, 
                   classification.name as classification_name 
            FROM subfamily, family, classification 
            WHERE subfamily.family = family.id 
              AND family.classification = classification.id 
              AND subfamily.id = :id');

        $statement->setFetchMode(PDO::FETCH_ASSOC);
        $statement->execute([
            ':id' => $id,
        ]);

        if (!$subFamily = $statement->fetch()) {
            return null;
        }

        /** @var Classification $classificationObject */
        $classificationObject = new Classification($subFamily['classification_name']);
        (function ($classification, $subFamilyArr) {
            $classification->setId((int)$subFamilyArr['classification_id']);
        })->bindTo($foo = $classificationObject, Classification::class)($foo, $subFamily);

        /** @var Family $familyObject */
        $familyObject = new Family($subFamily['family_name'], $classificationObject);
        (function ($family, $subFamilyArr) {
            $family->setId((int)$subFamilyArr['family_id']);
        })->bindTo($foo = $classificationObject, Classification::class)($foo, $subFamily);

        /** @var SubFamily $subFamilyObject */
        $subFamilyObject = new SubFamily($subFamily['subfamily_name'], $familyObject);
        (function ($subfamily, $subFamilyArr) {
            $subfamily->setId((int)$subFamilyArr['subfamily_id']);
        })->bindTo($foo = $classificationObject, Classification::class)($foo, $subFamily);

        $subFamily = $subFamilyObject;

        return $subFamily;
    }

    /**
     * @param string $name
     * @param Family $family
     * @return bool
     */
    public function addSubFamily(string $name, Family $family): bool
    {
        $statement = $this->database->prepare('
            INSERT INTO subfamily (name, family) 
            VALUES(:name, :family)');

        $statement->execute([
            ':name' => $name,
            ':family' => $family->getId(),
        ]);

        if (!$statement) {
            return false;
        }

        return true;
    }

}