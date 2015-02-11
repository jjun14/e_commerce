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
    $all_products = $this->Product->get_all_products(array("page_num" => 1, "category"=>'show_all', 'sort_by'=>'Price'));
    // var_dump($all_products);
    // die();
		$this->load->view('/products/display', array('all_products'=>$all_products, 'page_num'=>1, 'sort_by'=>'Price', 'category'=>'show_all', 'categories_count'=>$categories_count));
	}
  public function get_products()
  {
    // var_dump($this->input->post());
    // die();
    $categories_count = $this->Product->get_categories_count();
    if($this->input->post('product_name'))
    {
      $all_products = $this->Product->search_by_name($this->input->post());
    }
    else 
    {
      $all_products = $this->Product->get_all_products($this->input->post());
    }
      $this->load->view('/products/display', array('all_products'=>$all_products, 'page_num'=>$this->input->post('page_num'), 'sort_by'=>$this->input->post('sort_by') ,'category'=>$this->input->post('category'),'categories_count'=>$categories_count));
  }
  public function show($id)
  {
    $product = $this->Product->get_product($id);
    $similar = $this->Product->get_similar_products($product['id'], $product['categories_id']);
    // var_dump($product);
    // var_dump($similar);
    // var_dump($this->session->userdata);
    $this->load->view('products/info', array('product'=>$product, 'similar'=>$similar));
  }
  public function delete($id)
  {
    die();
    $this->Product->delete_product($id);
  }
}

//end of main controller