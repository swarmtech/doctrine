<?php

declare(strict_types=1);

namespace Swarmtech\Doctrine;

use Swarmtech\Doctrine\ORM\QueryProvider\FindAllEntitiesQueryProvider;
use Swarmtech\Doctrine\ORM\QueryProvider\FindEntityByCriteriaQueryProvider;
use Swarmtech\Doctrine\ORM\QueryProvider\FindEntityQueryProvider;
use Swarmtech\Doctrine\ORM\QueryProviderFactory;

return [
    'service_manager' => [
        'factories' => [
            FindEntityQueryProvider::class => QueryProviderFactory::class,
            FindAllEntitiesQueryProvider::class => QueryProviderFactory::class,
            FindEntityByCriteriaQueryProvider::class => QueryProviderFactory::class
        ]
    ]
];
