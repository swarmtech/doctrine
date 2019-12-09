<?php

declare(strict_types=1);

namespace Swarmtech\Doctrine\ORM;

use Doctrine\Common\Collections\Criteria;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Query;
use Doctrine\ORM\Query\QueryException;
use Swarmtech\Doctrine\ORM\QueryBuilder\AliasInterface;
use Swarmtech\Doctrine\ORM\QueryBuilder\CacheInterface;
use Swarmtech\Doctrine\ORM\QueryBuilder\DQLInterface;
use Swarmtech\Doctrine\ORM\QueryBuilder\GroupInterface;
use Swarmtech\Doctrine\ORM\QueryBuilder\JoinInterface;
use Swarmtech\Doctrine\ORM\QueryBuilder\OrderByInterface;
use Swarmtech\Doctrine\ORM\QueryBuilder\ParameterInterface;
use Swarmtech\Doctrine\ORM\QueryBuilder\RestrictionInterface;
use Swarmtech\Doctrine\ORM\QueryBuilder\ResultInterface;
use Swarmtech\Doctrine\ORM\QueryBuilder\UpdateInterface;

/**
 * Interface QueryBuilderInterface
 *
 * @package Swarmtech\Doctrine\ORM
 */
interface QueryBuilderInterface extends
    CacheInterface,
    ResultInterface,
    AliasInterface,
    ParameterInterface,
    UpdateInterface,
    OrderByInterface,
    JoinInterface,
    RestrictionInterface,
    GroupInterface,
    DQLInterface
{
    /**
     * Initializes a new <tt>QueryBuilder</tt> that uses the given <tt>EntityManager</tt>.
     *
     * @param EntityManagerInterface $em The EntityManager to use.
     */
    public function __construct(EntityManagerInterface $em);

    /**
     * Gets the type of the currently built query.
     *
     * @return integer
     */
    public function getType();

    /**
     * Gets the state of this query builder instance.
     *
     * @return integer Either QueryBuilder::STATE_DIRTY or QueryBuilder::STATE_CLEAN.
     */
    public function getState();

    /**
     * Gets the root entities of the query. This is the entity aliases involved
     * in the construction of the query.
     *
     * <code>
     *     $qb = $em->createQueryBuilder()
     *         ->select('u')
     *         ->from('User', 'u');
     *
     *     $qb->getRootEntities(); // array('User')
     * </code>
     *
     * @return array
     */
    public function getRootEntities();

    /**
     * Constructs a Query instance from the current specifications of the builder.
     *
     * <code>
     *     $qb = $em->createQueryBuilder()
     *         ->select('u')
     *         ->from('User', 'u');
     *     $q = $qb->getQuery();
     *     $results = $q->execute();
     * </code>
     *
     * @return Query
     */
    public function getQuery();

    /**
     * Specifies an item that is to be returned in the query result.
     * Replaces any previously specified selections, if any.
     *
     * <code>
     *     $qb = $em->createQueryBuilder()
     *         ->select('u', 'p')
     *         ->from('User', 'u')
     *         ->leftJoin('u.Phonenumbers', 'p');
     * </code>
     *
     * @param mixed $select The selection expressions.
     *
     * @return self
     */
    public function select($select = null);

    /**
     * Adds a DISTINCT flag to this query.
     *
     * <code>
     *     $qb = $em->createQueryBuilder()
     *         ->select('u')
     *         ->distinct()
     *         ->from('User', 'u');
     * </code>
     *
     * @param bool $flag
     *
     * @return self
     */
    public function distinct($flag = true);

    /**
     * Adds an item that is to be returned in the query result.
     *
     * <code>
     *     $qb = $em->createQueryBuilder()
     *         ->select('u')
     *         ->addSelect('p')
     *         ->from('User', 'u')
     *         ->leftJoin('u.Phonenumbers', 'p');
     * </code>
     *
     * @param mixed $select The selection expression.
     *
     * @return self
     */
    public function addSelect($select = null);

    /**
     * Turns the query being built into a bulk delete query that ranges over
     * a certain entity type.
     *
     * <code>
     *     $qb = $em->createQueryBuilder()
     *         ->delete('User', 'u')
     *         ->where('u.id = :user_id')
     *         ->setParameter('user_id', 1);
     * </code>
     *
     * @param string $delete The class/type whose instances are subject to the deletion.
     * @param string $alias The class/type alias used in the constructed query.
     *
     * @return self
     */
    public function delete($delete = null, $alias = null);

    /**
     * Creates and adds a query root corresponding to the entity identified by the given alias,
     * forming a cartesian product with any existing query roots.
     *
     * <code>
     *     $qb = $em->createQueryBuilder()
     *         ->select('u')
     *         ->from('User', 'u');
     * </code>
     *
     * @param string $from The class name.
     * @param string $alias The alias of the class.
     * @param string $indexBy The index for the from.
     *
     * @return self
     */
    public function from($from, $alias, $indexBy = null);

    /**
     * Updates a query root corresponding to an entity setting its index by. This method is intended to be used with
     * EntityRepository->createQueryBuilder(), which creates the initial FROM clause and do not allow you to update it
     * setting an index by.
     *
     * <code>
     *     $qb = $userRepository->createQueryBuilder('u')
     *         ->indexBy('u', 'u.id');
     *
     *     // Is equivalent to...
     *
     *     $qb = $em->createQueryBuilder()
     *         ->select('u')
     *         ->from('User', 'u', 'u.id');
     * </code>
     *
     * @param string $alias The root alias of the class.
     * @param string $indexBy The index for the from.
     *
     * @return self
     *
     * @throws QueryException
     */
    public function indexBy($alias, $indexBy);

    /**
     * Adds criteria to the query.
     *
     * Adds where expressions with AND operator.
     * Adds orderings.
     * Overrides firstResult and maxResults if they're set.
     *
     * @param Criteria $criteria
     *
     * @return self
     *
     * @throws QueryException
     */
    public function addCriteria(Criteria $criteria);
}



















