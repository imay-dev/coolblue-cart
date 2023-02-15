<?php

declare(strict_types = 1);

namespace Coolblue\Core;

use Coolblue\Core\Exceptions\RouteNotFoundException;
use Dotenv\Dotenv;


class App
{
    private static DB $db;

    public function __construct(
        protected Container $container,
        protected ?Router $router = null,
        protected array $request = [],
    ) {
    }

    /**
     * @return DB
     */
    public static function db(): DB
    {
        return static::$db;
    }

    /**
     * @return $this
     */
    public function boot(): static
    {
        $dotenv = Dotenv::createImmutable(ROOT_PATH);
        $dotenv->load();

        $config = new Config($_ENV);

        static::$db = new DB($config->db ?? []);

        return $this;
    }

    public function run(): void
    {
        try {
            if ($this->router)
                echo $this->router->resolve($this->request['uri'], strtolower($this->request['method']));
        } catch (RouteNotFoundException) {
            http_response_code(404);

            echo View::make('error/404');
        }
    }
}
