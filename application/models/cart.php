<?php

class Cart extends CI_Model 
{
	function __construct()
	{
		parent::__construct();
		$this->output->enable_profiler();
		date_default_timezone_set('America/Los_Angeles');
	}

	public function add_to_cart($array)
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
		$test = $this->db->query("SELECT * FROM carts WHERE user_id = ?", array($this->session->userdata('id')))->row_array();
		// echo "<h1>ARRAY</h1>";
		// var_dump($array);
		// echo "<h1>TEST</h1>";
		// var_dump($test);
		// echo($this->session->userdata('id'));
		// die();

		if (count($test) > 0) {
			// add to existing cart
			$query = "INSERT INTO carts_have_products (cart_id, product_id, product_qty) VALUES (?, ?, ?)";
			$values = array($test['id'], $array['product_id'], $array['quantity']);
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
			$values = array($this->db->insert_id(), $array['product_id'], $array['quantity']);
			$this->db->query($query, $values);
		}

	}
}

?>