<?php
declare(strict_types=1);

namespace Application\Collection;

use Application\Entity\Group;

/**
 * Class GroupCollection
 * @package Application\Collection
 */
final class GroupCollection
{
    /** @var Group[] */
    private $groups;

    /**
     * GroupCollection constructor.
     * @param Group[] $groups
     */
    public function __construct(Group ...$groups)
    {
        $this->groups = $groups;
    }

    /**
     * @return Group[]
     */
    public function getGroups(): array
    {
        return $this->groups;
    }

}