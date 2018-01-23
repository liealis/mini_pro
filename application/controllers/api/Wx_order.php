<?php
/**
 * Created by PhpStorm.
 * User: kevin
 * Date: 2018-01-23
 * Time: 16:14
 */

class Wx_order extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('Order_model');
	}

	public function createOrder(){
		$value = $this->input->post();
		$result = $this->Order_model->createOrder(json_decode($value['data'],true));
		echo $result;
	}

}