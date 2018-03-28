<?php
namespace app\common\model;
use think\Model;

class Teacher extends Model{

	public function getAllTeacher(){
		$data=[];
		$order=['id'=>'desc'];
		return $this->where($data)
		->order($order)
		->paginate();
	}

	public function add($data){
		$this->save($data);
		return $this->id;
	}
}