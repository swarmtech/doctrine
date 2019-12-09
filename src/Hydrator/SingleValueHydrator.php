<?php
declare(strict_types=1);

namespace Swarmtech\Doctrine\Hydrator;

use Doctrine\ORM\Internal\Hydration\AbstractHydrator;
use PDO;

/**
 * Class SingleValueHydrator
 *
 * @package Swarmtech\Doctrine\Hydrator
 */
final class SingleValueHydrator extends AbstractHydrator
{
    /**
     * @return array
     */
    protected function hydrateAllData(): array
    {
        return $this->_stmt->fetchAll(PDO::FETCH_COLUMN);
    }
}
