<?php
declare(strict_types=1);

namespace Application\Repository;

use Application\Collection\GenreCollection;
use Application\Collection\InstrumentCollection;
use Application\Entity\Classification;
use Application\Entity\Family;
use Application\Entity\Instrument;
use Application\Entity\SubFamily;
use PDO;

/**
 * Class PdoInstrumentRepository
 * @package Application\Repository
 */
final class PdoInstrumentRepository implements InstrumentRepository
{
    /** @var PDO */
    private $database;

    /** @var GenreRepository */
    private $genreRepository;

    /**
     * PdoInstrumentRepository constructor.
     * @param PDO $database
     */
    public function __construct(PDO $database)
    {
        $this->database = $database;
    }

    /**
     * @return InstrumentCollection
     */
    public function fetchAll(): InstrumentCollection
    {
        $statement = $this->database->query('
            SELECT instrument.id as instrument_id, 
                   instrument.name as instrument_name,
                   classification.id as classification_id,
                   classification.name as classification_name,
                   family.id as family_id,
                   family.name as family_name,
                   subfamily.id as subfamily_id,
                   subfamily.name as subfamily_name,
                   genre.id as genre_id,
                   genre.name as genre_name
            FROM instrument, classification, family, subfamily, genre
            WHERE instrument.classification = classification.id 
              AND instrument.family = family.id 
              AND instrument.subfamily = subfamily.id 
              AND instrument.genre = genre.id');

        $statement->setFetchMode(PDO::FETCH_ASSOC);
        $instruments = $statement->fetchAll();

        // todo implement this mindfuck method

        return new InstrumentCollection(...$instruments);
    }

    /**
     * @param string $name
     * @return Instrument|null
     */
    public function findByName(string $name = ''): ?Instrument
    {
        $statement = $this->database->query('
            SELECT instrument.id as instrument_id, 
                   instrument.name as instrument_name,
                   classification.id as classification_id,
                   classification.name as classification_name,
                   family.id as family_id,
                   family.name as family_name,
                   subfamily.id as subfamily_id,
                   subfamily.name as subfamily_name,
                   genre.id as genre_id,
                   genre.name as genre_name
            FROM instrument, classification, family, subfamily, genre
            WHERE instrument.classification = classification.id 
              AND instrument.family = family.id 
              AND instrument.subfamily = subfamily.id 
              AND instrument.genre = genre.id 
              AND instrument.name = :name');

        $statement->setFetchMode(PDO::FETCH_ASSOC);
        $statement->execute([
            ':name' => $name,
        ]);

        if (!$instrument = $statement->fetch()) {
            return null;
        }

        /** @var Classification $classificationObject */
        $classificationObject = new Classification($instrument['classification_name']);
        (function ($classification, $instrumentArr) {
            $classification->setId((int)$instrumentArr['classification_id']);
        })->bindTo($foo = $classificationObject, Classification::class)($foo, $instrument);

        /** @var Family $familyObject */
        $familyObject = new Family($instrument['family_name'], $classificationObject);
        (function ($family, $instrumentArr) {
            $family->setId((int)$instrumentArr['family_id']);
        })->bindTo($foo = $familyObject, Family::class)($foo, $instrument);

        /** @var SubFamily $subfamilyObject */
        $subfamilyObject = new SubFamily($instrument['subfamily_name'], $familyObject);
        (function ($family, $instrumentArr) {
            $family->setId((int)$instrumentArr['family_id']);
        })->bindTo($foo = $familyObject, Family::class)($foo, $instrument);

        /** @var GenreCollection $genre */
        $genre = new GenreCollection();

        /** @var Instrument $instrumentObject */
        $instrumentObject = new Instrument($instrument['subfamily_name'], $classificationObject, $familyObject,
                                           $subfamilyObject, $genre);

        (function ($family, $instrumentArr) {
            $family->setId((int)$instrumentArr['family_id']);
        })->bindTo($foo = $familyObject, Family::class)($foo, $instrument);

        return $instrument;
    }

    public function findById(int $id): ?Instrument
    {
        $statement = $this->database->query('SELECT * FROM instrument WHERE id = :id;');
        $statement->setFetchMode(
            PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, Instrument::class, ['', '']
        );

        $statement->execute([
            ':id' => $id,
        ]);

        if (!$instrument = $statement->fetch()) {
            return null;
        }

        return $instrument;
    }

    /**
     * @param string $name
     * @param Classification $classification
     * @param Family $family
     * @param SubFamily $subFamily
     * @return bool
     */
    public function addInstrument(string $name, Classification $classification, Family $family, SubFamily $subFamily): bool
    {
        $statement = $this->database->prepare('
            INSERT INTO instrument (name, classification, family, subfamily) 
            VALUES(:name, :classification, :family, :subfamily)');

        $statement->execute([
            ':name' => $name,
            ':classification' => $classification->getId(),
            ':family' => $family->getId(),
            ':subfamily' => $subFamily->getId(),
        ]);

        if (!$statement) {
            return false;
        }

        return true;
    }

}