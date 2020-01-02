<?php

namespace core;

class ppp
{
	//紀錄類，避免重複加載
	public static $classMap = array();
	public $assign;

	//執行
	static public function run()
	{


		//目前不開啟log
		//log初始化
		// \core\lib\log::init();

		$route = new \core\lib\route();

		//先定義原本index為Controller，如果非index的話，則套入別的名字
		$controllerfile = APP.'/controller/Controller.php';
		$controllerClass = '\\'.MODULE.'\controller\Controller';
		//我index控制器叫Controller，所以控制器是index的話其class為空
		if($route->controller != 'index') {
			$controllerfile = APP.'/controller/'.$route->controller.'Controller.php';
			$controllerClass = '\\'.MODULE.'\controller\\'.$route->controller.'Controller';
		}
		//方法
		$action = $route->action;

		//如果存在檔案，則使用
		if(is_file($controllerfile)) {
			//引入控制器
			include $controllerfile;
			//初始化
			$controller = new $controllerClass();
			if (method_exists($controller, $action)) {
				//使用方法
				$controller->$action();
	        }
	        else {
	            if (DEBUG) {
	                throw new \Exception('找不到function '.$action);
	            }
	            else {
	                show404();
	            }
	        }
		} else {
			if (DEBUG) {
                throw new \Exception('找不到控制器 '.$controllerClass);;
            }
            else {
                show404();
            }
		}
		//紀錄訪問的控制器及方法
		// \core\lib\log::log('Controller: '.$controllerClass.', Action: '.$action);
	}

	static public function load($class)
	{
		//自動加載類庫
		//new \core\route();
		//$class = '\core\route';
		//PPP.'\core\route.php';

		//如果Map裡頭已經加載，就返回true
		if(isset($classMap[$class])) {
			return true;
		} else {
			//替換\\成/
			$class = str_replace('\\', '/', $class);
			$file = PPP.'/'.$class.'.php';
			//如果有這個php，直接加載
			if(is_file($file)) {
				include $file;
				//因為為靜態陣列，使用self來call，再加入Map中
				self::$classMap[$class] = $class;
			} else {
				return false;
			}
		}	
	}
	//賦值給視圖
	public function assign($name, $value)
	{
		$this->assign[$name] = $value;
	}
	//顯示html或是php
	public function display($file)
	{
		//原先view
		// $file = APP.'/views/'.$file;
		// if(is_file($file)) {
		// 	extract($this->assign);
		// 	include $file;
		// }

		//twig view

		if(is_file(APP.'/views/'.$file)) {
                $loader = new \Twig\Loader\FilesystemLoader(APP . '/views');
                $twig = new \Twig\Environment($loader, [
                    'cache' => PPP.'/log/twig',
                    'debug' => DEBUG
                ]);

                $filter = new \Twig\TwigFilter('base_url', 'base_url');

                $twig->addFilter($filter);

                $filter = new \Twig\TwigFilter('site_url', 'site_url');
                $twig->addFilter($filter);

                $template = $twig->load($file);
                $template->display($this->assign ? $this->assign : array());
		}
	}

	//redirect
	public function redirect($url = '/')
	{
		$url =  base_url($url);
		// var_dump($url);
		header("Location: $url");
    	exit();
	}

}