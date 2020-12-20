<?php
///////////////////////////////////////////////////////////////////////
//  setting up  default things
///////////////////////////////////////////////////////////////////////
define('DS',DIRECTORY_SEPARATOR);

///////////////////////////////////////////////////////////////////////
//  extracting data from url
///////////////////////////////////////////////////////////////////////
if(isset($_GET['__url']))
{
	$url_st = $_GET['__url'];
	$url = explode('/',$url_st);
}
if(empty($url[0]))
{
	
}

elseif($url[0] == 'www' )
{
	require_once __DIR__.DS.'www'.DS.$url[1].DS.$url[2];
	die();
}
elseif($url[0] == 'user' )
{
	require_once __DIR__.DS.'user'.DS.'index.php';
	die();
}


//print_r($url);
///////////////////////////////////////////////////////////////////////
//  including necessery files
///////////////////////////////////////////////////////////////////////
require_once __DIR__.DS.'config'.DS.'registry.php';
require_once __DIR__.DS.'config'.DS.'db.php';
require_once __DIR__.DS.'config'.DS.'route_int.php';

$as = new route;

///////////////////////////////////////////////////////////////////////
//     extracting controllername and action from route "$keyword" 
///////////////////////////////////////////////////////////////////////
if(empty($url[0]))
	{
		//------------------default working ---------------------------------
		$route = $as->_default();
		$url[] = 'default';
	}
else{
		//------------------for keywords  working-----------------------------
		$route = $as->getcon($url[0]);
	}


///////////////////////////////////////////////////////////////////////
//  including Controllers
///////////////////////////////////////////////////////////////////////

if(file_exists(__DIR__.DS.'controllers'.DS.$route['controller'].'Controller.php'))
	require_once __DIR__.DS.'controllers'.DS.$route['controller'].'Controller.php';
else 
	die($route['controller'].'Controller doesnot exist');
//---------------------------------------------------------------------
$controller_class_name = $route['controller'].'Controller';
$controller = new $controller_class_name;
//---------------------------------------------------------------------
if(method_exists($controller/* Classname */ , $route['action'] /* action name */))
{
///////////////////////////////////////////////////////////////////////
//  array shift not working for default
///////////////////////////////////////////////////////////////////////
	
	
	
	array_shift($url);
	//view data is to send data from controller to view file to display
	$view_data = call_user_func_array([$controller /* Classname */  ,$route['action']] /* action name  */, $url /* parameter */);
	
}
else {
	require_once __DIR__.DS.'views'.DS.'404'.DS.'404.html';
	die($route['action'].'Action doesnot exist');
}
	
	

///////////////////////////////////////////////////////////////////////
//  including Model
///////////////////////////////////////////////////////////////////////
function load_model($model)
{
if(file_exists(__DIR__.DS.'models'.DS.$model.'Model.php'))
	require_once __DIR__.DS.'models'.DS.$model.'Model.php';
else {
	require_once __DIR__.DS.'views'.DS.'404'.DS.'404.html';
	die($model.'Model doesnot exist');
}
	

	$model_class_name = $model.'Model';
	$mobj = new $model_class_name; 
	return $mobj;

}

///////////////////////////////////////////////////////////////////////
//  including View
///////////////////////////////////////////////////////////////////////


function view($view , $view_data)
{
	foreach($view_data as $viewVr => $val){
		$viewVr = $val;

	}
	include_once __DIR__.DS.$view['folder'].DS.$view['file'].'.php';
}



///////////////////////////////////////////////////////////////////////
//  IMP FUNCTIONS 
///////////////////////////////////////////////////////////////////////

function randCode($len = 5){
	$char = 'qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM0123456789_-';
	$maxLim = strlen($char)-1;
	$code = '';
	for($i=1;$i<=$len;$i++){
		$code .= $char[mt_rand(0,$maxLim)];
	}
	return $code;
}
