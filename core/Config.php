<?php

declare(strict_types = 1);

namespace Coolblue\Core;


class Config
{

    protected array $config = [];

    public function __construct(array $env)
    {
        $this->config = [
            'db' => [
                'host'     => $env['DB_HOST'],
                'port'     => $env['DB_PORT'] ?? 3306,
                'user'     => $env['DB_USER'],
                'pass'     => $env['DB_PASS'],
                'database' => $env['DB_DATABASE'],
                'driver'   => $env['DB_DRIVER'] ?? 'mysql',
            ],
        ];
    }

    /**
     * @param string $name
     *
     * @return array|mixed|null
     */
    public function __get(string $name)
    {
        return $this->config[$name] ?? null;
    }

}
