<?php

class Cart extends CI_Model 
{
	function __construct()
	{
		parent::__construct();
		$this->output->enable_profiler();
		date_default_timezone_set('America/Los_Angeles');
	}

	public function add_to_cart($order_data)
	{
		// $this->session->unset_userdata('id');

		// create session data for user
		if (!$this->session->userdata('id'))
		{
			$query = "INSERT INTO users (created_at, updated_at) VALUES (?, ?)";
			$values = array(date('Y-m-d H:i:s'), date('Y-m-d H:i:s'));
			$this->db->query($query, $values);
			$this->session->set_userdata('id', $this->db->insert_id());
		}

		// testing whether user has created a cart
		$cart_check = $this->db->query("SELECT * FROM carts WHERE user_id = ?", array($this->session->userdata('id')))->row_array();

		// if a cart is found...
		if (count($cart_check) > 0) {
		// add to existing cart
		$query = "INSERT INTO carts_have_products (cart_id, product_id, product_qty) VALUES (?, ?, ?)";
		$values = array($cart_check['id'], $order_data['product_id'], $order_data['quantity']);
		$this->db->query($query, $values);
		}
		else
		{

			// create new cart
			$query = "INSERT INTO carts (user_id, created_at, updated_at) VALUES (?, ?, ?)";
			$values = array($this->session->userdata('id'), date('Y-m-d H:i:s'), date('Y-m-d H:i:s'));
			$this->db->query($query, $values);

			// add to newly created cart
			$query = "INSERT INTO carts_have_products (cart_id, product_id, product_qty) VALUES (?, ?, ?)";
			$values = array($this->db->insert_id(), $order_data['product_id'], $order_data['quantity']);
			$this->db->query($query, $values);
		}

	}

	public function display_cart()
	{
		// $query = "SELECT products.name, products.price, "
		return $this->db->query("SELECT products.name, products.price, count(carts_have_products.product_qty) AS product_qty 
FROM users
LEFT JOIN carts ON users.id = carts.user_id
LEFT JOIN carts_have_products ON carts.id = carts_have_products.cart_id
LEFT JOIN products ON products.id = carts_have_products.product_id
WHERE users.id = 4
GROUP BY products.id")->result_array();
// var_dump($query);
// die();
	}



	public function edit_product_qty()
	{
				

			// // check if the product 
			// $product_check = $this->db->query("SELECT * FROM carts_have_products WHERE product_id = ?", array($order_data['product_id'])->row_array();

			// if ()
	}
}

?>