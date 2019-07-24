<?php
declare(strict_types=1);

namespace Application\Controller;

use Application\Exception\FamilyNotFoundException;
use Application\Repository\FamilyRepository;

/**
 * Class FamilyController
 * @package Application\Controller
 */
final class FamilyController
{
    /** @var FamilyRepository */
    private $familyRepository;

    /**
     * FamilyController constructor.
     * @param FamilyRepository $familyRepository
     */
    public function __construct(FamilyRepository $familyRepository)
    {
        $this->familyRepository = $familyRepository;
    }

    /**
     * @return string
     */
    public function indexAction(): string
    {
        $searchName = $_GET['family'] ?? '';
        $selectFamily = $this->familyRepository->findByName($searchName);

        if ($selectFamily === null) {
            return (new ErrorController (new FamilyNotFoundException($searchName) ) )->error404Action();
        }

        ob_start();
        include __DIR__.'../../../templates/family/family.html.twig';
        return ob_get_clean();
    }
}