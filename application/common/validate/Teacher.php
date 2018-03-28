<?php
namespace app\common\validate;
use think\Validate;

class Teacher extends Validate{

		protected $rule=[
			'name'=>'require|max:30',
			'username'=>'require|max:16',
			'sex'=>'number|between:0,1',
			'email'=>'email',
			'id'=>'number',		
		];
		protected $scene=[
			'add'=>['name','username'],
			'update'=>['id','name','username'],
		];

}