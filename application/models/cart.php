<?php

class Dashboard extends CI_Model 
{
	function __construct()
	{
		parent::__construct();
		date_default_timezone_set('America/Los_Angeles');
	}

	public function add_to_cart($array)
	{
		// testing whether user has created a cart
		$test = $this->db->query("SELECT * FROM carts WHERE user_id = ?", array($this->session->user_data('id')))->row_array();
		if (count($test) > 0) {
			// add to existing cart
			$query = "INSERT INTO carts_have_products (id, cart_id, product_id, product_qty) VALUES (?, ?, ?, ?)";
			$values = array($test['user_id]', $test['id'], $array['product_id'], $array['quantity']);
			$this->db->query($query, $values);
		}
		else
		{
			// create new cart

		}

	}
}

?>