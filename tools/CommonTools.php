<?php
namespace algo\tools;

class CommonTools{

	public static $isEcho = true;
	public static function echoArr(array $arr, string $splid)
	{
		if (self::$isEcho)
			echo implode($splid, $arr) . "\n";
	}
	public static function isEcho(bool $isEcho)
	{
		self::$isEcho = $isEcho;
	}
}
