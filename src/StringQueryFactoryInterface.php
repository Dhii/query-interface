<?php

declare(strict_types=1);

namespace Dhii\Query;

use PDOStatement;
use RuntimeException;

/**
 * Creates a parameterized query.
 *
 * @psalm-immutable
 */
interface StringQueryFactoryInterface
{
    /**
     * Creates a new query with the specified parameters.
     *
     * @param string $query The parameterized query string. See {@link PDOStatement::bindValue()}.
     * @return QueryInterface The new query.
     * @throws RuntimeException If problem creating.
     */
    public function query(string $query): QueryInterface;
}
