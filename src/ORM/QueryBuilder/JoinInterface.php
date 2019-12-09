<?php

declare(strict_types=1);

namespace Swarmtech\Doctrine\ORM\QueryBuilder;

/**
 * Interface JoinInterface
 *
 * @package Swarmtech\Doctrine\ORM\QueryBuilder
 */
interface JoinInterface
{
    /**
     * Creates and adds a join over an entity association to the query.
     *
     * The entities in the joined association will be fetched as part of the query
     * result if the alias used for the joined association is placed in the select
     * expressions.
     *
     * <code>
     *     $qb = $em->createQueryBuilder()
     *         ->select('u')
     *         ->from('User', 'u')
     *         ->join('u.Phonenumbers', 'p', Expr\Join::WITH, 'p.is_primary = 1');
     * </code>
     *
     * @param string $join The relationship to join.
     * @param string $alias The alias of the join.
     * @param string|null $conditionType The condition type constant. Either ON or WITH.
     * @param string|null $condition The condition for the join.
     * @param string|null $indexBy The index for the join.
     *
     * @return self
     */
    public function join($join, $alias, $conditionType = null, $condition = null, $indexBy = null);

    /**
     * Creates and adds a join over an entity association to the query.
     *
     * The entities in the joined association will be fetched as part of the query
     * result if the alias used for the joined association is placed in the select
     * expressions.
     *
     *     [php]
     *     $qb = $em->createQueryBuilder()
     *         ->select('u')
     *         ->from('User', 'u')
     *         ->innerJoin('u.Phonenumbers', 'p', Expr\Join::WITH, 'p.is_primary = 1');
     *
     * @param string $join The relationship to join.
     * @param string $alias The alias of the join.
     * @param string|null $conditionType The condition type constant. Either ON or WITH.
     * @param string|null $condition The condition for the join.
     * @param string|null $indexBy The index for the join.
     *
     * @return self
     */
    public function innerJoin($join, $alias, $conditionType = null, $condition = null, $indexBy = null);

    /**
     * Creates and adds a left join over an entity association to the query.
     *
     * The entities in the joined association will be fetched as part of the query
     * result if the alias used for the joined association is placed in the select
     * expressions.
     *
     * <code>
     *     $qb = $em->createQueryBuilder()
     *         ->select('u')
     *         ->from('User', 'u')
     *         ->leftJoin('u.Phonenumbers', 'p', Expr\Join::WITH, 'p.is_primary = 1');
     * </code>
     *
     * @param string $join The relationship to join.
     * @param string $alias The alias of the join.
     * @param string|null $conditionType The condition type constant. Either ON or WITH.
     * @param string|null $condition The condition for the join.
     * @param string|null $indexBy The index for the join.
     *
     * @return self
     */
    public function leftJoin($join, $alias, $conditionType = null, $condition = null, $indexBy = null);
}
