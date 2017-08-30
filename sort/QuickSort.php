<?php
namespace algo\sort;

class QuickSort{
	
	public static function sort(array $arr){
		$length = count($arr);
		if ($length > 1){
			$key = $arr[0];
			$left = array();
			$right = array();
			$middle = array($key);
			for ($i=1; $i<$length; $i++){
				if ($arr[$i] < $key){
					$left[] = $arr[$i];
				}
				elseif($arr[$i] == $key){
					$middle[] = $arr[$i];
				}
				else{
					$right[] = $arr[$i];
				}
			}
			$left = self::sort($left);
			$right = self::sort($right);
			return array_merge($left, $middle, $right);
		}
		return $arr;	
	}
}
