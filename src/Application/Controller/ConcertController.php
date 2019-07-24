<?php
declare(strict_types=1);

namespace Application\Controller;

use Application\Exception\ConcertNotFoundException;
use Application\Repository\ConcertRepository;

/**
 * Class ConcertController
 * @package Application\Controller
 */
class ConcertController
{
    /** @var ConcertRepository */
    private $concertRepository;

    /**
     * ConcertController constructor.
     * @param ConcertRepository $concertRepository
     */
    public function __construct(ConcertRepository $concertRepository)
    {
        $this->concertRepository = $concertRepository;
    }

    /**
     * @return string
     */
    public function indexAction(): string
    {
        $searchName = $_GET['concert'] ?? '';
        $selectConcert = $this->concertRepository->findByName($searchName);

        if ($selectConcert === null) {
            return (new ErrorController (new ConcertNotFoundException($searchName) ) )->error404Action();
        }

        ob_start();
        include __DIR__.'../../../templates/concert/concert.html.twig';
        return ob_get_clean();
    }
}