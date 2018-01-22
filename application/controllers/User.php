0<?php
/**
 * Created by PhpStorm.
 * User: kevin
 * Date: 2018-01-09
 * Time: 13:39
 */

class User extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('User_model');
		$this->load->helper('form','url','date','security');
		$this->load->library('form_validation','calendar');
	}
	public function index(){
		$this->load->view('User/sign_up');
	}
	public function sign_up(){
		$result = $this->User_model->sign_up();
			if ($result) {
				$this->load->view('User/success');
			}

	}
	public function query(){
		$result = $this->User_model->query();
		echo json_encode($result) ;
	}
}