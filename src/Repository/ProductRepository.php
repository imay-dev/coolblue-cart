<?php
declare(strict_types = 1);

namespace Coolblue\App\Repository;

use Coolblue\App\Entity\Product;


class ProductRepository
{
    /** @var \PDO */
    private $connection;

    public function __construct()
    {
        $this->connection = new \PDO("mysql:host=interview_mysql;dbname=coolblue", "interview", "interview");
    }

    /**
     * @param int $productId
     * @return Product
     */
    public function getProduct(int $productId): Product
    {
        $stmt = $this->connection->prepare(
            'SELECT * 
                FROM product 
                WHERE product_id = ?'
        );

        $stmt->execute([$productId]);
        $result = $stmt->fetch();

        return new Product(
            (int) $result['product_id'],
            (int) $result['unit_price'],
            $result['product_name'],
            $result['product_class'],
            (int) $result['quantity']
        );
    }

}
