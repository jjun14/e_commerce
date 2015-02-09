<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Products extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		// $this->output->enable_profiler();
	}

	public function index()
	{
		$this->load->view('/products/display');
	}
	
  public function show($id)
  {
  	$array = array("product_id" => $id);
    $this->load->view('/products/info', $array);
  }

}

//end of main controller