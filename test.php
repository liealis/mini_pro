<?php
/**
 * Created by PhpStorm.
 * User: kevin
 * Date: 2018/1/22
 * Time: 上午11:05
 */
$arr = array(
    'name' => 'kevin',
    'age' => ''
);
$newArr = array_filter($arr);

if (sizeof($newArr) == 1){
    echo '有空值';
}else{
    echo '无空值';
}

var_dump($newArr);