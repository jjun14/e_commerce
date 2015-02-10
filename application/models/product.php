<?php

class Product extends CI_Model 
{
	function __construct()
	{
		parent::__construct();
		date_default_timezone_set('America/Los_Angeles');
		$this->output->enable_profiler();
	}

  function get_all_products($page_num)
  {
    $count = $this->db->query("SELECT count(id) AS num_products FROM products")->row_array();
    $offset = 15 * ($page_num - 1);
    $query = "SELECT products.id, products.name, price, url FROM products
              LEFT JOIN categories on categories_id = categories.id
              LEFT JOIN images ON products.id = images.product_id
              LEFT JOIN image_types ON image_type_id = image_types.id
              ORDER BY price ASC
              LIMIT 15 OFFSET ?";
    $all_products = array($this->db->query($query, $offset)->result_array(), $count['num_products']);
    return $all_products;
    // var_dump($all_products);
    // die();
  }
}
?>