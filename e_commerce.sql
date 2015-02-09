use e_commerce;

SELECT * FROM users;

SELECT * FROM carts;

SELECT * FROM carts_have_products;

SELECT * FROM categories;

SELECT * FROM products;

INSERT INTO categories (name, created_at, updated_at) VALUES ("shirts", NOW(), NOW());

INSERT INTO products (name, description, price, inventory, categories_id, created_at, updated_at)
VALUES ("Men's Health", "The #1 men's health and fitness magazine", 14.99 100, 1, NOW(), NOW());

SELECT products.name, products.price, carts_have_products.product_qty;

SELECT products.name, products.price, count(carts_have_products.product_qty) AS product_qty 
FROM users
LEFT JOIN carts ON users.id = carts.user_id
LEFT JOIN carts_have_products ON carts.id = carts_have_products.cart_id
LEFT JOIN products ON products.id = carts_have_products.product_id
WHERE users.id = 4
GROUP BY products.id;