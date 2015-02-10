<?php 

class Admin extends CI_Model
{
  public function validate_login($post)
  {
    $this->load->library('form_validation');
    $this->form_validation->set_rules('email', 'Email' ,'required|valid_email');
    $this->form_validation->set_rules('password', 'Password', 'required');
    if ($this->form_validation->run() == FALSE)
    {
      $this->load->view('myform');
    }
    else
    {
      $this->load->view('formsuccess');
    }
  }
}

?>