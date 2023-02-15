CREATE TABLE shopping_cart (
    shopping_cart_id int not null auto_increment,
    primary key (`shopping_cart_id`)
);

CREATE TABLE shopping_cart_line (
    shopping_cart_line_id int not null auto_increment,
    shopping_cart_id int not null,
    primary key (`shopping_cart_line_id`),
    foreign key shopping_cart(`shopping_cart_id`) references shopping_cart(`shopping_cart_id`)
);

CREATE TABLE shopping_cart_item (
    shopping_cart_item_id int not null auto_increment,
    shopping_cart_line_id int not null,
    quantity int not null,
    unit_price int not null,
    product_name varchar(255) not null,
    product_class varchar(255) not null,
    primary key (`shopping_cart_item_id`),
    foreign key shopping_cartitem(`shopping_cart_line_id`) references shopping_cart_line(`shopping_cart_line_id`)
);

INSERT INTO shopping_cart (shopping_cart_id) VALUES(1);

INSERT INTO shopping_cart_line (shopping_cart_line_id, shopping_cart_id) VALUES (1, 1);
INSERT INTO shopping_cart_line (shopping_cart_line_id, shopping_cart_id) VALUES (2, 1);
INSERT INTO shopping_cart_line (shopping_cart_line_id, shopping_cart_id) VALUES (3, 1);

INSERT INTO shopping_cart_item (shopping_cart_item_id, shopping_cart_line_id, quantity, unit_price, product_name, product_class) VALUES (1, 1, 1, 89500, 'Apple MacBook Air 13,3" (2017) MQD32N/A', 'physical');
INSERT INTO shopping_cart_item (shopping_cart_item_id, shopping_cart_line_id, quantity, unit_price, product_name, product_class) VALUES (2, 1, 1, 7990, '2-year Backup Plan Complete', 'insurance');
INSERT INTO shopping_cart_item (shopping_cart_item_id, shopping_cart_line_id, quantity, unit_price, product_name, product_class) VALUES (3, 2, 1, 64900, 'AEG FSE72710P', 'physical');
INSERT INTO shopping_cart_item (shopping_cart_item_id, shopping_cart_line_id, quantity, unit_price, product_name, product_class) VALUES (4, 2, 1, 0, 'Take old product with us', 'service');
INSERT INTO shopping_cart_item (shopping_cart_item_id, shopping_cart_line_id, quantity, unit_price, product_name, product_class) VALUES (5, 2, 1, 0, 'Place and unpack', 'service');
INSERT INTO shopping_cart_item (shopping_cart_item_id, shopping_cart_line_id, quantity, unit_price, product_name, product_class) VALUES (6, 2, 1, 9999, 'Have your product built-in', 'service');
INSERT INTO shopping_cart_item (shopping_cart_item_id, shopping_cart_line_id, quantity, unit_price, product_name, product_class) VALUES (7, 3, 2, 2249, 'Case Logic Sleeve 13.3" LAPS-113 Black', 'physical');
