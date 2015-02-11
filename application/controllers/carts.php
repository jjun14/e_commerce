<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Carts extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Cart');
	}

	public function index()
	{
		$products_in_cart = array("products" => $this->Cart->display_cart($this->session->userdata('id')));
		$this->load->view('/carts/index', $products_in_cart);
	}

	public function add_to_cart()
	{
		$order_data = array("product_id" => $this->input->post('product_id'), "quantity" => $this->input->post('quantity'));
		$this->Cart->add_to_cart($order_data);
	}

	public function checkout()
	{

		$products = $this->Cart->display_cart($this->session->userdata('id'));
		$user_data = $this->input->post();
		$this->Cart->checkout($products, $user_data);
	}
}

//end of carts controller
