<?php

declare(strict_types=1);

namespace Swarmtech\Doctrine\ORM;

/**
 * Class AbstractQueryProvider
 *
 * @package Swarmtech\Doctrine\ORM
 */
abstract class AbstractQueryProvider implements QueryProviderInterface
{
    /**
     * @var QueryBuilderInterface
     */
    protected $queryBuilder;

    /**
     * @param QueryBuilderInterface $queryBuilder
     */
    public function __construct(QueryBuilderInterface $queryBuilder)
    {
        $this->queryBuilder = $queryBuilder;
    }
}
