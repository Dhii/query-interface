<?php

declare(strict_types=1);

namespace Dhii\Query;

use Dhii\Collection\CountableListInterface;
use Dhii\Collection\MapInterface;
use RuntimeException;
use Stringable;

/**
 * A parameterized query.
 *
 * @psalm-immutable
 */
interface QueryInterface
{
    /**
     * Runs the query, and returns the row set.
     *
     * @return CountableListInterface|MapInterface[] The result set.
     * @throws RuntimeException If problem running.
     */
    public function getResults(): iterable;

    /**
     * Creates a new query with only the specified params.
     *
     * @phpcsSuppress SlevomatCodingStandard.TypeHints.ParameterTypeHint.MissingTraversableTypeHintSpecification
     * @param array<array-key, ?scalar|Stringable> $params The map of param names to values.
     * @return self A new instance of this class, with only the specified params.
     */
    public function withParams(array $params = []): QueryInterface;
}
