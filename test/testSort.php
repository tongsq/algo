<?php
include dirname(__DIR__) . '/init.php';
use algo\sort\BubbleSort;
use algo\sort\QuickSort;
use algo\sort\InsertionSort;
use algo\sort\MergeSort;
use algo\sort\HeapSort;
use algo\tools\MathTools;
use algo\tools\CommonTools;
use algo\tools\Debug;

function testSort(int $count)
{
	echo "the count is : {$count}\n";
	Debug::logTime('create array');
	$arr = MathTools::randomIntArr(0, 10000000, $count);
	CommonTools::isEcho(false);
	CommonTools::echoArr($arr, ', ');
	$quick = new QuickSort();
	$bubble = new BubbleSort();
	Debug::logTime('create array', 'quick sort');
	$arr2 = $quick->sort($arr);
	CommonTools::echoArr($arr2, ', ');
	Debug::logTime('quick sort', 'bubble sort');
	//$arr3 = $bubble->sort($arr);
	//Debug::logTime('bubble sort','insertion sort');
	//CommonTools::echoArr($arr3, ', ');
    //$arr4 = InsertionSort::sort($arr);
	//CommonTools::echoArr($arr4, ', ');
    Debug::logTime('insertion sort', 'merge sort');
    $arr5 = MergeSort::sort($arr);
    Debug::logTime('merge sort', 'heap sort');
	CommonTools::echoArr($arr5, ', ');
	$arr6 = HeapSort::sort($arr);
	Debug::logTime('heap sort', 'php sort');
	CommonTools::echoArr($arr6, ', ');
	sort($arr);
	Debug::logTime('php sort');
	Debug::showLogTime();
	Debug::clearLogTime();
	echo "\n\n";
}
ini_set('memory_limit', '1024M');
testSort(10);
testSort(100);
testSort(1000);
testSort(10000);
testSort(50000);
testSort(100000);
