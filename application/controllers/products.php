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
    $categories_count = $this->Product->get_categories_count();
    $all_products = $this->Product->get_all_products(array("page_num" => 1, "category"=>'show_all'));
    // var_dump($all_products);
    // die();
		$this->load->view('/products/display', array('all_products'=>$all_products, 'page_num'=>1, 'sort_by'=>'price', 'category'=>'show_all', 'categories_count'=>$categories_count));
	}
  public function get_products()
  {
    // var_dump($this->input->post());
    // die();
    $categories_count = $this->Product->get_categories_count();
    // var_dump($categories_count);
    // die();
    $all_products = $this->Product->get_all_products($this->input->post());
    $this->load->view('/products/display', array('all_products'=>$all_products, 'page_num'=>$this->input->post('page_num'), 'category'=>'show_all', 'categories_count'=>$categories_count));
  }
  public function show($id)
  {
    $this->load->view('products/info');
  }
}

//end of main controller