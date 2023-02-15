<?php
declare(strict_types = 1);

namespace Coolblue\App\Entity;

final class ShoppingCart
{

    /** @var ShoppingCartItem[] */
    private array $items = [];

    /**
     * @param int $shoppingCartId
     * @param ShoppingCartItem[] $items
     */
    public function __construct(
        protected int $shoppingCartId,
        array $items
    )
    {
        array_walk($items, [$this, 'addItem']);
    }

    /**
     * @return int
     */
    public function getShoppingCartId(): int
    {
        return $this->shoppingCartId;
    }

    /**
     * @return array
     */
    public function getItems(): array
    {
        return $this->items;
    }

    /**
     * @param ShoppingCartItem $item
     * @return self
     */
    public function addItem(ShoppingCartItem $item): self
    {
        $this->items[] = $item;

        return $this;
    }

    /**
     * @return int
     */
    public function getTotal(): int
    {
        $total = 0;

        foreach ($this->getItems() as $item) {
            /** @var ShoppingCartItem $item */
            $total += $item->getSubtotal();
        }

        return $total;
    }
}