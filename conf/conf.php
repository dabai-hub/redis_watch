<?php
/**
 * Created by PhpStorm.
 * User: lhh
 * Date: 2018/10/12
 * Time: 14:43
 */
//没有框架里封装的读取配置文件的方法，定义全局变量
global $redisConf;
global $mailConf;
global $toUser;
$redisConf = [
    [
        'host'=>'127.0.0.1',
        'port'=>'6379',
        'auth'=>'',
        'timeout'=>5
    ]
    /*,
    [
        'host'=>'127.0.0.1',
        'port'=>'30011',
        'auth'=>'',
        'timeout'=>5
    ]*/
];
$mailConf = [
    'smtpserver'=>'smtp.sina.com',
    'smtpserverport'=>25,
    'smtpusermail'=>'send_interface@sina.com',
    'smtpuser'=>'send_interface@sina.com',
    'smtppass'=>'wdt_interface',
    'mailsubject'=>'redis_watch',
    'mailtype'=>'HTML'
 ];

$toUser = 'liuhaijun@wangdian.cn';