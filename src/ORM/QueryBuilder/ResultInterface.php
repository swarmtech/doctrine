<?php

declare(strict_types=1);

namespace Swarmtech\Doctrine\ORM\QueryBuilder;

/**
 * Interface ResultInterface
 *
 * @package Swarmtech\Doctrine\ORM\QueryBuilder
 */
interface ResultInterface
{
    /**
     * Sets the position of the first result to retrieve (the "offset").
     *
     * @param integer $firstResult The first result to return.
     *
     * @return self
     */
    public function setFirstResult($firstResult);

    /**
     * Gets the position of the first result the query object was set to retrieve (the "offset").
     * Returns NULL if {@link setFirstResult} was not applied to this QueryBuilder.
     *
     * @return integer The position of the first result.
     */
    public function getFirstResult();

    /**
     * Sets the maximum number of results to retrieve (the "limit").
     *
     * @param integer|null $maxResults The maximum number of results to retrieve.
     *
     * @return self
     */
    public function setMaxResults($maxResults);

    /**
     * Gets the maximum number of results the query object was set to retrieve (the "limit").
     * Returns NULL if {@link setMaxResults} was not applied to this query builder.
     *
     * @return integer|null Maximum number of results.
     */
    public function getMaxResults();
}
