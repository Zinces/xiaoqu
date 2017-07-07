<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/7/6
 * Time: 14:03
 */

namespace Admin\Controller;




class EstateManagementController extends AdminController
{
    public function index(){

        $list=M('EstateManagement')->select();
        $this->assign('list',$list);
        $this->meta_title='小区租售';
        $this->display();
    }
    public function add(){
       if (IS_POST){
            $Estate=D('EstateManagement');
            $data=$Estate->create();
            if ($data){
                //var_dump($data);exit;
                $id=$Estate->add();
                if ($id){
                    $this->success('新增成功',U('index'));
                }else{
                    $this->error('新增失败'.$Estate->getError());
                }
            }else{
                $this->error($Estate->getError());
            }
       }else{
            $this->meta_title='新增租售';
            $this->display('edit');
       }
    }
    public function edit($id=0){
        if (IS_POST){
            $Estate=D('EstateManagement');
            $data=$Estate->create();
            if ($data){
                //var_dump($data);exit;
                if($Estate->save()){
                    $this->success('修改成功',U('index'));
                }else{
                    $this->error('修改失败'.$Estate->getError());
                }
            } $this->error($Estate->getError());
        }else{
            $info=array();
            $info=M('EstateManagement')->find($id);
            if ($info==false){
                $this->error('信息错误');
            }
            $this->assign('info',$info);
            $this->meta_title='编辑租售';
            $this->display();
        }
    }
    public function del(){
        $id=array_unique((array)I('id',0));
        if (empty($id)){
            $this->error('请选择要操作的数据');
        }
        $map=array('id'=>array('in',$id));
        //var_dump($id);
        if (M('EstateManagement')->where($map)->delete()){
            $this->success('删除成功');
        }else{
            $this->error('删除失败');
        }
    }
}