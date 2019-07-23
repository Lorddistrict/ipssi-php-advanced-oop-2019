<?php
declare(strict_types=1);

namespace Application\Collection;

use Application\Entity\SubFamily;

/**
 * Class SubFamilyCollection
 * @package Application\Collection
 */
final class SubFamilyCollection
{
    /** @var SubFamily[] */
    private $subFamilies;

    /**
     * SubFamilyCollection constructor.
     * @param SubFamily[] $subFamilies
     */
    public function __construct(array ...$subFamilies)
    {
        $this->subFamilies = $subFamilies;
    }

    /**
     * @return SubFamily[]
     */
    public function getSubFamilies(): array
    {
        return $this->subFamilies;
    }

}