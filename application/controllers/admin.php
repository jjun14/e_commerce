<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    // $this->output->enable_profiler();
    $this->load->model('Validation');
  }

  public function index()
  {
    $this->load->view('/admin/index');
  }
  public function login()
  {
    $user = $this->Validation->validate_login($this->input->post());
    if($user == false)
    {
      redirect('/admin/');
    }
    else if($user)
    {
      $this->session->set_userdata('admin_id', $user['id']);
      $this->session->set_userdata('logged_in', true);
      redirect('/dashboards/orders');
    }
  }
  public function log_off()
  {
    $this->session->sess_destroy();
    redirect('/admin/login');
  }
}

//end of carts controller
