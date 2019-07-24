<?php
declare(strict_types=1);

namespace Application\Controller;

use Application\Exception\SubFamilyNotFoundException;
use Application\Repository\SubFamilyRepository;

/**
 * Class SubFamilyController
 * @package Application\Controller
 */
class SubFamilyController
{
    /** @var SubFamilyRepository */
    private $subFamilyRepository;

    /**
     * SubFamilyController constructor.
     * @param SubFamilyRepository $subFamilyRepository
     */
    public function __construct(SubFamilyRepository $subFamilyRepository)
    {
        $this->subFamilyRepository = $subFamilyRepository;
    }

    /**
     * @return string
     */
    public function indexAction(): string
    {
        $searchName = $_GET['subFamily'] ?? '';
        $selectSubFamily = $this->subFamilyRepository->findByName($searchName);

        if ($selectSubFamily === null) {
            return (new ErrorController (new SubFamilyNotFoundException($searchName) ) )->error404Action();
        }

        ob_start();
        include __DIR__.'../../../templates/subFamily/subFamily.html.twig';
        return ob_get_clean();
    }
}