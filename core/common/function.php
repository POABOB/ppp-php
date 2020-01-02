<?php

function p($var)
{
	if (is_bool($var)) {
		var_dump($var);
	} else if (is_null($var)) {
		var_dump(NULL);
	} else {
		echo "<pre>".print_r($var, true)."</pre>";
	}
}

/**
 *@param $name 對應值
 *@param $default 默認值
 *@param $fitt 過濾方法 'int'
 */

function post($name, $default = false, $fitt = false)
{
	if (isset($_POST[$name])) {
		if($fitt) {
			switch ($fitt) {
				case 'int':
					if(is_numeric($_POST[$name])) {
						return $_POST[$name];
					} else {
						return $default;
					}
					break;
				default:
					# code...
					break;
			}
		} else {
			return $_POST[$name];
		}
	} else {
		return $default;
	}
}

/**
 *@param $name 對應值
 *@param $default 默認值
 *@param $fitt 過濾方法 'int'
 */

function get($name, $default = false, $fitt = false)
{
	if (isset($_GET[$name])) {
		if($fitt) {
			switch ($fitt) {
				case 'int':
					if(is_numeric($_GET[$name])) {
						return $_GET[$name];
					} else {
						return $default;
					}
					break;
				default:
					# code...
					break;
			}
		} else {
			return $_GET[$name];
		}
	} else {
		return $default;
	}
}

function base_url($string = '/')
{
	if(strlen($string) != 1) {
		if((substr($string, 0, 1)) != '/') {
			$string = '/'.$string;
		}
	}
	return HTTP.$_SERVER['SERVER_NAME'].URL.$string;
}

function site_url($string = '/')
{
	if(strlen($string) != 1) {
		if((substr($string, 0, 1)) != '/') {
			$string = '/'.$string;
		}
	}
	return HTTP.$_SERVER['SERVER_NAME'].URL.'/app/views/assets'.$string;
}

//判斷方法
function http_method()
{
    if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
        return 'POST';
    } else {
        return 'GET';
    }
}

function show404()
{
    header('HTTP/1.1 404 Not Found');
    header("status: 404 Not Found");
    exit();
}

function json($array)
{
    header('Content-Type:application/json; charset=utf-8');
    echo json_encode($array);
}