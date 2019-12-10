<?php

declare(strict_types=1);

namespace Swarmtech\Doctrine\ORM\QueryProvider;

use Doctrine\ORM\Query;
use InvalidArgumentException;
use Swarmtech\Doctrine\ORM\AbstractQueryProvider;

/**
 * Class FindAllEntitiesQueryProvider
 *
 * @package Swarmtech\Doctrine\ORM\QueryProvider
 */
final class FindAllEntitiesQueryProvider extends AbstractQueryProvider
{
    /**
     * @param string|null $entityName
     * @return Query
     */
    public function createQuery(string $entityName = null): Query
    {
        if (!$entityName) {
            throw new InvalidArgumentException('Entity name must be defined');
        }

        $this->queryBuilder
            ->select('e')
            ->from($entityName, 'e');

        return $this->queryBuilder->getQuery();
    }
}
