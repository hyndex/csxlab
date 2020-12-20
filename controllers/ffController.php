<?php

class ffController{
	public $r = [];
	function __construct(){
		//echo "hello world";
	}
	function gg()
	{
		$this->r['title'] = 'fuck';
		$this->r['meta'] = 'u fuck';
		view('ff',$this->r);
	}
}