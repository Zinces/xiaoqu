<?php
// +----------------------------------------------------------------------
// | OneThink [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013 http://www.onethink.cn All rights reserved.
// +----------------------------------------------------------------------
// | Author: 麦当苗儿 <zuojiazi@vip.qq.com> <http://www.zjzit.cn>
// +----------------------------------------------------------------------

namespace Wechat\Controller;
use OT\DataDictionary;

/**
 * 前台首页控制器
 * 主要获取首页聚合数据
 */
class IndexController extends HomeController {

	//系统首页
    public function index(){
        $this->meta_title='首页';
        $this->display('index');
    }
    public function zushou(){
        $Estate=M('EstateManagement');
        $list=$Estate->where('type=1')->select();
        $list2=$Estate->where('type=2')->select();

        $this->assign('list',$list);
        $this->assign('list2',$list2);
        $this->display('zushou');
    }
    public function zsdetail(){
        $id=array_unique((array)I('id',0));
        //var_dump($id);exit;
        if (empty($id)){
            $this->error('请选择要操作的数据');
        }
        $map=array('id'=>array('in',$id));
        //var_dump($id);
        $list=M('EstateManagement')->where($map)->find();

        $this->assign('list',$list);
        $this->display('zsdetail');
    }
    public function notice(){
        $Estate=M('Document');
        $list=$Estate->where('status=1')->select();


        $this->assign('list',$list);


        $this->display();
    }
}