<?php
declare(strict_types=1);

namespace Application\Router;

/**
 * Interface ParseUriHelper
 * @package Application\Router
 */
interface ParseUriHelper
{
    /**
     * @param string $requestUri
     * @return string
     */
    public function parseUri(string $requestUri): string;
}