<?php 
namespace app\index\controller;
use think\Controller;

class KlasscourseController extends Controller{

	public function index()
	{
		$kcs=Model('KlassCourse')->getAll();
		$this->assign('kcs',$kcs);
		return $this->fetch();
	}
	public function add()
	{
		$courses=model('Course')->getAllCourseSelect();
		$klasss=model('Klass')->getAllKlass();
		return  $this->fetch('',[
			'courses'=>$courses,
			'klasss'=>$klasss,
		]);
	}
	public function save(){
		if(!request()->isPost()){
			$this->error('请求错误');			
		}
		$data=input('post.');
		$validate=validate('Klasscourse');
		if(!$validate->scene('add')->check($data)){
			$this->error($validate->getError());
		}
		$KlassIDs=$data['klass_id'];//数组
		$courseID=$data['course_id'];
        $kcs=[];
        foreach ($KlassIDs as $key => $KlassID) {
        	$kcs[$key]['klass_id']=$KlassID;
        	$kcs[$key]['course_id']=$courseID;
        }

		$result=model('KlassCourse')->addlist($kcs);
		if($result){
			$this->success('成功','Klasscourse/index');
		}
		$this->error('失败');
	}
}