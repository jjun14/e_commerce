<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboards extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
    $this->load->model('Order');
    $this->load->model('Product');
    // $this->output->enable_profiler();
    if($this->session->userdata('logged_in') != true)
    {
      redirect('/products/');
    }
  }

  public function orders()
  {
    $orders = $this->Order->get_all_orders(array('page_num'=>1, 'order_status'=>'show_all'));
    // var_dump($orders);
    // die();
    $this->load->view('/dashboards/orders', array('orders'=>$orders, 'page_num'=>1));
  }
  public function filter_orders()
  {
    // var_dump($this->input->post());
    // die();
    $orders = $this->Order->get_all_orders($this->input->post());
    $this->load->view('/dashboards/orders', array('orders'=>$orders, 'page_num'=>$this->input->post('page_num')));
  }
	public function products()
	{
    $all_products = $this->Product->get_all_products($this->input->post());
		$this->load->view('/dashboards/products', array('all_products'=>$all_products));
	}
}

//end of dashboards controller

// Dashboard comment