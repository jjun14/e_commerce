<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Orders extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->output->enable_profiler();
    $this->load->model('Order');
	}

	public function show()
	{
		$this->load->view('orders/show');
	}
  public function update()
  {
    $this->Order->update_status($this->input->post());
    redirect('/dashboards/orders');
  }
}

//end of orders controller