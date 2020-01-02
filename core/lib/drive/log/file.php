<?php

namespace core\lib\drive\log;
use core\lib\config;
class file
{
	//log位置
	public $path;
	public function __construct() {
		$config = config::get('OPTION','log');
		$this->path = $config['PATH'];
	}

	public function log($message, $file = 'log') {
		/**
		 * 1. 確定日誌存放位置是否存在
		 * 2. 寫日誌
		 */

		if(!is_dir($this->path.date('Ymd'))){
			mkdir($this->path.date('Ymd'), 0777, true);
		}
		// p($message);
		return file_put_contents($this->path.date('Ymd').'/'.$file.'.php', date('Y)-m-d H:i:s').json_encode($message).PHP_EOL, FILE_APPEND);
	
	}
}