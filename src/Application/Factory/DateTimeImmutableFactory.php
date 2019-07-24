<?php
declare(strict_types=1);

namespace Application\Factory;

use DateTimeImmutable;

/**
 * Class DateTimeImmutableFactory
 * @package Application\Factory
 */
final class DateTimeImmutableFactory
{
    /**
     * @return DateTimeImmutable
     * @throws \Exception
     */
    public function __invoke(): DateTimeImmutable
    {
        return new DateTimeImmutable();
    }
}
