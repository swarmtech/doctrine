<?php

declare(strict_types=1);

namespace Swarmtech\Doctrine\ORM\QueryBuilder;

/**
 * Interface DQLInterface
 *
 * @package Swarmtech\Doctrine\ORM\QueryBuilder
 */
interface DQLInterface
{
    /**
     * Either appends to or replaces a single, generic query part.
     *
     * The available parts are: 'select', 'from', 'join', 'set', 'where',
     * 'groupBy', 'having' and 'orderBy'.
     *
     * @param string $dqlPartName The DQL part name.
     * @param object|array $dqlPart An Expr object.
     * @param bool $append Whether to append (true) or replace (false).
     *
     * @return self
     */
    public function add($dqlPartName, $dqlPart, $append = false);

    /**
     * Gets a query part by its name.
     *
     * @param string $queryPartName
     *
     * @return mixed $queryPart
     *
     * @todo Rename: getQueryPart (or remove?)
     */
    public function getDQLPart($queryPartName);

    /**
     * Gets all query parts.
     *
     * @return array $dqlParts
     *
     * @todo Rename: getQueryParts (or remove?)
     */
    public function getDQLParts();

    /**
     * Gets the complete DQL string formed by the current specifications of this QueryBuilder.
     *
     * <code>
     *     $qb = $em->createQueryBuilder()
     *         ->select('u')
     *         ->from('User', 'u');
     *     echo $qb->getDql(); // SELECT u FROM User u
     * </code>
     *
     * @return string The DQL query string.
     */
    public function getDQL();

    /**
     * Resets DQL parts.
     *
     * @param array|null $parts
     *
     * @return self
     */
    public function resetDQLParts($parts = null);

    /**
     * Resets single DQL part.
     *
     * @param string $part
     *
     * @return self
     */
    public function resetDQLPart($part);

    /**
     * Deep clones all expression objects in the DQL parts.
     *
     * @return void
     */
    public function __clone();

    /**
     * Gets a string representation of this QueryBuilder which corresponds to
     * the final DQL query being constructed.
     *
     * @return string The string representation of this QueryBuilder.
     */
    public function __toString();
}
