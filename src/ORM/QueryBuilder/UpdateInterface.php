<?php

declare(strict_types=1);

namespace Swarmtech\Doctrine\ORM\QueryBuilder;

/**
 * Interface UpdateInterface
 *
 * @package Swarmtech\Doctrine\ORM\QueryBuilder
 */
interface UpdateInterface
{
    /**
     * Turns the query being built into a bulk update query that ranges over
     * a certain entity type.
     *
     * <code>
     *     $qb = $em->createQueryBuilder()
     *         ->update('User', 'u')
     *         ->set('u.password', '?1')
     *         ->where('u.id = ?2');
     * </code>
     *
     * @param string $update The class/type whose instances are subject to the update.
     * @param string $alias The class/type alias used in the constructed query.
     *
     * @return self
     */
    public function update($update = null, $alias = null);

    /**
     * Sets a new value for a field in a bulk update query.
     *
     * <code>
     *     $qb = $em->createQueryBuilder()
     *         ->update('User', 'u')
     *         ->set('u.password', '?1')
     *         ->where('u.id = ?2');
     * </code>
     *
     * @param string $key The key/field to set.
     * @param mixed $value The value, expression, placeholder, etc.
     *
     * @return self
     */
    public function set($key, $value);
}
