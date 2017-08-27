<?php
/**
 * @author tongsq
 * @since 2017/8/27
 * @desc 
 */
namespace algo\math;

$step = 0.0000001;
$total = 0;
for ($x = 0; $x <= 10;){
    $y1 = 100 - $x*$x;
    $x += $step;
    $part = $step * sqrt($y1);
    $total += $part;
}
$pi = (4 * $total) / 100;
echo "pi is :" . $pi . "\n";

