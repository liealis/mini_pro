<?php
/**
 * Created by PhpStorm.
 * User: kevin
 * Date: 2018-01-08
 * Time: 16:04
 */
class News extends CI_Controller{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('User_model');
		$this->load->helper('url_helper');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('calendar');
	}

	public function index(){
		$data['news'] = $this -> news_model->get_news();

		$this->load->view('templates/header', $data);
		$this->load->view('news/index', $data);
		$this->load->view('templates/footer');


	}

	public function view($slug = null){
		$data['news_item'] = $this->news_model->get_news($slug);
		if (empty($data['news_item'])){
			show_404();
		}
		$data['title'] = $data['news_item']['title'];

		$this->load->view('templates/header', $data);
		$this->load->view('news/view', $data);
		$this->load->view('templates/footer');
	}

	public function create(){

		$data['title'] = 'Create a news item';
		$this->form_validation->set_rules('title','Title','required');
		$this->form_validation->set_rules('text','Text','required');

		if($this->form_validation->run() === FALSE) {

			$this->load->view('templates/header', $data);
			$this->load->view('news/create');
			$this->load->view('templates/footer');
		}else{
			$this->news_model->set_news();
			$this->load->view('news/success');
		}
	}
}