<?php

declare(strict_types=1);

namespace Swarmtech\Doctrine\ORM\QueryProvider;

use Doctrine\Common\Collections\Criteria;
use Doctrine\ORM\Query;
use InvalidArgumentException;
use Swarmtech\Doctrine\ORM\AbstractQueryProvider;

/**
 * Class FindEntityQueryProvider
 *
 * @package Swarmtech\Doctrine\ORM\QueryProvider
 */
final class FindEntityQueryProvider extends AbstractQueryProvider
{
    /**
     * @param string|null $entityName
     * @param null $id
     * @return Query
     */
    public function createQuery(string $entityName = null, $id = null): Query
    {
        if (!$entityName) {
            throw new InvalidArgumentException('Entity name must be defined');
        }

        if (!$id) {
            throw new InvalidArgumentException('Id must be defined');
        }

        $this->queryBuilder
            ->select('e')
            ->from($entityName, 'e')
            ->where('e.id = :id')
            ->setParameter('id', (string)$id);

        return $this->queryBuilder->getQuery();
    }
}
