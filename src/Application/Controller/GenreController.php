<?php
declare(strict_types=1);

namespace Application\Controller;

use Application\Exception\GenreNotFoundException;
use Application\Repository\GenreRepository;

/**
 * Class GenreController
 * @package Application\Controller
 */
class GenreController
{
    /** @var GenreRepository */
    private $genreRepository;

    /**
     * GenreController constructor.
     * @param GenreRepository $genreRepository
     */
    public function __construct(GenreRepository $genreRepository)
    {
        $this->genreRepository = $genreRepository;
    }

    /**
     * @return string
     */
    public function indexAction(): string
    {
        $searchName = $_GET['genre'] ?? '';
        $selectGenre = $this->genreRepository->findByName($searchName);

        if ($selectGenre === null) {
            return (new ErrorController (new GenreNotFoundException($searchName) ) )->error404Action();
        }

        ob_start();
        include __DIR__.'../../../templates/genre/genre.html.twig';
        return ob_get_clean();
    }
}