<?php
function revertString(string &$str, int $from, int $to){
    while($from < $to){
        $temp = $str[$from];
        $str[$from++] = $str[$to];
        $str[$to--] = $temp;
    }
}
function rotateString(string $str, int $len){
    revertString($str, 0, $len -1);
    revertString($str, $len, strlen($str) -1);
    revertString($str, 0, strlen($str) -1);
    return $str;
}

$str = 'abcdefgh';
echo "rotate 1-3 is : " . rotateString($str, 3) . "\n";
echo "rotate 1-4 is : " . rotateString($str, 4) . "\n";
