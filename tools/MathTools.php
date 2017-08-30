<?php
/**
 * @author tongsq
 * @since 2017/8/27
 * @desc MathTools
 */
namespace algo\tools;

class MathTools{
    public static function randomIntArr(int $start, int $end, int $number){
        $arr = array();
		for($i=0; $i<$number; $i++){
			$arr[] = mt_rand($start, $end);
		}
		return $arr;
    }
}
