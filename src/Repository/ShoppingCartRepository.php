<?php
declare(strict_types = 1);

namespace Coolblue\App\Repository;

use Coolblue\App\Entity\ShoppingCart;
use Coolblue\App\Entity\ShoppingCartItem;
use Coolblue\Core\Repository;

class ShoppingCartRepository extends Repository
{

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
        $stmt = $this->db->prepare(
            'SELECT * 
            FROM shopping_cart_item 
            WHERE shopping_cart_id = ?'
        );

        $stmt->execute([$shoppingCartId]);

        $items = [];

        while ($result = $stmt->fetch())
        {
            $product = (new ProductRepository())->getProduct($result['product_id']);
            $items[] = new ShoppingCartItem(
                $result['shopping_cart_item_id'],
                $result['product_id'],
                $result['quantity'],
                $result['unit_price'],
                $product
            );
        }

        return $items;
    }
}
