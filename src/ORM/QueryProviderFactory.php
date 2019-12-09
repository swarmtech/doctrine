<?php

declare(strict_types=1);

namespace Swarmtech\Doctrine\ORM;

use Doctrine\ORM\EntityManagerInterface;
use Psr\Container\ContainerInterface;

/**
 * Class QueryProviderFactory
 *
 * @package Swarmtech\Doctrine\ORM
 */
final class QueryProviderFactory
{
    private static $queryBuilderCollection = [];

    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $entityManager = $container->get('doctrine.entitymanager.orm_default');
        $queryBuilder = $this->getQueryBuilder($entityManager, $requestedName);

        return new $requestedName($queryBuilder);
    }

    private function getQueryBuilder(EntityManagerInterface $entityManager, $requestedName): QueryBuilderInterface
    {
        $hash = md5($requestedName);

        if (isset(self::$queryBuilderCollection[$hash])) {
            return self::$queryBuilderCollection[$hash];
        }

        $queryBuilder = new QueryBuilder($entityManager);
        self::$queryBuilderCollection[$hash] = $queryBuilder;

        return $queryBuilder;
    }
}
