CREATE TABLE product (
    product_id INT NOT NULL AUTO_INCREMENT,
    unit_price INT NOT NULL,
    product_name VARCHAR(255) NOT NULL,
    product_class ENUM('physical', 'insurance', 'service'),
    quantity INT NOT NULL default 0,
    PRIMARY KEY (`product_id`)
);

CREATE TABLE shopping_cart (
    shopping_cart_id INT NOT NULL AUTO_INCREMENT,
    user_id INT NOT NULL,
    PRIMARY KEY (`shopping_cart_id`)
);

CREATE TABLE shopping_cart_item (
    shopping_cart_item_id INT NOT NULL AUTO_INCREMENT,
    shopping_cart_id INT NOT NULL,
    product_id INT NOT NULL,
    quantity INT NOT NULL,
    unit_price INT NOT NULL,
    PRIMARY KEY (`shopping_cart_item_id`),
    FOREIGN KEY (`shopping_cart_id`) references shopping_cart(`shopping_cart_id`),
    FOREIGN KEY (`product_id`) references product(`product_id`)
);

INSERT INTO product
    (product_id, unit_price, product_name, product_class, quantity)
VALUES
    (1, 89500, 'Apple MacBook Air 13,3" (2017) MQD32N/A', 'physical', 6),
    (2, 7990, '2-year Backup Plan Complete', 'insurance', 83),
    (3, 64900, 'AEG FSE72710P', 'physical', 7),
    (4, 0, 'Take old product with us', 'service', 120),
    (5, 0, 'Place and unpack', 'service', 100),
    (6, 9999, 'Have your product built-in', 'service', 100),
    (7, 2249, 'Case Logic Sleeve 13.3" LAPS-113 Black', 'physical', 12);

INSERT INTO shopping_cart (shopping_cart_id, user_id) VALUES (1, 1);

INSERT INTO shopping_cart_item
    (shopping_cart_item_id, shopping_cart_id, product_id, quantity, unit_price)
VALUES
    (1, 1, 1, 1, 89500),
    (2, 1, 2, 1, 7990),
    (3, 1, 3, 1, 64900),
    (4, 1, 4, 1, 0),
    (5, 1, 5, 1, 0),
    (6, 1, 6, 1, 9999),
    (7, 1, 7, 2, 2249);
