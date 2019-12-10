<?php

declare(strict_types=1);

namespace Swarmtech\Doctrine;

use Swarmtech\Doctrine\ORM\QueryProvider\FindAllEntitiesQueryProvider;
use Swarmtech\Doctrine\ORM\QueryProvider\FindEntityByCriteriaQueryProvider;
use Swarmtech\Doctrine\ORM\QueryProvider\FindEntityQueryProvider;
use Swarmtech\Doctrine\ORM\QueryProviderFactory;

final class ConfigProvider
{
    public function __invoke(): array
    {
        return [
            'dependencies' => $this->getDependencyConfig()
        ];
    }

    public function getDependencyConfig(): array
    {
        return [
            'factories' => [
                FindEntityQueryProvider::class => QueryProviderFactory::class,
                FindAllEntitiesQueryProvider::class => QueryProviderFactory::class,
                FindEntityByCriteriaQueryProvider::class => QueryProviderFactory::class
            ]
        ];
    }
}
