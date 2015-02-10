<?php 

class Validation extends CI_Model
{
  public function validate_login($post)
  {
    $this->load->library('form_validation');
    $this->form_validation->set_rules('email', 'Email' ,'required|valid_email');
    $this->form_validation->set_rules('password', 'Password', 'required');
    if($this->form_validation->run() == FALSE)
    {
      $this->session->set_flashdata('errors', validation_errors());
      return false;
    }
    else if($this->check_email_pw($post) == FALSE)
    {
      $this->session->set_flashdata('errors', "<p>Invalid login credentials</p>");
    }
    else
    {
      return $this->check_email_pw($post);
    }
  }

  public function check_email_pw($post)
  {
    $query = "SELECT * FROM users
              WHERE email = ? AND password = ?";
    $values = array($post['email'], md5($post['password']));
    $user = $this->db->query($query, $values)->row_array();
    if($user)
    {
      return $user;
    }
    else
    {
      return false;
    }
  }
}

?>