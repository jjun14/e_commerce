<?php

class Product extends CI_Model 
{
	function __construct()
	{
		parent::__construct();
    // $this->output->enable_profiler();
		date_default_timezone_set('America/Los_Angeles');
	}

  function get_all_products($post)
  {
    // var_dump($post);
    $offset = 15 * ($post['page_num'] - 1);
    if(isset($post['sort_by']) && $post['sort_by'] == 'Price')
    {
      if($post['category'] == "Show All")
      {
        $count = $this->db->query("SELECT count(products.id) AS num_products FROM products")->row_array();
        $query = "SELECT products.id, products.name, price, url FROM products
                  LEFT JOIN images ON products.id = images.product_id
                  LEFT JOIN image_types ON image_type_id = image_types.id
                  WHERE image_type_id = 1
                  ORDER BY price ASC
                  LIMIT 15 OFFSET ?";
        $all_products = array($this->db->query($query, $offset)->result_array(), $count['num_products']);
        return $all_products;
      }
      else
      { 
        $count = $this->db->query("SELECT count(products.id) AS num_products FROM products
                                   LEFT JOIN categories ON categories.id = category_id
                                   LEFT JOIN images ON products.id = images.product_id
                                   LEFT JOIN image_types ON image_type_id = image_types.id
                                   WHERE categories.name = ?", $post['category'])->row_array();
        $query = "SELECT products.id, products.name, price, url FROM products
                  LEFT JOIN categories ON categories.id = category_id
                  LEFT JOIN images ON products.id = images.product_id
                  LEFT JOIN image_types ON image_type_id = image_types.id
                  WHERE categories.name = ? AND image_type_id = 1
                  ORDER BY price ASC
                  LIMIT 15 OFFSET ?";
        $all_products = array($this->db->query($query, array($post['category'], $offset))->result_array(), $count['num_products']);
        return $all_products;
      }
    }
    else if(isset($post['sort_by']) && $post['sort_by'] == 'Most Popular')
    {
      if($post['category'] == "Show All")
      {
        $count = $this->db->query("SELECT count(products.id) AS num_products FROM products")->row_array();
        $query = "SELECT products.id, products.name, price, url, SUM(product_qty) AS num_sold FROM products
                  LEFT JOIN orders_have_products ON products_id = products.id
                  LEFT JOIN images ON products.id = product_id
                  GROUP BY products.id
                  ORDER BY num_sold DESC
                  LIMIT 15 OFFSET ?";
        $all_products = array($this->db->query($query, $offset)->result_array(), $count['num_products']);
        // echo "hi";
        // die();
        return $all_products;
      }
      else
      {
        $count = $this->db->query("SELECT count(products.id) AS num_products FROM products
                                   LEFT JOIN orders_have_products ON products_id = products.id
                                   LEFT JOIN images ON products.id = product_id
                                   LEFT JOIN categories ON category_id = categories.id
                                   WHERE categories.name = ?", $post['category'])->row_array();
        $query = "SELECT products.id, products.name, price, url, SUM(product_qty) AS num_sold FROM products
                  LEFT JOIN orders_have_products ON products_id = products.id
                  LEFT JOIN images ON products.id = product_id
                  LEFT JOIN categories ON category_id = categories.id
                  WHERE categories.name = ?
                  GROUP BY products.id
                  ORDER BY num_sold DESC
                  LIMIT 15 OFFSET ?";
        $all_products = array($this->db->query($query, array($post['category'],$offset))->result_array(), $count['num_products']);
        return $all_products;
      }
    }
    else 
    {
      $count = $this->db->query("SELECT count(products.id) AS num_products FROM products")->row_array();
      $query = "SELECT products.*, categories.name AS category_name, SUM(product_qty) AS quantity_sold, url FROM products
                LEFT JOIN categories ON category_id = categories.id
                LEFT JOIN orders_have_products ON products.id = orders_have_products.product_id
                LEFT JOIN images ON products.id = images.product_id
                LEFT JOIN image_types ON image_type_id = images.id
                WHERE image_type_id = 1
                GROUP BY products.id
                LIMIT 15 OFFSET ?";
      $all_products = array($this->db->query($query, $offset)->result_array(), $count['num_products']);
      return $all_products;
    }
  }
  public function search($post)
  {
    $offset = 15 * ($post['page_num'] - 1);
    $count = $this->db->query("SELECT count(products.id) AS num_products FROM products WHERE name LIKE(?)", '%'.$post['search'].'%')->row_array();
    $query = "SELECT products.*, SUM(product_qty) AS quantity_sold, url FROM products
              LEFT JOIN orders_have_products ON products.id = orders_have_products.product_id
              LEFT JOIN images ON images.product_id = products.id
              WHERE name LIKE (?)
              OR products.id LIKE (?)
              GROUP BY products.id
              LIMIT 15 OFFSET ?";
    $like = '%'.$post['search'].'%';
    $all_products = array($this->db->query($query, array($like, $like, $offset))->result_array(), $count['num_products']);
    return $all_products;
  }
  function get_categories_count()
  {
    $query = "SELECT categories.name, count(products.id) AS count FROM products
              LEFT JOIN categories ON categories.id = category_id
              GROUP BY categories.name";
    return $this->db->query($query)->result_array();
  }
  function get_all_categories()
  {
    $query = "SELECT name FROM categories";
    return $this->db->query($query)->result_array();
  }
  function get_product($id)
  {
    $query = "SELECT products.*, url, images.image_type_id FROM products
              LEFT JOIN images ON product_id = products.id
              WHERE products.id = ?";
    return $this->db->query($query, $id)->result_array();
  }
  function get_similar_products($id, $category_id)
  {
    $query = "SELECT products.id, products.name, url FROM products 
              LEFT JOIN images ON product_id = products.id
              WHERE category_id = ?
              AND products.id NOT IN (?)
              ORDER BY rand()
              LIMIT 7";
    $values = array($category_id, $id);
    return $this->db->query($query, $values)->result_array();
  }
  function delete_product($id)
  {
    $query = "DELETE FROM products WHERE id = ?";
    return $this->db->query($query, $id);
  }
}
?>