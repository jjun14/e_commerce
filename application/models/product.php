<?php

class Product extends CI_Model 
{
	function __construct()
	{
		parent::__construct();
		date_default_timezone_set('America/Los_Angeles');
	}

  function get_all_products($post)
  {
    $offset = 15 * ($post['page_num'] - 1);
    if($post['category'] == "show_all")
    {
      $count = $this->db->query("SELECT count(products.id) AS num_products FROM products")->row_array();
      $query = "SELECT products.id, products.name, price, url FROM products
                LEFT JOIN categories on categories_id = categories.id
                LEFT JOIN images ON products.id = images.product_id
                LEFT JOIN image_types ON image_type_id = image_types.id
                ORDER BY price ASC
                LIMIT 15 OFFSET ?";
      $all_products = array($this->db->query($query, $offset)->result_array(), $count['num_products']);
      return $all_products;
    }
    else
    { 
      $count = $this->db->query("SELECT count(products.id) AS num_products FROM products
                                 LEFT JOIN categories ON categories.id = categories_id
                                 LEFT JOIN images ON products.id = images.product_id
                                 LEFT JOIN image_types ON image_type_id = image_types.id
                                 WHERE categories.name LIKE (?)", $post['category'])->row_array();
      $query = "SELECT products.id, products.name, price, url FROM products
                LEFT JOIN categories ON categories.id = categories_id
                LEFT JOIN images ON products.id = images.product_id
                LEFT JOIN image_types ON image_type_id = image_types.id
                WHERE categories.name LIKE (?)
                ORDER BY price ASC
                LIMIT 15 OFFSET ?";
      $all_products = array($this->db->query($query, array($post['category'], $offset))->result_array(), $count['num_products']);
      return $all_products;
    }
  }
  function get_categories_count()
  {
    $query = "SELECT categories.name, count(products.id) AS count FROM products
              LEFT JOIN categories ON categories.id = categories_id
              GROUP BY categories.name";
    return $this->db->query($query)->result_array();
  }
  function get_product($id)
  {
    $query = "SELECT * FROM products
              WHERE id = ?";
    return $this->db->query($query, $id)->row_array();
  }
  function get_similar_products($id, $categories_id)
  {
    $query = "SELECT products.id, products.name, url FROM products 
              LEFT JOIN images ON product_id = products.id
              WHERE categories_id = ?
              AND products.id NOT IN (?)
              ORDER BY rand()
              LIMIT 7";
    $values = array($categories_id, $id);
    return $this->db->query($query, $values)->result_array();
  }
}
?>