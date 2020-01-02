<?php

namespace app\controller;
use core\lib\model;

class Controller extends \core\PPP
{
	public function index()
	{
		$database = new \app\model\initModel();
		
		$data = $database->find(
					'test',
					array(
						'id',
				    	'name',
				    	'hobby'
					),
					array(
						'ORDER' => array('id' => 'DESC')
					)
				);
		// var_dump($data);
		$this->assign('data', $data);
		$this->display('index.html');


	}

	public function test()
	{
		$data = array(
			array(
				'id' => 1,
				'name' => 'M',
				'hobby' => 12
			)
		);
		$this->assign('data', $data);
		$this->display('index.html');
	}
}
