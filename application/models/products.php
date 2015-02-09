<?php

class Product extends CI_Model 
{
	function __construct()
	{
		parent::__construct();
		date_default_timezone_set('America/Los_Angeles');
		$this->output->enable_profiler();
	}

}

?>