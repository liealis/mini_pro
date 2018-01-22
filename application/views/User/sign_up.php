<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>注册页面</title>
</head>
	<?php
	$time = time();
	$hidden = array('create_time' => $time);

	 echo form_open('User/sign_up','',$hidden);?>
	<label for="用户名">用户名</label>
	<input type="text" name="name" /><br />
	<label for="mobile">手机号</label>
	<input type="tel" name="mobile" /><br />
    <label for="age">年龄</label>
    <input type="text" name="age" /><br />
	<label for="title">地址</label>
	<input type="text" name="address" /><br />
<!--    <input type="hidden" name="--><?php //echo $this->security->get_csrf_token_name(); ?><!--" value="--><?php //echo $this->security->get_csrf_hash(); ?><!--">-->

    <input type="submit" name="提交"/>

</body>
</html>