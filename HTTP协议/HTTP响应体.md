## HTTP响应体
### 是什么
服务器根据浏览器发送的请求返回给浏览器相应的内容
### 包括的内容
- 状态行

    * 版本号
    * 状态码
    ```
    1**
    200 OK
    302 页面重定向
    304 Not Modified
    404
    403
    500
    ```
    * 原因
- 消息头
```
    Last-Modified: 服务器告诉浏览器请求的资源上一次修改的时间
    Refresh:5;url=http://www.baidu.com  浏览器在当前页面停留5s后重定向到新的url
    Connection: close/Keep-Alive
    Date: 
    Keep-Alive: 
```
- 实体内容
```
html代码供浏览器解析
```

### PHP应用
- header()函数