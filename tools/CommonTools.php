<?php
namespace algo\tools;

class CommonTools{

	public static function echoArr(array $arr, string $splid)
	{
		echo implode($splid, $arr) . "\n";
	}
}
