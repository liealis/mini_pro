<?php
/**
 * Created by PhpStorm.
 * User: kevin
 * Date: 2018-01-12
 * Time: 11:23
 */
class Wx_login extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('User_model');
	}

	public function wx_code(){
		$code = $this->input->get_post('code');
		if ($code){
			$AppId = 'wxe30bc3e50cda4310';
			$secret = '73141b6cb2938e365fcc50ffc7814282';
			$result = file_get_contents("https://api.weixin.qq.com/sns/jscode2session?appid={$AppId}&secret={$secret}&js_code={$code}&grant_type=authorization_code");
			echo $result;
		}
	}
	public function setUser(){
		$data = $this->input->post();
		$openid = $data['openid'];
		$userInfo = json_decode($data['userInfo'],true);
		$result = $this->User_model->setUser($openid,$userInfo);
		if ($result == false){
			$array = array(
				'code' => -1,
				'msg' => '已注册'
			);
			echo json_encode($array, JSON_UNESCAPED_UNICODE);
		}elseif ( $result == -1){
		    $array = array(
		        'code' => -2,
                'msg' => '不许有空值'
            );
		    echo json_encode($array,JSON_UNESCAPED_UNICODE);
        }else{
			$id = $result;
			$array = array(
				'code' => 0,
				'data' => array(
					'id' => $id
				),
				'msg' => '注册成功'
			);
			echo json_encode($array, JSON_UNESCAPED_UNICODE);
		}
	}
}