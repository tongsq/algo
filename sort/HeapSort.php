<?php
/**
 * @author tongsq
 * @since 2017/9/4
 * @desc 堆排序
 */
namespace algo\sort;

class HeapSort{

	public static function sort(array $arr)
	{
		self::initMaxHeap($arr);
		$last = count($arr) - 1;
		for ($i=$last; $i>0; $i--){
			self::swap($arr, 0, $i);
			self::fixMaxHeap($arr, 0, $i);
		}
		return $arr;
	}
	public static function initMaxHeap(array &$arr)
	{
		$length = count($arr);
		$start = floor(($length / 2) - 1);
		while($start>=0){
			self::fixMaxHeap($arr, $start, $length);
			$start--;
		}
	}
	public static function fixMaxHeap(array &$arr, $start, $length)
	{
		$lagest = $start;
		$end = floor(($length / 2) - 1);
		$left = 2*$start+1;
		$right = (2*$start+2);	
		if ($arr[$left]>$arr[$lagest] && $left<$length){
			$lagest = $left;
		}
		if ($right<$length && $arr[$right]>$arr[$lagest]){
			$lagest = $right;
		}
		if ($lagest != $start){
			self::swap($arr, $lagest, $start);
			if ($lagest <= $end)
				self::fixMaxHeap($arr, $lagest, $length);
		}
	}
	public static function swap(array &$arr, int $i, int $j)
	{
		
		$tmp = $arr[$i];
		$arr[$i] = $arr[$j];
		$arr[$j] = $tmp;
		/*
		$arr[$i] = $arr[$i]^$arr[$j];
		$arr[$j] = $arr[$i]^$arr[$j];
		$arr[$i] = $arr[$i]^$arr[$j];
		*/
	}
}

//$arr = array(98,23,55,65,11,32);
//$arr2 = HeapSort::sort($arr);
//var_dump($arr2);
