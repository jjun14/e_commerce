<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Carts extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Cart');
		$this->output->enable_profiler();
	}

	public function show()
	{
		$session_id = $this->session->userdata('id');
		$products_in_cart = array("products" => $this->Cart->display_cart($session_id));
		$this->load->view('/carts/index', $products_in_cart);
	}

	public function add_to_cart()
	{
		$order_data = array("product_id" => $this->input->post('product_id'), "quantity" => $this->input->post('quantity'));
		$this->Cart->add_to_cart($order_data);
		$this->load->view('/carts/info');
	}

}

//end of carts controller
