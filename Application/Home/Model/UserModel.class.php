<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2015/8/12
 * Time: 23:28
 */

namespace HOME\Model;
use Think\Model;

class UserModel extends Model
{
    protected $_validate = array
    (
        array('xuehao','require',"用户名必须填写"),
        array('yikatong',"require","密码必须填写"),
        array('xuehao','/^\w{8}$/',"学号格式不正确",1,"regex",3),
        //用户必须是15级
    );

}