<?php
declare(strict_types=1);

namespace Application\Controller;

use Application\Exception\MusicianNotFoundException;
use Application\Repository\MusicianRepository;

/**
 * Class MusicianController
 * @package Application\Controller
 */
class MusicianController
{
    /** @var MusicianRepository */
    private $musicianRepository;

    /**
     * MusicianController constructor.
     * @param MusicianRepository $musicianRepository
     */
    public function __construct(MusicianRepository $musicianRepository)
    {
        $this->musicianRepository = $musicianRepository;
    }

    /**
     * @return string
     */
    public function indexAction(): string
    {
        $searchEmail = $_GET['musician'] ?? '';
        $selectMusician = $this->musicianRepository->findByEmail($searchEmail);

        if ($selectMusician === null) {
            return (new ErrorController (new MusicianNotFoundException($searchEmail) ) )->error404Action();
        }

        ob_start();
        include __DIR__.'../../../templates/musician/musician.html.twig';
        return ob_get_clean();
    }
}