<?php
if($ext == '.css' || $ext == '.js' || $ext == '.png' || $ext == '.jpg' || $ext == '.jpeg' || $ext == '.ico' || $ext == '.mp4' || $ext == 'html')
{

	$url = str_replace('/','_',$_GET['__url']);
	//require_once $url;
	
	die($url);
}
	