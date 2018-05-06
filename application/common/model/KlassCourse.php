<?php
namespace app\common\model;
use think\Model;

class KlassCourse extends Model{

	public function getAll(){
	
		$order=['id'=>'desc'];
		return $this->order($order)
		->paginate();
	}

	public function add($data){
		$this->save($data);
		return $this->id;
	}
	public function addlist($data){
		return $this->saveAll($data);
		
	}
	public function Klass(){
		return $this->belongsTo('Klass');
	}
	public function Course(){
		return $this->belongsTo('Course');
	}
}