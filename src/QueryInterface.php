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
     * Creates a new query with the specified param.
     *
     * @param string $name The name of the parameter.
     * @phpcsSuppress SlevomatCodingStandard.TypeHints.ParameterTypeHint.MissingAnyTypeHint
     * @param ?scalar|Stringable $value The value of the parameter
     * @return self A new instance of this class, with the specified param added.
     */
    public function withParam(string $name, $value): QueryInterface;

    /**
     * Creates a new query with only the specified params.
     *
     * @phpcsSuppress SlevomatCodingStandard.TypeHints.ParameterTypeHint.MissingTraversableTypeHintSpecification
     * @param array<array-key, ?scalar|Stringable> $params The map of param names to values.
     * @return self A new instance of this class, with only the specified params.
     */
    public function withParams(array $params = []): QueryInterface;

    /**
     * Creates a new query without the specified params.
     *
     * @param list<string> $params The list of names for params to remove.
     * @return self A new instance of this class, without the specified params.
     */
    public function withoutParams(array $params): QueryInterface;
}
