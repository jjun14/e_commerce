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
		$this->Cart->update_cart();
		$products_in_cart = array("products" => $this->Cart->display_cart($this->session->userdata('id')));
		$this->load->view('/carts/index', $products_in_cart);
	}

	public function checkout()
	{

		$products = $this->Cart->display_cart($this->session->userdata('id'));
		$user_data = $this->input->post();
		$this->Cart->checkout($products, $user_data);
		$this->load->view('/carts/index');
	}

	public function delete($id)
	{
		$product = [];
		$product['id'] = $id;
		$this->Cart->delete($product);
		$this->Cart->update_cart();
		$products_in_cart = array("products" => $this->Cart->display_cart($this->session->userdata('id')));
		$this->load->view('/carts/index', $products_in_cart);
	}

	public function update($id)
	{
		$product = [];
		$product['id'] = $id;
		$product['product_qty'] = $this->input->post('product_qty');
		$this->Cart->update_qty($product);
		$this->Cart->update_cart();
		$products_in_cart = array("products" => $this->Cart->display_cart($this->session->userdata('id')));
		$this->load->view('/carts/index', $products_in_cart);
	}

	public function success()
	{
		$this->load->view('/carts/success');
	}
}

//end of carts controller
