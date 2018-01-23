<?php
/**
 * 利用PHP发送get请求
 * 手写httpGET POST请求
 */

function get($host){
    $get_request = '';
    $get_request .= "GET /index.php?s=/w0/Home/User/login/from/1.html HTTP/1.1\r\n";
    $get_request .= "Accept-Charset: UTF-8\r\n";
    $get_request .= "Host: $host\r\n";
    $get_request .= "User-Agent: Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.86 Safari/537.36\r\n";
    $get_request .= "Connection: keep-alive\r\n";
    $get_request .= "\r\n";
    $f = fsockopen('ccnu.chunkao.cn', 80, $errno, $errstr, 30); // 打开一个socket连接
    fwrite($f, $get_request); // 发送一个HTTP请求
    $result = '';
    while(!feof($f)) { // 读取发送回来的数据
        $result .= fgets($f, 128);
    }
    echo $result;
    fclose($f);
}
/**
 * 发送POST请求
 */
function post($host, $uri) {

    // 主体内容
    $contents = "username=weiphp&password=jyjy2017";
    // 请求行
    $line = "POST $uri  HTTP/1.1\r\n";
    // 消息体
    $headers = '';
    $headers .= "Accept-Charset: UTF-8\r\n";
    $headers .= "Connection: keep-alive\r\n";
    $headers .= "User-Agent: Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.86 Safari/537.36\r\n";
    $headers .= "Host: $host\r\n";
    $headers .= "Content-Type: application/x-www-form-urlencoded\r\n";
    $headers .= "Content-length: ".strlen($contents)."\r\n";
    $headers .= "\r\n";


    $post_request = $line . $headers . $contents;

    $f = fsockopen($host, 80, $errno, $errstr, 30); // 打开一个socket连接
    fwrite($f, $post_request); // 发送一个HTTP请求
    $result = '';
    while(!feof($f)) { // 读取发送回来的数据
        $result .= fgets($f, 128);
    }
    echo $result;
    fclose($f);
}
$ccnu = 'ccnu.chunkao.cn';
post($ccnu, '/index.php?s=/w0/Home/User/login/from/1.html');





