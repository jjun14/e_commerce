use e_commerce;

SELECT * FROM users;

SELECT * FROM carts;

SELECT * FROM carts_have_products;

SELECT * FROM categories;

SELECT * FROM products;

INSERT INTO products (name, description, price, inventory, category_id, created_at, updated_at)
VALUES ( NOW(), NOW());

SELECT url, images.image_type_id FROM products
              LEFT JOIN images ON product_id = products.id
              WHERE products.id = 3;

SELECT * FROM images;
SELECT * FROM image_types;

INSERT INTO images (url, product_id, image_type_id, created_at, updated_at)
VALUES ( , 1, 2, NOW(), NOW());

SELECT * FROM products;

INSERT INTO categories (name, created_at, updated_at) VALUES ("shirts", NOW(), NOW());

INSERT INTO products (name, description, price, inventory, categories_id, created_at, updated_at)
VALUES ("Men's Health", "The #1 men's health and fitness magazine", 14.99 100, 1, NOW(), NOW());

SELECT products.name, products.price, carts_have_products.product_qty;

SELECT products.name, products.price, count(carts_have_products.product_qty) AS product_qty 
FROM users
LEFT JOIN carts ON users.id = carts.user_id
LEFT JOIN carts_have_products ON carts.id = carts_have_products.cart_idshippings
LEFT JOIN products ON products.id = carts_have_products.product_id
WHERE users.id = 4
GROUP BY products.id;

SELECT * FROM users;
SELECT * FROM user_privileges;

INSERT INTO user_privileges (privilege) VALUES ("admin");

INSERT INTO users (first_name, last_name, email, password, user_privilege_id, created_at, updated_at) VALUES ("Matt", "Rutledge", "matt@gmail.com", "asdfasdf", 1, NOW(), NOW());

SELECT * FROM orders;
SELECT * FROM orders_have_products;

SELECT * FROM shippings;

SELECT * FROM carts_have_products;
DELETE * FROM carts_have_products WHERE ;

SELECT products.id, products.name, price, url FROM products
                  LEFT JOIN images ON products.id = images.product_id
                  LEFT JOIN image_types ON image_type_id = image_types.id
                  WHERE image_type_id = 1
                  ORDER BY price ASC