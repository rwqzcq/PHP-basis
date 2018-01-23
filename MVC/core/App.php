<?php
/**
 * MVC框架的内核引导文件
 */


require_once '/core/Framework.php';
// 路由解析初始化
$result = FrameWork::init();
// 控制器
$controller = $result['controller'];
// 方法
$action = $result['action'];
// 加载类文件
require_once '/application/controller/'.$controller.'Controller.class.php';

/* 传统方式实例化类 */
// 实例化控制器
$controller = new $controller;
// 实例化方法
$controller->$action();

/* 反射方式处理 */
$class = new ReflectionClass($controller); // 建立反射类
$instance = $class->newInstanceArgs(); // 实例化controller类
$method = $class->getMethod($action); // 创建方法
$method->invoke($instance); // 执行controller类中的action方法
/* 通过反射可以控制访问请求的权限 */




