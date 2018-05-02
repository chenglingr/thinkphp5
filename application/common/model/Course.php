<?php 
namespace app\common\model;
use think\Model;

class Course extends Model{
	public function getAllCurse(){

		$order=['id'=>'desc'];
		return $this->order($order)
					->paginate();
	}
	public function add($data){
		$this->save($data);
		return $this->id;
	}

public function getAllCourseSelect(){

		$order=['id'=>'desc'];
		return $this->order($order)
					->select();
	}

}