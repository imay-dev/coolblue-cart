<!DOCTYPE html>
<html>
    <head>
        <title>Coolblue Shopping Cart</title>
        <style>
            body {
                font-family: sans-serif;
            }
            table {
                width: 100%;
            }
            table th {
                text-align: left;
                font-size: 125%;
            }
            table th {
                padding-bottom: 1rem;
            }
            .bold {
                font-weight: bold;
            }
        </style>
    </head>
    <body>
        <table>
            <thead>
                <tr>
                    <th>Product name</th>
                    <th>Quantity</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($this->cart->getItems() as $item): ?>
                    <?php $physical = ($item->getProduct()->getProductClass() === \Coolblue\App\Entity\Product::CLASS_PHYSICAL); ?>
                    <?php if ($physical): ?>
                    <tr class="bold">
                    <?php else: ?>
                    <tr>
                    <?php endif; ?>
                        <td>
                            <?php if ($physical): ?>
                            <?=$item->getProduct()->getProductName()?>
                            <?php else: ?>
                            <?= ucfirst($item->getProduct()->getProductClass()) ?>: <?=$item->getProduct()->getProductName()?>
                            <?php endif; ?>
                        </td>
                        <td>
                            <?=$item->getQuantity()?>
                        </td>
                        <td>
                            &euro; <?=number_format($item->getSubtotal() / 100, 2)?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <br/><strong>Total: &euro; <?=number_format($this->cart->getTotal() / 100, 2)?></strong>
    </body>
</html>