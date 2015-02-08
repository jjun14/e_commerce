<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboards extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->output->enable_profiler();
	}

  public function orders()
  {
    $this->load->view('/dashboards/orders');
  }
	public function products()
	{
		$this->load->view('/dashboards/products');
	}
}

//end of dashboards controller

// Dashboard comment