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
        $provider = new ConfigProvider();

        return [
            'service_manager' => $provider->getDependencyConfig()
        ];
    }
}
