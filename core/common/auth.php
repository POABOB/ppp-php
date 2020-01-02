<?php

namespace core\common;

class auth 
{
	public function __construct(){
		//沒有帳密直接導到入口
		if(!session_id()){
			session_start();
			if(!isset($_SESSION['id']) && !isset($_SESSION['password'])){
				$url =  base_url();
				header("Location: $url");
    			exit();
			}
		}
	}
}