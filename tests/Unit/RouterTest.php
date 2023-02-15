<?php

declare(strict_types = 1);

namespace Tests\Unit;


use Coolblue\Core\Container;
use Coolblue\Core\Exceptions\RouteNotFoundException;
use Coolblue\Core\Router;
use PHPUnit\Framework\TestCase;

class RouterTest extends TestCase
{
    private Router $router;

    protected function setUp(): void
    {
        parent::setUp();

        $this->container = new Container();
        $this->router = new Router($this->container);
    }

    /** @test
     * @covers Router::register
     * @covers Router::get
     */
    public function router_registers_a_valid_route(): void
    {
        $this->router->register('get', '/carts', ['Carts', 'index']);

        $expected = [
            'get' => [
                '/carts' => ['Carts', 'index'],
            ],
        ];

        $this->assertSame($expected, $this->router->routes());
    }

    /** @test
     * @covers Router::get
     */
    public function router_registers_a_valid_get_route(): void
    {
        $this->router->get('/users', ['Users', 'index']);

        $expected = [
            'get' => [
                '/users' => ['Users', 'index'],
            ],
        ];

        $this->assertSame($expected, $this->router->routes());
    }

    /** @test
     * @covers Router::post
     */
    public function router_registers_a_valid_post_route(): void
    {
        $this->router->post('/users', ['Users', 'store']);

        $expected = [
            'post' => [
                '/users' => ['Users', 'store'],
            ],
        ];

        $this->assertSame($expected, $this->router->routes());
    }

    /** @test
     * @covers Router::__construct
     * @covers Router::routes
     */
    public function there_are_no_routes_when_router_is_created(): void
    {
        $this->assertEmpty((new Router($this->container))->routes());
    }

    /**
     * @test
     *
     * @dataProvider routeNotFoundCases
     *
     * @covers Router::post
     * @covers Router::get
     * @covers Router::resolve
     */
    public function resolver_throws_route_not_found_exception(
        string $requestUri,
        string $requestMethod
    ): void {
        $users = new class() {
            public function delete(): bool
            {
                return true;
            }
        };

        $this->router->post('/users', [$users::class, 'store']);
        $this->router->get('/users', ['Users', 'index']);

        $this->expectException(RouteNotFoundException::class);
        $this->router->resolve($requestUri, $requestMethod);
    }

    /**
     * @return string[][]
     */
    public function routeNotFoundCases(): array
    {
        return [
            ['/users', 'put'],
            ['/invoices', 'post'],
            ['/users', 'get'],
            ['/users', 'post'],
        ];
    }

    /** @test
     * @covers Router::get
     * @covers Router::resolve
     */
    public function router_resolves_route_from_a_closure(): void
    {
        $this->router->get('/users', fn() => [1, 2, 3]);

        $this->assertSame(
            [1, 2, 3],
            $this->router->resolve('/users', 'get')
        );
    }

    /** @test
     * @covers Router::get
     * @covers Router::resolve
     */
    public function router_resolves_routes(): void
    {
        $users = new class() {
            public function index(): array
            {
                return [1, 2, 3];
            }
        };

        $this->router->get('/users', [$users::class, 'index']);

        $this->assertSame(
            [1, 2, 3],
            $this->router->resolve('/users', 'get')
        );
    }
}
