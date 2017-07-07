<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/7/6
 * Time: 14:09
 */

namespace Admin\Model;


use Think\Model;

class EstateManagementModel extends Model
{

    protected $_auto=array(
        array('create_time',NOW_TIME,self::MODEL_INSERT),
        array('status','1',self::MODEL_BOTH)
    );
}