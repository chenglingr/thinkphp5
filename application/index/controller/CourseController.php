<?php 
namespace app\index\controller;
use think\Controller;

class CourseController extends Controller{

	public function index()
	{
		$courses=Model('Course')->getAllCurse();
		$this->assign('courses',$courses);
		return $this->fetch();
	}
	public function add()
	{
		return  $this->fetch();
	}
	public function save(){
		if(!request()->isPost()){
			$this->error('请求错误');			
		}
		$data=input('post.');
		$validate=validate('Course');
		if(!$validate->scene('add')->check($data)){
			$this->error($validate->getError());
		}

		$courseData=[
			'name'=>$data['name'],
		];
		$result=model('Course')->add($courseData);
		if($result){
			$this->success('成功','course/index');
		}
		$this->error('失败');
	}
}