<?php

declare(strict_types=1);

namespace Swarmtech\Doctrine\ORM\QueryBuilder;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Query\Parameter;

/**
 * Interface ParameterInterface
 *
 * @package Swarmtech\Doctrine\ORM\QueryBuilder
 */
interface ParameterInterface
{
    /**
     * Sets a query parameter for the query being constructed.
     *
     * <code>
     *     $qb = $em->createQueryBuilder()
     *         ->select('u')
     *         ->from('User', 'u')
     *         ->where('u.id = :user_id')
     *         ->setParameter('user_id', 1);
     * </code>
     *
     * @param string|integer $key The parameter position or name.
     * @param mixed $value The parameter value.
     * @param string|integer|null $type PDO::PARAM_* or \Doctrine\DBAL\Types\Type::* constant
     *
     * @return self
     */
    public function setParameter($key, $value, $type = null);

    /**
     * Sets a collection of query parameters for the query being constructed.
     *
     * <code>
     *     $qb = $em->createQueryBuilder()
     *         ->select('u')
     *         ->from('User', 'u')
     *         ->where('u.id = :user_id1 OR u.id = :user_id2')
     *         ->setParameters(new ArrayCollection(array(
     *             new Parameter('user_id1', 1),
     *             new Parameter('user_id2', 2)
     *        )));
     * </code>
     *
     * @param ArrayCollection|array $parameters The query parameters to set.
     *
     * @return self
     */
    public function setParameters($parameters);

    /**
     * Gets all defined query parameters for the query being constructed.
     *
     * @return ArrayCollection The currently defined query parameters.
     */
    public function getParameters();

    /**
     * Gets a (previously set) query parameter of the query being constructed.
     *
     * @param mixed $key The key (index or name) of the bound parameter.
     *
     * @return Parameter|null The value of the bound parameter.
     */
    public function getParameter($key);
}
