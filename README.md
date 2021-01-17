# Dhii - Query Interface
A light query abstraction standard.

## Details
This standard allows the abstraction of querying to a SOLID, immutable layer. This layer
provides a CQRS model that represents a parameterized query, and a factory of such models.
The model supports prepared statements, if they are supported by the DB driver. It also
supports query parameter interpolation. This is inspired by [PDO][], and the realization
that this can easily be normalized to an interop interface.

## Examples

### Creat and Run Parameterized Query
```php
<?php
use Dhii\Query\StringQueryFactoryInterface;
use Dhii\Query\QueryInterface;

/* @var StringQueryFactoryInterface $queryFactory */
$query = $queryFactory->query("SELECT * FROM `perons` WHERE `dob` <= :maxDob AND `dob` >= :minDob ");

function getMillenialNames (QueryInterface $query): iterable {
    $results = $query->withParams([
        'maxDob' => '1999-12-31',
        'minDob' => '1980-01-01',
    ])->getResults();
    
    foreach ($results as $row) {
        yield $row->get('name');
    }
}

// A list of people who fall into the Millenials category
$millenialNames = getMillenialNames($query);
```

## Implementations

- [`dhii/pdo-query`][] - An implementation that uses [PDO][]. Supports prepared statements
and DB-backed parameter interpolation.


[`dhii/pdo-query`]: https://github.com/Dhii/pdo-query
[PDO]: https://www.php.net/manual/en/book.pdo.php
