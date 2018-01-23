<?php

class FrameWork {
    /**
     * 内核初始化
     * 解析出来类与方法
     * http://localhost/index.php/Home/index?id=25
     */
    public static function init() {
        // 获取URI，也就是从域名后面开始的全部
        $request_uri = $_SERVER['REQUEST_URI']; // /index.php/Home/index?id=25
        // 获取网站根目录以及PHP文件名，也就是从主机到Index.php中间的所有字符
        $script_name = $_SERVER['SCRIPT_NAME']; // /index.php
        // 解析控制器
        $request = str_replace($script_name, '', $request_uri); // /Home/index?id=25
        $request = ltrim($request, '/'); // Home/index?id=25
        // 请求资源数组
        $request_array = explode('?', $request); // 0 => Home/index 1 => id=25
        // 控制器
        $controller_action = $request_array[0]; // Home/inedx
        $controller_action = explode('/', $controller_action); // 0 => Home 1 => index
        // 解析出控制器 Home
        $controller = $controller_action[0]; // Home
        // 解析出方法 index
        $action = $controller_action[1]; // index
        return ['controller' => $controller, 'action' => $action];
    }
}


