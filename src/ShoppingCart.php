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
        $this->cart = (new ShoppingCartRepository())->getShoppingCart(($_GET["cartid"]) ? $_GET["cartid"] : 1);
    }

    /**
     * @return string
     */
    public function render(): string
    {
        ob_start();

        require __DIR__ . '/../template/cart.tpl';

        $result = ob_get_contents();
        ob_clean();

        return $result;
    }
}
