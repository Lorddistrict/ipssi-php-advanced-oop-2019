<?php
declare(strict_types=1);

namespace Application\Repository\Classification;

use Application\Collection\ClassificationCollection;

/**
 * Interface FindAll
 * @package Application\Repository\Classification
 */
interface FindAll
{
    public function fetchAll(): ClassificationCollection;
}