<?php
declare(strict_types=1);

namespace Application\Router;

use Application\Controller\ClassificationController;
use Application\Controller\ConcertController;
use Application\Controller\FamilyController;
use Application\Controller\GenreController;
use Application\Controller\GroupController;
use Application\Controller\IndexController;
use Application\Controller\InstrumentController;
use Application\Controller\MusicianController;
use Application\Controller\SubFamilyController;
use Exception;

/**
 * Class ParseUriStaticNameHelper
 * @package Router
 */
final class ParseUriStaticNameHelper implements ParseUriHelper
{
    /**
     * @param string $requestUri
     * @return string
     * @throws Exception
     */
    public function parseUri(string $requestUri): string
    {
        if ($requestUri === '/') {
            $requestUri = substr($requestUri, 1);
        }

        /** Classification */
        if ($requestUri === '/classification') {
            return ClassificationController::class;
        }
        if (preg_match('#/community/.*#', $requestUri)) {
            $requestUriParams = explode('/', $requestUri);
            $_GET['name'] = urldecode($requestUriParams[2]);

            return ClassificationController::class;
        }

        /** Concert */
        if ($requestUri === '/concert') {
            $requestUriParams = explode('/', $requestUri);
            $_GET['meeting'] = urldecode($requestUriParams[2]);
            return ConcertController::class;
        }
        if (preg_match('#/concert/.*#', $requestUri)) {
            $requestUriParams = explode('/', $requestUri);
            $_GET['meeting'] = urldecode($requestUriParams[2]);
            return ConcertController::class;
        }

        /** Family */
        if ($requestUri === '/family') {
            $requestUriParams = explode('/', $requestUri);
            $_GET['meeting'] = urldecode($requestUriParams[2]);
            return FamilyController::class;
        }
        if (preg_match('#/family/.*#', $requestUri)) {
            $requestUriParams = explode('/', $requestUri);
            $_GET['meeting'] = urldecode($requestUriParams[2]);
            return FamilyController::class;
        }

        /** Genre */
        if ($requestUri === '/genre') {
            $requestUriParams = explode('/', $requestUri);
            $_GET['meeting'] = urldecode($requestUriParams[2]);
            return GenreController::class;
        }
        if (preg_match('#/genre/.*#', $requestUri)) {
            $requestUriParams = explode('/', $requestUri);
            $_GET['meeting'] = urldecode($requestUriParams[2]);
            return GenreController::class;
        }

        /** Group */
        if ($requestUri === '/group') {
            $requestUriParams = explode('/', $requestUri);
            $_GET['meeting'] = urldecode($requestUriParams[2]);
            return GroupController::class;
        }
        if (preg_match('#/group/.*#', $requestUri)) {
            $requestUriParams = explode('/', $requestUri);
            $_GET['meeting'] = urldecode($requestUriParams[2]);
            return GroupController::class;
        }

        /** Instrument */
        if ($requestUri === '/instrument') {
            $requestUriParams = explode('/', $requestUri);
            $_GET['meeting'] = urldecode($requestUriParams[2]);
            return InstrumentController::class;
        }
        if (preg_match('#/instrument/.*#', $requestUri)) {
            $requestUriParams = explode('/', $requestUri);
            $_GET['meeting'] = urldecode($requestUriParams[2]);
            return InstrumentController::class;
        }

        /** Musician */
        if ($requestUri === '/musician') {
            $requestUriParams = explode('/', $requestUri);
            $_GET['meeting'] = urldecode($requestUriParams[2]);
            return MusicianController::class;
        }
        if (preg_match('#/musician/.*#', $requestUri)) {
            $requestUriParams = explode('/', $requestUri);
            $_GET['meeting'] = urldecode($requestUriParams[2]);
            return MusicianController::class;
        }

        /** SubFamily */
        if ($requestUri === '/subfamily') {
            $requestUriParams = explode('/', $requestUri);
            $_GET['meeting'] = urldecode($requestUriParams[2]);
            return SubFamilyController::class;
        }
        if (preg_match('#/subfamily/.*#', $requestUri)) {
            $requestUriParams = explode('/', $requestUri);
            $_GET['meeting'] = urldecode($requestUriParams[2]);
            return SubFamilyController::class;
        }

        return IndexController::class;
    }
}