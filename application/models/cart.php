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
			$this->session->set_userdata('cart_qty', "0");
		}

		// testing whether user has created a cart
		$cart_check = $this->db->query("SELECT * FROM carts WHERE user_id = ?", array($this->session->userdata('id')))->row_array();
		// if a cart is found...
		if (count($cart_check) > 0) {

			// add to existing cart
			$query = "INSERT INTO carts_have_products (product_qty, cart_id, product_id) VALUES (?, ?, ?)";
			$values = array($order_data['quantity'], $cart_check['id'], $order_data['product_id']);
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
		$query = "SELECT users.id, products.id, products.name, products.price, 
			sum(carts_have_products.product_qty) AS product_qty 
		FROM users
		LEFT JOIN carts ON users.id = carts.user_id
		LEFT JOIN carts_have_products ON carts.id = carts_have_products.cart_id
		LEFT JOIN products ON products.id = carts_have_products.product_id
		WHERE users.id = ?
		GROUP BY products.id";
		$values = array($this->session->userdata('id'));
		return $this->db->query($query, $values)->result_array();
	}


	public function update_cart()
	{
		$query = "SELECT sum(product_qty) AS cart_qty FROM carts_have_products LEFT JOIN carts ON cart_id = carts.id WHERE carts.user_id = ?";
		$values = array($this->session->userdata('id'));
		$cart_qty = $this->db->query($query, $values)->row_array();
		$this->session->set_userdata('cart_qty', $cart_qty['cart_qty']);
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
			$query = "INSERT INTO orders_have_products (product_qty, order_id, product_id, created_at, updated_at) VALUES(?, ?, ?, ?, ?)";
			$values = array($products[$i]['product_qty'], $order_id, $products[$i]['id'], date('Y-m-d H:i:s'), date('Y-m-d H:i:s'));
			$this->db->query($query, $values);
		}

		// grab cart id
		$query = "SELECT id FROM carts WHERE user_id = ?";
		$values = array($this->session->userdata('id'));
		$cart_id = $this->db->query($query, $values)->row_array();
		// erase products from cart
		$query = "DELETE FROM carts_have_products WHERE cart_id = ?";
		$values = array($cart_id['id']);
		$this->db->query($query, $values);
		// $values = array();

		$this->session->set_userdata('cart_qty', 0);
	}

	public function delete($product)
	{

		$query = "SELECT cart_id FROM carts_have_products 
		LEFT JOIN carts ON carts.id = carts_have_products.cart_id
		WHERE carts.user_id = ?";
		$values = array($this->session->userdata('id'));
		$cart_id = $this->db->query($query, $values)->row_array();


		$query = "DELETE FROM carts_have_products WHERE cart_id = ? 
		AND product_id = ?";
		$values = array($cart_id['cart_id'], $product['id']);
		$this->db->query($query, $values);

	}

	public function update_qty($product)
	{
		// Grab cart_id
		$query = "SELECT * FROM carts WHERE user_id = ?";
		$values = array($this->session->userdata('id'));
		$cart_id = $this->db->query($query, $values)->row_array();
		// Delete all of product in cart
		$query = "DELETE FROM carts_have_products WHERE product_id = ? AND cart_id = ?";
		$values = array($product['id'], $cart_id['id']);
		$this->db->query($query, $values);
		// Add desired amount of product
		$query = "INSERT INTO carts_have_products (cart_id, product_id, product_qty) VALUES (?, ?, ?)";
		$values = array($cart_id['id'], $product['id'], $product['product_qty']);
		$this->db->query($query, $values);
	}
}













?>