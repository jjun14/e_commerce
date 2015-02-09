use e_commerce;

SELECT * FROM users;

SELECT * FROM carts;

SELECT * FROM carts_have_products;

SELECT * FROM categories;

SELECT * FROM products;

INSERT INTO categories (name, created_at, updated_at) VALUES ("shirts", NOW(), NOW());

INSERT INTO products (name, description, price, inventory, categories_id, created_at, updated_at)
VALUES ("Men's Health", "The #1 men's health and fitness magazine", 14.99 100, 1, NOW(), NOW());