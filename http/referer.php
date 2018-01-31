<?php
header('Content-Type:text/html; charset=utf-8');
$refer = isset($_SERVER['HTTP_REFERER']) || null;
if(!$refer || strpos($refer, 'http://localhost') === 0) { // 必须以http://lcoalhost开头
    exit('禁止盗链!');
}
var_dump($_SERVER);
echo 'safe visit!';



