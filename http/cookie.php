<?php
/**
 * cookie的操作
 * PHP操作cookie是存放在$_COOKIE中
 * 浏览器发送cookie是在消息体中,因此$_SERVER['HTTP_COOKIE']里面也会有请求的cookie字符串
 */
class Cookie {
    public static function getCookie() {
       ;
    }
}
session_start();
echo session_id() === $_COOKIE['PHPSESSID']; // cookie与session一一对应
