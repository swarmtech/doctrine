<?php
declare(strict_types=1);

namespace Swarmtech\Doctrine\ORM;

use Doctrine\ORM\Query;

/**
 * Interface QueryProviderInterface
 *
 * @package Swarmtech\Doctrine\ORM
 */
interface QueryProviderInterface
{
    /**
     * @param QueryBuilderInterface $queryBuilder
     */
    public function __construct(QueryBuilderInterface $queryBuilder);

    /**
     * @return Query
     */
    public function createQuery(): Query;
}
