// 创建对象的方式
var myObject = {}; // 创建空对象
// 对象字面量
var person = { // 在花括号里面写 
    'name': 'rwq', // 属性
    'age': 40,
    'sqyHello' : function(item){
        console.info(item);
    }
};
// 访问对象
console.info(person.name1 || 'default'); // ||true的话就是自己，否则就是后面的
// 调用方法
person.sqyHello('你好');
person['sqyHello']();
// 调用不存在的方法
person.sqyHello && person.sqyHello('这里被执行'); // 前面为true的话才执行后面的
// 工厂函数创建对象
function Pserson(name, age) {
    this.name = name; // 添加属性
    this.age = age; // 添加属性
    this.sqyHello = function() {
        console.log(this.name);
    }
}