<?php
/**
 * Created by PhpStorm.
 * User: kevin
 * Date: 2018-01-08
 * Time: 15:54
 */

class User_model extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
		$this->load->helper('url');
	}

//	public function get_news($slug = FALSE){
//		if ($slug === FALSE)
//		{
//			$query = $this->db->get('tb_user');
//			return $query->result_array();
//		}
//
//		$query = $this->db->get_where('news', array('slug' => $slug));
//		return $query->row_array();
//	}
//
//	public function sign_up(){
//		$data['create_time'] = date('Y-m-d H:i:s',time());
//		$data = array(
//			'name' => $this->input->post('name'),
//			'mobile' => $this->input->post('mobile'),
//			'address' => $this->input->post('address'),
//			'create_time' => $data['create_time']
//		);
//		 $this->db->insert('tb_user',$data);
//		 return $this->db->insert_id();
//	}
//	public function select_user(){
//		return array(
//			'data'=> $this->db->get('tb_user')->result_array(),
//			'count' => $this->db->count_all_results('tb_user')
//		);
//			// $data = $this->db->get_compiled_select('tb_user')
//
//
//	}
//	public function paging($offset,$num){
//		return array(
//			'data' => $this->db->query("select * from tb_user limit {$offset},{$num}")->result_array(),
//			'count' => $this->db->count_all_results('tb_user')
//		);
//	}

	public function setUser($openid,$userInfo){
		//@check_User,检查用户是否已经注册
		$result = $this->check_User($openid);
		if ($result === false){
			return false;
		}else{
		$create_time = date('Y-m-d, H:i:s',time());
		$gender = $userInfo['gender'];
		if ($gender === 1){
		    $gender = 'male';
        }elseif ($gender === 2){
		    $gender = 'female';
        }else{
		    $gender = 'unknow';
        }
		$data =  array(
			'openid' => $openid,
			'nickName' => $userInfo['nickName'],
			'gender' => $gender,
			'country' => $userInfo['country'],
			'province' => $userInfo['province'],
			'city' => $userInfo['city'],
			'create_time' => $create_time
		);
		if ($data['nickName'] == null || $data['country'] == null){
		    return -1;
        }else{
            $this->db->insert('user',$data);
            $id = $this->db->insert_id();
            return $id;
		}

		}
	}

	/**
	 * @param $value
	 * 传入openid 进行查询，如果数据库中已有该用户返回false，反之返回true
	 * @return bool
	 */
	public function check_User($value){
		$result = $this->db->select('openid')
			->where('openid',$value)
			->get('user');
		$row = $result->num_rows();
		if ($row != 0) {
			return false;
		}else{
			return true;
		}
	}

}