### 建立视图
1. 建立view文件夹
2. 在控制器中加载模板
### Framework controller_action越界
原因是因为当请求的url没有请求控制器的时候
### 静态文件的处理
放在static目录之下,static目录放在根目录之下
### 模板赋值

### 安全控制
1. 除了入口文件之外的其他文件夹与文件都不应该被访问
2. 服务器设置权限
3. 在入口文件定义常量

### 去除index.php
路由重写
### 建立Base控制器
在app.php里面加载Base类
### 建立助手函数
### 数据库访问
1. core建立db.php
2. 编写curd
### 自定义列表索引
先查询，后组合
### 涉及到的知识点
1. 模式常量
    - __CLASS__ 获得类名 Home
    - __METHOD__ 获得当前类之下的方法名 Home::index
    - __FUNCTION__ 获得当前的函数名 index
    - __DIR__ 根目录
2. 相关函数
    - defined($str) 判断某个常量是否存在
    - print_r($arr) 输出数组
    - var_dump($var) 打印出变量的详细信息，包括数据类型
    - 判断数组的键是否存在
    - max()
    - ceil()
3. 自动加载
