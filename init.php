<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/27
 * Time: 22:35
 */
if (!defined(INIT)){
    define('INIT', 1);
    include __DIR__ . '/tools/Autoload.php';
    $autoloader = new \algo\Autoload(__DIR__);
    $autoloader->register();
}