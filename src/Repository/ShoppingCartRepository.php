<?php
declare(strict_types = 1);

namespace Coolblue\App\Repository;

use Coolblue\App\Entity\ShoppingCart;
use Coolblue\App\Entity\ShoppingCartItem;


class ShoppingCartRepository
{
    /** @var \PDO */
    private $connection;

    public function __construct()
    {
        $this->connection = new \PDO("mysql:host=interview_mysql;dbname=coolblue", "interview", "interview");
    }

    /**
     * @param int $shoppingCartId
     * @return ShoppingCart
     */
    public function getShoppingCart(int $shoppingCartId): ShoppingCart
    {
        return new ShoppingCart(
            $shoppingCartId,
            $this->getItems($shoppingCartId)
        );
    }

    /**
     * @param int $shoppingCartId
     * @return ShoppingCartItem[]
     */
    private function getItems(int $shoppingCartId): array
    {
        $stmt = $this->connection->prepare(
            'SELECT * 
            FROM shopping_cart_item 
            WHERE shopping_cart_id = ?'
        );

        $stmt->execute([$shoppingCartId]);

        $items = [];

        while ($result = $stmt->fetch())
        {
            $product = (new ProductRepository())->getProduct((int) $result['product_id']);
            $items[] = new ShoppingCartItem(
                (int) $result['shopping_cart_item_id'],
                (int) $result['product_id'],
                (int) $result['quantity'],
                (int) $result['unit_price'],
                $product
            );
        }

        return $items;
    }
}
