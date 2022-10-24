<?php

declare(strict_types=1);

namespace Listing\Shared\Infrastructure\Database;

use Cycle\Database;
use Cycle\Database\Config;

class CycleDatabaseManagerFactory
{
    public function __invoke(string $dsn, string $user, string $password): Database\DatabaseManager
    {
        $dbConfig = new Config\DatabaseConfig([
            'default' => 'default',
            'databases' => [
                'default' => [
                    'connection' => 'mysql',
                ],
            ],
            'connections' => [
                'mysql' => new Config\MySQLDriverConfig(
                    connection: new Config\MySQL\DsnConnectionConfig(
                        dsn: $dsn,
                        user: $user,
                        password: $password,
                    ),
                    reconnect: true,
                    timezone: 'UTC',
                    queryCache: true
                ),
            ],
        ]);

        return new Database\DatabaseManager($dbConfig);
    }
}
