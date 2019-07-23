<?php
declare(strict_types=1);

namespace Application\Repository;

use Application\Repository\Classification\FindAll;
use Application\Repository\Classification\FindClassification;

/**
 * Interface ClassificationRepository
 * @package Application\Repository
 */
interface ClassificationRepository extends FindClassification, FindAll
{
}