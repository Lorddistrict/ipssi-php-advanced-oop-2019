<?php
declare(strict_types=1);

namespace Application\Router;

use Application\Controller\ErrorController;
use Application\Controller\IndexController;
use Application\Exception\InvalidControllerException;
use DateTimeImmutable;
use Exception;

/**
 * Class Router
 * @package Application\Router
 */
final class Router
{
    /** @var string */
    private $controllerClass = IndexController::class;

    /** @var ParseUriHelper */
    private $parseUriHelper;

    /** @var DateTimeImmutable */
    private $dateTimeImmutable;

    /**
     * Router constructor.
     * @param ParseUriHelper $parseUriHelper
     * @param DateTimeImmutable $dateTimeImmutable
     */
    public function __construct(ParseUriHelper $parseUriHelper, DateTimeImmutable $dateTimeImmutable)
    {
        $this->parseUriHelper = $parseUriHelper;
        $this->dateTimeImmutable = $dateTimeImmutable;
    }

    /**
     * @param string $requestUri
     * @return string
     */
    public function resolve(string $requestUri): string
    {
        try {
            $this->controllerClass = $this->parseUriHelper->parseUri($requestUri);
        } catch (InvalidControllerException $exception) {
            return (new ErrorController($exception))->error404Action();
        } catch (Exception $exception) {
            return (new ErrorController($exception))->error500Action();
        }

        return $this->controllerClass;
    }

    /**
     * @param string $controllerClass
     * @throws Exception
     */
    private function validateController(string $controllerClass): void
    {
        if (!class_exists($controllerClass)) {
            throw new InvalidControllerException('Invalid controller specified');
        }
    }

}