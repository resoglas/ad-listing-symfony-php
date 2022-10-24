<?php

declare(strict_types=1);

namespace Listing\Shared\Infrastructure\Database;

use Cycle\Database;
use Cycle\Migrations;

class CycleMigratorFactory
{
    public function __invoke(Database\DatabaseProviderInterface $dbal, string $projectDir): Migrations\Migrator
    {
        $config = new Migrations\Config\MigrationConfig([
            'directory' => $projectDir.'/migrations/',
            'table' => 'migrations',
            'safe' => true,
        ]);

        return new Migrations\Migrator(
            $config,
            $dbal,
            new Migrations\FileRepository($config)
        );
    }
}
