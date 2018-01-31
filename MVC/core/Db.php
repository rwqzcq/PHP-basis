<?php
/**
 * 数据库核心类
 * 主要是对mysqli
 */
class Db {
    private static $conn = null;
    public function __construct() {
        self::$conn = self::db_connect();
    }
    // 连接数据库
    private static function db_connect() {
        require_once '/config/database.php';
        // 创建连接
        $conn = mysqli_connect($db['Host'], $db['Username'], $db['Password'],  $db['Dbname']);
        if(!$conn) {
            exit('connect failed'.mysqli_connect_error());
        }
        return $conn;
    }
    // 查询数据
    public static function item($table, $map = []) {
        $conn = self::db_connect();
        $row = false;
        $sql = "SELECT * FROM {$table}";
        if($map) {
            $sql .= ' WHERE '.self::where($map);
        }
        $sql .= ' limit 1';
        if($result = mysqli_query($conn, $sql)) {
            $row = mysqli_fetch_assoc($result);
            mysqli_free_result($result);
        }
        mysqli_close($conn);
        return $row;
    }
    // 返回多条数据
    public static function lists($table, $where = [], $order = '') {
        $conn = self::db_connect();
        $rows = false;
        $sql = "select * from {$table}";
        $map = '';
        if(is_array($where) && count($where) > 0) {
            $map .= ' WHERE '.self::where($where);
        }
        $sql .= $map;
        if($order) {
            $sql .= " ORDER BY {$order} ";
        }
        if($result = mysqli_query($conn, $sql)) {
            while($row = mysqli_fetch_assoc($result)) {
                $rows[] = $row;
            }
            mysqli_free_result($result);
        }
        mysqli_close($conn);
        return $rows;        
    }
    // 自定义列表索引 主要用于关联查询
    public static function cates($table, $where = [], $index, $order = '') {
        $results = self::lists($table, $where, $order);
        if(!$results) {
            return $results;
        }
        $result = [];
        foreach($results as $key => $value) { // 每一个id与新返回的索引是
           $result[$value[$index]] = $value;
        }
        return $result;
    }
    // total
    public static function totals($table, $where = []) {
        $conn = self::db_connect();
        $sql = "select count(*) as count from {$table }";
        if($where) {
            $sql .= ' where '.self::where($where);
        }
        $count = 0;
        if($result = mysqli_query($conn, $sql)) {
            $row = mysqli_fetch_assoc($result);
            $count = $row['count'];
            mysqli_free_result($result);
        }
        mysqli_close($conn);
        return $count;
    }
    // 分页
    public static function pagination($table, $where = [], $page, $num, $order = '') {
        $conn = self::db_connect();
        // 记录总数
        $total = self::totals($table, $where);
        // 计算总页数
        $total_page = ceil($count/$num); // up
        $page = max(1, intval($page)); // cong 1 kai shi
        $offset = ($page - 1) * $num;
        $sql = "select * from {$table} ";
        if($where) {
            $sql .= ' where '.self::where($where);
        }
        if($order) {

        }
        $sql .= ' limit '.$offset.' , '.$num;
        $rows = [];
        if($result = mysqli_query($conn, $sql)) {
            while($row = mysqli_fetch_assoc($result)) {
                $rows[] = $row;
            }
            mysqli_free_result($result);
        }
        mysqli_close($conn);
        return ['total' => $total, 'lists' => $rows];      
    }
    // insert
    public static function insert($table, $data) {
        // insert into table_name () values ();
        $conn = self::db_connect();
        $fileds = $values = [];
        foreach($data as $key => $value) {
            $item = str_replace("'", '&apos', $item); // dan yin hao
            $item = str_replace('"', '&quot', $item); // shuang yin hao
            $fileds[] = "'".$key."'";
            $values[] = "'".$item."'";
        }
        $sql = "insert into {$table} (".implode(',', $fields).") values (".implode(',', $values).")";
        $insert_id = 0;
        if(mysql_query($conn, $sql)) {
            $insert_id = mysqli_insert_id($conn);
        }
        mysqli_close();
        return $insert_id;
    }
    // 更新操作
    public static function update($table, $data = [], $where = []) {
        $conn = self::db_connect();
        foreach($data as $key => $value) {
            $item = str_replace("'", '&apos', $item); // dan yin hao
            $item = str_replace('"', '&quot', $item); // shuang yin hao
            $str = $key.' = '.$item.' ';
        }
        $sql = "UPDATE {$table} SET {$str}";
        if($where) {
            $sql .= ' where '.self::where($where);
        }
        $res = mysqli_query($conn, $sql) ? true : false;
        mysqli_close();
        return $res;
    }
    // 删除操作
    public static function delete($table, $where = []) {
        $conn = self::db_connect();
        $sql = "DELETE FROM  {$table} ";
        if($where) {
            $sql .= ' where '.self::where($where);
        }    
        $res = mysqli_query($conn, $sql) ? true : false;
        mysqli_close();
        return $res;    
    }
    // where 条件
    public static function where($map = []) {
        $where = '';
        if(!$map) {
            return '';
        }
        foreach($map as $key => $value) {
            $value = gettype($value) == 'string' ? "'".$value."'" : $value;
            if($value) {
                $where .= $key . ' = ' . $value . ' AND ';
            } else {
                ;
            }
        }
        $where = rtrim($where, 'AND ');
        return $where;
    }
}
// lianshicaozuolei
class Sysdb {
    private $table = null;
    private function clear() {
        $this->where = [];
        $this->fields = '*';
    }
    public function table($table) {
        $this->clear();
        $this->table = $table;
        return $this;
    }

}