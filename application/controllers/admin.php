<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->output->enable_profiler();
  }

  public function index()
  {
    $this->load->view('/admins/index');
  }
  public function login()
  {
    var_dump($this->input->post());
    die();
  }
}

//end of carts controller
