<?php
namespace app\index\controller;
use think\Controller;


class StudentController extends Controller{

	public function index()
	{
     
		$students=model('Student')->getAllStudentPaginte();
		return $this->fetch('',['students'=>$students]);
	}
	public function add()
	{
		$klasss=model('Klass')->getAllKlass();
		 return $this->fetch('',['klasss'=>$klasss]);
	}
	public function save(){
		if(!request()->post()){
			$this->error('非法提交');
		}
		$data=input('post.');
		//验证数据合法性
		$validate=validate('Student');
		if(!$validate->scene('add')->check($data)){
			$this->error($validate->getError());
		}
		
		$studentData=[
			'name'=>$data['name'],
			'sex'=>$data['sex'],
			'num'=>$data['num'],
			'klass_id'=>$data['klass_id'],
			'email'=>$data['email'],		
		];
		//保存
		$studentid=model('Student')->add($studentData);
		if($studentid){
			$this->redirect(url('student/index'));
		}
		else
			{$this->error('不成功');}
	}

}