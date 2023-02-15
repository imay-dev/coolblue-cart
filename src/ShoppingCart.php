<?php
declare(strict_types=1);

namespace Coolblue\App;

use Coolblue\App\Repository\ShoppingCartRepository;

class ShoppingCart
{
    /** @var \Coolblue\App\Entity\ShoppingCart */
    private $cart;

    public function __construct()
    {
        $shoppingCartId = isset($_GET['cart_id']) ? (int) $_GET['cart_id'] : 1;
        $this->cart = (new ShoppingCartRepository())->getShoppingCart($shoppingCartId);
    }

    /**
     * @return string
     */
    public function render(): string
    {
        ob_start();

        require ROOT_PATH . '/template/cart.tpl';

        $result = ob_get_contents();
        ob_clean();

        return $result;
    }
}
