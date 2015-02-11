<?php

class Cart extends CI_Model 
{
	function __construct()
	{
		parent::__construct();
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
		// retrieves data needed for cart display
		return $this->db->query("SELECT products.id, products.name, products.price, 
			count(carts_have_products.product_qty) AS product_qty 
		FROM users
		LEFT JOIN carts ON users.id = carts.user_id
		LEFT JOIN carts_have_products ON carts.id = carts_have_products.cart_id
		LEFT JOIN products ON products.id = carts_have_products.product_id
		WHERE users.id = 4
		GROUP BY products.id")->result_array();
	}



	public function edit_product_qty()
	{
		

			// // check if the product 
			// $product_check = $this->db->query("SELECT * FROM carts_have_products WHERE product_id = ?", array($order_data['product_id'])->row_array();

			// if ()
	}

	public function checkout($products, $user)
	{
		// insert into shipping table
		$query = "INSERT INTO shippings (first_name, last_name, address_1, address_2, city, state, zipcode, created_at, updated_at) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
		$values = array($user['shipping_first_name'], $user['shipping_last_name'], $user['shipping_address_1'], $user['shipping_address_2'], $user['shipping_city'], $user['shipping_state'], $user['shipping_zipcode'], date('Y-m-d H:i:s'), date('Y-m-d H:i:s'));
		$this->db->query($query, $values);
		$shipping_id = $this->db->insert_id();

		// if "same as" box checked,
		if ($user['same_as'])
		{
			$query = "INSERT INTO billings (first_name, last_name, address_1, address_2, city, state, zipcode, created_at, updated_at) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
			$values = array($user['shipping_first_name'], $user['shipping_last_name'], $user['shipping_address_1'], $user['shipping_address_2'], $user['shipping_city'], $user['shipping_state'], $user['shipping_zipcode'], date('Y-m-d H:i:s'), date('Y-m-d H:i:s'));
			$this->db->query($query, $values);
			// storing latest billings id for
			$billing_id = $this->db->insert_id();
		}
		else // if unchecked,
		{
			$query = "INSERT INTO billings (first_name, last_name, address_1, address_2, city, state, zipcode, created_at, updated_at) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
			$values = array($user['billing_first_name'], $user['billing_last_name'], $user['billing_address_1'], $user['billing_address_2'], $user['billing_city'], $user['billing_state'], $user['billing_zipcode'], date('Y-m-d H:i:s'), date('Y-m-d H:i:s'));
			$this->db->query($query, $values);
			$billing_id = $this->db->insert_id();
		}

		// insert into orders table
		$query = "INSERT INTO orders (total, status, user_id, shipping_id, billing_id, created_at, updated_at) VALUES(?, ?, ?, ?, ?, ?, ?)";
		$values = array($user['total'], "Order in process", $this->session->userdata('id'), $shipping_id, $billing_id, date('Y-m-d H:i:s'), date('Y-m-d H:i:s'));
		$this->db->query($query, $values);
		$order_id = $this->db->insert_id();

		// insert each item in cart
		for ($i=0;$i<count($products);$i++)
		{
			// insert into orders_have_products table
			$query = "INSERT INTO orders_have_products (orders_id, products_id, product_qty) VALUES(?, ?, ?)";
			$values = array($order_id, $products[$i]['id'], $products[$i]['product_qty']);
			$this->db->query($query, $values);
		}
	}
}













?>