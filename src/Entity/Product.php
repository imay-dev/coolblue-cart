<?php
declare(strict_types = 1);

namespace Coolblue\App\Entity;

final class Product
{
    /** @var string */
    const CLASS_PHYSICAL = 'physical';

    /** @var string */
    const CLASS_INSURANCE = 'insurance';

    /** @var string */
    const CASS_SERVICE = 'service';

    /**
     * @param int $productId
     * @param int $unitPrice
     * @param string $productName
     * @param string $productClass
     * @param int $quantity
     */
    public function __construct(
        protected int $productId,
        protected int $unitPrice,
        protected string $productName,
        protected string $productClass,
        protected int $quantity
    )
    {
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
    public function getUnitPrice(): int
    {
        return $this->unitPrice;
    }

    /**
     * @return string
     */
    public function getProductName(): string
    {
        return $this->productName;
    }

    /**
     * @return string
     */
    public function getProductClass(): string
    {
        return $this->productClass;
    }

    /**
     * @return int
     */
    public function getQuantity(): int
    {
        return $this->quantity;
    }

}