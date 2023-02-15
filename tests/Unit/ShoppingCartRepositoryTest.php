<?php

declare(strict_types = 1);

namespace Tests\Unit;

use Coolblue\App\Entity\ShoppingCart;
use Coolblue\App\Entity\ShoppingCartItem;
use Coolblue\App\Entity\ShoppingCartLine;
use Coolblue\App\Repository\ShoppingCartRepository;
use PHPUnit\Framework\TestCase;

class ShoppingCartRepositoryTest extends TestCase
{

    private ShoppingCart $shoppingCart;

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
     * @covers ShoppingCart::getLines
     */
    public function gets_shopping_cart_with_correct_structure(): void
    {
        $this->assertNotNull($this->shoppingCart);
        $this->assertNotNull($this->shoppingCart->getShoppingCartId());
        $this->assertIsInt($this->shoppingCart->getShoppingCartId());
        $this->assertNotNull($this->shoppingCart->getLines());
        $this->assertIsArray($this->shoppingCart->getLines());
    }

    /** @test
     * @covers ShoppingCartRepository::getItems
     * @covers ShoppingCart::getLines
     * @covers ShoppingCartLine::getShoppingCartLineId
     */
    public function gets_items_with_correct_structure(): void
    {
        $lines = $this->shoppingCart->getLines();
        $this->assertNotNull($lines);
        $this->assertIsArray($lines);

        foreach($lines as $line) {
            $this->assertTrue($line instanceof ShoppingCartLine);
            $this->assertNotNull($line->getShoppingCartLineId());
            $this->assertIsInt($line->getShoppingCartLineId());
        }
    }


    /** @test
     * @covers ShoppingCartRepository::getItems
     * @covers ShoppingCart::getLines
     * @covers ShoppingCartLine::getItems
     * @covers ShoppingCartItem::getShoppingCartItemId
     * @covers ShoppingCartItem::getQuantity
     * @covers ShoppingCartItem::getUnitPrice
     * @covers ShoppingCartItem::getProductName
     * @covers ShoppingCartItem::getProductClass
     * @covers ShoppingCartItem::getSubtotal
     */
    public function gets_items_products_with_correct_structure(): void
    {
        $lines = $this->shoppingCart->getLines();
        $this->assertNotNull($lines);
        $this->assertIsArray($lines);

        foreach($lines as $line) {
            $items = $line->getItems();
            foreach ($items as $item) {
                $this->assertTrue($item instanceof ShoppingCartItem);
                $this->assertNotNull($item->getShoppingCartItemId());
                $this->assertIsInt($item->getShoppingCartItemId());
                $this->assertNotNull($item->getQuantity());
                $this->assertIsInt($item->getQuantity());
                $this->assertNotNull($item->getUnitPrice());
                $this->assertIsInt($item->getUnitPrice());
                $this->assertNotNull($item->getProductName());
                $this->assertIsString($item->getProductName());
                $this->assertNotNull($item->getProductClass());
                $this->assertIsString($item->getProductClass());
                $this->assertNotNull($item->getSubtotal());
                $this->assertIsInt($item->getSubtotal());
            }
        }
    }
}
