<?php

namespace app\controller;
use app\model\MessageModel;

class MessageController extends \core\PPP
{
	public function index()
	{
		$database = new MessageModel();

		$data = $database->find(
					'message','*',
					array(
						'ORDER' => array('id' => 'ASC')
					)
				);
		// p(base_url('/Message/save'));
		$this->assign('data', $data);
		$this->display('index.html');
	}

	public function add()
	{
		$this->display('add.html');
	}

	public function info()
	{
		$database = new MessageModel();

		$id = get('id',false,'int');

		$data = $database->getone('message','*',array('id' => $id));

		$this->assign('data', $data);
		$this->display('info.html');
	}

	public function save()
	{
		//post()可以過濾所POST的值
		$data['title'] = post('title');
		$data['content'] = post('content');

		if($data['title'] == '' && $data['content'] == ''){
			$this->redirect('/Message/index');
		}

		$database = new MessageModel();

		$return = $database->add(
					'message',
					array(
				    	'title' => $data['title'],
				    	'content' => $data['content'],
				    	'create_at' => date('Y-m-d H:i:s')
					)
				);

		if($return) {
			p('ok');
		} else {
			p('error');
		}

		// $this->redirect('/Message/index');
	}

	public function del()
	{
		$id = get('id',false,'int');

		$database = new MessageModel();

		$data = $database->del(
					'message',
					array(
						'id' => $id
					)
				);

		$this->redirect('/Message/index');
	}
}