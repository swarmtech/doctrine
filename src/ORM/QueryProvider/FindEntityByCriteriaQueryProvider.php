<?php

declare(strict_types=1);

namespace Swarmtech\Doctrine\ORM\QueryProvider;

use Doctrine\Common\Collections\Criteria;
use Doctrine\ORM\Query;
use InvalidArgumentException;
use Swarmtech\Doctrine\ORM\AbstractQueryProvider;

/**
 * Class FindEntityByCriteriaQueryProvider
 *
 * @package Swarmtech\Doctrine\ORM\QueryProvider
 */
final class FindEntityByCriteriaQueryProvider extends AbstractQueryProvider
{
    /**
     * @param string|null $entityName
     * @param Criteria|null $criteria
     * @return Query
     * @throws Query\QueryException
     */
    public function createQuery(string $entityName = null, Criteria $criteria = null): Query
    {
        if (!$entityName) {
            throw new InvalidArgumentException('Entity name must be defined');
        }

        if (!$criteria instanceof Criteria) {
            throw new InvalidArgumentException('Criteria must be defined');
        }

        $this->queryBuilder
            ->select('e')
            ->from($entityName, 'e')
            ->addCriteria($criteria);

        return $this->queryBuilder->getQuery();
    }
}
