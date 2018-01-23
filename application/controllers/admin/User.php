<?php
/**
* 
*/
class User extends CI_Controller
	{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('User_model');
		$this->load->helper('url','form');
		$this->load->library('form_validation','calendar');
	}
	//后台访问用户列表
	public function index()
	{	
		$data = $this->User_model->select_user();
		$this->load->library('pagination');
		$config['total_rows'] = $data['count']; //分页的数据的总行数。通常这个数值是你查询数据库得到的数据总量
		$config['per_page'] = 10;   //每个页面中希望展示的数量
		$per_page = $this->input->get('per_page');
		if (is_null($per_page) || $per_page < $config['per_page']) {
			$current_page = 0;
			$per_page = $config['per_page'];
		}else{
			$current_page  = intval($this->input->get('per_page',true) / 10) ;
		}
		$num = $per_page;
		$offset = $current_page * $config['per_page'];
		$this->pagination->initialize($config);
		$result = $this->User_model->paging($offset,$num);
		$result['link'] = $this->pagination->create_links();
		//视图
		$this->load->view('Admin/header');
		$this->load->view('Admin/user_table',$result,FALSE);
		$this->load->view('Admin/sidebar');
	}
	public function ajax()
	{
		$this->load->library('pagination');
		$data = $this->User_model->select_user();
		$config['total_rows'] = $data['count']; //分页的数据的总行数。通常这个数值是你查询数据库得到的数据总量
		$config['per_page'] = 10;   //每个页面中希望展示的数量
		$per_page = $this->input->post('per_page');
		echo $per_page;
		if (is_null($per_page) || $per_page < $config['per_page']) {
			$current_page = 0;
			$per_page = $config['per_page'];
		}else{
			$current_page  = intval($this->input->get('per_page',true) / 10) ;
		}
		$num = $per_page;
		$offset = ($current_page) * $config['per_page'];

		$this->pagination->initialize($config);

		$result = $this->User_model->paging($offset,$num);
		echo json_encode($result);
	}
}