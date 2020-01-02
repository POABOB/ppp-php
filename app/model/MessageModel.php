<?php

namespace app\model;
use core\lib\model;

class MessageModel extends model
{

	//返回二維，全部
	public function find($table, $para = array(), $where = array()) {
		$data = $this->select($table,$para,$where);
		return $data;
	}

	//返回一維，一條
	public function getone($table, $para = array(), $where = array()) {
		$data = $this->get($table,$para,$where);
		return $data;
	}

	//更新
	public function set($table, $para = array(), $where = array()) {
		return $this->update($table,$para,$where);
	}

	//插入
	public function add($table, $para = array()) {
		return $this->insert($table,$para);
	}

	//刪除
	public function del($table, $where = array()) {
		return $this->delete($table,$where);
	}	

}