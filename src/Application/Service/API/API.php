<?php
declare(strict_types=1);

namespace Application\Service\API;

/**
 * Interface API
 * @package Application\Service\API
 */
interface API
{
    /**
     * @param string $method
     * @param string $url
     * @param bool|array $data
     * @return string|null
     */
    public function callAPI($method, $url, $data): ?string;
}