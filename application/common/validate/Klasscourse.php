<?php
namespace app\common\validate;
use think\Validate;

class Klasscourse extends Validate{

		protected $rule=[
			'klass_id'=>'require',
			'course_id'	=>'require'	,
			'id'=>'number',		
		];
		protected $scene=[
			'add'=>['klass_id','course_id'],
			'update'=>['id','klass_id','course_id'],
		];

}