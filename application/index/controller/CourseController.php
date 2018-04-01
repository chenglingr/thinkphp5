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
}