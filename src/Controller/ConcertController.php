<?php
declare(strict_types=1);

namespace App\Controller;

use Repository\ConcertRepository;

class ConcertController
{
    /** @var ConcertRepository $concertRepository */
    private $concertRepository;

    public function __construct (ConcertRepository $concertRepository)
    {
        $this->concertRepository = $concertRepository;
    }

    public function index (): array
    {
        echo $this->concertRepository->getAll();
    }
}