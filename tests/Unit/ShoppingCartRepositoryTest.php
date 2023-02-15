<?php

declare(strict_types = 1);

namespace Tests\Unit;

use Coolblue\App\Entity\Product;
use Coolblue\App\Entity\ShoppingCart;
use Coolblue\App\Entity\ShoppingCartItem;
use Coolblue\App\Repository\ShoppingCartRepository;
use Coolblue\Core\App;
use Coolblue\Core\Container;
use PHPUnit\Framework\TestCase;

class ShoppingCartRepositoryTest extends TestCase
{

    private ShoppingCart $shoppingCart;

    public function __construct(?string $name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);

        if (!defined('ROOT_PATH'))
            define('ROOT_PATH', __DIR__ . '/../..');

        (new App(new Container()))->boot()->run();
    }

    function setUp(): void
    {
        parent::setUp();

        $this->setShoppingCart();
    }

    private function setShoppingCart(): void
    {
        $this->shoppingCart = (new ShoppingCartRepository())->getShoppingCart(1);
    }

    /** @test
     * @covers ShoppingCartRepository::getShoppingCart
     * @covers ShoppingCart::getShoppingCartId
     * @covers ShoppingCart::getItems
     */
    public function gets_shopping_cart_with_correct_structure(): void
    {
        $this->assertNotNull($this->shoppingCart);
        $this->assertNotNull($this->shoppingCart->getShoppingCartId());
        $this->assertIsInt($this->shoppingCart->getShoppingCartId());
        $this->assertNotNull($this->shoppingCart->getItems());
        $this->assertIsArray($this->shoppingCart->getItems());
    }

    /** @test
     * @covers ShoppingCartRepository::getItems
     * @covers ShoppingCart::getItems
     * @covers ShoppingCartItem::getShoppingCartItemId
     * @covers ShoppingCartItem::getProductId
     * @covers ShoppingCartItem::getQuantity
     * @covers ShoppingCartItem::getUnitPrice
     * @covers ShoppingCartItem::getSubtotal
     */
    public function gets_items_with_correct_structure(): void
    {
        $items = $this->shoppingCart->getItems();
        $this->assertNotNull($items);
        $this->assertIsArray($items);

        foreach($items as $item) {
            $this->assertTrue($item instanceof ShoppingCartItem);
            $this->assertNotNull($item->getShoppingCartItemId());
            $this->assertIsInt($item->getShoppingCartItemId());
            $this->assertNotNull($item->getProductId());
            $this->assertIsInt($item->getProductId());
            $this->assertNotNull($item->getQuantity());
            $this->assertIsInt($item->getQuantity());
            $this->assertNotNull($item->getUnitPrice());
            $this->assertIsInt($item->getUnitPrice());

            $this->assertNotNull($item->getSubtotal());
            $this->assertIsInt($item->getSubtotal());
        }
    }


    /** @test
     * @covers ShoppingCartRepository::getItems
     * @covers ShoppingCartItem::getProduct
     * @covers Product::getProductId
     * @covers Product::getUnitPrice
     * @covers Product::getProductName
     * @covers Product::getProductClass
     * @covers Product::getQuantity
     */
    public function gets_items_products_with_correct_structure(): void
    {
        $items = $this->shoppingCart->getItems();
        $this->assertNotNull($items);
        $this->assertIsArray($items);

        foreach($items as $item) {
            $product = $item->getProduct();
            $this->assertTrue($product instanceof Product);
            $this->assertNotNull($product->getProductId());
            $this->assertIsInt($product->getProductId());
            $this->assertNotNull($product->getUnitPrice());
            $this->assertIsInt($product->getUnitPrice());
            $this->assertNotNull($product->getProductName());
            $this->assertIsString($product->getProductName());
            $this->assertNotNull($product->getProductClass());
            $this->assertIsString($product->getProductClass());
            $this->assertNotNull($product->getQuantity());
            $this->assertIsInt($product->getQuantity());
        }
    }
}
