<?php

declare(strict_types=1);

namespace Swarmtech\Doctrine\ORM\QueryBuilder;


/**
 * Interface CacheInterface
 *
 * @package Swarmtech\Doctrine\ORM\QueryBuilder
 */
interface CacheInterface
{
    /**
     *
     * Enable/disable second level query (result) caching for this query.
     *
     * @param boolean $cacheable
     *
     * @return self
     */
    public function setCacheable($cacheable);

    /**
     * @return boolean TRUE if the query results are enable for second level cache, FALSE otherwise.
     */
    public function isCacheable();

    /**
     * @param string $cacheRegion
     *
     * @return self
     */
    public function setCacheRegion($cacheRegion);

    /**
     * Obtain the name of the second level query cache region in which query results will be stored
     *
     * @return string|null The cache region name; NULL indicates the default region.
     */
    public function getCacheRegion();

    /**
     * @return integer
     */
    public function getLifetime();

    /**
     * Sets the life-time for this query into second level cache.
     *
     * @param integer $lifetime
     *
     * @return self
     */
    public function setLifetime($lifetime);

    /**
     * @return integer
     */
    public function getCacheMode();

    /**
     * @param integer $cacheMode
     *
     * @return self
     */
    public function setCacheMode($cacheMode);

}

