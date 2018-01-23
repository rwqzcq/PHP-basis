## GET请求与POST请求
### 请求
浏览器向服务器请求某个web资源，称之为客户端向服务器发送一个HTTP请求。一个请求包括:`请求行`、`消息体`、`实体内容`。消息头和实体内容中的内容是可选的。消息头与实体内容之间有一个`空行`。
- request-line
- headers
- blank-line
- body
#### 请求行
    * 请求方式: GET POST HEAD PUT DELETE
    * URI(去掉主机之后的内容)
    * 版本号 HTTP/1.1
#### 消息体
    * Accept: text/html,image/* 告诉服务器浏览器可以接受的数据类型，比如文本(text)之下的html格式的(html)，也可以是json的，比如text/json
    * Accept-Charset: UTF=8
    * Acccpt-Encoding: gzip,deflate
    * Accept-Language: en-us,zh-cn
    * Host: 主机名
    * If-Modified-Since: 修改时间，在服务器端比较时间看是否要返回给你图片用来处理缓存
    * Referer: 当前请求是从哪个url发过来的
    * User-Agent: 告诉服务器浏览器内核
    * Cookie:
    * Keep-Alive: 长连接
#### 实体内容
https://github.com/rwqzcq/api-for-teammates/invitations

### get请求
    * 是浏览器的默认请求
    * 请求的数据放在url后面，用`?`来分隔URL和请求的数据，参数之间用`&`隔开,总结就是请求的数据放到了请求行里面，比如http://www.baidu.com?name=username
    * GET是向服务器索取数据
    * HTTP协议本身对GET请求的数据大小没有限制，但是不同的浏览器对URL的长度有限制，因此对请求的数据也会有限制
    * GET请求不是很安全
### post请求
    * 请求的数据放在实体内容里面
    * POST请求的数据大小没有限制
    * POST是向服务器修改数据
    * POST请求更加安全，因为请求的数据是不会在浏览器地址栏显示

### GET请求的字符串
```
    GET /index.php HTTP/1.1
    Accept: text/*
    Accept-Charset: UTF-8
    User-Agent: 
    Connection: keep-alive
    有一个空行
```
### POST请求的核心字符串
```
    POST /login.php HTTP/1.1
    Content-Type: application/x-www-form-urlenconded
    Content-Lnegth: 请求参数的长度

    username=rwq&password=123456 
```
