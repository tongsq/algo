<?php
/**
 * @author tongsq
 * @since 2017/9/3
 * @desc 插入排序
 */
namespace algo\sort;

class InsertionSort{

    public static function sort(array $arr){
        $length = count($arr);
        for($i=1; $i<$length; $i++){
            $key = $arr[$i];
            $j = $i - 1;
            while($j>=0){
                if ($arr[$j]>$key){
                    $arr[$j+1] = $arr[$j];
                    $j--;
                }
                else{
                    break;
                }
            }
            $arr[$j+1] = $key;
        }
        return $arr;
    }
}
