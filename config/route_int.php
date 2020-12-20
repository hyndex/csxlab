<?php
class route
{	
	public $r = array();

	public $route_info = array();
	
	
	public function __construct()
	{
		require_once __DIR__.DS.'route.php';
	}
	
	public function _default()
	{
		
		$this->route_info['controller'] = $this->r['default'][1];
		$this->route_info['action'] = $this->r['default'][2];
		return $this->route_info;

	}
	
	public function getcon($new_keyword)
	{
		$num_rows = count($this->r);
		for($i = 0; $new_keyword != $this->r[$i][0] && $i < $num_rows - 1; $i++);
		
		/* if($i === $num_rules)
			die("404 not found"); */
		
		$this->route_info['controller'] = $this->r[$i][1];
		$this->route_info['action'] = $this->r[$i][2];
		
		return $this->route_info;
	}
};	