<?php
namespace algo\sort;

class BubbleSort{

	public function sort($arr){
		$length = count($arr);
		for($i=0; $i<$length; $i++){
			$end = $length-1-$i;
			for($j=0; $j<$end; $j++){
				if ($arr[$j]>$arr[$j+1]){
					list($arr[$j], $arr[$j+1]) = array($arr[$j+1], $arr[$j]);
				}
			}
		}
		return $arr;
	}
}

