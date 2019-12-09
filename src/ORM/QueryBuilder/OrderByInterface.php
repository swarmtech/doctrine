<?php

declare(strict_types=1);

namespace Swarmtech\Doctrine\ORM\QueryBuilder;

use Doctrine\ORM\Query\Expr\OrderBy;

/**
 * Interface OrderByInterface
 *
 * @package Swarmtech\Doctrine\ORM\QueryBuilder
 */
interface OrderByInterface
{
    /**
     * Specifies an ordering for the query results.
     * Replaces any previously specified orderings, if any.
     *
     * @param string|OrderBy $sort The ordering expression.
     * @param string $order The ordering direction.
     *
     * @return self
     */
    public function orderBy($sort, $order = null);

    /**
     * Adds an ordering to the query results.
     *
     * @param string|OrderBy $sort The ordering expression.
     * @param string $order The ordering direction.
     *
     * @return self
     */
    public function addOrderBy($sort, $order = null);
}
