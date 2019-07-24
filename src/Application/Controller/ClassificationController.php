<?php
declare(strict_types=1);

namespace Application\Controller;

use Application\Exception\ClassificationNotFoundException;
use Application\Repository\ClassificationRepository;

/**
 * Class ClassificationController
 * @package Application\Controller
 */
class ClassificationController
{
    /** @var ClassificationRepository */
    private $classificationRepository;

    /**
     * ClassificationController constructor.
     * @param ClassificationRepository $classificationRepository
     */
    public function __construct(ClassificationRepository $classificationRepository)
    {
        $this->classificationRepository = $classificationRepository;
    }

    /**
     * @return string
     */
    public function indexAction(): string
    {
        $searchName = $_GET['classification'] ?? '';
        $selectClassification = $this->classificationRepository->findByName($searchName);

        if ($selectClassification === null) {
            return (new ErrorController (new ClassificationNotFoundException($searchName) ) )->error404Action();
        }

        ob_start();
        include __DIR__.'../../../templates/classification/classification.html.twig';
        return ob_get_clean();
    }
}