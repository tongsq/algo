<?php
namespace algo\tools;
class Debug{

	static function logTime()
	{
		$args = func_get_args();
		$timelog = TimeLog::getInstance();
		foreach($args as $arg){
			$timelog->add($arg);
		}
	}
	static function showLogTime(){
		TimeLog::getInstance()->showTime();
	}
}

class TimeLog{
	static $instance = null;
	
	public $logs = array();
	public $times = array();
	private function __construct(){

	}

	public static function getInstance()
	{
		if (self::$instance == null){
			self::$instance = new self();
			return self::$instance;
		}else{
			return self::$instance;
		}	
	}
	
	public function add($mask)
	{
		if (isset($this->logs[$mask])){
			$this->logs[$mask.'_end'] = microtime(true);
			$this->times[$mask] = $this->logs[$mask.'_end'] - $this->logs[$mask];
		}else{
			$this->logs[$mask] = microtime(true);
		}
	}
	public function showTime()
	{
		foreach($this->times as $key=>$value){
			echo "{$key} : {$value}\n";
		}
	}
}
