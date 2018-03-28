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

}