<?php
/**
 * Created by PhpStorm.
 * User: kevin
 * Date: 2018-01-23
 * Time: 16:15
 */

class Order_model extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
		$this->load->helper('url');
	}

	public function createOrder($value){
		$value['create_time'] = date('Y-m-d, H:i:s', time());
		$value = array_filter($value);
		$this->db->insert('order',$value);
		$id = $this->db->insert_id();
		return $id;
	}
}