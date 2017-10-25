<?php

/*
 +------------------------------------------------------------------------+
 | ZPhal                                                                  |
 +------------------------------------------------------------------------+
 | Copyright (c) 2017 ZPhal Team and contributors                         |
 +------------------------------------------------------------------------+
 | This source file is subject to the New BSD License that is bundled     |
 | with this package in the file docs/LICENSE.txt.                        |
 |                                                                        |
 | If you did not receive a copy of the license and are unable to         |
 | obtain it through the world-wide-web, please send an email             |
 | to gzp@goozp.com so we can send you a copy immediately.                |
 +------------------------------------------------------------------------+
*/

/**
 * 分析常量定义
 */
define('APP_START_TIME', microtime(true));      // 应用起始时间
define('APP_START_MEMORY', memory_get_usage()); // 起始内存使用

// composer 自动加载
require dirname(__DIR__) . '/vendor/autoload.php';

// 加载环境配置
try {
    (new Dotenv\Dotenv(dirname(app_path())))->load();
} catch (Dotenv\Exception\InvalidPathException $e) {
    // Skip
}