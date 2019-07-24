<?php
declare(strict_types=1);

namespace Application\Controller;

use Throwable;

/**
 * Class ErrorController
 * @package Application\Controller
 */
final class ErrorController
{
    /** @var \Exception */
    private $exception;

    /**
     * ErrorController constructor.
     * @param Throwable $exception
     */
    public function __construct(Throwable $exception)
    {
        $this->exception = $exception;
    }

    /**
     * @return string
     */
    public function error404Action() : string
    {
        ob_start();
        include __DIR__.'/../../../templates/errors/error404.html.twig';
        return ob_get_clean();
    }

    /**
     * @return string
     */
    public function error500Action() : string
    {
        ob_start();
        include __DIR__.'/../../../templates/errors/error500.html.twig';
        return ob_get_clean();
    }
}
