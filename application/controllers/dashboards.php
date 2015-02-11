<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboards extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
    $this->load->model('Order');
    // $this->output->enable_profiler();
    if($this->session->userdata('logged_in') != true)
    {
      redirect('/products/');
    }
  }

  public function orders()
  {
    $orders = $this->Order->get_all_orders(array('page_num'=>1));
    // var_dump($orders);
    // die();
    $this->load->view('/dashboards/orders', array('orders'=>$orders, 'page_num'=>1));
  }
  public function filter_orders()
  {
    // var_dump($this->input->post());
    // die();
    $orders = $this->Order->get_all_orders($this->input->post());
  }
	public function products()
	{
		$this->load->view('/dashboards/products');
	}
}

//end of dashboards controller

// Dashboard comment