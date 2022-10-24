<?php

declare(strict_types=1);

namespace Listing\Shared\Infrastructure\Database;

use Cycle\Database;
use Cycle\ORM\Factory;
use Cycle\ORM\Mapper\Mapper;
use Cycle\ORM\ORM;
use Cycle\ORM\Schema;
use Cycle\ORM\SchemaInterface;
use Listing\AdListing\Listings\Domain\Listing;

class CycleORMFactory
{
    public function __invoke(Database\DatabaseProviderInterface $dbal): ORM
    {
        return new ORM(new Factory($dbal), new Schema([
            Listing::class => [
                SchemaInterface::MAPPER => Mapper::class,
                SchemaInterface::ENTITY => Listing::class,
                SchemaInterface::TABLE => 'listings',
                SchemaInterface::PRIMARY_KEY => 'id',
                SchemaInterface::COLUMNS => [
                    'id' => 'id',
                    'title' => 'title',
                ],
                SchemaInterface::TYPECAST => [
                    'id' => 'int',
                ],
                SchemaInterface::RELATIONS => [],
            ],
        ]));
    }
}
