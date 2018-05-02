<?php
namespace app\common\model;
use think\Model;

class Klass extends Model{

	public function getAllKlass(){
		
		$order=['id'=>'desc'];
		return $this->order($order)->select();
	}

	public function add($data){
		$this->save($data);
		return $this->id;
	}
}