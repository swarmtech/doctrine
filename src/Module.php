<?php

declare(strict_types=1);

namespace Swarmtech\Doctrine;

/**
 * Class Module
 *
 * @package Swarmtech\Doctrine
 */
final class Module
{
    public function getConfig(): array
    {
        return include __DIR__ . '/../config/module.config.php';
    }
}
