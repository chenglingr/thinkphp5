<?php
namespace app\index\controller;
use think\Controller;


class TeacherController extends Controller{

	public function index()
	{
     
		$teachers=model('teacher')->getAllTeacher();
		return $this->fetch('index1',['teachers'=>$teachers]);
	}
	public function add()
	{
		
		 return $this->fetch();
	}
	public function save(){
		if(!request()->post()){
			$this->error('非法提交');
		}
		$data=input('post.');
		//验证数据合法性
		$validate=validate('Teacher');
		if(!$validate->scene('add')->check($data)){
			$this->error($validate->getError());
		}
		
		$teacherData=[
			'name'=>$data['name'],
			'sex'=>$data['sex'],
			'username'=>$data['username'],
			'password'=>md5($data['password']),
			'email'=>$data['email'],		
		];
		//保存
		$teacherid=model('Teacher')->add($teacherData);
		if($teacherid){
			$this->redirect(url('teacher/index'));
		}
		else
			{$this->error('不成功');}
	}
	public function delete()
	{
		$id=input('param.id');
		if($id==0||is_null($id)){$this->error('参数有误');}
		$teacher=model('Teacher')->get($id);
		if(!is_null($teacher)){
			if($teacher->delete()){
				$this->success('删除成功','teacher/index');
			}
		}
		$this->error('删除失败');
	}
	
	public function detail()
	{
		$id=input('param.id');
		if($id==0||is_null($id)){$this->error('参数有误');}
		$teacher=model('Teacher')->get($id);
		
		$this->assign('teacher',$teacher);
		return	$this->fetch('');
	}
}