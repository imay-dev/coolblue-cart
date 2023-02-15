<?php

declare(strict_types = 1);

namespace Coolblue\App\Controllers;

use Coolblue\App\Repository\ShoppingCartRepository;
use Coolblue\Core\View;

class CartController
{

    /**
     * @return View
     */
    public function index(): View
    {
        $shoppingCartId = isset($_GET['cart_id']) ? (int) $_GET['cart_id'] : 1;

        $cart = (new ShoppingCartRepository())->getShoppingCart($shoppingCartId);
        $items = $cart->getItems();
        $total = $cart->getTotal();

        return View::make('cart', [
            'items' => $items,
            'total' => $total,
        ]);
    }

}
