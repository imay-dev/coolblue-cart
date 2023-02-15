<?php
declare(strict_types = 1);

namespace Coolblue\App\Entity;

final class ShoppingCartItem
{

    /**
     * @param int $shoppingCartItemId
     * @param int $productId
     * @param int $quantity
     * @param int $unitPrice
     * @param Product $product
     */
    public function __construct(
        protected int $shoppingCartItemId,
        protected int $productId,
        protected int $quantity,
        protected int $unitPrice,
        protected Product $product
    )
    {
    }

    /**
     * @return int
     */
    public function getShoppingCartItemId(): int
    {
        return $this->shoppingCartItemId;
    }

    /**
     * @return int
     */
    public function getProductId(): int
    {
        return $this->productId;
    }

    /**
     * @return int
     */
    public function getQuantity(): int
    {
        return $this->quantity;
    }

    /**
     * @return int
     */
    public function getUnitPrice(): int
    {
        return $this->unitPrice;
    }

    /**
     * @return Product
     */
    public function getProduct(): Product
    {
        return $this->product;
    }

    /**
     * @return int
     */
    public function getSubtotal(): int
    {
        return $this->quantity * $this->unitPrice;
    }
}