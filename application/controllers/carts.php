<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Carts extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->output->enable_profiler();
	}

	public function index()
	{
		$this->load->view('/carts/index');
	}

	public function add_to_cart()
	{
		$array = array("product_id" => $this->input->post('product_id'), "quantity" => $this->input->post('quantity'));
		$this->load->model('Cart');
		$this->Cart->add_to_cart($array);
	}

}

//end of carts controller
