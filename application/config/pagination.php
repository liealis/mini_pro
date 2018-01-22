<?php
$config['base_url'] = 'http://dev.ci.com/index.php/admin/user/index/'; //控制器绝对路径
$config['per_page'] = 20;   //每个页面中希望展示的数量
$config['num_links'] = 1;  //当前页数左右两边显示几个"数字"，例如 当前也是3  那么效果就是 < 12 3 45 >；
$config['page_query_string'] = TRUE;  //URI 段链接格式，带？和 &的 的链接格式
$config['reuse_query_string'] = TRUE; //查询字符串不被忽略
//$config['query_string_segment'] = 'page'; //分页类默认查询字符串的名称per_page现改为page
$config['first_link'] = '首页';
$config['last_link'] = '尾页';
$config['full_tag_open'] = '<ul class="pagination">';
$config['full_tag_close'] = '</ul>';
$config['first_tag_open'] = '<li>';
$config['first_tag_close'] = '</li>';
$config['cur_tag_open'] = '<li class="active"><span>';
$config['cur_tag_close'] = '</span></li>';
$config['prev_tag_open'] = '<li>';
$config['prev_tag_close'] = '</li>';
$config['next_tag_open'] = '<li>';
$config['next_tag_close'] = '</li>';
$config['num_tag_open'] = '<li>';
$config['num_tag_close'] = '</li>';
$config['last_tag_open'] = '<li>';
$config['last_tag_close'] = '</li>';