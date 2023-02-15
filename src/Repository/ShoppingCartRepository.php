<?php
declare(strict_types=1);

namespace Coolblue\App\Repository;

use Coolblue\App\Entity\ShoppingCart;
use Coolblue\App\Entity\ShoppingCartItem;
use Coolblue\App\Entity\ShoppingCartLine;

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
    public function getShoppingCart($shoppingCartId): ShoppingCart
    {
        $stmt = $this->connection->prepare("select * from shopping_cart where shopping_cart_id = ?");

        $stmt->execute([$shoppingCartId]);

        $result = $stmt->fetch(\PDO::FETCH_ASSOC);
        $shoppingCartId = (int) $result['shopping_cart_id'];

        return new ShoppingCart(
            $shoppingCartId,
            $this->getLines($shoppingCartId)
        );
    }

    /**
     * @param int $shoppingCartId
     * @return ShoppingCartLine[]
     */
    private function getLines(int $shoppingCartId): array
    {
        $stmt = $this->connection->prepare("select * from shopping_cart_line where shopping_cart_id = ?");

        $stmt->execute([$shoppingCartId]);

        $lines = [];

        while ($result = $stmt->fetch(\PDO::FETCH_ASSOC))
        {
            $lineId = (int) $result['shopping_cart_line_id'];
            $items = $this->getItems($lineId);

            $lines[] = new ShoppingCartLine(
                $lineId,
                $items
            );
        }

        return $lines;
    }

    /**
     * @param int $shoppingCartLineId
     * @return ShoppingCartLine[]
     */
    private function getItems(int $shoppingCartLineId): array
    {
        $stmt = $this->connection->prepare("select * from shopping_cart_item where shopping_cart_line_id = ?");

        $stmt->execute([$shoppingCartLineId]);

        $items = [];

        while ($result = $stmt->fetch(\PDO::FETCH_ASSOC))
        {
            $items[] = new ShoppingCartItem(
                (int) $result['shopping_cart_item_id'],
                (int) $result['quantity'],
                (int) $result['unit_price'],
                (string) $result['product_name'],
                (string) $result['product_class']
            );
        }

        return $items;
    }
}
