<?php
declare(strict_types=1);

namespace Application\Controller;

use Application\Exception\GroupNotFoundException;
use Application\Repository\GroupRepository;

/**
 * Class GroupController
 * @package Application\Controller
 */
class GroupController
{
    /** @var GroupRepository */
    private $groupRepository;

    /**
     * GroupController constructor.
     * @param GroupRepository $groupRepository
     */
    public function __construct(GroupRepository $groupRepository)
    {
        $this->groupRepository = $groupRepository;
    }

    /**
     * @return string
     */
    public function indexAction(): string
    {
        $searchName = $_GET['group'] ?? '';
        $selectGroup = $this->groupRepository->findByName($searchName);

        if ($selectGroup === null) {
            return (new ErrorController (new GroupNotFoundException($searchName) ) )->error404Action();
        }

        ob_start();
        include __DIR__.'../../../templates/group/group.html.twig';
        return ob_get_clean();
    }
}