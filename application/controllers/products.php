<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Products extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		// $this->output->enable_profiler();
    $this->load->Model('Product');
	}

	public function index()
	{
    $all_products = $this->Product->get_all_products(1);
    // var_dump($all_products);
    // die();
		$this->load->view('/products/display', array('all_products'=>$all_products));
	}
  public function show()
  {
    $this->load->view('/products/info');
  }

}

//end of main controller