<?php
declare(strict_types = 1);

namespace Coolblue\App\Repository;

use Coolblue\App\Entity\Product;
use Coolblue\Core\Repository;

class ProductRepository extends Repository
{

    /**
     * @param int $productId
     * @return Product
     */
    public function getProduct(int $productId): Product
    {
        $stmt = $this->db->prepare(
            'SELECT * 
                FROM product 
                WHERE product_id = ?'
        );

        $stmt->execute([$productId]);
        $result = $stmt->fetch();

        return new Product(
            $result['product_id'],
            $result['unit_price'],
            $result['product_name'],
            $result['product_class'],
            $result['quantity']
        );
    }

}
