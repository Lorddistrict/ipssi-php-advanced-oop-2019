<?php
declare(strict_types=1);

namespace Application\Controller;

use Application\Exception\InstrumentNotFoundException;
use Application\Repository\InstrumentRepository;

/**
 * Class InstrumentController
 * @package Application\Controller
 */
final class InstrumentController
{
    /** @var InstrumentRepository */
    private $instrumentRepository;

    /**
     * InstrumentController constructor.
     * @param InstrumentRepository $instrumentRepository
     */
    public function __construct(InstrumentRepository $instrumentRepository)
    {
        $this->instrumentRepository = $instrumentRepository;
    }

    /**
     * @return string
     */
    public function indexAction(): string
    {
        $searchName = $_GET['instrument'] ?? '';
        $selectInstrument = $this->instrumentRepository->findByName($searchName);

        if ($selectInstrument === null) {
            return (new ErrorController (new InstrumentNotFoundException($searchName) ) )->error404Action();
        }

        ob_start();
        include __DIR__.'../../../templates/instrument/instrument.html.twig';
        return ob_get_clean();
    }
}