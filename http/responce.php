<?php
/**
 * http响应
 */

class Responce {
    public function redirect302($url) { // 重定向
        header('Location:/index.php'); // 设置消息体
    }
    public function notModified304() { // 缓存
        // 第二次请求出现304 有缓存，浏览器从缓存中读取
    }
    public function notFound404() { // 找不到
        header("HTTP/1.1 404 Not Found");
       // http_response_code(404);
    }
    public function forbidden403() { // 禁止
        header("HTTP/1.1 403 Forbidden");
    }
}
$responce = new Responce();
$responce->forbidden403();

