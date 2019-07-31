<?php
declare(strict_types=1);

namespace Application\Controller;

use Application\Entity\Musician;
use Application\Factory\GroupRepositoryFactory;
use Application\Repository\ConcertRepository;
use Faker\Factory;
use Faker\Generator;

/**
 * Class IndexController
 * @package Application\Controller
 */
final class IndexController
{
    /** @var ConcertRepository $concertRepository */
    private $concertRepository;

    /**
     * IndexController constructor.
     * @param ConcertRepository $concertRepository
     */
    public function __construct(ConcertRepository $concertRepository)
    {
        $this->concertRepository = $concertRepository;
    }

    /**
     * @return string
     */
    public function indexAction() : string
    {
        $concerts = $this->concertRepository->fetchAll();

        ob_start();
        include __DIR__.'/../../../templates/index.phtml';
        return ob_get_clean();
    }
}