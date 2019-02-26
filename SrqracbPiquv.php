<?php
/**
 * Created by hcx.
 * User: hcx
 * Date: 2019/2/26
 * Time: 17:49
 */
include_once('tool.php');
$model=new tool();
$data=$model->post_check($_POST);
if(empty($data['username'])){
    tool::res_date([],300,'请输入名字');
}
if(empty($data['contact'])){
    tool::res_date([],300,'请输入邮箱或电话');
}
