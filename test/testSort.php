<?php
include dirname(__DIR__) . '/init.php';
use algo\sort\BubbleSort;
use algo\sort\QuickSort;
use algo\tools\MathTools;
use algo\tools\CommonTools;
use algo\tools\Debug;

function testSort(int $count)
{
	echo "the count is : {$count}\n";
	Debug::logTime('create array');
	$arr = MathTools::randomIntArr(0, 10000, $count);
	//CommonTools::echoArr($arr, ', ');
	$quick = new QuickSort();
	$bubble = new BubbleSort();
	Debug::logTime('create array', 'quick sort');
	$arr2 = $quick->sort($arr);
	//CommonTools::echoArr($arr2, ', ');
	Debug::logTime('quick sort', 'bubble sort');
	$arr3 = $bubble->sort($arr);
	Debug::logTime('bubble sort');
	//CommonTools::echoArr($arr3, ', ');

	Debug::showLogTime();
	echo "\n\n";
}

testSort(10);
testSort(100);
testSort(1000);
testSort(10000);
