<?php
/**
 * @author tongsq
 * @since 2017/9/3
 * @desc 归并排序
 */
namespace algo\sort;

class MergeSort{

    public static function sort(array $arr){
        self::mergeSort($arr, 0, count($arr)-1);
        return $arr;
    }

    private static function mergeSort(array &$arr,int $p,int $r){
        if ($p<$r){
            $q = (int) (($r + $p) / 2);
            self::mergeSort($arr, $p, $q);
            self::mergeSort($arr, $q+1, $r);
            self::merge($arr, $p, $q, $r);
        }
    }

    private static function merge(array &$arr, int $p, int $q, int $r){
        $arr_tmp = $arr;
        $q_tmp = $q;
        $i = $p;
        $q++;
        while($p<=$q_tmp || $q<=$r){
            if ($q > $r || ($p<=$q_tmp && $arr_tmp[$p]<=$arr_tmp[$q])){
                $arr[$i] = $arr_tmp[$p];
                $p++;
                $i++;
            }else{
                $arr[$i] = $arr_tmp[$q];
                $q++;
                $i++;
            }
        }
    }
}

