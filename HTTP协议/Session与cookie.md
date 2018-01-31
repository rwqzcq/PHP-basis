## Session与Cookie
### Session
- 存放在服务器端
- 服务器把客户端信息以某种形式记录在服务器上
- session可以保存任何类型的数据
- session的存放在服务器的内存中，用户访问PHP，session就会更新活跃时间
- session有过期时间，是为了防止服务器的内存溢出
- 相对于浏览器，session是依赖于cookie的，有了cookie，服务器才可以区分出是那个用户发来的信息
- 服务器会向浏览器发送一个名为PHPSESSIONID的cookie,他的值为session的id
- Session过多会占用服务器内存
### Cookie
- 存放在客户端
- 是服务器向浏览器发送的信息
- 客户端每次想浏览器发送请求的时候会带上这些特殊的信息
- 响应的时候Cookie放在响应头(Responce Header)中
- 浏览器向服务器发送请求的时候Cookie是放在了请求头中的
- HTTP请求是无状态的，为了跟踪浏览器与服务器的会话
- 响应头中的Set-cookie告诉浏览器要建立一个cookie
- 请求头中的Cookie是客户端提交给浏览器的cookie信息
- Cookie也是服务器区分客户端的一个钥匙
### Session与Cookie的区别
- 存放位置
    * Session存放在服务器端，Cookie存放在客户端
- 安全性
    * Session的安全性较高, Cookie的安全性较低
- session的运行依赖于sessio_id,而session_id是依赖于Cookie的
### PHP操作Cookie