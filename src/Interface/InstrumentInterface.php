<?php
declare(strict_types=1);

/**
 * Interface InstrumentInterface
 */
interface InstrumentInterface
{
    public function setName(string $name);
    public function setClassification(string $name);
    public function setFamily(?string $name);
    public function setSubFamily(?string $name);
    public function setGenre(string $name);
}