<?php

declare(strict_types=1);

use App\Kernel;
use Swoole\Constant;

$_SERVER['APP_RUNTIME_OPTIONS'] = [
    'host' => '0.0.0.0',
    'port' => 8080,
    'mode' => \SWOOLE_BASE,
    'sock_type' => \SWOOLE_SOCK_TCP,
    'settings' => [
        Constant::OPTION_DAEMONIZE => false,
        Constant::OPTION_USER => 'www-data',
        Constant::OPTION_GROUP => 'www-data',
        Constant::OPTION_RELOAD_ASYNC => false,
        Constant::OPTION_REACTOR_NUM => 1,
        Constant::OPTION_WORKER_NUM => 1,
        Constant::OPTION_ENABLE_STATIC_HANDLER => false,
    ],
];

require_once dirname(__DIR__).'/vendor/autoload_runtime.php';

return function (array $context) {
    return new Kernel($context['APP_ENV'], (bool) $context['APP_DEBUG']);
};
