## HTTP请求
### Referer
1. referer是什么
referer是浏览器发送http请求的时候在消息头中添加的就告诉服务器我是从哪个页面链接过来的
2. 原理
referer是浏览器发送http请求的时候在消息头中添加的就告诉服务器我是从哪个页面链接过来的
3. PHP操作refer
$_SEREVR['HTTP_REFERER']
3. 案例
- 盗链